<nav>
    <div>
        <a href="/">Главная</a>
        <a href="/products">Каталог товаров</a>
        <?php if ($admin || $user): ?>
        <a href="/orders">Истории заказов</a>
        <?php endif; ?>

    <a class="сart_btn" href="/cart">Корзина (<?php  if(!is_null($counter['counter_items'])):?>
    <?php echo $counter['counter_items'] ?>
    <?php else : echo "0" ?>
    <?php endif;?>)</a>
</nav>