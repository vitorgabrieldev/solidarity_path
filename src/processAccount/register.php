<?php

    // -- | -- Request Connection DATABASE -- | -- 
    include('connectDB.php');

    // -- | -- Request Data -- | --
    $DATA_user = $_POST['data'];

    // -- | -- JSON Data -- | --
    $data = json_decode($DATA_user, true);

    // -- | -- Data For Management -- | --
    $typeUser = $data['typeUser'];
    $userEmail = $mysqli->real_escape_string($data['userEmail']);
    $username = $data['userName'];
    $userPassword = password_hash($data['userPassword'], PASSWORD_DEFAULT);
    // password_verify($password, $user['Password'])
    $userCreation = date('y/m/d');

    // -- | -- validate email in the system -- | --
    $validate_email = mysqli_query($mysqli,"SELECT * FROM `usuarios` WHERE Email = '$userEmail';");

    $qtdUsers = $validate_email->num_rows;

    if($qtdUsers >= 1) {
        echo 'ErrorEmail';
    } else {
        $insert = mysqli_query($mysqli, "INSERT INTO `usuarios`(Username,Email,Password,typeUser,Creation)
                                        VALUES('$username','$userEmail','$userPassword','$typeUser','$userCreation');");
        startSession();
    };

    function startSession() {
        if(!isset($_SESSION)){
            session_start();
        };

        include('connectDB.php');

        $DATA_user = $_POST['data'];

        // -- | -- JSON Data -- | --
        $data = json_decode($DATA_user, true);

        $emailVerify = $mysqli->real_escape_string($data['userEmail']);

        $resInfo = mysqli_query($mysqli,"SELECT * FROM `usuarios` WHERE Email = '$emailVerify';");

        $res = $resInfo->fetch_assoc();


        $_SESSION['username'] = $data['userName'];
        $_SESSION['typeuser'] = $data['typeUser'];
        $_SESSION['email'] = $data['userEmail'];
        $_SESSION['dateCreation'] = $res['Creation'];
        $_SESSION['picture'] = $res['Picture'];
        $_SESSION['dob'] = $res['Dob'];
        $_SESSION['fullName'] = $res['fullName'];
        $_SESSION['cpf'] = $res['CPF'];
        $_SESSION['CEP'] = $res['CEP'];

        echo 'Sucess';

    };
 
?>