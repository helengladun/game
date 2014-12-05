<?php
session_start();
include_once ('chooseForm.php');
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$_SESSION['char'] = $_POST['char'];
 	header ('Location:/lol/fight.php');
}