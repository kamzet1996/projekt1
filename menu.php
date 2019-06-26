<?php
require_once 'connect.php';

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$polaczenie->query('SET NAMES utf8');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>PIZZA</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='normalize.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <script src="https://kit.fontawesome.com/00d4447f7a.js"></script>
</head>

<body>
    <?php include 'header.php'; ?>
    <main class="menu container" style="margin-top: 40px;">
        <?php
        if ($wynik = $polaczenie->query("SELECT * FROM pizzeria.pizza")) {

            $ile_pozycji = $wynik->num_rows;
            if ($ile_pozycji > 0) {
                while ($pizza = $wynik->fetch_assoc()) {
                    echo '<form method="GET" action="zamowienie.php">
                    <table class="pizza-bar">
                        <tr>
                            <td>' . $pizza['nazwa'] . ' <input type="hidden" name="id_pizzy" value="' . $pizza['id_pizzy'] . '"></td>
                            <td rowspan="2" class="rozmiar"><input type="text" name="ilosc" class="ilosc" value="1"></td>
                            <td class="rozmiar"> Mała </td>
                            <td class="rozmiar"> średnia </td>
                            <td class="rozmiar"> Duża </td>
                            <td rowspan="2" class="zamow-td"> <input type="submit" value="Zamów" class="zamow"> </td>
                        </tr>
                        <tr>
                            <td>' . $pizza['skladniki'] . '</td>
                            <td class="rozmiar"><input type="radio" name="rozmiar" value="' . $pizza['cena1'] . '" checked></td>
                            <td class="rozmiar"><input type="radio" name="rozmiar" value="' . $pizza['cena2'] . '"></td>
                            <td class="rozmiar"><input type="radio" name="rozmiar" value="' . $pizza['cena3'] . '"></td>
                        </tr>
                    </table>
                </form>';
                }
            }
        } else {
            echo $polaczenie->error;
        };
        ?>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>