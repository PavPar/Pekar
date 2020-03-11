<!DOCTYPE html>
<html lang="rus">

<head>
    <meta charset="UTF-8">
    <title>Пекаръ</title>
    <link href="css/normalize.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Stalinist+One&display=swap" rel="stylesheet">
    <link href="css/bill__css.css" rel="stylesheet">
</head>

<body class="page">
    <header class="header">
        <h1 class="header__title">Пекаръ</h1>
        <p class="header__subtitle">Кондитерские изделия на заказ</p>

        <img class="header__pekar" src="img/logo.svg">

    </header>

    <main class="content">

        <section class="order">

            <h2 class="order__header">Спасибо за ваш заказ !</h2>
            <table class="order__info">
                <?php
                include("php/price_counter.php");
                ?>
            </table>
            <form action="../order.php">
                <input type="submit" value="На главную страницу">
            </form>
        </section>

    </main>

    <footer class="footer">
        <p class="footer__author">Paramonov Pavel</p>
    </footer>
</body>



</html>