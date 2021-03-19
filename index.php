<?php session_start();

require "admin/config.php";
require "functions.php";

if(!isset($_SESSION["visitor"]) && !isset($_SESSION["admin"]))
{
    header("Location: login.php");
}

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error.php");
}

$socios = members_byColumn($page_config["torrents_per_page"], $conection, "ID");

require "view/index.view.php";

?>