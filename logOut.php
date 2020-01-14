<?php
session_start();
 $_SESSION["user"]=NULL;
	$_SESSION["pass"]=NULL;
	header("location:index.php");
?>