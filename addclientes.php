<?php
    session_start();
    require_once "Database/Database.php";


    if($_POST['Nombre'] != null && $_POST['Correo'] != null && $_POST['Numero'] != null ) {
        $sql= "INSERT INTO clientes (Nombre,Correo,Numero) VALUES ('". trim($_POST['Nombre']). "','". trim($_POST['Correo']). "','". trim($_POST['Numero']). "'  )";
        if($conn->query($sql)){
            echo "<script>alert('Success added')</script>";
            header("Refresh:0 , url = clientes.php");
            exit();

        }
        else{
            echo "<script>alert('Add failed')</script>";
            header("Refresh:0 , url = clientes.php");
            exit();

        }
    }
    else{
        echo "<script>alert('Please fill in information.')</script>";
        header("Refresh:0 , url = clientes.php");
        exit();

    }
    mysqli_close($conn);
?>