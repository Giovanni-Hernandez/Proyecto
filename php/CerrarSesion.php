<?php
    session_start();

    if(session_destroy()){
        header("Location: /../Proyecto WEB/login.html");
    }

?>