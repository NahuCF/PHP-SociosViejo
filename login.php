<?php session_start();

require "admin/config.php";
require "functions.php";

if(isset($_SESSION["visitor"]) || isset($_SESSION["admin"]))
{
    header("Location: index.php");
}

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $user = clean_string($_POST["username"]);
    $password = clean_string($_POST["password"]);

    $conection = conection_to_database($db_config);
    if($conection)
    {
        $statement = $conection->prepare("SELECT * FROM admins WHERE userName = :user AND password = :password LIMIT 1");
        $statement->execute(
            array(
                "user" => $user,
                "password" => $password
            )
        );  
        $adminResult = $statement->fetch();

        $statement = $conection->prepare("SELECT * FROM visitors WHERE userName = :user AND password = :password LIMIT 1");
        $statement->execute(
            array(
                "user" => $user,
                "password" => $password
            )
        );  
        $visitorResult = $statement->fetch();

        if(!empty($adminResult))
        {
            $_SESSION["admin"] = "Admin";
            $_SESSION["adminID"] = $adminResult["ID"];
        }
        else if(!empty($visitorResult))
        {
            $_SESSION["visitor"] = "Visitor";
            $_SESSION["visitorID"] = $visitorResult["ID"];
        }

        if(empty($adminResult) && empty($visitorResult))
        {
            $error = "<strong>Login failed!</strong> Incorrect username or password.";
        }
        else
        {
            header("Location: index.php");
        }
    }
    else
    {
        header("Location: error.php");
    }
}

require "view/login.view.php";

?>