<table id="myTable" class="table table-bordred table-striped table-hover table-responsive">
    <tbody>
        <?php if (count($productos) > 0) : ?>
            <h1 style="text-align: center;">Productos!</h1>
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
                <table class="table table-striped table-bordered">
                    <tbody>
                        <?php foreach ($productos as $producto) : ?>
                            <tr>
                                <td><?php echo $producto['nombre']; ?></td>
                                <td><img src="<?php echo ('http://localhost/tp-maxigim/public/assets/uploadedFiles/' . $producto['imagen']); ?>" alt="" height="100" width="100"></td>
                                <td><?php echo $producto['descripcion']; ?></td>
                                <td><?php echo $producto['precio']; ?></td>
                                <td><?php echo $producto['stock']; ?></td>
                                <td><?php echo $producto['estado']; ?></td>
                                <td><?php if ($usuario && isset($usuario['logged']) && $usuario['rol'] == 1) : ?>
                                        <a href="<?php echo base_url('/agregar-carrito/' . $producto['id']); ?>" class="btn btn-success">Agregar al carrito</a>
                                    <?php else : ?>
                                        <a href="<?php echo base_url('/registro'); ?>" class="btn btn-primary">Registrese para comprar!</a>

                                    <?php endif; ?>
                                </td>
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
