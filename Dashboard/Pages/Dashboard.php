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
    <link rel="stylesheet" href="../Styles/DashboardStyle.css">
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
                <a href="../Pages/Dashboard.php" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="../Pages/Analytics.php">
                    <span class="material-icons-sharp">insights</span>
                    <h3>Analytics</h3>
                </a>
                <a href="../Pages/Reviews.php">
                    <span class="material-icons-sharp">rate_review</span>
                    <h3>Reviews</h3>
                </a>
                <a href="../Pages/Menu.php">
                    <span class="material-icons-sharp">menu_book</span>
                    <h3>Menu</h3>
                </a>
                <a href="../Pages/Orders.php">
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
            <h1>Dashboard</h1>
            <br><br>
            <div class="insights">
                <div class="sales">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Sales</h3>
                            <h1>
                                <?php
                                $req = "SELECT SUM(total_price) as total from orders";
                                $res = mysqli_query($link, $req);
                                if (mysqli_num_rows($res) == 0) {
                                    echo '0 DH';
                                } else {
                                    while ($data = mysqli_fetch_array($res)) {
                                        echo $data['total'] . ' DH';
                                    }
                                }
                                ?>
                            </h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                </div>
                <!-- Sales ended here -->

                <div class="expences">
                    <span class="material-icons-sharp">bar_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Local Sales</h3>
                            <h1>
                                <?php
                                $req = "SELECT SUM(total_price) as total from orders where type='Local'";
                                $res = mysqli_query($link, $req);
                                if (mysqli_num_rows($res)) {
                                    echo '0 DH';
                                } else {
                                    while ($data = mysqli_fetch_array($res)) {
                                        echo $data['total'] . ' DH';
                                    }
                                }
                                ?>
                            </h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>41%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                </div>
                <!-- Expences ended here -->

                <div class="income">
                    <span class="material-icons-sharp">stacked_line_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Online Sales</h3>
                            <h1>
                                <?php
                                $req = "SELECT SUM(total_price) as total from orders where type='Livraison'";
                                $res = mysqli_query($link, $req);
                                if (mysqli_num_rows($res) == 0) {
                                    echo '0 DH';
                                } else {
                                    while ($data = mysqli_fetch_array($res)) {
                                        echo $data['total'] . ' DH';
                                    }
                                }
                                ?>
                            </h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>68%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                </div>
                <!-- Income ended here -->
            </div>
            <!-- Insights ended here -->
            <div class="recent-orders">
                <h2>Recent Orders</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Total Price</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                $req = "SELECT *  from orders order by order_id desc limit 5";
                                $res = mysqli_query($link, $req);
                                if (!mysqli_num_rows($res)) {
                                    echo '0';
                                } else {
                                    while ($data = mysqli_fetch_array($res)) {
                                        echo '<tr>
                                        <td>'.$data['order_id'].'</td>
                                        <td>'.$data['total_price'].'</td>
                                        <td>'.$data['type'].'</td>
                                        <td class="danger">'.$data['status'].'</td>
                                        <td class="primary">Details</td>
                                    </tr>';
                                    }
                                }
                                ?>

                        
                        
                    </tbody>
                </table>
                <a href="">Show All</a>
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
                <h2>Recent Reviews</h2>
                <div class="updates">


                    <?php
                    $req = "SELECT * from ratings order by rate_id desc limit 3";
                    $res = mysqli_query($link, $req);
                    if (!mysqli_num_rows($res)) {
                        echo '0';
                    } else {
                        while ($data = mysqli_fetch_array($res)) {
                            $req1 = "SELECT * from users where user_id = $data[user_id]";
                            $res1 = mysqli_query($link, $req1);
                            while($data1 = mysqli_fetch_array($res1)){

                            echo '<div class="update">
                                            <div class="profile-photo">
                                                <img src="'.$data1['image'].'" alt="">
                                            </div>
                                            <div class="message">
                                                <p><b>'.$data1['username'].'</b><br> '.substr($data['comment'],0, 30).'... .</p>
                                                <small class="text-muted">2 minutes ago</small>
                                            </div>
                                        </div>';
                            }
                        }
                    }
                    ?>



                </div>
                <!-- Updates ended here -->
                <div class="sales-analytics">
                    <h2>Sales Analytics</h2>
                    <div class="item online">
                        <div class="icon">
                            <span class="material-icons-sharp">shopping_cart</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>ONLINE ORDERS</h3>
                                <small class="text-muted">Last 24 hours</small>
                            </div>
                            <h5 class="success"></h5>
                            <h3>
                                <?php
                                $req = "SELECT count(order_id) as total from orders where type='Livraison'";
                                $res = mysqli_query($link, $req);
                                if (!mysqli_num_rows($res)) {
                                    echo '0';
                                } else {
                                    while ($data = mysqli_fetch_array($res)) {
                                        echo $data['total'];
                                    }
                                }
                                ?>
                            </h3>
                        </div>
                    </div>
                    <div class="item offline">
                        <div class="icon">
                            <span class="material-icons-sharp">local_mall</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>OFFLINE ORDERS</h3>
                                <small class="text-muted">Last 24 hours</small>
                            </div>
                            <h5 class="danger"></h5>
                            <h3>
                                <?php
                                $req = "SELECT count(order_id) as total from orders where type='Local'";
                                $res = mysqli_query($link, $req);
                                if (!mysqli_num_rows($res)) {
                                    echo '0';
                                } else {
                                    while ($data = mysqli_fetch_array($res)) {
                                        echo $data['total'];
                                    }
                                }
                                ?>
                            </h3>
                        </div>
                    </div>
                    <div class="item customers">
                        <div class="icon">
                            <span class="material-icons-sharp">person</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>CUSTOMERS</h3>
                                <small class="text-muted">Last 24 hours</small>
                            </div>
                            <h5 class="success"></h5>
                            <h3>
                                <?php
                                $req = "SELECT count(user_id) as total from users";
                                $res = mysqli_query($link, $req);
                                if (!mysqli_num_rows($res)) {
                                    echo '0';
                                } else {
                                    while ($data = mysqli_fetch_array($res)) {
                                        echo $data['total'];
                                    }
                                }
                                ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>






</body>

</html>