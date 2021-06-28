
<?php if (isset ($_SESSION["userid"])): ?>

    <!-- начало colMenu -->
    <div id="colMenu">

        <div class="text">
            <select id="org_id" title="" style="width: 100%; height: 30px">
                <option value=""> Все организации </option>
                <option value=""> Только моя организация </option>
            </select>
        </div>

    <section class="colMenu">
        <div>
            <input id="ac-1" name="accordion-1" type="radio" checked />
            <label for="ac-1">Добро пожаловать</label>
                <p><a href="..\">Основной контент</a></p>

        </div>
        <div>
            <input id="ac-2" name="accordion-1" type="radio" />
            <label for="ac-2">Меню1</label>
        </div>
        <div>
            <input id="ac-3" name="accordion-1" type="radio" />
            <label for="ac-3">Меню2</label>
        </div>
        <div>
            <input id="ac-4" name="accordion-1" type="radio" />
            <label for="ac-4">Инструменты администратора</label>

                <p><a href="../setup/mysql_db_update.php">Обновить БД</a></p>
                <p><a href="admin.php">Инструменты администратора</a> </p>
        </div>
        <div>
            <input id="ac-5" name="accordion-1" type="radio" />
            <label for="ac-5">Выход</label>
            <p><a href="logoff.php">Выход</a></p>

        </div>
    </section>

    </div>
    <!-- конец colMenu -->

<?php else: header("Location: /"); ?>
<?php endif; ?>