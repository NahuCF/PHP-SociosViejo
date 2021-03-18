<header>
    <a href="index.php">asd</a>
    <a href="upload.php">UPLOAD</a>
    <form action="search.php" method="GET">
        <select name="socio_filterBy" id="socio_filterBy">
            <option value="name" selected>Socio</option>
            <option value="activity">Actividad</option>
        </select>
        <select style="display: none;" name="activity_type" id="activity_select">
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

        <input id="input_name" class="input_search" name="name" type="text" placeholder="Nombre de Socio">
        <div class="button__headercontenedor" >
            <button class="header__submitbtn" type="submit"><i class="fa fa-search fa-fw"></i></button>
        </div>
    </form>
    <ul class="user__list">
        <li class="first__list">
            <a class="user__type" id="user__type" href="#">
                <i class="far fa-user"></i>
                <?php echo isset($_SESSION["admin"]) ? $_SESSION["admin"] : $_SESSION["visitor"]; ?>
                <i class="fas fa-caret-down"></i>
            </a>
            <ul class="sub__menu" id="switch">
                <li>
                    <a href="profile.php">
                        <i class="fas fa-cog"></i>
                        Profile
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fa fa-times fa-fw"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</header>