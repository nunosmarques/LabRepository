<?php
include("check_admin.php");


//cenas pa aparecer

if(isset($_SESSION['admin'])){
    echo  '<a href="logout.php">Log ouut</a>';
}
