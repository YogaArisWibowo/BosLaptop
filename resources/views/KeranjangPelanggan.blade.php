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
                <div class="profile-info">
                    <span>Pelanggan</span>
                    <img src="https://ui-avatars.com/api/?name=Pelanggan&background=random" alt="Profile">
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
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="product-col">
                                    <div class="product-icon"><i class="fas fa-laptop"></i></div>
                                    <div class="product-detail">
                                        <h4>BosPro 16 Titanium</h4>
                                        <p>M2 Ultra,<br>64GB RAM</p>
                                    </div>
                                </div>
                            </td>
                            <td class="price-col">Rp 42.500.000</td>
                            <td>
                                <div class="qty-wrapper">
                                    <button class="qty-btn"><i class="fas fa-minus"></i></button>
                                    <span class="qty-num">1</span>
                                    <button class="qty-btn"><i class="fas fa-plus"></i></button>
                                </div>
                            </td>
                            <td class="subtotal-col">Rp 42.500.000</td>
                            <td class="action-col">
                                <button class="btn-delete"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="product-col">
                                    <div class="product-icon"><i class="fas fa-mouse"></i></div>
                                    <div class="product-detail">
                                        <h4>BosPro Mouse V2</h4>
                                        <p>Wireless<br>Ergonomic</p>
                                    </div>
                                </div>
                            </td>
                            <td class="price-col">Rp 850.000</td>
                            <td>
                                <div class="qty-wrapper">
                                    <button class="qty-btn"><i class="fas fa-minus"></i></button>
                                    <span class="qty-num">2</span>
                                    <button class="qty-btn"><i class="fas fa-plus"></i></button>
                                </div>
                            </td>
                            <td class="subtotal-col">Rp 1.700.000</td>
                            <td class="action-col">
                                <button class="btn-delete"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="cart-summary-section">
                <h3 class="summary-title">Ringkasan Belanja</h3>
                
                <div class="summary-row">
                    <span>Total Harga (3 Barang)</span>
                    <span class="value">Rp 44.200.000</span>
                </div>
                
                <div class="divider"></div>
                
                <div class="summary-total">
                    <span class="label">Total Bayar</span>
                    <span class="total-price">Rp 44.200.000</span>
                </div>

                <button class="btn-checkout">CHECKOUT</button>
            </div>

        </div>
    </div>

</body>
</html>