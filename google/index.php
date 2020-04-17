<!DOCTYPE html>
<html>
<body>

<h1>The datalist element</h1>


  <input list="browsers" name="browser" id="input">
  <datalist id="browsers">
    
  </datalist>
  <input type="submit" id="submit">
<div id="tabla"></div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script>
	$("#input").keyup(buscar);
	$("#submit").click(creartabla);
	function buscar(){
		
		$.post("datos.php", {palabra:$('#input').val()}) 
            .done(function(data,textStatus, jqXHR){
                $("#browsers").html(data);
            })
            .fail(function(data,textStatus, jqXHR){
                $("#browsers").html(data);
            })

	}
	function creartabla(){
		$.post("tabla.php", {palabra:$('#input').val()}) 
            .done(function(data,textStatus, jqXHR){
                $("#tabla").html(data);
            })
            .fail(function(data,textStatus, jqXHR){
                $("#tabla").html(data);
            })

	}

</script>
<?php
include 'class.pdofactory.php';
include 'abstract.databoundobject.php';
include 'class.google.php';
$dsn = "mysql:host=localhost;dbname=google";
            $objPDO = new PDO($dsn, "root", "",array()); 
            $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


           $nuevaentrada = new buscador($objPDO);
           date_default_timezone_set ('Europe/Andorra' );
           $d = date("Y-m-d H:i:s");;

           echo "La palabra es ".$nuevaentrada->getparaula();
?>
<p><strong>Note:</strong> The datalist tag is not supported in Safari 12.0 (or earlier).</p>

</body>
</html>
