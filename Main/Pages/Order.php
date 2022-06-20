<?php

session_start();
$products = [];

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../Styles/styles.css">

    <title>Responsive website food</title>
</head>

<body>

    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevron-up scrolltop__icon'></i>
    </a>

    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="#" class="nav__logo"><img src="../images/logo.png" width="20rem" height="20rem"> GAM<span style="color: var(--first-color);">BERO</span></a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="" class="nav__link">Call us</a></li>
                    <li class="nav__item"><a href="" class="nav__link">Book table</a></li>
                    <li class="nav__item"><a href="" class="nav__link">Contact us</a></li>

                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>

                    <li class="nav__item"><a href="" class="nav__link">Profile</a></li>
                    <li class="nav__item"><a href="" class="nav__link"><i class="bx bx-cart-alt"></i></a></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <main class="l-main">

        <section class="menu section bd-container" id="menu">
            <h2 class="section-title">Our Menu</h2>
            <?php

            require_once 'Config.php';

            $reqc = "select distinct * from category";
            $resc = mysqli_query($link, $reqc);
            if (mysqli_num_rows($resc) == 0) {
                echo 'OOps';
            } else {
                while ($rowc = mysqli_fetch_array($resc, MYSQLI_ASSOC)) {
                    echo '<h3>' . $rowc['name'] . '</h3>
                        <div class="menu__container bd-grid">';
                    $req = "Select m.* from menu m where category_id = " . $rowc['category_id'] . "";
                    $res = mysqli_query($link, $req);
                    if (mysqli_num_rows($res) == 0) {
                        echo 'OOps';
                    } else {
                        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                            array_push($products,['id' => $row['item_id'], 'details' => $row['details'], 'image' => $row['image'], 'name' => $row['name'], 'price'=> $row['price'], 'qte' => 1]);
                            echo '<div class="menu__content">
                        <img src="' . $row['image'] . '" alt="" class="menu__img">
                        <h3 class="menu__name">' . $row['name'] . '</h3>
                        <span class="menu__detail">' . $row['details'] . '</span>
                        <span class="menu__preci">' . $row['price'] . ' DH</span>
                        <a href="AddToCart.php?id='.$row['item_id'] - 1 .'" class="button menu__button"><i class="bx bx-cart-alt"></i></a>
                        </div>';
                        }
                    }
                    echo '</div><br>';
                }
                $_SESSION['products'] = $products;
            }

            ?>

        </section>

    </main>

    <footer class="footer section bd-container">
        <div class="footer__container bd-grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">GAMBERO</a>
                <span class="footer__description">Restaurant</span>
                <div>
                    <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-instagram'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                </div>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Services</h3>
                <ul>
                    <li><a href="#" class="footer__link">Delivery</a></li>
                    <li><a href="#" class="footer__link">Pricing</a></li>
                    <li><a href="#" class="footer__link">Book a table</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Information</h3>
                <ul>
                    <li><a href="#" class="footer__link">Event</a></li>
                    <li><a href="#" class="footer__link">Contact us</a></li>
                    <li><a href="#" class="footer__link">Privacy policy</a></li>
                    <li><a href="#" class="footer__link">Terms of services</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Adress</h3>
                <ul>
                    <li>Marrakech - Gueliz</li>
                    <li>Bd el Mansour Eddahbi</li>
                    <li>0631 - 417 - 887</li>
                    <li>gambero@gmail.com</li>
                </ul>
            </div>
        </div>

        <p class="footer__copy">&#169; 2022 ESMA. All right reserved</p>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>

    <script src="../Scripts/script.js"></script>
</body>

</html>