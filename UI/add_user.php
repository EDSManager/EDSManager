<?php

    echo '<form action="add_user_ok.php" method="post" enctype="multipart/form-data">';
    echo '<p><input type="text" name="new_q_login" value="" placeholder="Логин или Email"></p>';
    echo '<p><input type="password" name="new_q_password" value="" placeholder="Пароль"></p>';
    echo '<p class="submit"><input type="submit" name="commit" value="Добавить"></p>';
