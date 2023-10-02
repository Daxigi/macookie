<div class="container-fluid bp">
    <?php if (session()->getFlashdata('sessionSuccess')) : ?>
        <div id="success-message" class="alert alert-success welcome-message"><?= session()->getFlashdata('sessionSuccess') ?></div>
    <?php endif; ?>
<div class="container-fluid bp">
    <?php if (session()->getFlashdata('compraExitosa')) : ?>
        <div id="success-message" class="alert alert-success welcome-message"><?= session()->getFlashdata('compraExitosa') ?></div>
    <?php endif; ?>

    <div class="bs">
        <div class="bg-titulo">
            <h1 class="titulo-principal shadow">Macookie</h1>
        </div>

        <div class="bloque 1 shadow">
            <img src="../img/products/samples/sample1.png" class="sample cheesecake" alt="cheesecake frutos rojos">
            <div>
                <h3 class="minititulo">Pasteles</h3>
                <p class="cuerpo">Ofrecemos una gran variedad de tortas, pasteles y tartas. Clasicos y personalizados para distintos tipos de eventos.</p>
            </div>
        </div>

        <div class="bloque 2 shadow">
            <img src="../img/products/samples/sample2.png" class="sample alfajores" alt="cheesecake frutos rojos">
            <div>
                <h3 class="minititulo">Alfajores</h3>
                <p class="cuerpo">Realizados con los mejores ingredientes, ideales para regalar, compartir o disfrutarlos uno mismo!</p>
            </div>
        </div>

        <div class="bloque 3 shadow">
            <img src="../img/products/samples/sample3.png" class="sample box" alt="cheesecake frutos rojos">
            <div>
                <h3 class="minititulo">Box Personalizados</h3>
                <p class="cuerpo">Queres sorprender a algun ser querido con un mimo? Que mejor que un box con sus postres favoritos! Totalmente a eleccion y personalizables.</p>
            </div>
        </div>
    </div>
</div>