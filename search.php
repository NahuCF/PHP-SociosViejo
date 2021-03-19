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

$error = "";

if(isset($_GET["socio_filterBy"]) && $_GET["socio_filterBy"] == "name" && !empty($_GET["name"]))
{

    $name = clean_string($_GET["name"]);
    
    $begin = get_page() > 1 ? get_page() * $page_config["torrents_per_page"] - $page_config["torrents_per_page"] : 0;
    $torrents_per_page = $page_config["torrents_per_page"];
    $statement = $conection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM socios WHERE name LIKE :name LIMIT $begin, $torrents_per_page");
    $statement->execute(array("name" => "%$name%" ));
    $socios = $statement->fetchAll();
}
else if(isset($_GET["socio_filterBy"]) && $_GET["socio_filterBy"] == "activity")
{
    $begin = get_page() > 1 ? get_page() * $page_config["torrents_per_page"] - $page_config["torrents_per_page"] : 0;
    $torrents_per_page = $page_config["torrents_per_page"];
    $statement = $conection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM socios WHERE activity = :activity LIMIT $begin, $torrents_per_page");
    $statement->execute(array("activity" => clean_string($_GET["activity_type"])));
    $socios = $statement->fetchAll();
}
else
{
    header("Location: index.php");
}

require "view/search.view.php"

?>
