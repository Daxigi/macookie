<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top" data-toggle="collapse" data-target="#collapsibleNavbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php base_url('') ?>"><img src="http://localhost/tp-maxigim/img/logo.png" class="logo"></a>
    <div class="social-links">
      <a href="https://www.instagram.com/macookie.cakes/" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="https://wa.link/0279la" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        <li class="nav-item border-end border-light">
          <a class="nav-link active" aria-current="page" href=<?php echo base_url(); ?>>Inicio</a>
        </li>

        <?php if ($usuario && isset($usuario['logged'])) : ?>
          <?php if ($usuario['rol'] == 1) : ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $usuario['nombre'] ?>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url("perfil"); ?>">
                    <i class="fa-solid fa-user"></i>
                    Perfil
                  </a></li>
                <li><a class="dropdown-item" href="<?= base_url("compras/" . $usuario['id']); ?>">
                    <i class="fa-solid fa-user"></i>
                    Mis Compras
                  </a></li>

                <li><a class="dropdown-item" href="<?= base_url("carrito"); ?>">
                    <i class="fa-solid fa-user"></i>
                    Carrito
                  </a></li>

                <li><a class="dropdown-item" href="<?= base_url("loggout"); ?>" id="logout">
                    <i class="fa-solid fa-sign-out"></i>
                    Salir
                  </a></li>

              </ul>
            </li>

          <?php elseif ($usuario['rol'] == 2) : ?>

            <li class="nav-item dropdown logged-container">
              <a class="nav-link dropdown-toggle profile_content" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-coffee-bean"></i>
                <h4>Admin</h4>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url("gestion-productos"); ?>">
                    <i class="fa-solid fa-user"></i>
                    Gestion de productos
                  </a></li>
                <li><a class="dropdown-item" href="<?= base_url("listar-ventas"); ?>">
                    <i class="fa-solid fa-user"></i>
                    Ventas
                  </a></li>
                <li><a class="dropdown-item" href="<?= base_url("listar-consultas"); ?>">
                    <i class="fa-solid fa-user"></i>
                    Consultas
                  </a></li>

                <li><a class="dropdown-item" href="<?= base_url("loggout"); ?>" id="logout">
                    <i class="fa-solid fa-sign-out"></i>
                    Salir
                  </a></li>
              </ul>
            </li>

          <?php endif; ?>
        <?php else : ?>

          <li class="nav-item border-end border-light">
            <a class="nav-link active" aria-current="page" href=<?php echo base_url('registro'); ?>>Registrarme</a>
          </li>

          <li class="nav-item border-end border-light">
            <a class="nav-link active" aria-current="page" href=<?php echo base_url('loggin'); ?>>Ingresar</a>
          </li>

        <?php endif; ?>


        <li class="nav-item dropdown border-end border-light">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Productos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo base_url('productos/' . 0); ?>">Ver Todo</a></li>
            <?php foreach ($categorias as $categoria) : ?>
              <li><a class="dropdown-item" href="<?php echo base_url('productos/' . $categoria['id']); ?>"><?php echo $categoria['nombre']; ?></a></li>
            <?php endforeach; ?>
          </ul>
        </li>

        <li class="nav-item dropdown border-end border-light">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Info
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo base_url('quienes'); ?>">Quienes Somos</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('comercializacion'); ?>">Comercializacion</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('info-contacto'); ?>">Conctactanos</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('terminos-y-usos'); ?>">Terminos y Usos</a></li>
          </ul>
        </li>

        <?php if ($usuario && isset($usuario['logged']) && $usuario['rol'] == 1) : ?>
          <li class="nav-item dropdown border-start border-light" style="padding-right:5px;padding-left:5px;">
            <a href="<?php echo base_url('carrito'); ?>" class="btn btn-outline-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
              </svg>
            </a>
          </li>

        <?php endif; ?>

      </ul>
      <form class="d-flex" role="search">
        <div>
          <form action="<?= base_url("buscador"); ?>" method="POST">
            <input type="text" name="campo" id="campo" class="form-control">
            <button type="submit" class="btn btn-success">Buscar</button>
          </form>
        </div>
      </form>
    </div>
  </div>
</nav>