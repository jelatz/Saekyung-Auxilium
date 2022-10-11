<?php
    include 'config.php';
    session_start();
    echo "<script>localStorage.clear();</script>";
    echo "<script>sessionStorage.clear();</script>";
    if(session_destroy()){
        
        header('Location:../../FrontEnd/index.php');
        exit();
    }
?>