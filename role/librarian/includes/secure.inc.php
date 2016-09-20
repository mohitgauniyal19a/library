<?php
session_start();
if(!isset($_SESSION['llogin'])|| $_SESSION['llogin']!="true"){
    $continue = "$_SERVER[REQUEST_URI]";
    header('location: ../../index.php?lfail=true&continue='.$continue);
}
?>