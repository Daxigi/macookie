<div class="container-xxl register-box">
    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <h1 class="text-center">Editar Productos</h1>
    <div class="container">
        <div class="w-50 mx-auto">
            <?php echo form_open_multipart("actualizar-producto"); ?>

            <div class="form-group">
                <label for="nombre">Nombre Producto</label>
                <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $producto['nombre']]); ?>
            </div>
            <div class="form-group">
                <label for="nombre">Precio</label>
                <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $producto['precio']]); ?>
            </div>
            <div class="form-group">
                <label for="nombre">Stock</label>
                <?php echo form_input(['name' => 'stock', 'id' => 'stock', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $producto['stock']]); ?>
            </div>
            <div class="form-group">
                <label for="nombre">Descripcion</label>
                <?php echo form_textarea(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $producto['descripcion']]); ?>
            </div>
            <div class="form-group">
                <label for="imagen" class="form-label">Adjunte imagen de su producto</label>
                <img src="<?php echo ('http://localhost/tp-maxigim/public/assets/uploadedFiles/' . $producto['imagen']); ?>" alt="" height="100" width="100">
                <?php echo form_input(['name' => 'imagen', 'type' => 'file', 'class' => 'form-control', 'id' => 'imagen']); ?>
            </div>


            <div class="form-group">
                <label for="categoria">Categoria</label>
                <?php
                $lista['0'] = 'Seleccione categoria';
                foreach ($categorias as $categoria) {
                    $lista[$categoria['id']] = $categoria['nombre'];
                }
                $sel = $producto['categoria_id'];
                echo form_dropdown('categoria', $lista, $sel, 'class="form-control"'); ?>
            </div>

            <?php echo form_hidden('id', $producto['id']); ?>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Agregar</button>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>