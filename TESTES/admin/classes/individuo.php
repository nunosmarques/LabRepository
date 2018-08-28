<?php
require "LabApp.php";

class individuo extends LabApp {
    function select($array_filter, $page_num) {
        $data =  implode(', ',array_keys($array_filter));
        var_dump($data);
        //$sql = $conn -> prepare("SELECT * FROM individuo ");
        return; //$array_result;
    }
    
    function update($array_filter, $array_columns) {
        return $array_result;
    }
    
    function delete($filter) {
        return $state;
    }
    
    function insert($columns) {
        $prep = array();
		
		foreach($columns as $k => $v ) {
			$prep[':'.$k] = $v;
		}
		
		$sql = $conn->prepare("INSERT INTO individuo (".implode(', ',array_keys($columns)).") VALUES (" . implode(', ',array_keys($prep)) . ") )");
		
		$res = $conn->execute($prep);
        var_dump($res);
        return;
    }
}

?>