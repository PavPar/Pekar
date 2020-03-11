<!DOCTYPE html>
<html lang="rus">

<head>
    <meta charset="UTF-8">
    <title>Пекаръ</title>
    <link href="css/normalize.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Stalinist+One&display=swap" rel="stylesheet">
    <link href="css/index__css.css" rel="stylesheet">
    <?php include("php/index_php.php") ?>
</head>

<body class="page">
    <header class="header">
        <h1 class="header__title">Пекаръ</h1>
        <p class="header__subtitle">Кондитерские изделия на заказ</p>

        <img class="header__pekar" src="img/logo.svg">

    </header>

    <main class="content">

        <section class="order">

            <h2 class="order__header">Шаг 1 : Выберите ингредиенты</h2>

            <form class="order__form" action="/order__info/bill.php" method="GET" target="_blank">
                <div class="order__components">

                    <div class="component">

                        <h2 class="component__header">Тесто</h2>

                        <div class="component__choises">
                            <span class="error"> <?php echo $dough; ?></span>
                            <label class="option" for="dough_bisc">Бисквит
                                <input type="radio" id="dough_bisc" value="dough_bisc" name="dough" checked="true">
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
                                <input type="radio" id="cream_oil" value="cream_oil" name="cream" checked="true">
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
                        <input id="name" name="user_name" value="Имя пользователя">
                    </label>

                    <label class="option option_user-info" for="adress">Адресс:
                        <input id="adress" name="user_address" value="Адресс">
                    </label>

                    <label class="option option_user-info" for="phone">Телефон
                        <input id="phone" name="user_phone" value="Номер телефона">
                    </label>

                    <label class="option option_user-info" for="order_date">Дата
                        <input type="date" id="order_date" name="user_order_date" value="2020-02-25">
                    </label>

                    <label class="option option_user-info" for="order_date">Время доставки
                        <select id="order_time" name="user_order_time">
                            <option value="10-15">10-15</option>
                            <option value="15-19">15-19</option>
                            <option value="19-23">19-23</option>

                        </select>
                    </label>



                    <div class="submit">
                        <input name="submit" type="submit" value="Оформить Заказ" id="submit">
                    </div>

                    <img class="user-info__courier" src="img/courier.svg">
                    <img class="user-info__courier courier_postion_left" src="img/courier.svg">
                </div>

            </form>

            <form class="user-info user-info_theme_gray" method="post" enctype="multipart/form-data" target="_blank" action="upload.php">
                <label class="option option_user-info file-upload" for="price_file"> Файл с ценами
                    <input type="file" id="price_file" name="price_file" accept=".txt">
                    <input name="submit_file" type="submit" value="Загрузить файл">
                </label>
            </form>
        </section>

    </main>
    <footer class="footer">
        <p class="footer__author">Paramonov Pavel</p>
    </footer>
</body>

</html>