<?php
include_once '../core/auth.php';
require_auth();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My&dash;Profile Wache Market</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/seller-home.css" />
    <link rel="stylesheet" href="../assets/css/profile.css" />
</head>

<body>
    <header class="seller-header">
        <nav class="navbar">
            <div class="nav-left">
                <a href="#" class="logo">
                    <i class="fas fa-shopping-bag"></i>
                    Wache-Market
                </a>
            </div>
            <div class="seller-nav-center">
                <ul class="nav-links">
                    <?php if ($_SESSION['mode'] === 'seller'): ?>
                        <!-- Seller Navigation -->
                        <li><a href="seller-home.php"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="profile.html" class="active"><i class="fas fa-user"></i> Profile</a></li>
                        <li><a href="orders.php"><i class="fas fa-clipboard-list"></i> Orders</a></li>
                    <?php else: ?>
                        <!-- Buyer Navigation -->
                        <li><a href="buyer-home.php"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="profile.html" class="active"><i class="fas fa-user"></i> Profile</a></li>
                        <li><a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                        <li><a href="buyer-orders.php"><i class="fas fa-clipboard-list"></i> Orders</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="nav-right">
                <a href="../core/logout.php" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </nav>
    </header>
    <div class="container">
        <div class="profile-section">
            <div class="profile-card">
                <img id="user-image" src="" alt="Profile Picture" class="avatar" />
                <div class="profile-info">
                    <P>Name: <span id="user-name"></span></P>
                    <P>Email: <span id="user-email"></span></P>
                    <P>Phone: <span id="user-phone"></span></P>
                    <p>Address: <span id="user-address"></span></p>
                </div>
                <div class="wallet-info">
                    <h3>Your Wallet</h3>
                    <div class="wallet-amount">
                        <p>Amount: <span id="wallet-amount"></span></p>
                        <button class="eye-toggle" onclick="toggleWalletVisibility()">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>
                        </button>
                    </div>
                    <button class="btn" onclick="openPopup('deposit')">Deposit</button>
                    <button class="btn" onclick="openPopup('withdrawal')">Withdraw</button>
                </div>
                <div class="user-mode">
                    <p>Current Mode: <span id="user-mode-display"></span></p>
                    <div class="radio-group">
                        <div>
                            <label>Change mode here:</label>
                        </div>
                        <div class="radios">
                            <label>
                                <input type="radio" name="userMode" value="buyer"
                                    onchange="switchMode(this.value)">
                                Buyer
                            </label>
                            <label>
                                <input type="radio" name="userMode" value="seller" onchange="switchMode(this.value)">
                                Seller
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="transaction-section">
            <h2>Recent Transactions</h2>
            <div class="transactions">

            </div>
        </div>
    </div>
    <div class="popup" id="popup">
        <div class="popup-content">
            <h3 id="popup-title">Action</h3>
            <form id="transaction-form">
                <label for="method">Select Method:</label>
                <select name="method" id="method" required>
                    <option value="">-- Choose Method --</option>
                    <option value="cbe">CBE</option>
                    <option value="amole">Amole</option>
                    <option value="telebirr">Telebirr</option>
                    <option value="mpesa">M-Pesa</option>
                </select>

                <label for="amount">Enter Amount:</label>
                <input name="amount" type="number" id="amount" min="1" required placeholder="Amount" />

                <button type="submit" class="popup-submit">Confirm</button>
                <button type="button" class="popup-close" onclick="closePopup()">Cancel</button>
            </form>
        </div>
    </div>
    <script src="../assets/js/profile.js"></script>
</body>

</html>