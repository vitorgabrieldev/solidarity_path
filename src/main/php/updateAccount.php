<?php

    include_once('connectDB.php');

    $dataJSON = $_POST['data'];

    $data = json_decode($dataJSON, true);

    if (!isset($_SESSION)) {
        session_start();
    };

    $email = $data['email'];
    $dob = $data['dob'];
    $CPF = $data['CPF'];
    $fullName = $data['fullName'];
    $niss = $data['niss'];
    $CEP = $data['CEP'];
    $city = $data['city'];
    $RAF = $data['RAF'];

    $emailUser = $_SESSION['email'];

    $update = mysqli_query($mysqli, "UPDATE usuarios SET Email='$email', CEP='$CEP',city='$city',RAF='$RAF',
                                      Dob='$dob', NIS='$niss',CPF='$CPF',fullName='$fullName'
                                      WHERE Email = '$emailUser';");

    echo 'Ok';

?>