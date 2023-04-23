<?php

    include_once('connectDB.php');

    if (!isset($_SESSION)) {
        session_start();
    };

    $DATA_user = $_POST['data'];

    $data = json_decode($DATA_user, true);

    $dob = $data['dob'];
    $CPF = $data['CPF'];
    $niss = $data['niss'];
    $fullName = $data['fullName'];
    $CEP = $data['CEP'];
    $city = $data['city'];
    $RAF = $data['RAF'];

    $emailMove = $_SESSION['email'];

    $query_insert = mysqli_query($mysqli, "UPDATE usuarios SET Dob='$dob',
                                                               CPF='$CPF',
                                                               NIS='$niss',
                                                               fullName='$fullName',
                                                               CEP='$CEP',
                                                               RAF='$RAF' WHERE
                                                               Email='$emailMove';");

    echo 'Sucess';

?>