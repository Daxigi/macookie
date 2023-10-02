<title>Registros</title>
<?php if (session()->getFlashdata('errors')) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="container-xxl register-box">
    <h2>Ingresa los datos de envio para continuar con la compra!</h2>
    <form action=<?php echo base_url('direccion-envio') ?> method='POST'>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Selecciona la fecha en la que desees recibir tus productos</label>
            <input name="fecha" type="date" class="form-control" id="exampleFormControlInput1" value="<?= old('fecha') ?>">
            <label for="">En caso de no disponibilidad en una determinada fecha, nos contactaremos contigo.</label>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Ciudad</label>
            <input name="ciudad" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre" value="<?= old('ciudad') ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Direccion</label>
            <input name="direccion" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Apellido" value="<?= old('direccion') ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Numero</label>
            <input name="numero" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= old('numero') ?>">
            <div id="emailHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Codigo Postal</label>
            <input name="codigop" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= old('codigop') ?>">
            <div id="emailHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Si tiene algun detalle que desee compartirnos, ingreselo debajo!</label>
                        <textarea name="detalle" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Detalle aqui su consulta..."></textarea>
                    </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
    </form>
</div>
</div>