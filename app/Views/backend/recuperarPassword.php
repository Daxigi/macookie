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
    <h2>Cambiar Password.</h2>
    <form action=<?php echo base_url('forgot-password') ?> method='POST'>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Ingresa tu mail.</label>
            <input name="mail" type="mail" class="form-control" id="exampleFormControlInput1" placeholder="ejemplo@mail.com" value="<?= old('mail') ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Ingrese su nuevo password.</label>
            <input name="password1" type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Ingrese el password nuevamente.</label>
            <input name="password2" type="password" class="form-control" id="exampleFormControlInput1" placeholder="Re-Password">
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Continuar</button>
        </div>
    </form>
</div>
</div>