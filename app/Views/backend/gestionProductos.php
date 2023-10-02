<h1 style="text-align: center;">Gestion de productos</h1>
<div class="container">
<?php use App\Models\Categorias_modelo;
    $categoriaModelo = new Categorias_modelo();?>
    <?php if (session()->has('successMessage')) : ?>
        <div class="alert alert-success">
            <?= session('successMessage') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->has('errorMessage')) : ?>
        <div class="alert alert-danger">
            <?= session('errorMessage') ?>
        </div>
    <?php endif; ?>


    <a class="btn btn-success" href="<?= base_url("/ingresar-productos"); ?>">Agregar Producto</a>
    <br>
    <div>
        <form action="<?= base_url("/buscar-producto"); ?>" method="POST">
            <input type="text" name="campo" id="campo" class="form-control">
            <button type="submit" class="btn btn-success">Buscar</button>
        </form>
    </div>
    <br>
    <table id="myTable" class="table table-bordred table-striped table-hover">
        <thead>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Descripcion</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Estado</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>

        <tbody>
            <?php foreach ($productos as $producto) : ?>
                <tr>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td><img src="<?php echo ('http://localhost/tp-maxigim/public/assets/uploadedFiles/' . $producto['imagen']); ?>" alt="" height="100" width="100"></td>
                    <td><?php echo $producto['descripcion']; ?></td>
                    <?php 
                    $categoria = $categoriaModelo->where('id', $producto['categoria_id'])->get()->getRowArray();?>
                    <td><?php echo $categoria['nombre']; ?></td>
                    <td><?php echo $producto['precio']; ?></td>
                    <td><?php echo $producto['stock']; ?></td>
                    <td><?php echo $producto['estado']; ?></td>
                    <td><a class="btn btn-success" href="<?php echo base_url("/editar-producto/{$producto['id']}"); ?>">Editar</a></td>
                    <?php if ($producto['estado'] == "SI") : ?>
                        <td><a class="btn btn-danger" href="<?php echo base_url("desactivar/" . $producto['id']); ?>">Dar de baja</a></td>
                    <?php else : ?>
                        <td><a class="btn btn-success" href="<?php echo base_url("activar/" . $producto['id']); ?>">Activar</a></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>