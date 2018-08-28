<?php
/**
 * Created by PhpStorm.
 * User: Tony
 * Date: 26/04/2016
 * Time: 17:26
 */
require_once("../classes/LabApp.php");

class instituicao extends LabApp
{

    function select($colunas)
    {

        $values = array();
        foreach ($colunas as $coluna => $valor) {
            $values[':' . $coluna] = $valor;
        }

        $= ->prepare('');

            $sql .= implode(',', $values);

            mysql_query($sql) or exit(mysql_error());

}
}