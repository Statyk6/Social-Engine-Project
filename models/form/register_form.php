<div id="openModal" class="modalReg">
    <div>
        <a href="#close" title="Закрыть" class="close">X</a>
        <h3>Регистрация нового пользователя</h3><br/>
        <p>Пожалуйста заполните данные формы.</br></br>
        <div id="inform"></div>
        <div id="register_form2">
            <form action="controllers/action_register.php" method="post">
                <p>E-mail:</p><input type="text" name="email" id="email"><br/>
                <p>Пароль:</p><input type="password" name="password" id="password"><br/>
                <p>Повторите пароль:</p><input type="password" name="password_2" id="password_2"><br/>
                <input type="submit" name="enter" class="submit_reg" value="Зарегистрироваться">
            </form>
        </div>
    </div>
</div>
