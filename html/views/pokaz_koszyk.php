<?php
require_once "/../controller/connect.php";
$pdo = new PDO('mysql:host='.$host.';dbname='.$db_name.';charset=utf8', $db_user, $db_password);
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo -> exec("SET NAMES 'utf8'");
?>




<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sklep internetowy - Roleton</title>

    <!-- Bootstrap Core CSS -->
    <link href="/../PhpProject1/html/content/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/../PhpProject1/html/content/css/shop-homepage.css" rel="stylesheet">

<?php

require_once "/../controller/function.php";
require_once "/../controller/sessions.php";
require_once "/../controller/request.php";
require_once "/../controller/user.php";
require_once "/../controller/koszyk.php";

$request = new userRequest;
$session = new session;
$koszyk = new koszyk;


?>
    
    
    
    
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/../PhpProject1/index.php">Roleton</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/../PhpProject1/index.php">Home</a>
                    </li>
                    <li>
                        <a href="rejestracja.php">Rejestracja</a>
                    </li>
                    <li>
                       <?php echo "<a href='/../PhpProject1/html/views/logowanie.php'>Logowanie</a>";?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Panel boczny -->
    <div class="container">

        <div class="row">
       
          <div class='col-md-3'>
         
             <p class="lead">Menu:</p>
             <?php
             showMenu();
             
             ?>
          
          </div>
            
            
        
        <div class="col-md-9">
        <h2> Zawartość Koszyka </h2>      
       <div class="table-responsive">
        <table class="table table-bordered table-hover">   
       <?php
       
       $inkoszyk = $koszyk->getProducts();
      
       echo "<tr><td>Indeks</td><td>Nazwa produktu</td><td>Cena netto</td><td>Ilość</td><td>Wartość netto</td></tr>";
       
       
       $sum = 0;
       foreach ($inkoszyk as $produkty){
           $produktykoszykid = $produkty['id'];
           $Cena = $produkty['Cena'];
           $quantity = $produkty['quantity'];
           $index = $produkty['index'];
           $Nazwa = $produkty['Nazwa'];
           $total = $quantity * $Cena;
           $id_Produkty = $produkty['pid'];
           $sum+= $total;
           $remLink = "<a href='usunzkoszyka.php?id=$produktykoszykid'>usuń</a>";
           $plus = "<a href='dodajdokoszyka.php?id_Produkty=$id_Produkty'>+</a>";
           $minus = "<a href='usunzkoszyka.php?id_Produkty=$id_Produkty'>-</a>";
           echo "<tr><td>$index</td><td>$Nazwa</td><td>$Cena zł </td><td>$quantity $plus $minus</td><td>$total</td></tr>";
       }
       
        
       ?>
        </table>
           <h3>Wartość koszyka <?php echo $sum?> zł netto</h3>
        </div> 
              
        </div>
       
      </div>
 </div>       

    
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Roleton 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="html/content/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="html/content/js/bootstrap.min.js"></script>

</body>

</html>
