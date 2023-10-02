<!-- MAIN CONTENT -->
<div class="container mt-4">
  <h1>Tienda</h1>
  <p class="text-secondary"></p>

  <section class="prod-section">
    <img src="http://localhost/tp-maxigim/img/products/categories/fresh.png"><a href=""></a>
    <img src="http://localhost/tp-maxigim/img/products/categories/fresh1.png"><a href=""></a>
    <img src="http://localhost/tp-maxigim/img/products/categories/fresh2.png"><a href=""></a>
    <img src="http://localhost/tp-maxigim/img/products/categories/fresh3.png"><a href=""></a>
    <img src="http://localhost/tp-maxigim/img/products/categories/fresh4.png"><a href=""></a>
    <img src="http://localhost/tp-maxigim/img/products/categories/fresh5.png"><a href=""></a>
  </section>




  <div class="row" style="margin-top: 50px;">
  <!-- pregunto si categoriasP es un arreglo -->
<!-- si es un arreglo, lo recorro y muestro como titulo el nombre de la categoria y sus productos -->
    <?php foreach ($categoriasP as $categoria) :  ?>
        
      <h3 ><a class="minititulo" href="<?php echo base_url('productos/' . $categoria['id']); ?>"><?php echo $categoria['nombre'];?></a></h3>
      <!-- filtro los productos por su categoria -->
      <?php
      $categoria_id = $categoria['id'];
      $productosFiltrados = array_filter($productosActivos, function ($producto) use ($categoria_id) {
        return $producto['categoria_id'] == $categoria_id;
      });
      ?>
      <!-- los muestro como tarjetas -->
      <?php foreach ($productosFiltrados as $producto) : ?>
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="<?php echo ($pathImagen . $producto['imagen']) ?>" class="d-block w-100" alt="...">
            <div class="card-body">
              <h4 class="card-title text-center custom-heading"><?php echo $producto['nombre']; ?></h4>
              <p class="card-text custom-description"><?php echo $producto['descripcion']; ?></p>
              <div class="card-footer">
                <small class="price text-muted"><?php echo $producto['precio']; ?></small>
                <?php if ($usuario && isset($usuario['logged']) && $usuario['rol'] == 1) : ?>
                  <a href="<?php echo base_url('/agregar-carrito/' . $producto['id']); ?>" class="btn btn-success">Agregar al carrito</a>
                <?php else: ?>
                  <a href="<?php echo base_url('/registro'); ?>" class="btn btn-primary">Registrese para comprar!</a>

                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
  <?php endforeach; ?>
  <!-- cierro los primeros bucles, y ahora muestro los productos de una sola categoria -->
  
</div>