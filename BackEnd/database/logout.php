<?php
    include 'config.php';
    session_start();
    // session_destroy();
    if(session_destroy()){
        // session_destroy();
        header('Location:../../FrontEnd/index.php');
        exit();
    }
?>