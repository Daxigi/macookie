<!-- MAIN CONTENT -->
<div class="container mt-5">
    <h1>Tienda</h1>
    <p class="text-secondary"></p>

    <div class="products-list">
        <?php foreach ($compras as $compra) { ?>
            <div class="mb-4">
                <div class="card h-dark" style="width: 18rem;">
                    <img src="<?= $compra["image"] ?>" class="card-img-top product-image" alt="...">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title"><?= $compra["nombre"] ?></h5>
                            </div>
                            <div class="col-6 price">$<?= $compra["precio"] ?></div>
                        </div>

                        
                        <p class="card-text"><?= $compra["description"] ?></p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>