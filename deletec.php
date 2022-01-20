<?php
    session_start();
    require_once "Database/Database.php";

    $delete_num = $_GET['id'];
    $sql_delete =  "DELETE FROM clientes WHERE id = '$delete_num'";
    $query_delete = mysqli_query($conn,$sql_delete);
    $row = mysqli_fetch_assoc($query_delete,MYSQLI_ASSOC);
    if(!$row){
        echo "<script>alert('Eliminación de Producto Exitosa')</script>";        
        header("Refresh: 0 , url = clientes.php");
        exit();

    }
    else{
        echo "<script>alert('No se pudo eliminar producto')</script>";
        header("Refresh: 0 , url = clientes.php");
        exit();

    }
    mysqli_close($conn);
?>