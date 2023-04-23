<?php

    if (!isset($_SESSION)) {
        session_start();
    };

    $data = array(
       'username' => $_SESSION['username'],
       'email' => $_SESSION['email'],
       'dob' => $_SESSION['dob'],
       'fullName' => $_SESSION['fullName'],
       'cpf' => $_SESSION['cpf'],
       'CEP' => $_SESSION['CEP'],
       'nis' => $_SESSION['nis'],
    );

    echo json_encode($data);

?>