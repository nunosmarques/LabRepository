<?php
require "classes/LabApp";
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

        $retorno = "<select>";

        switch($tabela){

            case "concelho":
                while($result = $sql->fetch(PDO::FETCH_ASSOC)){
                    $retorno.= '<option value="'.$result['id'].'">'.$result['concelho'].'</option>';
                }
                return $retorno."</select>";
                break;
            case "distrito":
                while($result = $sql->fetch(PDO::FETCH_ASSOC)){
                    $retorno.= '<option value="'.$result['iddistrito'].'">'.$result['distrito'].'</option>';
                }
                return $retorno."</select>";
                break;
            case "instituicaotipo":
                while($result = $sql->fetch(PDO::FETCH_ASSOC)){
                    $retorno.= '<option value="'.$result['idinstituicaotipo'].'">'.$result['instituicaotipo'].'</option>';
                }
                return $retorno."</select>";
                break;
            case "instituicao":
                while($result = $sql->fetch(PDO::FETCH_ASSOC)){
                    $retorno.= '<option value="'.$result['idinstituicao'].'">'.$result['instituicao'].'</option>';
                }
                return $retorno."</select>";
                break;
            case "laboratorio":
                while($result = $sql->fetch(PDO::FETCH_ASSOC)){
                    $retorno.= '<option value="'.$result['idlaboratorio'].'">'.$result['laboratorio'].'</option>';
                }
                return $retorno."</select>";
                break;
            case "individuo":
                while($result = $sql->fetch(PDO::FETCH_ASSOC)){
                    $retorno.= '<option value="'.$result['idindividuo'].'">'.$result['nome'].'</option>';
                }
                return $retorno."</select>";
                break;
            case "area":
                while($result = $sql->fetch(PDO::FETCH_ASSOC)){
                    $retorno.= '<option value="'.$result['idarea'].'">'.$result['area'].'</option>';
                }
                return $retorno."</select>";
                break;
            case "mediatipo":
                while($result = $sql->fetch(PDO::FETCH_ASSOC)){
                    $retorno.= '<option value="'.$result['idmediatipo'].'">'.$result['mediatipo'].'</option>';
                }
                return $retorno."</select>";
                break;
            case "media":
                while($result = $sql->fetch(PDO::FETCH_ASSOC)){
                    $retorno.= '<option value="'.$result['idmedia'].'">'.$result['media'].'</option>';
                }
                return $retorno."</select>";
                break;
            case "equipamentotipo":
                while($result = $sql->fetch(PDO::FETCH_ASSOC)){
                    $retorno.= '<option value="'.$result['idequipamentotipo'].'">'.$result['equipamentotipo'].'</option>';
                }
                return $retorno."</select>";
                break;
            case "equipamento":
                while($result = $sql->fetch(PDO::FETCH_ASSOC)){
                    $retorno.= '<option value="'.$result['idequipamento'].'">'.$result['equipamento'].'</option>';
                }
                return $retorno."</select>";
                break;
            default:
                $retorno= "Erro ao carregar conteudo: Tabela não encontrada";
                return $retorno;
                break;
        }


    }






}

?>