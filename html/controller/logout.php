<?php

	session_start();
	
	session_unset();
	
	header('Location: ../views/logowanie.php');

?>