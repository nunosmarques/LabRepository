<?php include ("classes/LabApp.php");

$config = new LabApp();
$query = "";

    $query .= "SELECT * FROM concelho";

$sql = $config->conn->prepare($query);

try {
    $sql->execute();
}catch(PDOException $ex){
    echo '<script>
			alert("Ocorreu um erro: \\n'.$ex->getMessage().'");
		  </script>';
}//$query;

echo "<h3>ComboSearch Teste</h3>";
echo "<br><select>";


while($result = $sql->fetch(PDO::FETCH_ASSOC)){
    echo '<option value="'.$result['id'].'">'.$result['concelho'].'</option>';
}

echo "</select>";
?>

