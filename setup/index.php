<?php

require_once ('../approot.inc.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head><title>Настройка EDSManager</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="stylesheet" href="../css/style.css">
</head>

<body>

<?php

$ver = (float)phpversion();
echo 'Текущая версия PHP: ' . $ver .' ('.phpversion().')';

if ($ver > 5.6) echo ' - Ok';
else die(' - Error. Версия PHP не поддерживается');

echo "<br>";

if (file_exists(CONFIG_FILE)){
    echo "Файл конфигурации: ".CONFIG_FILE." - OK.<br>";
} else if (!is_dir(APPCONF)) {
    echo "Создаем каталог: ". APPCONF;
    if (!mkdir(APPCONF)) {
        die('Не удалось создать каталог:'. APPCONF);
    }
}

?>

<?php if (!file_exists(CONFIG_FILE)): ?>

    <section class="container">

    <div id="headerInner">
        <div class="logo">
            <a href="/">EDS Manager</a>
            </div>
        </div>

    <div class="config">
        <h2>Настройка доступа к базе данных</h2>
        <form action="save_config.php" method="post" enctype="multipart/form-data" class = "new_form1">
            <table><tbody>
                <tr>
                    <td>Имя сервера базы данных (db_host):</td>
                    <td><input size=40 type="text" name="db_host" title="Имя сервера базы данных (db_host)" value="localhost" placeholder="Имя сервера базы данных (db_host)" /></td>
                    </tr>
                <tr>
                    <td>Имя базы данных (db_name):</td>
                    <td><input size=40 type="text" name="db_name" title= "Имя базы данных (db_name)" value="eds" placeholder="Имя базы данных (db_name)" /></td>
                    </tr>
                <tr>
                    <td>Имя пользователя базы данных (db_user):</td>
                    <td><input size=40 type="text" name="db_user" title= "Имя пользователя базы данных (db_user)" placeholder="Имя (db_user)"/></td>
                    </tr>
                <tr>
                    <td>Пароль пользователя базы данных (db_pwd):</td>
                    <td><input size=40 type="text" name="db_pwd" title="Пароль пользователя базы данных (db_pwd)" placeholder="Пароль (db_pwd)" /></td>
                    </tr>
            </tbody></table>
            <p></p>
            <input type="submit" value="Сохранить" />
        </form>
    </div>
<?php endif; ?>

</body>
</html>

