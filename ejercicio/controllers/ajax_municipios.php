<?php
include('../models/mconsultas.php');
$consulta= new Consultas;
if(isset($_POST['id'])){
	// echo json_encode("ura en ajax_municipios con id de ".$_POST['id']);
	$id=$_POST['id'];
	$muni=$consulta->get_muni($id);
	$html="<option>Selecciona una opción</option>";
	foreach($muni as $m){
		$html.="<option value=".$m['codigoCiudad'].">".$m['nombreCiudad']."</option>";
	}

	$row=array(
		'municipio'=>$html
	);
	
	if(is_array($row)){
		echo json_encode($row);
	}
}
?>