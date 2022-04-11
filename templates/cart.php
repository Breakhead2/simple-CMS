<section class="cart">
    <h3>Корзина</h3>
    <div class="box">
        <?php if(empty($cart)) :?>
        <p>Корзина пуста</p>
        <?php else : ?>
        <?php foreach($cart as $item): ?>
        <form method="post">
            <div class="image_container">
                <img src="/images/items/<?=$item['code']?>.jpg" >
            </div>
            <div class="information">
                <p>Цена: <span><?=$item['price']?></span></p>
                <p>Количество: <?=$item['quantity']?></p>
                <input name="product_id" value="<?=$item['product_id']?>" hidden>
                <input name="cart_id" value="<?=$item['cart_id']?>" hidden>
                <button  name = "action" value="delete_from_cart"  class="btn_add">Удалить</button>
            </div>
        </form>
        <?php endforeach; ?>
        <?php endif ?>
    </div>
    <hr>
    <p class="sum">Итого: <span><?= ($sum['sum']) ? $sum['sum'] : "0" ?> рублей</span></p>
    <?php if (isset($_COOKIE['status']) && !$checkCart): ?>
    <div class="status">
        <p class="success">Заказ успешно оформлен.</p>
        <p>Наши операторы свяжутся с вами для подтверждения заказа.</p>
    </div>
    <?php endif ;?>
    <?php if($checkCart && !isset($_GET['session'])) :?>
    <div class="order">
        <h3>Оформление заказа</h3>
        <p>Заполните форму:</p>
        <p class="error"><?= $_REQUEST['error'] ?></p>
        <form id="checkout_form" method="post">
            <input name="action" value="order" hidden>
            <label for="name">
                Имя:
                <input name="name" type="text" value="<?=$_REQUEST['name'] ?>">
            </label>
            <label for="surname">
                Фамилия:
                <input name="surname" type="text" value="<?=$_REQUEST['surname'] ?>">
            </label>
            <label for="phone">
                Телефон:
                <input name="phone" type="number" value="<?=$_REQUEST['phone'] ?>">
            </label>
            <label for="post_code">
                Почтовый индекс:
                <input name="postcode" type="number" value="<?=$_REQUEST['postcode'] ?>">
            </label>
            <label for="address">
                Адрес:
                <input name="address" type="text" value="<?=$_REQUEST['address'] ?>">
            </label>
            <input type="submit" class="btn_checkout" value="Оформить заказ">
        </form>
        <?php endif; ?>
    </div>
</section>
