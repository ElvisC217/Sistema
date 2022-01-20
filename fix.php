<?php
session_start();
require_once "Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="en">

<head>
    <title>Editar Producto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="dp.png">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <style>
        * {
         margin: 0;
        box-sizing: border-box;
        }
      
      body {
            font-family: Arial, Helvetica, sans-serif;
            
            background-image: url('main/img3.jpg');
                        background-size: cover;
            background-position: center;
            background-size: 150% 150%;
            font-family: sans-serif;
            padding: 90px 20px 0;


        }
        .header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 50px;
            padding: 5px 13px 11px 0px;
            width: 100%;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 0px;
            bottom: 0;
            background-color: transparent;
        }
        .header p {
            margin-left: 20px;
            text-align: left;
        }
        .button-logout {
            position: relative;
            margin-top: -50px;
            margin-right: 20px;
            float: right;
            text-decoration: none;
            border: transparent;
            border-radius: 15px;
            background-color: #e60000;
            padding: 10px 10px 10px 10px;
            color: white;
            transition: 0.5s;
        }
        .button-logout:hover {
            background-color: #D9ddd4;
            color: red;
        }
        .container {
            margin: 90px auto;
            margin-bottom: 50px;
            border-radius: 30px;
            text-align: center;
            background-color: transparent;
            width: 40%;
            padding-bottom: 10px;
            color: white;
        }

        table th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px 0px 10px 0px;
        }

        table {
            width: 100%;
        }

        th {
            color: white;
            background-color: #298dba;
        }

        tr {
            background-color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .timeregis {
            text-align: center;
        }
        .form-group{
            margin-left: 600px;
            color: white;
            font-size: 30px;
            font-family: 'CALIBRI';
        }
        [type=text]{
            font-family: "Mitr", sans-serif;
            border-radius: 15px;
            border: none;
            padding: 7px 200px 7px 5px;
            background-color: transparent;
            color: white;
            outline:none ;
            border-bottom: 1px solid blue;
            font-size: 20px;


        }
        .return{
            border-radius: 15px;
            background-color: #ffcc33;
            color: black;
            text-decoration: none;
            padding: 4px 40px 4px 40px;
            margin: 0px 0px 50px 100px;
            font-size: 20px;
            transition: 0.5s;
        }
        .return:hover{
            background-color: #fdb515;
            color: white;
        }
        .modify{
            border-radius: 15px;
            border: transparent;
            color: white;
            padding: 4px 40px 4px 40px;
            margin: 0px 50px 50px 100px;
            font-size: 20px;
            border-collapse: collapse;
            background-color: #00A600;
            font-family: "Mitr", sans-serif;
            transition: 0.5s;
        }
        .modify:hover{
            color: black;
            background-color: #BBFFBB;
        }
        .header {
  background-color: #0769e9;
  height: 80px;
  position: fixed;
  width: 100%;
  top: 0;
  left: 0;
}

.nav {
  display: flex;
  justify-content: space-between;

  max-width: 992px;
  margin: 0 auto;
}

.nav-link {
  color: white;
  text-decoration: none;
}

.logo {
  font-size: 30px;
  font-weight: bold;
  padding: 0 40px;
  line-height: 80px;
}

.nav-menu {
  display: flex;
  margin-right: 40px;
  list-style: none;
}

.nav-menu-item {
  font-size: 18px;
  margin: 0 10px;
  line-height: 80px;
  text-transform: uppercase;
  width: max-content;
}

.nav-menu-link {
  padding: 8px 12px;
  border-radius: 3px;
}

.nav-menu-link:hover,
.nav-menu-link_active {
  background-color: #034574;
  transition: 0.5s;
}

/* TOGGLE */
.nav-toggle {
  color: white;
  background: none;
  border: none;
  font-size: 30px;
  padding: 0 20px;
  line-height: 60px;
  cursor: pointer;

  display: none;
}

/* MOBILE */
@media (max-width: 768px) {
  body {
    padding-top: 70px;
  }

  .header {
    height: 60px;
  }

  .logo {
  
    font-size: 25px;
    padding: 0 20px;
    line-height: 60px;
  }

  .nav-menu {
    flex-direction: column;
    align-items: center;
    margin: 0;
    background-color: #2c3e50;
    position: fixed;
    top: 60px;
    width: 100%;
    padding: 20px 0;

    height: calc(100% - 60px);
    overflow-y: auto;

    left: 100%;
    transition: left 0.3s;
  }

  .nav-menu-item {
    line-height: 70px;
  }

  .nav-menu-link:hover,
  .nav-menu-link_active {
    background: none;
    color: #83c5f7;
  }

  .nav-toggle {
    display: block;
  }

  .nav-menu_visible {
    left: 0;
  }

  .nav-toggle:focus:not(:focus-visible) {
    outline: none;
  }
}
    </style>
</head>
<body>
<header class="header">
      <nav class="nav">
        <a href="" class="logo nav-link">INVENTARIO</a>
        <button class="nav-toggle" aria-label="Abrir menú">
          <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu">
          <li class="nav-menu-item">
            <a href="list.php" class="nav-menu-link nav-link">Productos</a>
          </li>
          <li class="nav-menu-item">
            <a href="prove.php" class="nav-menu-link nav-link">Proveedores</a>
          </li>
          <li class="nav-menu-item">
            <a href="clientes.php" class="nav-menu-link nav-link">Clientes</a>
          </li>
          <li class="nav-menu-item">
          <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
            
          </li>
        </ul>
      </nav>
    </header>
    <div class="container">
        <h1>Lista de Productos</h1>
        <h2>Has accedido como <?php echo $str = strtoupper($username) ?></h2>
    </div>
    <div class="table-product">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Orden</th>
                <th scope="col">ID:Producto</th>
                <th scope="col">Nombre:Producto</th>
                <th scope="col">Cantidades</th>
                <th scope="col">Fecha:Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td scope="row"><?php echo $idpro ?></td>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['proname'] ?></td>
                        <td><?php echo $row['amount'] ?></td>
                        <td class="timeregis"><?php echo $row['time'] ?></td>
                    </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
    </div>
    <div class="fixproduct">
        <form method="POST" action="main/fix.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre del Producto</label>
                <br>
                <input type="text" class="form-control" name="name" value="<?php echo $_GET['message']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Cantidad</label>
                <br>
                <input type="text" value="<?php echo $_GET['amount'] ?>" class="form-control" name="value" required>
                <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id" />
            </div>
            <br>
            <div class="form-button">
                <button type="submit" class="modify" style="float:right">Editar</button>
                <a name="" id="" class="return" href="list.php" role="button" style="float:left">Volver</a>
            </div>
        </form>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>