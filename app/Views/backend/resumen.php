<div class="container unique-container rounded shadow" style="background-color: #eeeeee;">
    <table class="table table-bordered table-striped">
        <h2>Venta: <?php echo $venta['venta']['id'] ?></h2>
        <thead>
            <tr>
                <th>Detalle Pedido</th>
                <th>Importe Total</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php $date = date_create($venta['venta']['venta_fecha']); ?>
                <td></td>
                <td><?php echo $venta['venta']['total_venta'] ?></td>
                <td><?php echo date_format($date, 'd/m/Y') ?></td>
                <td><?php echo date_format($date, 'H:i:s') ?></td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Mail</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td><?php echo $venta['usuario']['nombre'] ?></td>
                <td><?php echo $venta['usuario']['apellido'] ?></td>
                <td><?php echo $venta['usuario']['mail'] ?></td>
                <td><?php echo $venta['usuario']['telefono'] ?></td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Productos</th>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($venta['producto'] as $producto) : ?>
                <?php $subtotal = $producto['cantidad'] * $producto['precio']; ?>
                <tr>
                    <td></td>
                    <td class="hover-effect"><?php echo $producto['cantidad'] ?></td>
                    <td class="hover-effect"><?php echo $producto['nombre'] ?></td>
                    <td class="hover-effect"><?php echo $producto['descripcion'] ?></td>
                    <td class="hover-effect"><img src="<?php echo ('http://localhost/tp-maxigim/public/assets/uploadedFiles/' . $producto['imagen']); ?>" alt="" height="100" width="100"></td>
                    <td class="hover-effect"><?php echo $producto['precio'] ?></td>
                    <td class="hover-effect"><?php echo $subtotal ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= base_url("listar-ventas"); ?>" class="btn btn-primary">Volver</a>
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
