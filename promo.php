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

    <main class="content">
        <?php
        $id_promo = $_GET['promo_id'];
        $wynik = $polaczenie->query('SELECT * FROM promocje WHERE id_promocji="'.$id_promo.'"');
        
        $promo = $wynik->fetch_assoc();

        echo '<h3>'.$promo["tytul"].'</h3>';
        echo '<p>'.$promo["tresc"].'</p>';
        ?>
    </main>
    <h3 class="nowosci">Aktualnie trwające promocje</h3>
    <div class="container cpromki">
        <aside class="promki">
            <?php
            $wynik = $polaczenie->query('SELECT * FROM promocje WHERE aktywna="1"');
            $ile_promocji = $wynik->num_rows;
            $i = 0;
            if ($ile_promocji > 0) {
                while ($promocje = $wynik->fetch_assoc()) {
                    $i++;
                    echo '<div class="news">
                        <a href="promo.php?promo_id=' . $promocje['id_promocji'] . '" class="img">
                            <img src="' . $promocje['img_url'] . '" alt="promo" class="news_img">
                        </a>
                        <div class="news_links">
                            <a href="promo.php?promo_id=' . $promocje['id_promocji'] . '" class="news_title">' . $promocje['tytul'] . '</a>
                            <a href="promo.php?promo_id=' . $promocje['id_promocji'] . '" class="read_more"> Czytaj Więcej </a>
                        </div>
                    </div>';
                    if ($i == 6) {
                        break;
                    };
                };
            } else {
                echo '<h3 class="nowosci">Aktualnie brak promocji</h3>';
            };
            ?>
        </aside>

        <aside class="opinie">
            <?php
            $wynik = $polaczenie->query('SELECT * FROM opinie ORDER BY id_opinii DESC');
            $ile_opinii = $wynik->num_rows;
            $i = 0;
            if ($ile_opinii > 0) {
                while ($opinia = $wynik->fetch_assoc()) {
                    $i++;
                    echo '<div class="opinia">
                            <p>'.$opinia['tresc'].'</p>
                            <span class="podpis">'.$opinia['dane'].' ('.$opinia['ocena'].'/5)</span>
                        </div>';
                    if ($i == 5) {
                        break;
                    };
                };
            } else {
                echo '<h3 class="nowosci">Aktualnie brak opinii</h3>';
            };
            ?>
        </aside>
    </div>
    <?php include 'footer.php'; ?>
</body>
<?php $polaczenie -> close(); ?>
</html>