<?php
error_reporting(0);
ini_set('display_errors', 0);
  session_start();

  function Calculate_Price()
  {
      $Total = 0;
      return $Total;
  }
  // cake_type_dessert_jar
  function SubtypeDeterm($value, $num)
  {
      return explode('_', $value)[$num];
  }

  function cake_components_prices($value)
  {

      switch ($value) {
          case "extra_fig":
              return 80;
              break;
          case "extra_glaz":
              return 30;
              break;
          case "cake":
              return 100;
              break;
          case "brownie":
              return 50;
              break;
          case "dessert":
              return 0;
              break;
          case "dough_bisc":
              return 30;
              break;
          case "dough_sand":
              return 50;
              break;
          case "dough_bese":
              return 40;
              break;
          default:
              return 0;
              break;
      }
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

  function cake_components_validation_raw($value)
  {
      if (cake_components_validation($value) != "") {
          return $value;
      }
      return "";
  }

  function componentPrice($comp)
  {
      $price = 0;
      $basic_components_price = $_SESSION['prices'];
      if (array_key_exists(SubtypeDeterm($comp, 0), $basic_components_price)) {
          $price += $basic_components_price[SubtypeDeterm($comp, 0)][mb_strtoupper(cake_components_validation($comp))];
      }
      $price += cake_components_prices($comp);
      return $price;
  }
  function PriceTotal_components($cake)
  {
      $price_Total = 0;
      foreach ($cake as &$comp) {
          $price_Total += componentPrice($comp);
      }
      return $price_Total;
  }

  function PriceOrder($time)
  {
      $default_cost = 100;
      switch ($time) {
          case "19-23":
              return $default_cost * 2;
              break;
              //Украшения
          case "15-19":
              return $default_cost + $default_cost * 0.2;
              break;
          case "10-15":
              return $default_cost;
              break;
          default:
              return $default_cost;
              break;
      }
  }

  function test_input($id)
  {
      if (isset($_REQUEST[$id])) {
          return $_REQUEST[$id];
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


  if (isset($_REQUEST['submit'])) {
      $cake_raw = array(
          'dough' => cake_components_validation_raw($_REQUEST['dough']),
          'cream' => cake_components_validation_raw($_REQUEST['cream']),
          'type' => SubtypeDeterm($_REQUEST['cake_type'], 2),
          'sub_type' => cake_components_validation_raw($_REQUEST['cake_type']),
          'glaz' => cake_components_validation_raw(test_input('extra_glaz')),
          'figures' => cake_components_validation_raw(test_input('extra_fig'))
      );

      $cake = array(
          'dough' => cake_components_validation($_REQUEST['dough']),
          'cream' => cake_components_validation($_REQUEST['cream']),
          'type' => cake_components_validation(SubtypeDeterm($_REQUEST['cake_type'], 2)),
          'sub_type' => cake_components_validation($_REQUEST['cake_type']),
          'glaz' => cake_components_validation(test_input('extra_glaz')),
          'figures' => cake_components_validation(test_input('extra_fig'))
      );


      $usr = array(
          'name' => $_REQUEST['user_name'],
          'address' => $_REQUEST['user_address'],
          'phone' => $_REQUEST['user_phone'],
          'order_date' => $_REQUEST['user_order_date'],
          'order_time' => $_REQUEST['user_order_time'],
          // 'price_file' => $_REQUEST['price_file']
      );

      output_row_type_3("Вид изделия", $cake['sub_type'], componentPrice($cake_raw['sub_type']) +  componentPrice($cake_raw['type']));
      output_row_type_3("Тесто", $cake['dough'], componentPrice($cake_raw['dough'])." надбавка :".cake_components_prices($cake_raw['dough']));
      output_row_type_3("Крем", $cake['cream'], componentPrice($cake_raw['cream'])." надбавка :".cake_components_prices($cake_raw['cream']));
      if($cake['glaz']!=""){
        output_row_type_3("Украшения", $cake['glaz'] , componentPrice($cake_raw['glaz']));
      }

      if($cake['figures']!=""){
        output_row_type_3("Украшения", $cake['figures'], componentPrice($cake_raw['figures']));
      }
      
      output_row_type_2("Итого по ингридентам :", PriceTotal_components($cake_raw));
  }
  ?>

<table class="order__info">
  <?php
  output_row_type_2("Имя получателя", $usr['name']);
  output_row_type_2("Адрес", $usr['address']);
  output_row_type_2("Телефон", $usr['phone']);
  output_row_type_2("Дата доставки", $usr['order_date']);
  output_row_type_2("Время доставки", $usr['order_time']);
  output_row_type_2("Цена доставки", PriceOrder($usr['order_time']));
  output_row_type_2("Итого :", PriceTotal_components($cake_raw) + PriceOrder($usr['order_time']));
  ?>
</table>
