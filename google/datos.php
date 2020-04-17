<?php
include 'class.pdofactory.php';
include 'abstract.databoundobject.php';
include 'class.google.php';

$dsn = "mysql:host=localhost;dbname=google";
$objPDO = new PDO($dsn, "root", "",array()); 
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query="SELECT * FROM `formulari` WHERE `paraula` = '".$_POST['palabra']."'  ";
	$resultado=$objPDO->query($query);
	if ($resultado->rowCount()<=0)	{
     	echo $resultado->rowCount();
     	 $nuevaentrada = new google($objPDO);
           date_default_timezone_set ('Europe/Andorra' );
           $d = date("Y-m-d H:i:s");;
           $nuevaentrada->setparaula($_POST['palabra'])->settotal(0)->setlastvisit($d)->Save();
     }else{
		foreach ($resultado as $row) {
		}
		$nuevaentrada = new google($objPDO);
		$d = date("Y-m-d H:i:s");
		$nuevaentrada->ID=($row['id']);
		$total= $nuevaentrada->gettotal()+1;
		$nuevaentrada->settotal($total)->setlastvisit($d)->Save();
     	$query="SELECT `paraula` FROM `formulari` WHERE `paraula` LIKE '".$_POST['palabra']."%' order by `lastvisit` desc limit 5 ";
		$html="";
		foreach ($objPDO->query($query) as $row) {
			$html.="<option value='". $row['paraula'] ."'>";
	   	}
		
		
		echo $html;
     }

	

?>