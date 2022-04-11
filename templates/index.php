<section class="authentication">
    <?php if ($auth): ?>
        <p class="welcome">Добро пожаловать!</p>
        <p class="welcome"><?=$user?>, рады видеть Вас!</p>
        <a href="/?logout" class="logout">Выйти</a>
    <?php else : ?>
        <form method="post" class="authForm">
            <input name="sign_in" hidden>
                <h4>Авторизация</h4>
            <p class="error"><?= (isset($_REQUEST['error'])) ? $_REQUEST['error'] : "" ?></p>
            <label class="login">
                Логин:
                <input type="text" name="login" placeholder="Введите ваш логин">
            </label>
            <label >
                Пароль:
                <input type="password" name="password" placeholder="Введите ваш пароль">
            </label>
            <label class="check">
                Запомнить меня
                <input name="remember" type="checkbox">
            </label>
            <p>Вы еще не зарегестрированы? Тогда жмите <a href="/signup">сюда</a></p>
            <input  class="sub" type="submit" value="Войти">
        </form>
    <?php endif;?>
</section>
