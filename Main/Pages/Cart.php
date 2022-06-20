<?php

session_start();

$sub = 0;
$liv = 20;
$total = 0;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../Styles/cart.css">

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

            <h2 class="section-title">Cart</h2>
            <div class="grid">
                <table class="table">
                    <thead>
                    </thead>
                    <tbody>
                        <?php
                        
                        if (isset($_SESSION['cart'])) {
                            if(count($_SESSION['cart']) != 0){
                                foreach ($_SESSION['cart'] as $key => $value) {

                                    echo '<tr>
                                    <td><img src="' . $value['image'] . '" alt=""></td>
                                    <td>' . $value['name'] . '</td>
                                    <td>' . $value['details'] . '</td>
                                    <td><input type="number" min="1" onchange="" value="' . $value['qte'] . '" name="qte"></td>
                                    <td>' . $value['price'] . '</td>
                                    <td>' . $value['price'] * $value['qte'] . '</td>
                                    <td class="danger"><a href="RemoveFromCart.php?id=' . $key . '">Remove</a></td>
                                    </tr>';
                                    $sub += $value['price'] * $value['qte'];
                                }
                            }
                            else {
                                echo '<td>Your cart is empty</td>';
                            }
                            
                        } else {
                            echo '<td>Your cart is empty</td>';
                        }
                        $total = $sub + $liv;
                        ?>
                    </tbody>
                </table>
                <div class="check">
                    <table class="checkout">
                        <tr>
                            <td colspan="2">
                                <h2>Checkout</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>Sub-Total : </td>
                            <td><?php echo $sub ?> DH</td>
                        </tr>
                        <tr>
                            <td>Livraison : </td>
                            <td><?php echo $liv ?> DH</td>
                        </tr>
                        <tr>
                            <td>Total : </td>
                            <td><?php echo $total ?> DH</td>
                        </tr>
                        
                        <tr>
                            <td colspan="2">
                            <div id="smart-button-container">
                                <div style="text-align: center;">
                                    <div id="paypal-button-container"></div>
                                </div>
                            </div>
                            <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
                            <script>
                                function initPayPalButton() {
                                    paypal.Buttons({
                                        style: {
                                            shape: 'rect',
                                            color: 'gold',
                                            layout: 'horizontal',
                                            label: 'pay',

                                        },

                                        createOrder: function(data, actions) {
                                            return actions.order.create({
                                                purchase_units: [{
                                                    "amount": {
                                                        "currency_code": "USD",
                                                        "value": <?php echo $total; ?>,
                                                        "breakdown": {
                                                            "item_total": {
                                                                "currency_code": "USD",
                                                                "value": <?php echo $sub; ?>
                                                            },
                                                            "shipping": {
                                                                "currency_code": "USD",
                                                                "value": <?php echo $liv; ?>
                                                            },
                                                            "tax_total": {
                                                                "currency_code": "USD",
                                                                "value": 0
                                                            }
                                                        }
                                                    }
                                                }]
                                            });
                                        },

                                        onApprove: function(data, actions) {
                                            return actions.order.capture().then(function(orderData) {

                                                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                                                const element = document.getElementById('paypal-button-container');
                                                element.innerHTML = '';
                                                element.innerHTML = '<h3>Thank you for your payment!</h3>';


                                                window.location.href = "Checkout.php";
                                            });
                                        },

                                        onError: function(err) {
                                            console.log(err);
                                        }
                                    }).render('#paypal-button-container');
                                }
                                initPayPalButton();
                            </script>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="width: 100%;">
                                <a style="font-size: smaller;" href="./Checkout.php?total=<?php echo $total; ?>" class="button">Payer a domicile</a>
                            </td>
                        </tr>
                    </table>
                </div>
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