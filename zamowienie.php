<?php
include 'connect.php';

$ilosc = $_GET['ilosc'];
$id_pizzy = $_GET['id_pizzy'];
$rozmiar = $_GET['rozmiar'];
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
    <main class="zamowienie container" style="margin-top: 40px;">
        <h3> Podaj adres dostawy </h3>
        <form method="POST" action="finalizacja.php">
            <input type="hidden" name="ilosc" value="<?php echo $ilosc; ?> " />
            <input type="hidden" name="id_pizzy" value="<?php echo $id_pizzy; ?> " />
            <input type="hidden" name="rozmiar" value="<?php echo $rozmiar; ?> " />
            <table>
                <tr>
                    <td class="left-td"> Imię i Nazwisko: </td>
                    <td class="right-td">
                        <input type="text" name="flname" /></td>
                </tr>
                <tr>
                    <td class="left-td"> Ulica: </td>
                    <td class="right-td">
                        <input type="text" name="ulica" /></td>
                </tr>
                <tr>
                    <td class="left-td"> Numer domu/mieszkania: </td>
                    <td class="right-td">
                        <input type="text" name="numerdom" /></td>
                </tr>
                <tr>
                    <td class="left-td"> Numer Telefonu: </td>
                    <td class="right-td">
                        <input type="text" name="telefon" /></td>
                </tr>
                <tr>
                    <td class="left-td"> Adres e-mail:  </td>
                    <td class="right-td">
                        <input type="text" name="mail" /></td>
                </tr>
            </table>

            <textarea name="inne" class="uwagi" cols="30" rows="4" value="Brak">Uwagi do zamowienia</textarea>
            <input type="submit" value="zamow" class="zamow zamow2" />
        </form>

    </main>
    <?php include 'footer.php'; ?>
</body>

</html>