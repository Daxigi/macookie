<title>Registros</title>
<?php if(session()->getFlashdata('errors')):?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach;?>    
        </ul>
    </div>
<?php endif;?>

<div class="container-xxl register-box">
    <h2>Registrate y se parte de nuestros clientes!</h2>
    <form action=<?php echo base_url('registro') ?> method='POST'>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nombre/s</label>
            <input name="persona_nombre" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre" value="<?= old('persona_nombre')?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Apellidos</label>
            <input name="persona_apellido" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Apellido" value="<?= old('persona_apellido')?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
            <input name="persona_mail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= old('persona_mail')?>">
            <div id="emailHelp" class="form-text">No compartiremos tu correo con nadie mas.</div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input name="persona_password" type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Reescriba su password</label>
                <input name="persona_repassword" type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Numero de contacto</label>
                <input name="persona_telefono" type="text" inputmode="numeric" pattern="[0-9]*" class="form-control" id="exampleFormControlInput1" placeholder="Ej: +543794654321" value="<?= old('persona_telefono')?>">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
                <label name="persona_mayor" class="form-check-label" for="flexCheckDefault">
                    Soy mayor de edad(+18).
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
                <label name="persona_terminos" class="form-check-label" for="flexCheckDefault">
                    Acepto los terminos y condiciones.
                </label>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
    </form>
</div>
</div>