<?php
require "../../../admin/classes/classes/LabApp.php";
class combo extends LabApp{

    function combox($tabela){
        $query = "";

        $query .= "SELECT * FROM ".$tabela;

        $sql = $this->conn->prepare($query);

        try {
            $sql->execute();
        }catch(PDOException $ex){
            echo '<script>
			alert("Ocorreu um erro: \\n'.$ex->getMessage().'");
		  </script>';
        }//$query;

       // echo "<h3>ComboSearch Teste</h3>";

        $retorno = "<select name='$tabela'>";




                while($result = $sql->fetch(PDO::FETCH_BOTH)){
                    $retorno.= '<option value="'.$result[0].'">'.$result[1].'</option>';

                }
       // echo $conta = $sql->rowCount();
                return $retorno."</select>";



    }






}

?>