<?php
    include 'connect.php';

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    $polaczenie -> query('SET NAMES utf8');

    if($polaczenie->connect_errno!=0){
        "Error: ".$polaczenie->connect_errno;
    }
    else
    {
        $opinia=$_POST['opinia'];
        $ocena=$_POST['ocena'];
        $dane=$_POST['dane'];
        $mail=$_POST['mail'];

        $polaczenie -> query('INSERT INTO opinie VALUES (NULL, "'.$opinia.'", "'.$dane.'", "'.$mail.'", "'.$ocena.'")');

        header('Location: opinie.php');
    };
?>