<section class="authentication">
        <form method="post" class="authForm">
            <input name="sign_up" hidden>
            <h4>Регистрация</h4>
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
                <input type="checkbox" name="remember">
            </label>
            <p>Вы уже зарегестрированы? Тогда жмите <a href="/">сюда</a></p>
            <input  class="sub" type="submit" value="Зарегестрироваться">
        </form>
</section>