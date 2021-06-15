
<?php if (isset ($_SESSION["userid"])): ?>

    <!-- начало colMenu -->
    <div id="colMenu">

        <div class="text">
    <select id="org_id" title="">
        <option value=""> Все организации </option>
    </select>
        </div>

        <div class="colMenu">
            <p><a href="#">ссылка 1</a> </p>
            <p><a href="#">ссылка 2</a> </p>
            <p><a href="../setup/mysql_db_update.php">Обновить БД</a></p>
            <p><a href="admin.php">Инструменты администратора</a> </p>
            <p><a href="logoff.php">Выход</a> </p>
        </div>
    </div>
    <!-- конец colMenu -->

<?php else: header("Location: /"); ?>
<?php endif; ?>