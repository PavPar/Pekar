<!DOCTYPE html>
<html lang="rus">

<head>
    <meta charset="UTF-8">
    <title>Торты Порты Аборты</title>
    <link href="css/normalize.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Stalinist+One&display=swap" rel="stylesheet">
    <link href="css/index__css.css" rel="stylesheet">
</head>

<body class="page">
    <header class="header">
        <h1 class="header__title">Пекарь </h1>
        <p class="header__subtitle">Торты и пирожные на заказ</p>

        <img class="header__pekar" src="img/logo.svg">

    </header>

    <main class="content">

        <section class="order">

            <h2 class="order__header">Шаг 1 : Выберите ингредиенты</h2>

            <form class="order__form" action="/php/index_php.php" method="GET" target="_blank">
                <div class="order__components">

                    <div class="component">

                        <h2 class="component__header">Тесто</h2>

                        <div class="component__choises">

                            <label class="option" for="dough_bisc">Бисквит
                                <input type="radio" id="dough_bisc" value="dough_bisc" name="dough">
                            </label>

                            <label class="option" for="dough_bisc">Песочный
                                <input type="radio" id="dough_sand" value="dough_sand" name="dough">
                            </label>

                            <label class="option" for="dough_bese">Безе
                                <input type="radio" id="dough_bese" value="dough_bese" name="dough">
                            </label>
                        </div>

                    </div>

                    <div class="component">

                        <h2 class="component__header">Крем</h2>

                        <div class="component__choises">
                            <label class="option" for="cream_oil">Маслянный
                                <input type="radio" id="cream_oil" value="cream_oil" name="cream">
                            </label>

                            <label class="option" for="cream_cooked">Заварной
                                <input type="radio" id="cream_cooked" value="cream_cooked" name="cream">
                            </label>

                            <label class="option" for="cream_fruit">Фруктовый
                                <input type="radio" id="cream_fruit" value="cream_fruit" name="cream">
                            </label>
                        </div>



                    </div>

                    <div class="component">

                        <h2 class="component__header">Вид изделия</h2>

                        <div class="component__choises">
                            <select id="cake_type" name="cake_type">

                                <optgroup label="Торты">
                                    <option value="cake_type_cake_round">Круглый</option>
                                    <option value="cake_type_cake_square">Квадратный</option>
                                </optgroup>

                                <optgroup label="Пирожные">
                                    <option value="cake_type_brownie_seperate">Отдельные</option>
                                    <option value="cake_type_brownie_formed">В Формочке</option>
                                </optgroup>

                                <optgroup label="Десерты">
                                    <option value="cake_type_dessert_mug">В бокале</option>
                                    <option value="cake_type_dessert_jar">В баночке</option>
                                </optgroup>
                            </select>
                        </div>

                    </div>

                    <div class="component">

                        <h2 class="component__header">Украшения</h2>

                        <div class="component__choises">
                            <label class="option" for="figures">Фигурки из марцепана
                                <input type="checkbox" id="figures" value="extra_fig" name="extra_fig">
                            </label>

                            <label class="option" for="glaz">Глазурь
                                <input type="checkbox" id="glaz" value="extra_glaz" name="extra_glaz">
                            </label>

                        </div>
                    </div>

                </div>

                <div class="user-info">
                    <h2 class="user-info__header">Шаг 2 : Оформите заказ</h2>
                    <label class="option option_user-info" for="dough_bisc">Имя:
                        <input id="name" name="user_name">
                    </label>

                    <label class="option option_user-info" for="adress">Адресс:
                        <input id="adress" name="user_address">
                    </label>

                    <label class="option option_user-info" for="phone">Телефон
                        <input id="phone" name="user_phone">
                    </label>

                    <label class="option option_user-info" for="order_date">Дата
                        <input type="date" id="order_date" name="user_order_date">
                    </label>

                    <label class="option option_user-info" for="order_date">Время доставки
                        <select id="order_time" name="user_order_time">
                            <optgroup label="Утро">
                                <option value="morning">10-15</option>
                            </optgroup>

                            <optgroup label="Вечер">
                                <option value="evening">16-20</option>
                            </optgroup>

                        </select>
                    </label>

                    <label class="option option_user-info" for="price_file"> Файл с ценами
                        <input type="file" id="price_file" name="price_file">
                    </label>

                    <div class="submit">
                        <input name="submit" type="submit" value="Оформить Заказ">
                    </div>

                    <img class="user-info__courier" src="img/courier.svg">
                </div>
                <?php

                ?>

            </form>

        </section>

    </main>

    <footer class="footer">
        <p class="footer__author">Paramonov Pavel</p>
    </footer>

</body>

</html>