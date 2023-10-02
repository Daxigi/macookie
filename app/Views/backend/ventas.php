<h1 style="text-align: center;">Ventas</h1>
<div class="container">


    <table id="myTable" class="table table-bordred table-striped table-hover">
        <thead>
            <th>ID Venta</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Total</th>
            <th>Resumen</th>
        </thead>

        <tbody>
            <?php foreach ($ventas as $venta) : ?>
                <?php $date = date_create($venta['venta_fecha']); ?>
                <tr>
                    <td><?php echo $venta['id']; ?></td>
                    <td><?php echo $venta['usuario']['nombre']; ?></td>
                    <td><?php echo date_format($date, 'd/m/Y') ?></td>
                    <td><?php echo date_format($date, 'H:i:s') ?></td>
                    <td><?php echo $venta['total_venta']; ?></td>
                    <td><a href="<?php echo base_url('resumen/'.$venta['id']); ?>" class="btn btn-success">Resumen</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>