<?php require_once "../Pages/UserInfo.php" ?>
<!-- User info ended here -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="../Scripts/script.js"></script>
    <link rel="stylesheet" href="../Styles/AnalyticStyle.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
</head>
<body onload="check()">
    <div class="container">
        <aside id="side">
            <div class="top">
                <div class="logo">
                    <img src="../images/logo.png" alt="logo">
                    <h2>GAM<span class="primary">BERO</span></h2>
                </div>
                <div class="close" id="close-btn" onclick="hide()">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>

            <div class="sidebar">
            <a href="../Pages/Dashboard.php">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="../Pages/Analytics.php"  class="active">
                    <span class="material-icons-sharp">insights</span>
                    <h3>Analytics</h3>
                </a>
                <a href="../Pages/Reviews.php">
                    <span class="material-icons-sharp">rate_review</span>
                    <h3>Reviews</h3>
                </a>
                <a href="../Pages/Menu.php" >
                    <span class="material-icons-sharp">menu_book</span>
                    <h3>Menu</h3>
                </a>
                <a href="../Pages/Orders.php" >
                    <span class="material-icons-sharp">receipt_long</span>
                    <h3>Order List</h3>
                    <span class="order-count">12</span>
                </a>
                <a href="../Pages/Bookings.php">
                    <span class="material-icons-sharp">table_restaurant</span>
                    <h3>Bookings</h3>
                </a>
                <a href="../Pages/Customers.php">
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Customers</h3>
                </a>
                <a href="../Pages/Logout.php">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>

        <!-- Side ended here -->

        <main>
            <h1>Analytics</h1><br>
            <h2>Most selling items</h2><br>
            <div class="insights">
                <div class="sales">
                    <h1>#1</h1>
                    <div class="middle">
                        <div class="left">
                            <h3>Burger</h3>
                            <h1>Cheese Burger</h1>
                        </div>
                        <div class="progress">
                            <div class="number">
                            <img src="../images/Cheese burger.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                </div>
                <!-- Sales ended here -->

                <div class="sales">
                    <h1>#2</h1>
                    <div class="middle">
                        <div class="left">
                            <h3>Burger</h3>
                            <h1>Cheese Burger</h1>
                        </div>
                        <div class="progress">
                            <div class="number">
                            <img src="../images/Cheese burger.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                </div>
                <!-- Expences ended here -->

                <div class="sales">
                    <h1>#3</h1>
                    <div class="middle">
                        <div class="left">
                            <h3>Burger</h3>
                            <h1>Cheese Burger</h1>
                        </div>
                        <div class="progress">
                            <div class="number">
                            <img src="../images/Cheese burger.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                </div>
                <!-- Income ended here -->
            </div>
            <!-- Insights ended here -->
            <div class="recent-orders">
                <h2>Orders per Item</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Number</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Cheese Burger</td>
                            <td>82612</td>
                            <td>Due</td>
                            <td class="danger">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Cheese Burger</td>
                            <td>82612</td>
                            <td>Due</td>
                            <td class="danger">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Cheese Burger</td>
                            <td>82612</td>
                            <td>Due</td>
                            <td class="danger">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Cheese Burger</td>
                            <td>82612</td>
                            <td>Due</td>
                            <td class="danger">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Cheese Burger</td>
                            <td>82612</td>
                            <td>Due</td>
                            <td class="danger">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
        <!-- Main ended here -->
        <div class="right">
            <div class="top">
                <button id="menu-btn" onclick="show()">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="theme-toggler" onclick="toggleTheme()">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b><?php echo $user ?></b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="<?php echo $img ?>" alt="">
                    </div>
                </div>
            </div>
            <!-- Top ended here -->
            <div class="recent-updates">
                <h2>Trending</h2>
                <div class="updates">
                <div class="update">
                    <div class="profile-photo">
                        <img src="../images/Cheese burger.jpg" alt="">
                    </div>
                    <div class="message">
                        <p><b>Mike Tyson</b> received his order .</p>
                    </div>
                </div>
                <div class="update">
                    <div class="profile-photo">
                        <img src="../images/Cheese burger.jpg" alt="">
                    </div>
                    <div class="message">
                        <p><b>Mike Tyson</b> received his order .</p>
                    </div>
                </div>
                <div class="update">
                    <div class="profile-photo">
                        <img src="../images/Cheese burger.jpg" alt="">
                    </div>
                    <div class="message">
                        <p><b>Mike Tyson</b> received his order .</p>
                    </div>
                </div>
                </div>
            </div>
            <!-- Updates ended here -->
            <div class="sales-analytics">
                <h2>Sales Analytics</h2>
                <div class="item online">
                    <div class="icon">
                        <span class="material-icons-sharp">restaurant_menu</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Total Menu Items</h3>
                        </div>
                        <h3>306</h3>
                    </div>
                </div>
                <div class="item offline">
                    <div class="icon">
                        <span class="material-icons-sharp">person</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Total Clients</h3>
                        </div>
                        <h3>56</h3>
                    </div>
                </div>
                <div class="item customers">
                    <div class="icon">
                        <span class="material-icons-sharp">receipt</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Total Orders</h3>
                        </div>
                        <h3>104</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


    


    
</body>
</html>