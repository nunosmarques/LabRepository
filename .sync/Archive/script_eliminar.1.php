<?php include ("classes/class_crud.php");

$lab_crud = new CRUD();

//DELETE COM SELECT NO FINAL
$result = $lab_crud->delete("laboratorio", $data," = ", NULL);

if($result != false){
    echo '<script>
			alert("Apagado com sucesso.");
		  </script>';

    $return = $lab_crud->select("laboratorio"," = ",$data,NULL,5);
    print_r($return);

}else{
    echo '<script>
			alert("Ocorreu um erro na eliminação!");
		  </script>';
}