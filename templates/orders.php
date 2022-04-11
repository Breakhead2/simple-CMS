<section class = "orders_list">
    <h3>Список заказов покупателей</h3>
    <p style="margin-left: 50px">Данные покупателей:</p>
    <div class="table">
        <div class="row header">
            <div class="heading">Имя</div>
            <div class="heading">Фамилия</div>
            <div class="heading">Телефон</div>
            <div class="heading">Адрес</div>
            <div class="heading">Почтовый <br> индекс</div>
            <div class="heading">Дата формирования заказа</div>
            <div class="heading">Статус</div>
            <div class="heading">Корзина</div>
        </div>
        <?php foreach ($orders as $value): ?>
            <div class="row">
                <div class="cell"><?=$value['name']?></div>
                <div class="cell"><?=$value['surname']?></div>
                <div class="cell"><?=$value['phone']?></div>
                <div class="cell"><?=$value['address']?></div>
                <div class="cell"><?=$value['postcode']?></div>
                <div class="cell"><?=$value['data']?></div>
                <?php if ($params['admin'] == true) : ?>
                    <select id="change_status" data-id="<?=$value['id']?>" class="cell" name = "status">
                        <option <?php if ($value['status'] == 'reading') echo "selected" ?>>Обработка</option>
                        <option <?php if ($value['status'] == 'confirmed') echo "selected" ?>>Подтвержден</option>
                        <option <?php if ($value['status'] == 'delivered') echo "selected" ?>>Доставлен</option>
                        <option <?php if ($value['status'] == 'closed') echo "selected" ?>>Закрыт</option>
                    </select>
                <?php else : ?>
                <div class="cell"><?=$params['status']?></div>
                <?php endif ;?>
                    <a class="cell" href="/cart/?session=<?= $value['session_id'] ?>">Корзина</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<script>
    //Изменение статуса заказа
    let selectStatus = document.querySelectorAll('#change_status');
    selectStatus.forEach(element => {
        element.addEventListener('change', (event)=>{
            let status = readStatus(event.target.options.selectedIndex);
            let id = element.getAttribute('data-id');
            (
                async () =>{
                    return await fetch('/api/?action=changeStatus&status=' + status + '&id=' + id);
                }
            )()
        });
    })
</script>