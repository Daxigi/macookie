<?php
if (count($productos) > 0) :
?>
<h1 style="text-align: center;">Gestion de productos</h1>
<div class="container">

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


    <br>
    <table id="myTable" class="table table-bordred table-striped table-hover">
        

        <tbody>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto) : ?>
                        <tr>
                            <td><?php echo $producto['nombre']; ?></td>
                            <td><img src="<?php echo ('http://localhost/tp-maxigim/public/assets/uploadedFiles/' . $producto['imagen']); ?>" alt="" height="100" width="100"></td>
                            <td><?php echo $producto['descripcion']; ?></td>
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
        <?php
    else :
        ?>
            <div class="alert alert-danger">
                No hay productos coincidentes con la búsqueda.
            </div>
        <?php
    endif;
        ?>

        </tbody>
    </table>
</div>