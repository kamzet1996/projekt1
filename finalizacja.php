<?php
    include 'connect.php';

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    $polaczenie -> query('SET NAMES utf8');

    if($polaczenie->connect_errno!=0){
        "Error: ".$polaczenie->connect_errno;
    }
    else
    {
        $id_pizzy = $_POST['id_pizzy'];
        $ilosc = $_POST['ilosc'];
        $rozmiar = $_POST['rozmiar'];
        $dane = $_POST['flname'];
        $ulica = $_POST['ulica'];
        $numer = $_POST['numerdom'];
        $telefon = $_POST['telefon'];
        $mail = $_POST['mail'];
        $inne = $_POST['inne'];
        
        $id_pizzy = htmlentities($id_pizzy, ENT_QUOTES, "UTF-8");
        $ilosc = htmlentities($ilosc, ENT_QUOTES, "UTF-8");
        $rozmiar = htmlentities($rozmiar, ENT_QUOTES, "UTF-8");
        $dane = htmlentities($dane, ENT_QUOTES, "UTF-8");
        $ulica = htmlentities($ulica, ENT_QUOTES, "UTF-8");
        $numer = htmlentities($numer, ENT_QUOTES, "UTF-8");
        $telefon = htmlentities($telefon, ENT_QUOTES, "UTF-8");
        $mail = htmlentities($mail, ENT_QUOTES, "UTF-8");
        $inne = htmlentities($inne, ENT_QUOTES, "UTF-8");
        $date = date('Y-m-d');

        $polaczenie -> query('INSERT INTO `zamowienia` (`id_zamowienia`, `id_pizzy`, `ilosc`, `cena`, `dane`, `ulica`, `numerdom`, `telefon`, `mail`, `uwagi`, `data`) VALUES 
        (NULL, "'.$id_pizzy.'", "'.$ilosc.'", "'.$rozmiar.'", "'.$dane.'", "'.$ulica.'", "'.$numer.'", "'.$telefon.'", "'.$mail.'", "'.$inne.'", "'.$date.'")');


       $test = sprintf('Location: koniec.php?ilosc=%d&rozmiar=%d', $ilosc, $rozmiar);
       header($test);
    }

    $polaczenie -> close();
    ?>