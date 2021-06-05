<?php
    include('/../Proyecto WEB/php/Config.php');
    session_start();

    $estatus = $_SESSION['login_user'];

    $est_SQL = mysqli_query($db,"select usuario from admin where usuario = '$estatus' ");

    $res = mysqli_fetch_array($est_SQL, MYSQLI_ASSOC);

    $sesLogin = $res['username'];

    if(!isset($_SESSION['login_user'])){
        header("Location: /../Proyecto WEB/login.html");
        die();
    }
    
?>