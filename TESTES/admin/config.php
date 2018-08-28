<?php

define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'hcp.dynip.sapo.pt');
define('DB_NAME', 'labdir');
 
function __autoload($class_name) {  //função de autoload do PHP, para inclusão automática de classes
    require_once "../../admin/classes/class_".$class_name .".php";
}
?>