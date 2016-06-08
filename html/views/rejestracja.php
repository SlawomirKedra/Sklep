<?php

require_once "connect.php";
$pdo = new PDO('mysql:host='.$host.';dbname='.$db_name.';charset=utf8', $db_user, $db_password);
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo -> exec("SET NAMES 'utf8'");

	session_start();			
	// sprawdzamy tylko jedną zmienna z rejestracji 
	if (isset($_POST['Email']))
	{
		//ustawienie flagi o wartosci true
		$wszystko_OK=true;
		//Sprawdź poprawność Imienia
		$Imie = $_POST['Imie'];
		//Sprawdzenie długości Imienia
		if ((strlen($Imie)<3) || (strlen($Imie)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_Imie']="Imie musi posiadać od 3 do 20 znaków!";
		}
		if (ctype_alpha($Imie)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_Imie']="Imie może składać się tylko z liter(bez polskich znaków)";
		}
		//Sprawdzenie poprawności i długości Nazwiska
		$Nazwisko = $_POST['Nazwisko'];
		if ((strlen($Nazwisko)<3) || (strlen($Nazwisko)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_Nazwisko']="Nazwisko musi posiadać od 3 do 20 znaków!";
		}
		if (ctype_alpha($Nazwisko)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_Nazwisko']="Nazwisko może składać się tylko z liter(bez polskich znaków)";
		}
		//Sprawdzenie poprawności i długości Nr_tel
		$Nr_tel = $_POST['Nr_tel'];
		if ((strlen($Nr_tel)<3) || (strlen($Nr_tel)>15))
		{
			$wszystko_OK=false;
			$_SESSION['e_Nr_tel']="Nr_tel musi posiadać od 3 do 20 znaków!";
		}
		if (ctype_digit($Nr_tel)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_Nr_tel']="Nr_tel może składać się tylko z cyfr";
		}
		
		// Sprawdź poprawność adresu email
		$Email = $_POST['Email'];
		$EmailB = filter_var($Email, FILTER_SANITIZE_EMAIL);	//sanityzacja email
		
		if ((filter_var($EmailB, FILTER_VALIDATE_EMAIL)==false) || ($EmailB!=$Email))
		{
			$wszystko_OK=false;
			$_SESSION['e_Email']="Podaj poprawny adres e-mail!";
		}
		
		//Sprawdzenie poprawności i długości Adresu
		$Adres = $_POST['Adres'];
		if ((strlen($Adres)<3) || (strlen($Adres)>15))
		{
			$wszystko_OK=false;
			$_SESSION['e_Adres']="Adres musi posiadać od 3 do 30 znaków!";
		}
		
		//Sprawdzenie poprawności i długości Loginu
		$login = $_POST['login'];
		if ((strlen($login)<3) || (strlen($login)>15))
		{
			$wszystko_OK=false;
			$_SESSION['e_login']="login musi posiadać od 3 do 20 znaków!";
		}
		if (ctype_alnum($login)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_login']="login może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		//Sprawdź poprawność hasła
		$haslo = $_POST['haslo'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo)<8) || (strlen($haslo)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo2']="Podane hasła nie są identyczne!";
		}
		
		//Czy zaakceptowano regulamin?
		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}
		
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_Imie'] = $Imie;
		$_SESSION['fr_Nazwisko'] = $Nazwisko;
		$_SESSION['fr_Nr_tel'] = $Nr_tel;
		$_SESSION['fr_Email'] = $Email;
		$_SESSION['fr_Adres'] = $Adres;
		$_SESSION['fr_haslo'] = $haslo;
		$_SESSION['fr_haslo2'] = $haslo2;
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);		//raportowanie o wyjątki 
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());		//rzucenie nowym wyjątkiem
			}
			else
			{
				//Czy email już istnieje?
				$rezultat = $polaczenie->query("SELECT id_Klienci FROM klienci WHERE Email='$Email'");
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_Email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}	
				//Czy login jest już zarezerwowany?
				$rezultat = $polaczenie->query("SELECT id_Klienci FROM klienci WHERE login='$login'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_loginow = $rezultat->num_rows;
				if($ile_takich_loginow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_login']="Istnieje już klient o takim loginie! Wybierz inny.";
				}
				if ($wszystko_OK==true)
				{
					//wszystkie testy zaliczone, dodajemy gracza do bazy
					
					if ($polaczenie->query("INSERT INTO klienci VALUES (NULL, '$Imie', '$Nazwisko', '$Email', '$Nr_tel', '$Adres', '$login', '$haslo')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: udana_rej.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}
	
	
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
    <link href="html/content/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="html/content/css/shop-homepage.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php

require_once "function.php";
require_once "sessions.php";
require_once "request.php";
require_once "user.php";
require_once "koszyk.php";

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
                <a class="navbar-brand" href="index.php">Roleton</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="rejestracja.php">Rejestracja</a>
                    </li>
                    <li>
                        <?php echo "<a href='logowanie.php'>Logowanie</a>";?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Panel boczny -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Menu:</p>
                <?php
             showMenu();
             
             ?>
           </div>
	
	<form method="post">
            <div class="col-md-3">
	<label >Imie:</label > <br /> <input type="text" class="form-control" value="<?php
			if (isset($_SESSION['fr_Imie']))
			{
				echo $_SESSION['fr_Imie'];
				unset($_SESSION['fr_Imie']);
			}
		?>" name="Imie" /><br />
	<?php
			if (isset($_SESSION['e_Imie']))
			{
				echo '<div class="text-danger">'.$_SESSION['e_Imie'].'</div>';
				unset($_SESSION['e_Imie']);
			}
	?>
	<label >Nazwisko:</label > <br /> <input type="text" class="form-control" value="<?php
			if (isset($_SESSION['fr_Nazwisko']))
			{
				echo $_SESSION['fr_Nazwisko'];
				unset($_SESSION['fr_Nazwisko']);
			}
		?>" name="Nazwisko" /><br />
	<?php
			if (isset($_SESSION['e_Nazwisko']))
			{
				echo '<div class="text-danger">'.$_SESSION['e_Nazwisko'].'</div>';
				unset($_SESSION['e_Nazwisko']);
			}
	?>
	<label >Nr_tel:</label > <br /> <input type="text" class="form-control" value="<?php
			if (isset($_SESSION['fr_Nr_tel']))
			{
				echo $_SESSION['fr_Nr_tel'];
				unset($_SESSION['fr_Nr_tel']);
			}
		?>" name="Nr_tel" /><br />
	<?php
			if (isset($_SESSION['e_Nr_tel']))
			{
				echo '<div class="text-danger">'.$_SESSION['e_Nr_tel'].'</div>';
				unset($_SESSION['e_Nr_tel']);
			}
	?>
	<label >E-mail:</label > <br /> <input type="text" class="form-control" value="<?php
			if (isset($_SESSION['fr_Email']))
			{
				echo $_SESSION['fr_Email'];
				unset($_SESSION['fr_Email']);
			}
		?>" name="Email" /><br />
	<?php
			if (isset($_SESSION['e_Email']))
			{
				echo '<div class="text-danger">'.$_SESSION['e_Email'].'</div>';
				unset($_SESSION['e_Email']);
			}
	?>
	<label >Adres:</label > <br /> <input type="text" class="form-control" value="<?php
			if (isset($_SESSION['fr_Adres']))
			{
				echo $_SESSION['fr_Adres'];
				unset($_SESSION['fr_Adres']);
			}
		?>" name="Adres" /><br />
	<?php
			if (isset($_SESSION['e_Adres']))
			{
				echo '<div class="text-danger">'.$_SESSION['e_Adres'].'</div>';
				unset($_SESSION['e_Adres']);
			}
	?>
	<label >Login:</label > <br /> <input type="text" class="form-control" value="<?php
			if (isset($_SESSION['fr_login']))
			{
				echo $_SESSION['fr_login'];
				unset($_SESSION['fr_login']);
			}
		?>" name="login" /><br />
	<?php
			if (isset($_SESSION['e_login']))
			{
				echo '<div class="text-danger">'.$_SESSION['e_login'].'</div>';
				unset($_SESSION['e_login']);
			}
	?>
	<label >Twoje hasło:</label > <br /> <input type="password" class="form-control" value="<?php
			if (isset($_SESSION['fr_haslo']))
			{
				echo $_SESSION['fr_haslo'];
				unset($_SESSION['fr_haslo']);
			}
		?>" name="haslo" /><br />
	<?php
			if (isset($_SESSION['e_haslo']))
			{
				echo '<div class="text-danger">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
			}
	?>
	<label >Powtórz hasło:</label > <br /> <input type="password" class="form-control" value="<?php
			if (isset($_SESSION['fr_haslo2']))
			{
				echo $_SESSION['fr_haslo2'];
				unset($_SESSION['fr_haslo2']);
			}
		?>" name="haslo2" /><br />
	<?php
			if (isset($_SESSION['e_haslo2']))
			{
				echo '<div class="text-danger">'.$_SESSION['e_haslo2'].'</div>';
				unset($_SESSION['e_haslo2']);
			}
	?>
	<label>
			<input type="checkbox"  name="regulamin" <?php
			if (isset($_SESSION['fr_regulamin']))
			{
				echo "checked";
				unset($_SESSION['fr_regulamin']);
			}
				?>/><a href="regulamin.php"> Akceptuję regulamin </a>			
	</label>
	<?php
			if (isset($_SESSION['e_regulamin']))
			{
				echo '<div class="text-danger">'.$_SESSION['e_regulamin'].'</div>';
				unset($_SESSION['e_regulamin']);
			}
	?>
	
	<br />
	<input type="submit" value="Zarejestruj się" />
	</div>
	</form>
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
