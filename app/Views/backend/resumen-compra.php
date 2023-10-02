<br><br>
<div class="container unique-container rounded shadow" style="background-color: #eeeeee;">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Categoria</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($compra as $producto) : ?>
                <?php 
                    $subtotal = $producto['detalle_cantidad'] * $producto['precio']; ?>
                <tr>
                    <td></td>
                    <td class="hover-effect"><?php echo $producto['detalle_cantidad'] ?></td>
                    <td class="hover-effect"><?php echo $producto['nombre'] ?></td>
                    <td class="hover-effect"><?php echo $producto['nombre_categoria'] ?></td>
                    <td class="hover-effect"><?php echo $producto['descripcion'] ?></td>
                    <td class="hover-effect"><img src="<?php echo ('http://localhost/tp-maxigim/public/assets/uploadedFiles/' . $producto['imagen']); ?>" alt="" height="100" width="100"></td>
                    <td class="hover-effect"><?php echo $producto['precio'] ?></td>
                    <td class="hover-effect"><?php echo $subtotal ?></td> 
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="7" style="text-align: right;"><strong>TOTAL DE LA COMPRA: </strong></td>
                <td><?php echo $venta['total_venta']; ?></td>
            </tr>
        </tbody>
    </table>
    <a href="<?= base_url("compras/".$usuario['id']); ?>" class="btn btn-primary">Volver</a>
    <br>
    <br>
</div>


<br>
<br>
<br>

<style>
    .unique-container {
        background-color: #eeeeee;
        border-radius: 10px;
    }
    
    .unique-container .table td.hover-effect:hover {
        background-color: #f5f5f5;
    }

    h2 {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    th {
        font-weight: bold;
    }
</style>
