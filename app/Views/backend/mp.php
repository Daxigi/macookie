<?php
require 'C:\xampp\htdocs\tp-maxigim\vendor\autoload.php';
use App\Models\productos_modelo;

$access_token = 'TEST-1372599962366454-080718-5a564d5a66d523ecd9758266b88d4a8e-169582779';
MercadoPago\SDK::setAccessToken($access_token);
$this->cart = \Config\Services::cart();
$this->productos_modelo = new Productos_modelo();


$carrito = $this->productos_modelo->obtenerProductosDelCarrito($this->cart->contents());


$preference = new MercadoPago\Preference();
$preference->back_urls = [
    "success" => "http://localhost/tp-maxigim/public/checkout/success",
    "failure" => "http://localhost/tp-maxigim/public/checkout/failure",
    "pending" => "http://localhost/tp-maxigim/public/checkout/pending",
];



$productos = [];
$amount = 0;
$item = new MercadoPago\Item();

foreach ($this->cart->contents() as $cartItem) {
    $item->id = $cartItem['id'];
    $item->title = $cartItem['name'];
    $item->quantity = $cartItem['qty'];
    $item->unit_price = $cartItem['price'];
    $amount += $cartItem['subtotal'];
    array_push($productos, $item);
}


$preference->amount = $amount;
$preference->items = array($productos);
$preference->save();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="contenedor-btn"></div>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago('TEST-c286ee85-ae55-4e97-b2a3-3d4d7d7f13af', {
            locale: 'en-US',
        })
        const bricksBuilder = mp.bricks();
        const checkout = mp.checkout({
            preference: {
                id: '<?php echo $preference->id ?>',
                amount: 100,
            },
            render: {
                container: '.contenedor-btn',
                label: 'Pagar',
            }
        });
    </script>
</body>

</html>