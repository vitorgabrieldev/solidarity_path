<?php
    if (!isset($_SESSION)) {
        session_start();
    };

    if (!isset($_SESSION['username'])) {
        echo 'Erro';
    } else {
        echo 'Sucess';
    };
?>