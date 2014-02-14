<?php	
	include ("../html/header");
	session_unset();
	session_destroy();
	header ('location: ../index.html');
	include ("../html/footer");
	
?>