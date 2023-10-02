<title>Loggin</title>


<div class="container-xxl register-box">
    <div class="container-fluid bp">
        <?php if (session()->getFlashdata('errorEmpty')) : ?>
            <div id="success-message" class="alert alert-danger welcome-message"><?= session()->getFlashdata('errorEmpty') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errorLoggin')) : ?>
            <div class="alert alert-danger alert-er"><?= session()->getFlashdata('errorLoggin') ?></div>
        <?php endif; ?>

        <h2>Ingresa en tu sesion!</h2>
        <form action=<?php echo base_url('ingresar') ?> method='POST'>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                <input name="persona_mail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= old('persona_mail') ?>">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input name="persona_password" type="password" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </form>
        <a href="<?= base_url("forgot-password"); ?>" style="color: blue; text-decoration: none;">Olvidaste la contraseña?</a>
    </div>
</div>