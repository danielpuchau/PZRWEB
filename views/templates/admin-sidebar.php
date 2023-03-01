<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo pagina_actual('/dashboard') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span>    
        </a>

        <a href="/admin/artistas" class="dashboard__enlace <?php echo pagina_actual('/artistas') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-microphone dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Artistas
            </span>    
        </a>

        <a href="/admin/releases" class="dashboard__enlace <?php echo pagina_actual('/releases') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-calendar dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Releases
            </span>    
        </a>

        <a href="/admin/tracks" class="dashboard__enlace <?php echo pagina_actual('/tracks') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-users dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Tracks
            </span>    
        </a>
        <a href="/admin/radio" class="dashboard__enlace <?php echo pagina_actual('/radio') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-gift dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Radio
            </span>    
        </a>
        <a href="/admin/colaboradores" class="dashboard__enlace <?php echo pagina_actual('/colaboradores') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-gift dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Family
            </span>    
        </a>
        <a href="/admin/cartela" class="dashboard__enlace <?php echo pagina_actual('/cartela') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-gift dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Cartela
            </span>    
        </a>
    </nav>
</aside>