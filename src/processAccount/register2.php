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

    $email = $_SESSION['email'];

    $query_view = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE Email='$email';");

    $res = $query_view->fetch_assoc();

    $_SESSION['username'] = $data['userName'];
        $_SESSION['typeuser'] = $data['typeUser'];
        $_SESSION['email'] = $data['userEmail'];
        $_SESSION['dateCreation'] = $res['Creation'];
        $_SESSION['picture'] = $res['Picture'];
        $_SESSION['dob'] = $res['Dob'];
        $_SESSION['fullName'] = $res['fullName'];
        $_SESSION['cpf'] = $res['CPF'];
        $_SESSION['CEP'] = $res['CEP'];
        $_SESSION['nis'] = $res['NIS'];


    echo 'Sucess';

?>