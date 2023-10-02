<h1 class="minititulo" style="text-align: center;">Consultas</h1>
<div class="container">

    
    <table id="myTable" class="table table-bordred table-striped table-hover">
    <thead>
        <th>Usuario</th>
        <th>Correo</th>
        <th>Motivo</th>
        <th>Consulta</th>
        <th>Leido</th>
    </thead>

    <tbody>
    <?php foreach($consultas as $consulta): ?>
        <tr>
            <td><?php echo $consulta['nombre']; ?></td>
            <td><?php echo $consulta['correo']; ?></td>
            <td><?php echo $consulta['motivo']; ?></td>
            <td><?php echo $consulta['consulta']; ?></td>
            <?php if($consulta['leido'] == "NO"): ?>
                <td><a href="<?php echo base_url('leer-consultas/'.$consulta['id']); ?>" class="btn btn-danger">No leido</a></td>
            <?php else: ?>
                <td><a class="btn btn-success">Leido</a></td>
            <?php endif; ?> 
             
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>