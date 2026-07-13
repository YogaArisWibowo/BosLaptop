<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BosLaptop - Midtrans Payment Simulator</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/pelanggan/payment.css') }}">
</head>

<body>

    <div class="midtrans-mock-container">
        <!-- Header Pop Up Tiruan Midtrans -->
        <div class="header">
            <h3>BOSLAPTOP GATEWAY</h3>
            <span class="sandbox-badge">SIMULATOR MODE</span>
        </div>

        <!-- Info Nominal Checkout -->
        <div class="order-info">
            <span style="font-size: 13px; color: #555;">Total Pembayaran</span>
            <div class="amount">Rp {{ number_format($checkout->total_bayar, 0, ',', '.') }}</div>
            <div class="order-id">Order ID: #{{ $checkout->id_checkout ?? $checkout->id }}</div>
        </div>

        <!-- Metode Pembayaran Terpilih -->
        <div class="payment-methods">
            <span style="font-size: 12px; font-weight: 600; color: #666; display: block; margin-bottom: 10px;">Metode
                Terpilih:</span>

            <div class="method-item">
                <i class="fas fa-wallet"></i>
                <div>
                    <div class="text-main">{{ $checkout->metode_pembayaran }}</div>
                    <div class="text-sub">Proses instan via sistem simulasi aman</div>
                </div>
            </div>

            <!-- Form Otomatis submit ke Callback Sukses -->
            <form action="{{ route('checkout.callback-simulasi', $checkout->id_checkout ?? $checkout->id) }}"
                method="POST">
                @csrf
                <button type="submit" class="btn-simulate">
                    <i class="fas fa-check-circle"></i> Simulasikan Sukses
                </button>
            </form>

            <a href="/keranjangpelanggan" class="cancel-link">Batalkan Transaksi</a>
        </div>
    </div>

</body>

</html>
