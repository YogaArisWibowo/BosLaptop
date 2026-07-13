<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BosLaptop - Checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    {{-- Sesuaikan dengan path CSS kamu --}}
    <link rel="stylesheet" href="{{ asset('css/pelanggan/checkout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pelanggan/produkpelanggan.css') }}">
</head>

<body>

    @include('sidebar.sidebarpelanggan')

    <div class="main-content">
        {{-- Topbar --}}
        <div class="topbar">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari laptop, aksesoris, atau SKU...">
            </div>
            <div class="user-section">
                <div class="notification">
                    <i class="far fa-bell"></i>
                    <div class="badge"></div>
                </div>

            </div>
        </div>

        {{-- Form Checkout Utama yang membungkus seluruh data --}}
        <form action="{{ route('checkout.proses') }}" method="POST" class="checkout-container">
            @csrf

            {{-- 1. Alamat Pengiriman --}}
            <div class="checkout-section">
                <h3>Alamat Pengiriman</h3>
                <hr>
                <div class="address-details">
                    <h4>{{ $pelanggan->nama }}</h4>
                    <p id="alamat-display">
                        @php
                            $alamatTampil = 'Alamat belum diatur, silakan lengkapi profil Anda.';
                            $alamatUtamaId = '';

                            if (isset($pelanggan->alamat) && count($pelanggan->alamat) > 0) {
                                // Ambil alamat utama, atau ambil data alamat yang pertama
                                $kumpulanAlamat = collect($pelanggan->alamat);
                                $alamatUtama =
                                    $kumpulanAlamat->firstWhere('is_primary', 1) ??
                                    ($kumpulanAlamat->firstWhere('is_utama', 1) ?? $kumpulanAlamat->first());

                                if ($alamatUtama) {
                                    // Ubah objek database menjadi array murni
                                    $almtArr = is_object($alamatUtama) ? $alamatUtama->toArray() : (array) $alamatUtama;

                                    // Buang kolom sistem yang tidak ingin ditampilkan di layar
                                    $unwanted = [
                                        'id',
                                        'id_alamat',
                                        'id_pelanggan',
                                        'pelanggan_id',
                                        'created_at',
                                        'updated_at',
                                        'is_utama',
                                        'is_primary',
                                        'status',
                                    ];
                                    foreach ($unwanted as $key) {
                                        unset($almtArr[$key]);
                                    }

                                    // Ambil semua data teks yang tersisa
                                    $cleanValues = array_values(array_filter($almtArr));

                                    if (count($cleanValues) > 0) {
                                        $alamatTampil = implode(', ', $cleanValues);
                                    }

                                    $alamatUtamaId = $alamatUtama->id ?? ($alamatUtama->id_alamat ?? '');
                                }
                            }
                        @endphp
                        {{ $alamatTampil }}
                    </p>
                    <input type="hidden" name="id_alamat_pengiriman" id="input-id-alamat" value="{{ $alamatUtamaId }}">
                    <a href="javascript:void(0)" class="btn-ubah" onclick="openModal('addressModal')">Ubah Alamat</a>
                </div>
            </div>

            {{-- 2. Opsi Pengiriman --}}
            <div class="checkout-section clickable-section" onclick="openModal('shippingModal')">
                <h3>Opsi Pengiriman</h3>
                <hr>
                <div class="shipping-option">
                    <div class="shipping-info">
                        <h4 id="shipping-name-display">J&T Express</h4>
                        <p id="shipping-desc-display">Akan diterima pada tanggal 26-30 Juni</p>
                    </div>
                    <div class="shipping-price">
                        <h4 id="shipping-price-display">Rp {{ number_format($biayaOngkir, 0, ',', '.') }}</h4>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                {{-- Hidden input untuk dikirim ke controller --}}
                <input type="hidden" name="biaya_ongkir" id="input-biaya-ongkir" value="{{ $biayaOngkir }}">
            </div>

            {{-- 3. Daftar Produk --}}
            <div class="checkout-section">
                <table class="checkout-table" style="border-spacing: 16px 0; table-layout: auto;">
                    <thead>
                        <tr>
                            <th style="width: 40%; max-width: 250px;">Produk</th>
                            <th style="width: 20%; min-width: 100px; text-align: left;">Harga Satuan</th>
                            <th style="width: 15%; min-width: 70px; text-align: center;">Jumlah</th>
                            <th style="width: 25%; min-width: 120px; text-align: right;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keranjang as $k)
                            <tr>
                                <td style="word-wrap: break-word; word-break: break-word;">
                                    <div class="product-col">
                                        <div class="product-icon">
                                            <img src="{{ asset('storage/' . $k->produk->gambar) }}"
                                                alt="{{ $k->produk->nama }}" style="width: 60px; height: 60px;">
                                        </div>
                                        <div class="product-detail" style="flex: 1;">
                                            <h4 style="font-size: 12px; margin: 5px 0; line-height: 1.3;">
                                                {{ $k->produk->merk }} {{ $k->produk->nama }}</h4>
                                            <p style="font-size: 11px; margin: 0;">
                                                {{ \Illuminate\Support\Str::limit($k->produk->spesifikasi, 40) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td style="text-align: left;">Rp {{ number_format($k->produk->harga, 0, ',', '.') }}
                                </td>
                                <td style="text-align: center;">{{ $k->jumlah }}</td>
                                <td class="subtotal-text" style="text-align: right;">Rp
                                    {{ number_format($k->produk->harga * $k->jumlah, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- 4. Metode Pembayaran --}}
            <div class="checkout-section clickable-section" onclick="openModal('paymentModal')">
                <h3>Metode Pembayaran</h3>
                <hr>
                <div class="payment-option">
                    <div class="payment-badge" id="payment-display">
                        <span class="badge-dana">DANA</span> Digital Wallet
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
                <input type="hidden" name="metode_pembayaran" id="input-metode-pembayaran" value="DANA">
            </div>

            {{-- 5. Ringkasan Belanja --}}
            <div class="checkout-section summary-box">
                <h3 class="summary-title">Ringkasan Belanja</h3>
                <div class="summary-row">
                    <span>Total Harga ({{ $totalBarang }} Barang)</span>
                    <span id="summary-total-harga" data-value="{{ $totalHarga }}">Rp
                        {{ number_format($totalHarga, 0, ',', '.') }}</span>
                </div>
                <div class="summary-row">
                    <span>Ongkos Kirim</span>
                    <span id="summary-ongkir">Rp {{ number_format($biayaOngkir, 0, ',', '.') }}</span>
                </div>
                <div class="divider"></div>
                <div class="summary-total">
                    <div class="total-label">
                        <h4>Total</h4>
                        <h4>Bayar</h4>
                    </div>
                    <div class="total-price-final" id="summary-total-bayar">
                        Rp {{ number_format($totalBayar, 0, ',', '.') }}
                    </div>
                </div>

                <!-- TOMBOL BAYAR SEKARANG (Sudah langsung terhubung ke form utama di atas) -->
                <button type="submit" class="btn-pay-now">BAYAR SEKARANG</button>
            </div>
        </form>
    </div>

    {{-- MODAL PILIH ALAMAT --}}
    <div id="addressModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Pilih Alamat Pengiriman</h3>
                <span class="close" onclick="closeModal('addressModal')">&times;</span>
            </div>
            <div class="modal-body">
                @if (isset($pelanggan->alamat) && count($pelanggan->alamat) > 0)
                    @foreach ($pelanggan->alamat as $almt)
                        @php
                            $almtArr = is_object($almt) ? $almt->toArray() : (array) $almt;

                            // Simpan ID asli sebelum datanya di-filter
                            $idAlamat = $almt->id ?? ($almt->id_alamat ?? '');
                            $isUtama = ($almt->is_primary ?? ($almt->is_utama ?? 0)) == 1;

                            // Buang kolom-kolom sistem
                            $unwanted = [
                                'id',
                                'id_alamat',
                                'id_pelanggan',
                                'pelanggan_id',
                                'created_at',
                                'updated_at',
                                'is_utama',
                                'is_primary',
                                'status',
                            ];
                            foreach ($unwanted as $key) {
                                unset($almtArr[$key]);
                            }

                            // Bersihkan nilai array yang kosong
                            $cleanValues = array_values(array_filter($almtArr));

                            // Trik Dinamis: Baris pertama (index 0) otomatis jadi Label, sisanya jadi Detail
                            $label = $cleanValues[0] ?? 'Alamat';
                            $detail = implode(', ', array_slice($cleanValues, 1));

                            // Gabungan teks utuh untuk dikirim balik ke layar utama saat diklik
                            $teksTampil = implode(', ', $cleanValues);
                        @endphp

                        <div class="option-item"
                            onclick="selectAddress('{{ $idAlamat }}', '{{ addslashes($teksTampil) }}')">
                            <div class="option-text">
                                <strong>{{ $label }} {!! $isUtama ? '<span style="color: #e74c3c; font-size: 12px;">(Utama)</span>' : '' !!}</strong>
                                <span>{{ $detail }}</span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div style="text-align: center; padding: 20px;">
                        <p>Belum ada alamat tersimpan.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- MODAL OPSI PENGIRIMAN --}}
    <div id="shippingModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Pilih Opsi Pengiriman</h3>
                <span class="close" onclick="closeModal('shippingModal')">&times;</span>
            </div>
            <div class="modal-body">
                <div class="option-item"
                    onclick="selectShipping('J&T Express', 32000, 'Akan diterima pada tanggal 26-30 Juni')">
                    <div class="option-text">
                        <strong>J&T Express</strong>
                        <span>Akan diterima pada tanggal 26-30 Juni</span>
                    </div>
                    <strong>Rp 32.000</strong>
                </div>
                <div class="option-item"
                    onclick="selectShipping('JNE Reguler', 35000, 'Akan diterima pada tanggal 27-30 Juni')">
                    <div class="option-text">
                        <strong>JNE Reguler</strong>
                        <span>Akan diterima pada tanggal 27-30 Juni</span>
                    </div>
                    <strong>Rp 35.000</strong>
                </div>
                <div class="option-item" onclick="selectShipping('TIKI ONS', 45000, 'Akan diterima besok')">
                    <div class="option-text">
                        <strong>TIKI ONS</strong>
                        <span>Akan diterima besok</span>
                    </div>
                    <strong>Rp 45.000</strong>
                </div>
                <div class="option-item"
                    onclick="selectShipping('POS Indonesia', 28000, 'Akan diterima pada tanggal 28-02 Juli')">
                    <div class="option-text">
                        <strong>POS Indonesia</strong>
                        <span>Akan diterima pada tanggal 28-02 Juli</span>
                    </div>
                    <strong>Rp 28.000</strong>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL METODE PEMBAYARAN --}}
    {{-- Ganti bagian MODAL METODE PEMBAYARAN di blade kamu dengan ini --}}
    <div id="paymentModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Pilih Metode Pembayaran</h3>
                <span class="close" onclick="closeModal('paymentModal')">&times;</span>
            </div>
            <div class="modal-body">
                <div class="option-item"
                    onclick="selectPayment('DANA', '<span class=\'badge-dana\'>DANA</span> Digital Wallet')">
                    <strong>DANA (Digital Wallet)</strong>
                </div>
                <!-- SEBELUMNYA 'Transfer Mandiri', SEKARANG SUDAH DIUBAH JADI 'ShopeePay' -->
                <div class="option-item"
                    onclick="selectPayment('ShopeePay', '<span class=\'badge-shopeepay\' style=\'background:#f5a623;color:#fff;padding:4px 12px;border-radius:4px;font-size:12px;font-weight:600;\'>SHOPEEPAY</span> Digital Wallet')">
                    <strong>ShopeePay (Digital Wallet)</strong>
                </div>
                <div class="option-item"
                    onclick="selectPayment('GoPay', '<span class=\'badge-gopay\' style=\'background:#00a5cf;color:#fff;padding:4px 12px;border-radius:4px;font-size:12px;font-weight:600;\'>GoPay</span> Digital Wallet')">
                    <strong>GoPay (Digital Wallet)</strong>
                </div>
                <div class="option-item"
                    onclick="selectPayment('Transfer BCA', '<span class=\'badge-bank\' style=\'background:#005aaa;color:#fff;padding:4px 12px;border-radius:4px;font-size:12px;font-weight:600;\'>BCA</span> Virtual Account')">
                    <strong>Transfer Bank BCA</strong>
                </div>
                <div class="option-item"
                    onclick="selectPayment('Transfer BRI', '<span class=\'badge-bank\' style=\'background:#005aaa;color:#fff;padding:4px 12px;border-radius:4px;font-size:12px;font-weight:600;\'>BRI</span> Virtual Account')">
                    <strong>Transfer Bank BRI</strong>
                </div>
                <div class="option-item"
                    onclick="selectPayment('Transfer Mandiri', '<span class=\'badge-bank\' style=\'background:#f5a623;color:#fff;padding:4px 12px;border-radius:4px;font-size:12px;font-weight:600;\'>MANDIRI</span> Virtual Account')">
                    <strong>Transfer Bank Mandiri</strong>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPT INTERAKTIF --}}
    <script>
        // Format Rupiah
        const formatRupiah = (angka) => {
            return new Intl.NumberFormat('id-ID').format(angka);
        };

        // Buka Tutup Modal
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "flex";
        }

        // Tutup Modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = "none";
            }
        }

        // Pilih Pengiriman
        function selectShipping(name, price, desc) {
            document.getElementById('shipping-name-display').innerText = name;
            document.getElementById('shipping-desc-display').innerText = desc;
            document.getElementById('shipping-price-display').innerText = 'Rp ' + formatRupiah(price);

            document.getElementById('input-biaya-ongkir').value = price;
            document.getElementById('summary-ongkir').innerText = 'Rp ' + formatRupiah(price);

            // Hitung Ulang Total
            let totalHarga = parseInt(document.getElementById('summary-total-harga').getAttribute('data-value'));
            let totalBayar = totalHarga + price;
            document.getElementById('summary-total-bayar').innerText = 'Rp ' + formatRupiah(totalBayar);

            closeModal('shippingModal');
        }

        // Pilih Pembayaran
        function selectPayment(val, htmlBadge) {
            document.getElementById('payment-display').innerHTML = htmlBadge;
            document.getElementById('input-metode-pembayaran').value = val;
            closeModal('paymentModal');
        }

        // Pilih Alamat
        function selectAddress(idAlamat, teksAlamatLengkap) {
            // Ubah teks alamat di layar
            document.getElementById('alamat-display').innerText = teksAlamatLengkap;

            // Simpan ID alamat ke input hidden agar ikut terkirim saat form di-submit
            document.getElementById('input-id-alamat').value = idAlamat;

            // Tutup modal
            closeModal('addressModal');
        }
    </script>
</body>

</html>
