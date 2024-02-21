
<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
header("Access-Control-Allow-Headers:*");

include("conexion.php");


	
if (!$conex) {

	die('no se ha podido establecer la comunicacion a la base de datos'.mysql_connect_error());
	
}

else{

// Logica para solicitudes GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	
		$consulta="SELECT * FROM datos" ;

	$resultado=mysqli_query($conex, $consulta);
    $datos=mysqli_fetch_all($resultado, MYSQLI_ASSOC);
	
if (!empty($datos)) {
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);
}else{
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);
}



}
// Logica para solicitudes POST
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	  
    $dat=json_decode(file_get_contents("php://input"));
   
	if ($dat->nombre===''| $dat->descripcion===''| $dat->imagen=='') {
	echo json_encode('termina todos los campos');

    }else{
    
    $peticion="INSERT INTO datos(nombre, descripcion, imagen) VALUES ('$dat->nombre', '$dat->descripcion', '$dat->imagen' )";
	mysqli_query($conex, $peticion);
    

    $consulta="SELECT * FROM datos" ;

	$resultado=mysqli_query($conex, $consulta);
    $datos=mysqli_fetch_all($resultado, MYSQLI_ASSOC);

if (!empty($datos)) {
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);
}else{
	echo json_encode('no hay datos');
}


}

// Logica para solicitudes PUT
}else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
	$dat=json_decode(file_get_contents("php://input"));

if ($dat->nombre===''| $dat->descripcion===''| $dat->imagen=='') {
	echo json_encode('termina todos los campos');

    }else{
    $peticiond="UPDATE datos SET nombre = '$dat->nombre', descripcion = '$dat->descripcion', imagen='$dat->imagen' WHERE  id='$dat->id'";
    mysqli_query($conex, $peticiond);
    echo json_encode('el registro ha sido actualizado en la base de datos');
	}

// Logica para solicitudes DELETE
}else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
	$dat=json_decode(file_get_contents("php://input"));

if ($dat->nombre===''| $dat->descripcion===''| $dat->imagen=='') {
	echo json_encode('termina todos los campos');

    }else{
    
    $peticiondss="DELETE FROM datos WHERE id='$dat->id'";
    mysqli_query($conex, $peticiondss);

    echo json_encode('el registro ha sido eliminado en la base de datos');

	
	}

}

}
?>