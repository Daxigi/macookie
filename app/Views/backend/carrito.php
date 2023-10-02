<?php if (session()->has('errorStock')) : ?>
        <div class="alert alert-danger">
            <?= session('errorStock') ?>
        </div>
    <?php endif; ?>

<h1 class="text-center">Carrito de Compras</h1><a href="productos/0" class="btn btn-success" role="button">Continuar comprando</a>

<?php if ($cart->contents() == NULL) { ?>
    <h2 class="text-center alert-danger">Carrito Vacio</h2>
<?php } ?>
<table id="mytable" class="table table-bordred table-striped">
    <?php if ($cart1 = $cart->contents()) : ?>
        <thead>
            <td>N° Item</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Cantidad</td>
            <td>Subtotal</td>
            <td>Agregar</td>
            <td>Eliminar</td>
        </thead>
        <tbody>
            <?php $total = 0;
            $i = 0;
            foreach ($cart1 as $item) :
            ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $item['name'] ?></td>
                    <td>$<?php echo $item['price'] ?></td>
                    <td><?php echo $item['qty'] ?></td>
                    <td><?php echo $item['subtotal'];
                        $total = $total + $item['subtotal']; ?></td>
                    <td>
                        <form action="<?php echo base_url('agregar/' . $item['id'] . '/' . $item['rowid']); ?>" method="POST">
                            <div>
                                <label for="cantidad">Cantidad:</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" required>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success">Agregar</button>
                            </div>
                        </form>

                    </td>
                    <td><a href="<?php echo base_url('eliminar/' . $item['rowid']); ?>" class="btn btn-danger">Eliminar</a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>Total Compra:$<?php echo $total; ?></td>
                <td><a href="<?php echo base_url('vaciar-carrito/all'); ?>" class="btn btn-success">Vaciar Carrito</a></td>
                <td><a href="<?php echo base_url('direccion'); ?>" class="btn btn-success" role="button">Continuar con la compra</a></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
        <?php endif; ?>
        </tbody>
</table>