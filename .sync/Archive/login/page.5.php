<?php
include("check_admin.php");


echo "cona"."<br><br>";

if(isset($_SESSION['admin'])){
    echo  '<a href="logout.php">Log ouut</a>';
}
