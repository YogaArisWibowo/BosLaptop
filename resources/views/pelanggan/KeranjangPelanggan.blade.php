<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BosLaptop - Keranjang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/pelanggan/produkpelanggan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pelanggan/keranjangpelanggan.css') }}">

</head>

<body>

    @include('sidebar.sidebarpelanggan')

    <div class="main-content">
        <div class="topbar">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari Keranjang Belanja">
            </div>
            <div class="user-section">
                <div class="notification">
                    <i class="far fa-bell"></i>
                    <div class="badge"></div>
                </div>
            </div>
        </div>

        <div class="page-header">
            <h1>Keranjang Belanja</h1>
            <p>Tinjau item pilihan Anda sebelum melakukan pembayaran.</p>
        </div>

        <div class="cart-container">

            <div class="cart-items-section">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($keranjang as $k)
                            <tr>
                                <td>
                                    <div class="product-col">
                                        <div class="product-icon">
                                            {{-- Menampilkan gambar produk dari database --}}
                                            <img src="{{ asset('storage/' . $k->produk->gambar) }}"
                                                alt="{{ $k->produk->nama }}"
                                                style="width: 50px; height: 50px; object-fit: contain;">
                                        </div>
                                        <div class="product-detail">
                                            <h4>{{ $k->produk->merk }} {{ $k->produk->nama }}</h4>
                                            <p>{{ \Illuminate\Support\Str::limit($k->produk->spesifikasi, 25) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="price-col">Rp {{ number_format($k->produk->harga, 0, ',', '.') }}</td>
                                <td>
                                    <div class="qty-wrapper">
                                        {{-- Tombol Kurang (Tanpa Form) --}}
                                        <button type="button" class="qty-btn btn-update-qty"
                                            data-id="{{ $k->id_keranjang }}" data-action="kurang"
                                            {{ $k->jumlah <= 1 ? 'disabled' : '' }}>
                                            <i class="fas fa-minus"></i>
                                        </button>

                                        {{-- Tambahkan ID di span agar JS bisa mengubah angkanya --}}
                                        <span class="qty-num"
                                            id="qty-{{ $k->id_keranjang }}">{{ $k->jumlah }}</span>

                                        {{-- Tombol Tambah (Tanpa Form) --}}
                                        <button type="button" class="qty-btn btn-update-qty"
                                            data-id="{{ $k->id_keranjang }}" data-action="tambah">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </td>

                                {{-- Tambahkan ID di kolom subtotal --}}
                                <td class="subtotal-col" id="subtotal-{{ $k->id_keranjang }}">
                                    Rp {{ number_format($k->produk->harga * $k->jumlah, 0, ',', '.') }}
                                </td>
                                <td class="action-col">
                                    <form action="{{ route('keranjang.hapus', $k->id_keranjang) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-delete"
                                            onclick="return confirm('Hapus produk ini?')">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 30px;">
                                    Keranjang belanja Anda masih kosong. Yuk, belanja dulu!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="cart-summary-section">
                <h3 class="summary-title">Ringkasan Belanja</h3>

                <div class="summary-row">
                    <span id="text-total-barang">Total Harga ({{ $totalBarang }} Barang)</span>
                    <span class="value" id="text-total-belanja">Rp
                        {{ number_format($totalBelanja, 0, ',', '.') }}</span>
                </div>

                <div class="divider"></div>

                <div class="summary-total">
                    <span class="label">Total Bayar</span>
                    <span class="total-price" id="text-total-bayar">Rp
                        {{ number_format($totalBelanja, 0, ',', '.') }}</span>
                </div>

                <a href="{{ route('checkout.tampil') }}" class="btn-checkout"
                    style="display: block; text-align: center; text-decoration: none; {{ $totalBarang == 0 ? 'pointer-events: none; opacity: 0.5;' : '' }}">
                    CHECKOUT
                </a>
            </div>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua tombol + dan -
            const updateBtns = document.querySelectorAll('.btn-update-qty');

            updateBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    let idKeranjang = this.getAttribute('data-id');
                    let aksi = this.getAttribute('data-action');

                    // URL untuk route keranjang.edit
                    let url = `/keranjang/edit/${idKeranjang}`;

                    // Siapkan data untuk dikirim
                    let data = {
                        _token: '{{ csrf_token() }}',
                        aksi: aksi
                    };

                    // Tembak API tanpa refresh halaman
                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then(res => {
                            if (res.success) {
                                // Update angka jumlah barang
                                document.getElementById(`qty-${idKeranjang}`).innerText = res
                                    .qty_baru;

                                // Update subtotal barang tersebut
                                document.getElementById(`subtotal-${idKeranjang}`).innerText =
                                    res.subtotal_baru;

                                // Update Ringkasan Belanja di sebelah kanan
                                document.getElementById('text-total-barang').innerText =
                                    `Total Harga (${res.total_barang} Barang)`;
                                document.getElementById('text-total-belanja').innerText = res
                                    .total_belanja;
                                document.getElementById('text-total-bayar').innerText = res
                                    .total_belanja;

                                // Atur tombol minus aktif/nonaktif jika qty = 1
                                let btnKurang = document.querySelector(
                                    `.btn-update-qty[data-id="${idKeranjang}"][data-action="kurang"]`
                                    );
                                if (res.qty_baru <= 1) {
                                    btnKurang.disabled = true;
                                } else {
                                    btnKurang.disabled = false;
                                }
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>

</body>

</html>
