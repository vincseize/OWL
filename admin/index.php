<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php

        require_once("../__Globals.php");
        require_once("__dbcontroller.php");

        $db_handle = new DBController();
        $products = $db_handle->runQuery($GET_ALL_TB_PRODUCTS);
        $types = $db_handle->runQuery($GET_ALL_TB_TYPES);

    ?>

    <title><?php echo $nom_project; ?></title> 

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS 
    <link href="../css/plugins/morris.css" rel="stylesheet">
    -->

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <script src="../js/owl.js" type="text/javascript"></script>


</head>

<body>


<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">


        <?php include('header_navbar.php'); ?>



            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="font-size:14px;">
                    <li>
                        <a href="#" onClick="load_div('home_container','../list_products.php');"><i class="fa fa-fw fa-coffee"></i> Liste <?php echo ucfirst($nom_products) ;?></a>
                    </li>
                    <li>
                        <a href="#" onClick="load_div('home_container','../list_types.php');"><i class="fa fa-fw fa-coffee"></i> Liste <?php echo ucfirst($nom_types) ;?></a>
                    </li>
                    <li>
                        <a href="#" onClick="load_div('home_container','container_products.php');"><i class="fa fa-fw fa-edit"></i> Gestion <?php echo ucfirst($nom_products) ;?></a>
                    </li>                    
                    <li>
                        <a href="#" onClick="load_div('home_container','container_types.php');"><i class="fa fa-fw fa-filter"></i> Gestion <?php echo ucfirst($nom_types) ;?></a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>



        <!-- #home_container -->
        <div id="home_container" name="home_container" class="home_container">
            


            <div  id="loader" style="position:absolute;z-index:9999;background-color='red';left: 0px;top: 0px;width: 100%;height: 100%;background: url('../images/loading-animate.gif') 50% 50% no-repeat;display:none;">
            </div>
            <!-- <img src="../images/loading-animate.gif" class="ajax-loader"/> -->



            <?php include('../list_products.php'); ?>

        </div>
        <!-- /#home_container -->



</div>
<!-- /#wrapper -->




<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript 
<script src="../js/plugins/morris/raphael.min.js"></script>
<script src="../js/plugins/morris/morris.min.js"></script>
<script src="../js/plugins/morris/morris-data.js"></script>
-->

</body>

</html>
