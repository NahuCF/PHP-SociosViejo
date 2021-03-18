<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/index.css">
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Upload</title>
</head>
<body>
    <?php require "user-header.php"; ?>

    <div class="wrap upload">
        <div style="margin-bottom: 20px;" class="top">
            <h1><?php echo "Socio " . $socio["name"]; ?></h1>
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
                    <input id="orden" value="<?php echo $socio["orden_number"]; ?>" name="orden" type="text" placeholder="N° orden">

                    <label for="name">Nombre</label>
                    <input id="name" value="<?php echo $socio["name"]; ?>" name="name" type="text" placeholder="Nombre">

                    <label for="ingreso">Ingreso</label>
                    <div>
                        <select name="ingreso_year" id="">
                            <option value="" selected>Año</option>
                            <?php for($i = 0; $i <= 70; $i++):?>
                                <?php if(1980 + $i == date("o", strtotime($socio["ingreso"]))): ?>
                                    <option value="<?php echo 1980 + $i?>" selected><?php echo 1980 + $i?></option>
                                <?php else: ?>
                                    <option value="<?php echo 1980 + $i?>"><?php echo 1980 + $i?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                        <select name="ingreso_month" id="">
                            <option value="" selected>Mes</option>
                            <?php for($i = 1; $i <= 12; $i++):?>
                                <?php if($i == date("m", strtotime($socio["ingreso"]))): ?>
                                    <option value="<?php echo $i?>" selected><?php echo $i?></option>
                                <?php else: ?>
                                    <option value="<?php echo $i?>"><?php echo $i?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                        <select name="ingreso_day" id="">
                            <option value="" selected>Dia</option>
                            <?php for($i = 1; $i <= 30; $i++):?>
                                <?php if($i == date("d", strtotime($socio["ingreso"]))): ?>
                                    <option value="<?php echo $i?>" selected><?php echo $i?></option>
                                <?php else: ?>
                                    <option value="<?php echo $i?>"><?php echo $i?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select> 
                    </div>
                    
                    <label for="Mail">Mail</label>
                    <input id="Mail" value="<?php echo $socio["email"]; ?>" name="mail" type="text" placeholder="Mail">

                    <label for="dni">N° DNI</label>
                    <input id="dni" value="<?php echo $socio["DNI"]; ?>" name="dni" type="text" placeholder="DNI">

                    <label for="nationality">Nacionalidad</label>
                    <input id="nationality" value="<?php echo $socio["nationality"]; ?>" name="nationality" type="text" placeholder="Nacionalidad">
                </div>

                <div class="row">
                    <label for="socio">Numero de Socio</label>
                    <input id="socio" value="<?php echo $socio["socio_number"]; ?>" name="socio" type="text" placeholder="N° socio">

                    <label for="postal">Direccion Postal</label>
                    <input id="postal" value="<?php echo $socio["postal_code"]; ?>" name="postal" type="text" placeholder="D Postal">

                    <label for="baja">Baja</label>
                    <div>
                        <select name="baja_year" id="">
                            <option value="" selected>Año</option>
                            <?php for($i = 0; $i <= 70; $i++):?>
                                <?php if(1980 + $i == date("o", strtotime($socio["baja"]))): ?>
                                    <option value="<?php echo 1980 + $i?>" selected><?php echo 1980 + $i?></option>
                                <?php else: ?>
                                    <option value="<?php echo 1980 + $i?>"><?php echo 1980 + $i?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                        <select name="baja_month" id="">
                            <option value="" selected>Mes</option>
                            <?php for($i = 1; $i <= 12; $i++):?>
                                <?php if($i == date("m", strtotime($socio["baja"]))): ?>
                                    <option value="<?php echo $i?>" selected><?php echo $i?></option>
                                <?php else: ?>
                                    <option value="<?php echo $i?>"><?php echo $i?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                        <select name="baja_day" id="">
                            <option value="" selected>Dia</option>
                            <?php for($i = 1; $i <= 30; $i++):?>
                                <?php if($i == date("d", strtotime($socio["baja"]))): ?>
                                    <option value="<?php echo $i?>" selected><?php echo $i?></option>
                                <?php else: ?>
                                    <option value="<?php echo $i?>"><?php echo $i?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select> 
                    </div>

                    <label for="cellphone">Telefono</label>
                    <input id="cellphone" value="<?php echo $socio["cellphone"]; ?>" name="cellphone" type="text" placeholder="Cellphone">

                    <label for="birth">Fecha de Nacimiento</label>
                    <div>
                        <select name="birth_year" id="">
                            <option value="" selected>Año</option>
                            <?php for($i = 0; $i <= 70; $i++):?>
                                <?php if(1980 + $i == date("o", strtotime($socio["birth"]))): ?>
                                    <option value="<?php echo 1980 + $i?>" selected><?php echo 1980 + $i?></option>
                                <?php else: ?>
                                    <option value="<?php echo 1980 + $i?>"><?php echo 1980 + $i?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                        <select name="birth_month" id="">
                            <option value="" selected>Mes</option>
                            <?php for($i = 1; $i <= 12; $i++):?>
                                <?php if($i == date("m", strtotime($socio["birth"]))): ?>
                                    <option value="<?php echo $i?>" selected><?php echo $i?></option>
                                <?php else: ?>
                                    <option value="<?php echo $i?>"><?php echo $i?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                        <select name="birth_day" id="">
                            <option value="" selected>Dia</option>
                            <?php for($i = 1; $i <= 30; $i++):?>
                                <?php if($i == date("d", strtotime($socio["birth"]))): ?>
                                    <option value="<?php echo $i?>" selected><?php echo $i?></option>
                                <?php else: ?>
                                    <option value="<?php echo $i?>"><?php echo $i?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <?php $activities = array("Sin actividad", "Futbol", "Fefi tirauno", "Fefi tirados", "Futsal", "Futbol Femenino", "Futbol Lifat", "Gimnasio", "Patin Artistico", "Folclore", "Gimnasia Funcional", "Taekondo", "Kick Boxing", "Canto", "Vitalicios"); ?>               
                    <label for="activity">Actividad</label>
                    <select name="activity" id="activity">
                        <?php foreach($activities as $activitie): ?>
                            <?php if($activitie == $socio["activity"]): ?>
                                <option value="<?php echo $activitie; ?>" selected><?php echo $activitie; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $activitie; ?>"><?php echo $activitie; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div>
                <?php for($i = 0; $i < 12; $i++): ?>
                    <label for="<?php echo $months[$i]; ?>"><?php echo $months[$i]; ?></label>
                    <?php if(unserialize($socio["pagados"])[2021][$months[$i]] == 1): ?>
                        <input type="checkbox" id="<?php echo $months[$i]; ?>" value="<?php echo $months[$i]; ?>" name="<?php echo $months[$i]; ?>" checked>
                    <?php else: ?>
                        <input type="checkbox" id="<?php echo $months[$i]; ?>" value="<?php echo $months[$i]; ?>" name="<?php echo $months[$i]; ?>">
                    <?php endif; ?>
                <?php endfor; ?>
                <br>
                <?php for($i = 0; $i < 12; $i++): ?>
                    <label for="<?php echo $months[$i] . "Debe"; ?>"><?php echo $months[$i]; ?></label>
                    <?php if(unserialize($socio["debidos"])[2021][$months[$i] . "Debe"] == 0): ?>
                        <input type="checkbox" id="<?php echo $months[$i] . "Debe"; ?>" value="<?php echo $months[$i] . "Debe"; ?>" name="<?php echo $months[$i] . "Debe"; ?>" checked>
                    <?php else: ?>
                        <input type="checkbox" id="<?php echo $months[$i] . "Debe"; ?>" value="<?php echo $months[$i] . "Debe"; ?>" name="<?php echo $months[$i] . "Debe"; ?>">
                    <?php endif; ?>
                <?php endfor; ?>
            </div>                   

            <button class="registerbtn__submit" type="Submit">Actualizar</button>
        </form>
    </div>

    <?php echo '<script type="text/javascript" src="js/upload.js"></script>'; ?>
    <?php echo '<script type="text/javascript" src="js/user_menu.js"></script>'; ?>

    <?php echo '<script type="text/javascript" src="js/add_socio.js"></script>'; ?>
</body>
</html>