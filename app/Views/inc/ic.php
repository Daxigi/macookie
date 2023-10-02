<?php if(session()->getFlashdata('errors')):?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach;?>    
        </ul>
    </div>
<?php endif;?>

<?php if(session()->getFlashdata('success')):?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif;?>


<div class="container">    
    <div class="fondoPlano">
        <div class="contacto1">
            <h3 class="minititulo">Contactanos!</h3>
            <p class="cuerpo">¡Nos encanta saber que estás interesado en nuestros productos! Si tienes alguna pregunta sobre nuestro catálogo, precios, formas de pago o envío, no dudes en contactarnos a través de nuestro formulario de correo interno. Estamos siempre dispuestos a ayudarte y responderemos lo antes posible.</p>
            <img class="contacto1-imagen"src="http://localhost/tp-maxigim/img/products/contacto.png"  alt="">
        </div>

        <div class="form-box"> 
            <div>
                <form action="<?php echo base_url('consultar') ?>" method="POST">        
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                        <input name="nombre" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input name="correo" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Motivo</label>
                        <input name="motivo" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Aqui va el motivo de la consulta">
                        <label for="exampleFormControlTextarea1" class="form-label"></label>
                        <textarea name="consulta" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Detalle aqui su consulta..."></textarea>
                    </div>

                    <div class="mb-3 order-last">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
        <div class="seccion">
            <h3>Nuestras Redes!</h3>
            <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                <a href="https://www.instagram.com/macookie.cakes/" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://wa.link/0279la" class="whatsapp"><i class="bi bi-whatsapp" ></i></a>
            </div>
        </div>
    </div>
</div>
