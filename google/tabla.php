<?php
include 'class.pdofactory.php';
include 'abstract.databoundobject.php';
include 'class.google.php';

$dsn = "mysql:host=localhost;dbname=google";
$objPDO = new PDO($dsn, "root", "",array()); 
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query="SELECT * FROM `formulari` WHERE `paraula` LIKE '".$_POST['palabra']."%' order by `lastvisit` desc limit 5 ";
	$html="<table border>";
		$html.="<tr>";
			$html.="<td><b>id</b></td>";
			$html.="<td><b>paraula</b></td>";
			$html.="<td><b>total</b></td>";
			$html.="<td><b>lastvisit</b></td>";
		$html.="</tr>";
	foreach ($objPDO->query($query) as $row) {
		$html.="<tr>";
			$html.="<td>". $row['id'] ."</td>";
			$html.="<td>". $row['paraula'] ."</td>";
			$html.="<td>". $row['total'] ."</td>";
			$html.="<td>". $row['lastvisit'] ."</td>";
		$html.="<tr>";
	}
	$html.="</table>";

	echo $html;

?>