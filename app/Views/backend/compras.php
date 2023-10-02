<h1 style="text-align: center;">Compras</h1>
<div class="container">
    
    
    <table id="myTable" class="table table-bordred table-striped table-hover">
        <thead>
            <th>ID Venta</th>
            <th>Precio</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Resumen</th>
        </thead>
        
        <tbody>
            <?php foreach ($compras as $compra) : ?>

                <?php $date = date_create($compra['venta']['venta_fecha']); ?>
                <tr>
                    <td><?php echo $compra['venta']['id']; ?></td>

                    <td><?php echo date_format($date, 'd/m/Y'); ?></td>
                    <td><?php echo date_format($date, 'H:i:s'); ?></td>
                    <td><?php echo $compra['venta']['total_venta']; ?></td>
                    <td><a href="<?php echo base_url('resumen-compras/'.$compra['venta']['id']); ?>" class="btn btn-success">Resumen</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>