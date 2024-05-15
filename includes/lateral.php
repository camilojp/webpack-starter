<?php require_once 'includes/helpers.php'; ?>

<aside id="sidebar">
    <div id="login" class="Bloque">
        <h3>Identificate</h3>
        <form action="login.php" method="post">
            <label for="email">Email</label>
            <input type="email" name="email"/>
            <label for="password">contraseña</label>
            <input type="password" name="password"/>

            <input type="submit" value="Entrar" />
        </form>
    </div>

    <div id="Register" class="Bloque">
        <h3>Registrate</h3>

        <?php if(isset($_GET['exito'])): ?>
            <div class="alerta completado">
                <?= $_GET['exito'] ?>
            </div>    
        <?php elseif(isset($_GET['fallo'])): ?>
            <div class="alerta-error">
                <?= $_GET['fallo'] ?>
            </div>
        <?php endif;?>   
       
        <form action="registro.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ' '; ?>

            <label for="apellido">Apellido</label>
            <input type="text" name="apellido"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ' '; ?>

            <label for="email">Email</label>
            <input type="email" name="email"/>
            <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ' '; ?>

            <label for="password">contraseña</label>
            <input type="password" name="password"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ' '; ?>

            <input type="submit" value="registrar" name="submit" />
            <?php //borrarErrores(); ?>
        </form>
    </div>
</aside>