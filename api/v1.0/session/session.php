<?php
	session_start();
	$Sum = htmlspecialchars($_POST['Sum']);
	$PurOfPay = htmlspecialchars($_POST['PurOfPay']);
	$ID = session_create_id();
	$_SESSION["Сумма"] = $Sum;
	$_SESSION["Назначение"] = $PurOfPay;
	$_SESSION["SessionID"] = $ID;
	$ArrSess = array ( 'stat' => 200, 'Summa' => $Sum, 'POP' => $PurOfPay, 'id' => $ID);
	$rac = fopen("../../../operations/array.json","w");
	fwrite($rac, json_encode($ArrSess));
	fclose($rac);
	if ($_SESSION["Сумма"] != "" && $_SESSION["Назначение"] != "" && $_SESSION["SessionID"] != ""){
		echo json_encode($ArrSess);
	}