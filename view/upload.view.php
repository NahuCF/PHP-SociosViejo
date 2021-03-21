<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/index.css">
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Socios Club</title>
</head>
<body>
    <?php require "user-header.php"; ?>

    <div class="wrap upload">
        <div style="margin-bottom: 20px;" class="top">
            <h1>Nuevo Socio</h1>
            <?php if(!empty($error)): ?>
                <div class="login_errorbox">
                    <p style="margin: 0;"><?php echo $error; ?></p>
                </div>
            <?php endif; ?>
        </div>

        <form class="upload__form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <label for="upload__torrent">Socio Foto</label>
                <div class="browse_contenedor">
                    <label class="btn__browse" id="btn__browse" for="upload__torrent">
                        <span>Foto</span>
                    </label>
                    <input id="torrent__file" name="writen_torrent" type="text" readonly>
                </div>

                <div class="hide__admin">
                    <input name="torrent_data" id="upload__torrent" type="file" placeholder="Browse...">
                </div>
            </div>
            
            <div class="upload__form optional">
                <div class="row">
                    <label for="orden">Numero de Orden</label>
                    <input id="orden" name="orden" type="text" placeholder="N° orden">

                    <label for="name">Nombre</label>
                    <input id="name" name="name" type="text" placeholder="Nombre">

                    <label for="ingreso">Ingreso</label>
                    <div>
                        <select name="ingreso_year" id="">
                            <option value="" selected>Año</option>
                            <?php for($i = 0; $i <= 160; $i++):?>
                                <option value="<?php echo 1890 + $i?>"><?php echo 1890 + $i?></option>
                            <?php endfor; ?>
                        </select>
                        <select name="ingreso_month" id="">
                            <option value="" selected>Mes</option>
                            <?php for($i = 1; $i <= 12; $i++):?>
                                <option value="<?php echo $i?>"><?php echo $i?></option>
                            <?php endfor; ?>
                        </select>
                        <select name="ingreso_day" id="">
                            <option value="" selected>Dia</option>
                            <?php for($i = 1; $i <= 31; $i++):?>
                                <option value="<?php echo $i?>"><?php echo $i?></option>
                            <?php endfor; ?>
                        </select> 
                    </div>
                    
                    <label for="Mail">Mail</label>
                    <input id="Mail" name="mail" type="text" placeholder="Mail">

                    <label for="dni">N° DNI</label>
                    <input id="dni" name="dni" type="text" placeholder="DNI">

                    <label for="nationality">Nacionalidad</label>
                    <input id="nationality" name="nationality" type="text" placeholder="Nacionalidad">
                </div>

                <div class="row">
                    <label for="socio">Numero de Socio</label>
                    <input id="socio" name="socio" type="text" placeholder="N° socio">

                    <label for="postal">Direccion Postal</label>
                    <input id="postal" name="postal" type="text" placeholder="D Postal">

                    <label for="baja">Baja</label>
                    <div>
                        <select name="baja_year" id="">
                            <option value="" selected>Año</option>
                            <?php for($i = 0; $i <= 160; $i++):?>
                                <option value="<?php echo 1890 + $i?>"><?php echo 1890 + $i?></option>
                            <?php endfor; ?>
                        </select>
                        <select name="baja_month" id="">
                            <option value="" selected>Mes</option>
                            <?php for($i = 1; $i <= 12; $i++):?>
                                <option value="<?php echo $i?>"><?php echo $i?></option>
                            <?php endfor; ?>
                        </select>
                        <select name="baja_day" id="">
                            <option value="" selected>Dia</option>
                            <?php for($i = 1; $i <= 31; $i++):?>
                                <option value="<?php echo $i?>"><?php echo $i?></option>
                            <?php endfor; ?>
                        </select> 
                    </div>

                    <label for="cellphone">Telefono</label>
                    <input id="cellphone" name="cellphone" type="text" placeholder="Cellphone">

                    <label for="birth">Fecha de Nacimiento</label>
                    <div>
                        <select name="birth_year" id="">
                            <option value="" selected>Año</option>
                            <?php for($i = 0; $i <= 160; $i++):?>
                                <option value="<?php echo 1890 + $i?>"><?php echo 1890 + $i?></option>
                            <?php endfor; ?>
                        </select>
                        <select name="birth_month" id="">
                            <option value="" selected>Mes</option>
                            <?php for($i = 1; $i <= 12; $i++):?>
                                <option value="<?php echo $i?>"><?php echo $i?></option>
                            <?php endfor; ?>
                        </select>
                        <select name="birth_day" id="">
                            <option value="" selected>Dia</option>
                            <?php for($i = 1; $i <= 31; $i++):?>
                                <option value="<?php echo $i?>"><?php echo $i?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <label for="activity">Actividad</label>
                    <select name="activity" id="activity">
                        <option value="Sin actividad" selected>Sin actividad</option>
                        <option value="Futbol">Futbol</option>
                        <option value="Fefi tirauno">Fefi tirauno</option>
                        <option value="Fefi tirados">Fefi tirados</option>
                        <option value="Futsal">Futsal</option>
                        <option value="Futbol Femenino">Futbol Femenino</option>
                        <option value="Futbol Lifat">Futbol Lifat</option>
                        <option value="Gimnasio">Gimnasio</option>
                        <option value="Patin Artistico">Patin Artistico</option>
                        <option value="Folclore">Folclore</option>
                        <option value="Gimnasia Funcional">Gimnasia Funcional</option>
                        <option value="Taekondo">Taekondo</option>
                        <option value="Kick Boxing">Kick Boxing</option>
                        <option value="Canto">Canto</option>
                        <option value="Vitalicios">Vitalicios</option>
                    </select>
                </div>
            </div>
            
            <div class="months">
                <div class="months__column">
                    <h3>Pagó</h3>
                    <?php for($i = 0; $i < 12; $i++): ?>
                        <div class="individual__column">
                            <label for="<?php echo $months[$i]; ?>"><?php echo $months[$i]; ?></label>
                            <input type="checkbox" id="<?php echo $months[$i]; ?>" value="<?php echo $months[$i]; ?>" name="<?php echo $months[$i]; ?>">
                        </div>
                    <?php endfor; ?>
                </div>
                <br>
                <div class="months__column">
                    <h3>Debe</h3>
                    <?php for($i = 0; $i < 12; $i++): ?>
                        <div class="individual__column">
                            <label for="<?php echo $months[$i] . "Debe"; ?>"><?php echo $months[$i]; ?></label>
                            <input type="checkbox" id="<?php echo $months[$i] . "Debe"; ?>" value="<?php echo $months[$i] . "Debe"; ?>" name="<?php echo $months[$i] . "Debe"; ?>">
                        </div>
                    <?php endfor; ?>
                </div>
            </div>                   

            <button class="registerbtn__submit" type="Submit">Añadir</button>
        </form>
    </div>

    <?php echo '<script type="text/javascript" src="js/upload.js"></script>'; ?>
    <?php echo '<script type="text/javascript" src="js/user_menu.js"></script>'; ?>
    <?php echo '<script type="text/javascript" src="js/filters_nav_header.js"></script>'; ?>
</body>
</html>