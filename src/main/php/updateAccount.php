<?php

    include_once('../../../process/connectDB.php');

    $dataJSON = $_POST['data'];

    $data = json_decode($dataJSON, true);

    if (!isset($_SESSION)) {
        session_start();
    };

    $username = $data['username'];
    $cep = $data['cep'];
    $city = $data['city'];
    $raf = $data['raf'];

    $emailUser = $_SESSION['email'];

    $update = mysqli_query($mysqli, "UPDATE usuarios SET Username='$username', CEP='$cep',city='$city',RAF='$raf'
                                      WHERE Email = '$emailUser';");

    echo 'Sucess';

?>