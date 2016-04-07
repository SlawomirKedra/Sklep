<?php

	session_start();			
	
	if ((isset($_SESSION['udanarejestracja'])))
	{
		header('Location: ../views/po_rejestracji.php');
		exit();
	}
	else
	{
		unset($_SESSION['udanarejestracja']);
	}
?>
