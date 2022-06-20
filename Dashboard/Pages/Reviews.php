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
    <link rel="stylesheet" href="../Styles/ReviewStyle.css">
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
                <a href="../Pages/Analytics.php">
                    <span class="material-icons-sharp">insights</span>
                    <h3>Analytics</h3>
                </a>
                <a href="../Pages/Reviews.php"  class="active">
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
            <h1>Reviews</h1>
            <!-- Insights ended here -->
            <div class="recent-orders">
                <div class="recent-updates">
                    <h2>Recent Reviews</h2>
                    <div class="updates">

                    <?php
                    $req = "SELECT * from ratings order by rate_id desc";
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
                                <p><b>'.$data1['username'].'</b><br>'.$data['comment'].'</p>
                                <h2>4.4 <span class="material-icons-sharp">star</span></h2>
                            </div>
                        </div>';
                            }
                        }
                    }
                    ?>

                        
                    </div>
                </div>
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
        </div>
    </div>






</body>

</html>