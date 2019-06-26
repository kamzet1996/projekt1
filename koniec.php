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
    <main class="zamowienie container" style="margin-top: 40px; margin-bottom: 40vh">
        <p>Twoje zamówienie zostało przyjęte i jest w trakcie realizacji. <br />
            Koszt twojego zamówienia to :
            <?php
            echo $_GET['rozmiar'] * $_GET['ilosc'] . ' zł';
            header('Refresh: 10; url=index.php');
            ?>
        </p>
    </main>
    <?php include 'footer.php'; ?>
</body>