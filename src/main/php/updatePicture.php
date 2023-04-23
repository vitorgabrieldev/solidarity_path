<?php

    include_once('connectDB.php');

    if(!isset($_SESSION)) {
        session_start();
    };

    $email = $_SESSION['email'];
    $username = $_SESSION['username'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $imagename = $username."_".rand(999, 999999).$_FILES['imgInp']['name'];

        $imagetemp = $_FILES['imgInp']['tmp_name'];

        $imagePath = "../uploads/";

        if (is_uploaded_file($imagetemp)) {
            if (move_uploaded_file($imagetemp, $imagePath . $imagename)) {
                $queryUpdate = mysqli_query($mysqli, "UPDATE usuarios SET Picture='$imagename' WHERE Email='$email';");
            } else {
                die(header("HTTP/1.0 401 Erro ao guardar imagem"));
            }
        } else {
            die(header("HTTP/1.0 401 Erro ao carregar imagem"));
        }
    } else {
        die(header("HTTP/1.0 401 Faltam parametros"));
    }

?>