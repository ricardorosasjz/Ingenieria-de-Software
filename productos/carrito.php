<?php
 $hostname_User_Information = "localhost";
        $username_User_Information = "root";
        $password_User_Information = "admin";
        $User_Information = mysqli_connect($hostname_User_Information, $username_User_Information, $password_User_Information) or trigger_error(mysql_error(),E_USER_ERROR); 

		session_start();
        mysqli_select_db($User_Information, "tienda");
        ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Carrito de compras - PointMex</title>
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link href="demo/css/style.css" rel='stylesheet' type='text/css' />
    <link href="demo/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="../js/jquery-1.11.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <style>
        @media screen and (max-width:480px) {
            #search {
                width: 80%;
            }
            #search_btn {
                width: 30%;
                float: right;
                margin-top: -32px;
                margin-right: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="navbar-default navbar-fixed-top">
        <div class="container span8 offset2">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false"> <span class="sr-only">navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a href="Home.html"><img src="../img/logo1.gif" alt="LogoPointMex" width="60" height="60" class="img-responsive"></a>
            </div>
            <div class="navbar-collapse" id="collapse">
                <ul class="nav navbar-nav">
                    <li><a href="../Home.html"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a href="catego.html"><span class="glyphicon glyphicon-modal-window"></span> Categorías</a></li>
                </ul>
                <div class="pull-right">
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Buscar">
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </form>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart <span class="badge">0</span></a>
                        <div class="dropdown-menu" style="width:400px;">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-3">Sl.No</div>
                                        <div class="col-md-3">Product Image</div>
                                        <div class="col-md-3">Product Name</div>
                                        <div class="col-md-3">Price in $.</div>
                                    </div>
                                </div>
                                <div class="panel-body"></div>
                                <div class="panel-footer"></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <p><br/>
    </p>
    <p><br/>
    </p>
    <p><br/>
    </p>
    <div class="container">
        <div class="row" id="tab-container">
            <div class="span8 offset2">
                <section>
                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item">
                            <a href="Home.html" class="nav-link active" role="tab">Moda Dama</a>
                        </li>
                        <li class="nav-item">
                            <a href="productos.html" class="nav-link" role="tab">Moda Caballero</a>
                        </li>
                        <li class="nav-item">
                            <a href="vendedores.html" class="nav-link" role="tab">Artesanias</a>
                        </li>
                        <li class="nav-item">
                            <a href="acerca.html" class="nav-link" role="tab">Muebles</a>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </div>
    <div class="span8 offset2">
        <div class="center-block">
        <?php
        $result = mysqli_query($User_Information,"SELECT * FROM cart");

        echo "<table border='1'>
        <tr>
        <th>Código del producto</th>
        <th>Nombre del producto</th>
        <th>Precio</th>
        </tr>";

        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['cart_itemcode'] . "</td>";
        echo "<td>" . $row['cart_item_name'] . "</td>";
        echo "<td>" . $row['cart_price'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";

        ?>
        </div>
    </div>
    <footer class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p>Copyright © PointMexico. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>