<?php
include 'connect.php';

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$polaczenie->query('SET NAMES utf8');

if ($polaczenie->connect_errno != 0) {
    "Error: " . $polaczenie->connect_errno;
};
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
    
    <div class="opinie_form content">
        <form action="opinia.php" method="POST">
            <textarea rows="4" cols="80" name="opinia" placeholder="Twoja Opinia"></textarea><br />
            
            Wybierz ocenę: 
            <label> <input type="radio" name="ocena" value="1" /> 1 </label>
            <label> <input type="radio" name="ocena" value="2" /> 2 </label>
            <label> <input type="radio" name="ocena" value="3" /> 3 </label>
            <label> <input type="radio" name="ocena" value="4" /> 4 </label>
            <label> <input type="radio" name="ocena" value="5" checked/> 5 </label><br />
            <input type="text" name="dane" placeholder="Imię i nazwisko" /><br />
            <input type="text" name="mail" placeholder="Twój e-mail" /><br />
            <input type="submit" value="Prześlij opinię" class="read_more" />
        </form>
    </div>

    <?php
            $wynik = $polaczenie->query('SELECT * FROM opinie ORDER BY id_opinii DESC');
            $ile_opinii = $wynik->num_rows;
            if ($ile_opinii > 0) {
                while ($opinia = $wynik->fetch_assoc()) {
                    echo '<div class="content">
                            <p>'.$opinia['tresc'].'</p>
                            <span class="podpis">'.$opinia['dane'].' ('.$opinia['ocena'].'/5)</span>
                        </div>';
                };
            } else {
                echo '<h3 class="nowosci">Aktualnie brak opinii</h3>';
            };
    ?>

</body>
<?php $polaczenie->close(); ?>

</html>