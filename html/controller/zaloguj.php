<?php
	// pozwala korzystanie z sesji 
	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: ../views/logowanie.php');
		exit();
	}
	// require_once wymaga pliku , jeśli nie ma błąd krytyczny 
	require_once "connect.php";
	
	// ustanowienie połączenie z bazą, @operator kontroli błędów
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		
		// wkładanie do zmiennych login i hasło 
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		//walidacja danych , encje htmla
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
		//%s-łańcuch znaków, mysqli_real_escape_string-funkcja której trzeba użyć na każdym ciągu znaków
		//chroni przed wstrzykiwaniem sqla
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM klienci WHERE login='%s' AND haslo='%s'",
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$haslo))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				// globalna tablica asocjacyjna
				$_SESSION['zalogowany'] = true;
				
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['id_Klienci'] = $wiersz['id_Klienci'];
				$_SESSION['Imie'] = $wiersz['Imie'];
				$_SESSION['Nazwisko'] = $wiersz['Nazwisko'];
				$_SESSION['Email'] = $wiersz['Email'];
				$_SESSION['Nr_tel'] = $wiersz['Nr_tel'];
				
				unset($_SESSION['blad']);			//jeśli jestesmy zalogowani to usuwamy z sesji blad
				$rezultat->free_result();
				header('Location: ../views/skleplog.php');		//przekierowanie do tego pliku 
				
			} else {
				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: ../views/logowanie.php');
				
			}
			
		}
		
		$polaczenie->close();
	}
	
?>