<!DOCTYPE html>
<html lang="rus">

<head>
    <meta charset="UTF-8">
    <title>Торты Порты Аборты</title>
    <link href="css/normalize.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Stalinist+One&display=swap" rel="stylesheet">
    <link href="css/bill__css.css" rel="stylesheet">
</head>

<body class="page">
    <header class="header">
        <h1 class="header__title">Пекарь </h1>
        <p class="header__subtitle">Торты и пирожные на заказ</p>

        <img class="header__pekar" src="img/logo.svg">

    </header>

    <main class="content">

        <section class="order">

            <h2 class="order__header">Спасибо за ваш заказ !</h2>
            <table class="order__info">
                <?php
                session_start();
                function Calculate_Price()
                {
                    $Total = 0;
                    return $Total;
                }
                function cake_components_validation($value)
                {
                    switch ($value) {
                        case "dough_bisc":
                            return "Бисквит";
                            break;
                        case "dough_sand":
                            return "Песочный";
                            break;
                        case "dough_bese":
                            return "Безе";
                            break;
                            //Крем
                        case "cream_oil":
                            return "Маслянный";
                            break;
                        case "cream_cooked":
                            return "Заварной";
                            break;
                        case "cream_fruit":
                            return "Фруктовый";
                            break;
                            //Тип
                        case "cake_type_cake_round":
                            return "Торт, круглый";
                            break;
                        case "cake_type_cake_square":
                            return "Торт, квадратный";
                            break;

                        case "cake_type_brownie_seperate":
                            return "Пирожные, отдельные";
                            break;
                        case "cake_type_brownie_formed":
                            return "Пирожные, в Формочке";
                            break;

                        case "cake_type_dessert_mug":
                            return "Дессерт, в бокале";
                            break;
                        case "cake_type_dessert_jar":
                            return "Дессерт, в баночке";
                            break;
                            //Украшения
                        case "extra_fig":
                            return "Фигурки из марцепана";
                            break;
                        case "extra_glaz":
                            return "Глазурь";
                            break;
                        default:
                            return "";
                            break;
                    }
                }

                function test_input($id)
                {
                    if (isset($_GET[$id])) {
                        return $_GET[$id];
                    } else {
                        return '';
                    }
                }

                function output_row_type_3($col_1, $col_2, $col_3)
                {
                    echo "<tr>";
                    echo "<td>" . $col_1 . "</td>";
                    echo "<td>" . $col_2 . "</td>";
                    echo "<td>" . $col_3 . "</td>";
                    echo "</tr>";
                }

                function output_row_type_2($col_1, $col_2)
                {
                    echo "<tr>";
                    echo "<td colspan=" . "2" . ">" . $col_1 . "</td>";
                    echo "<td>" . $col_2 . "</td>";
                    echo "</tr>";
                }


                if (isset($_GET['submit'])) {
                    $cake = array(
                        'dough' => cake_components_validation($_GET['dough']),
                        'cream' => cake_components_validation($_GET['cream']),
                        'type' => cake_components_validation($_GET['cake_type']),
                        'glaz' => cake_components_validation(test_input('extra_glaz')),
                        'figures' => cake_components_validation(test_input('extra_fig'))
                    );


                    $usr = array(
                        'name' => $_GET['user_name'],
                        'address' => $_GET['user_address'],
                        'phone' => $_GET['user_phone'],
                        'order_date' => $_GET['user_order_date'],
                        'order_time' => $_GET['user_order_time'],
                        // 'price_file' => $_GET['price_file']
                    );

                    output_row_type_3("Вид изделия", $cake['type'], "Price");
                    output_row_type_3("Тесто", $cake['dough'], "Price");
                    output_row_type_3("Крем", $cake['cream'], "Price");
                    output_row_type_3("Украшения", $cake['glaz'] . "<br>" . $cake['figures'], "Price");
                    output_row_type_2("Итого :", 'Price');

              
                }
                ?>
            </table>
            <table class="order__info">
                <?php
                output_row_type_2("Имя получателя", $usr['name']);
                output_row_type_2("Адрес", $usr['address']);
                output_row_type_2("Телефон", $usr['phone']);
                output_row_type_2("Дата доставки", $usr['order_date']);
                output_row_type_2("Время доставки", $usr['order_time']);
    
                
                print_r($_SESSION['filedata']);
                ?>
            </table>
        </section>

    </main>

    <footer class="footer">
        <p class="footer__author">Paramonov Pavel</p>
    </footer>
</body>



</html>