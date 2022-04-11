<section class="reviews">
    <form id="review_form" method="post">
        <input name = "action" value="<?=$reviews['action']?>" hidden>
        <input name = "id_review2" value="<?=$reviews['current_id']?>" hidden>
        <input class = "user_name" type="text" name="user" placeholder="Ваше имя" value="<?=$reviews['result']['user_name']?>">
        <input class="user_text" name="review" type="textarea" placeholder="Будем рады прочить ваш отзыв о товаре" value="<?=$reviews['result']['review']?>">
        <input class="send_mes" type="submit" value="<?=$reviews['btn_text']?>">
    </form>
    <p>Отзывы о данном товаре:</p>
    <?php if(empty($reviews['messages'])): ?>
    <p class="greeting">Здесь пока что, никто не оставил отзывов. Будьте первым =)</p>
    <?php  else : ?>
        <?php foreach ($reviews['messages'] as $item) : ?>
        <div class="messages">
            <form method="post" class="tools">
                <input name="id_review" value="<?=$item['id']?>" hidden>
                <input type="submit" value="delete" name="action">
                <input type="submit" value="edit" name="action">
            </form>
            <div class="text">
                <p class="author">
                    <?=$item['user_name']?>:
                </p>
                <p class="message">
                    <?=$item['review']?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif ?>
</section>
