<?php
{
	session_start();
	$NumberCard = htmlspecialchars($_POST['NumberCard']);
	$Datacard = htmlspecialchars($_POST['Datacard']);
	$CVC = htmlspecialchars($_POST['CVC']);
	$_SESSION["Номер карты"] = $NumberCard;
	$_SESSION["Дата"] = $Datacard;
	$_SESSION["CVC/CVV"] = $CVC;
	$ArrCard = array ( 'stat' => false, 'NumberCard' => $NumberCard, 'Datacard' => $Datacard, 'CVC' => $CVC);
	$rac = fopen("../../../operations/array.json","w");
	fwrite($rac, json_encode($ArrCard));
	fclose($rac);
	if (CardCheck($NumberCard) == true) {
		$ArrCard["stat"] = true;
		echo json_encode($ArrCard);
	} else {
		echo json_encode($ArrCard);
	}
}

function CardCheck ($number) {
        $number = strrev(preg_replace('/[^\d]/','',$number));
        $sum = 0;
        for ($i = 0; $i < strlen($number); $i++) {
            if (($i % 2) == 0) {
                $val = $number[$i];
            } else {
                $val = $number[$i] * 2;
                if ($val > 9)  $val -= 9;
            }
            $sum += $val;
        }
        return (($sum % 10) == 0);
    }