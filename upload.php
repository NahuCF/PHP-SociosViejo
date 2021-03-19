<?php session_start();

require "admin/config.php";
require "functions.php";

if(!isset($_SESSION["visitor"]) && !isset($_SESSION["admin"]))
{
    header("Location: login.php");
}
else if(isset($_SESSION["visitor"]))
{
    header("Location: index.php");
}

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error.php");
}

$error = "";
$error_in_debe = "";
$name_error = "";

$months = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octumbre", "Noviembre", "Diciembre");


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Array que contiene los meses que debe o no debe
    $mes_contenedor_pago = array();
    $mes_contenedor_debe = array();

    // Creo array
    for($i = 0; $i < 12; $i++)
    {
        for($x = 0; $x < 12; $x++)
        {
            $mes_contenedor_pago[2013 + $i][$months[$x]] =  -1; 
        }
    }

    for($i = 0; $i < 12; $i++)
    {
        for($x = 0; $x < 12; $x++)
        {
            $mes_contenedor_debe[2013 + $i][$months[$x] . "Debe"] =  -1; 
        }
    }

    // Fill the array
    for($i = 0; $i < 12; $i++)
    {
        $mes_contenedor_pago[2021][$months[$i]] = isset($_POST[$months[$i]]) ? 1 : -1;
    }

    for($i = 0; $i < 12; $i++)
    {
        $mes_contenedor_debe[2021][$months[$i] . "Debe"] = isset($_POST[$months[$i] . "Debe"]) ? 0 : -1;
    }

    $pago = serialize($mes_contenedor_pago);
    $debe = serialize($mes_contenedor_debe);

    // Pongo un error si debe y no debe al mismo tiempo
    for($i = 0; $i < 12; $i++)
    {
        if($mes_contenedor_pago[2021][$months[$i]] == 1 && $mes_contenedor_debe[2021][$months[$i] . "Debe"] == 0) // Means that the two checkbox are checked
        {
            $error .= "- Debe y pagó el mismo mes: " . $months[$i] . "<br>";
        }
    }

    // Pongo un error si el name esta vacio
    if(empty($_POST["name"]))
    {
        $error .= "- El nombre no puede estar vacio <br>";
    }

    // Pongo un error si alguna fecha no esta completa

    if(empty($_POST["ingreso_year"]) || empty($_POST["ingreso_month"]) || empty($_POST["ingreso_day"]) || empty($_POST["birth_year"]) || empty($_POST["birth_month"]) || empty($_POST["birth_day"]))
    {
        $error .= "- Fechas de ingreso y nacimiento tienen que esta completas <br>";
    }

    // Checkear si ya existe el numero de socio

    $statement = $conection->prepare("SELECT * FROM socios WHERE socio_number = :socio_number");
    $statement->execute(array("socio_number" => clean_string($_POST["socio"])));
    $result = $statement->fetchAll();

    if(!empty($result))
    {
        $error .= "- Numero de socio (" . clean_string($_POST["socio"]) . ") en uso <br>" ;
    }

    // Añadir Socio si no hay problema
    if(empty($error))
    {
        $orden_number = clean_string($_POST["orden"]);
        $socio_number = clean_string($_POST["socio"]);
        $name = clean_string($_POST["name"]);
        $postal = clean_string($_POST["postal"]);
        $ingreso = clean_string($_POST["ingreso_year"]) . "/" . clean_string($_POST["ingreso_month"]) . "/" . clean_string($_POST["ingreso_day"]);
        $baja = clean_string($_POST["baja_year"]) . "/" . clean_string($_POST["baja_month"]) . "/" . clean_string($_POST["baja_day"]);
        $mail = clean_string($_POST["mail"]);
        $cellphone = clean_string($_POST["cellphone"]);
        $dni = clean_string($_POST["dni"]);
        $birthday = clean_string($_POST["birth_year"]) . "/" . clean_string($_POST["birth_month"]) . "/" . clean_string($_POST["birth_day"]);
        $nationality = clean_string($_POST["nationality"]);
        $activity = clean_string($_POST["activity"]);

        if(!empty($_FILES["torrent_data"]["name"]))
        {
            $photo = file_get_contents($_FILES["torrent_data"]["tmp_name"]);
            $photo_type = $_FILES["torrent_data"]["type"];

            $statement = $conection->prepare("INSERT INTO socios 
            values(
                null, 
                :orden_number,
                :socio_number,
                :name,
                :postal_code,
                :ingreso,
                :baja,
                :email,
                :cellphone,
                :DNI,
                :birth,
                :nationality,
                :activity,
                :pagados,
                :debidos,
                :photo,
                :photo_type
                )"
            );
            $statement->execute(
                array(
                    "orden_number" => $orden_number,
                    "socio_number" => $socio_number,
                    "name" => $name,
                    "postal_code" => $postal,
                    "ingreso" => $ingreso,
                    "baja" => $baja,
                    "email" => $mail,
                    "cellphone" => $cellphone,
                    "DNI" => $dni,
                    "birth" => $birthday,
                    "nationality" => $nationality,
                    "activity" => $activity,
                    "pagados" => $pago,
                    "debidos" => $debe,
                    "photo" => $photo,
                    "photo_type" => $photo_type
                )
            );

            header("Location: index.php");
        }
        else
        {
            $statement = $conection->prepare("INSERT INTO socios 
            values(
                null, 
                :orden_number,
                :socio_number,
                :name,
                :postal_code,
                :ingreso,
                :baja,
                :email,
                :cellphone,
                :DNI,
                :birth,
                :nationality,
                :activity,
                :pagados,
                :debidos,
                null,
                null
                )"
            );
            $statement->execute(
                array(
                    "orden_number" => $orden_number,
                    "socio_number" => $socio_number,
                    "name" => $name,
                    "postal_code" => $postal,
                    "ingreso" => $ingreso,
                    "baja" => $baja,
                    "email" => $mail,
                    "cellphone" => $cellphone,
                    "DNI" => $dni,
                    "birth" => $birthday,
                    "nationality" => $nationality,
                    "activity" => $activity,
                    "pagados" => $pago,
                    "debidos" => $debe
                )
            );

            header("Location: index.php");
        }
    }
}

require "view/upload.view.php";

?>