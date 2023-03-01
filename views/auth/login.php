<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">Inicia Sesion en PZRAdmin</p>

     <?php
        require_once __DIR__ . '/../templates/alertas.php'
    ?>
 
    <form method="POST" action="/login" class="formulario" method="POST">
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input 
                type="email"
                class="formulario__input"
                id="email"
                placeholder="Tu Email"
                name="email"             
            >
        </div>
        <div class="formulario__campo">
            <label for="password" class="formulario__label">Password</label>
            <input 
                type="password"
                class="formulario__input"
                id="password"
                placeholder="Tu Password"
                name="password"             
            >
        </div>

        <input type="submit" class="formulario__submit" value="Iniciar Sesión">

    </form>


</main>