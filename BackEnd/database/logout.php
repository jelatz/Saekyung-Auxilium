<?php
    include 'config.php';
    session_start();
    if(session_destroy()){
        header('Location:../../FrontEnd/index.php');
        exit();
    }
?>