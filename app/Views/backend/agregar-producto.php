<title>Agregar producto</title>

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
    <h2>Agrege su producto.</h2>
    <form action="<?php echo base_url('ingresar-productos'); ?>" method='POST' enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nombre</label>
            <input name="producto_nombre" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre" value="<?php echo old('producto_nombre');?>">
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <?php 
                $lista['0'] = 'Seleccione categoria';
                foreach($categorias as $row){
                    $categoria_id = $row['id'];
                    $categoria_desc = $row['nombre'];
                    $lista[$categoria_id] = $categoria_desc;
                }

                echo form_dropdown('producto_categoria', $lista,  "class='form-control'");

            ?>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Precio</label>
            <input name="producto_precio" type="text" class="form-control" id="exampleFormControlInput1" placeholder="$999" value="<?php echo old('producto_precio');?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Descripcion</label>
            <input name="producto_descripcion" type="text-area" class="form-control" id="exampleFormControlInput1" placeholder="Descripcion del producto" value="<?php echo old('producto_descripcion');?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Stock</label>
            <input name="producto_stock" type="text" inputmode="numeric" pattern="[0-9]*" class="form-control" id="exampleFormControlInput1" value="<?php echo old('producto_stock');?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Adjunte imagen de su producto</label>
            <input name="producto_imagen" type="file" class="form-control" id="exampleFormControlInput1" value="<?php echo old('producto_imagen');?>">
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Agregar</button>
        </div>
</div>
</form>
</div>
</div>