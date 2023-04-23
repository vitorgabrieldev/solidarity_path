<?php

    include_once('connectDB.php');

    $dataJSON = $_POST['data'];

    $data = json_decode($dataJSON, true);
    
    $UserEmail = $mysqli->real_escape_string($data['userEmail']);
    $UserPassword = $mysqli->real_escape_string($data['userPassword']);

    // -- | -- SELECT DATABASE - Verify Email -- | --
    $queryView = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE Email='$UserEmail';");

    $qtdRows = $queryView->num_rows;

    if($qtdRows >= 1) {
        $datasRow = $queryView->fetch_assoc();

        if(password_verify($UserPassword,$datasRow['Password'])) {
            
            if (!isset($_SESSION)) {
                session_start();
            };

            $_SESSION['username'] = $datasRow['Username'];
            $_SESSION['email'] = $datasRow['Email'];
            $_SESSION['typeuser'] = $datasRow['TypeUser'];
            $_SESSION['dateCreation'] = $datasRow['Creation'];
            $_SESSION['picture'] = $datasRow['Picture'];
            $_SESSION['dob'] = $datasRow['Dob'];
            $_SESSION['fullName'] = $datasRow['fullName'];
            $_SESSION['cpf'] = $datasRow['CPF'];
            $_SESSION['CEP'] = $datasRow['CEP'];

            echo 'Sucess';
        } else {
            echo 'ErrorPass';
        };
        
    } else {
        echo 'ErrorEmail';
    };

?>
