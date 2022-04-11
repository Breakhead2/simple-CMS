<section class="products">
    <h3>Каталог книг</h3>
    <div class="box">
        <?php foreach ($books as $item): ?>
            <form class="item" method="post">
                <div class="image_container">
                    <img src="/images/items/<?=$item['code']?>.jpg">
                </div>
                <div class="info">
                    <a class="title" href="item/?id=<?=$item['id']?>">
                        <?=$item['title']?>
                    </a>
                    <p class="author">Автор:
                        <span><?=$item['author']?></span>
                    </p>
                    <p class="price">Цена:
                        <span><?=$item['price']?> рублей</span>
                    </p>
                </div>
                <input name="id_item" value="<?=$item['id']?>" hidden>
                <button name="action" value="add_to_cart" type="submit" class="btn_add">Купить</button>
            </form>
        <?php endforeach; ?>
    </div>
</section>
