<section class="book">
    <a  class="back" href="/products">
        <i class="far fa-arrow-alt-circle-left"></i> Назад
    </a>
    <h3><?=$book['title']?></h3>
    <div class="container">
        <div class="image_container">
            <img src="/images/items/<?=$book['code']?>.jpg" >
        </div>
        <div class="information">
            <p>Код товара: <span><?=$book['code']?></span></p>
            <p>Автор: <span><?=$book['author']?></span></p>
            <p>Переплёт: <span><?=$book['cover']?></span></p>
            <p>Страниц: <span><?=$book['pages']?></span></p>
            <p>Описание:</p>
            <p class="description"><?=$book['description']?></p>
            <button class="btn_add">Купить</button>
        </div>
    </div>
</section>
<?php include "reviews.php"?>