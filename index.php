<?php

$sConfigFile = './config/config-ESDManager.php';
$sStartPage = './UI/index.php';
$sSetupPage = './setup/index.php';

/**
 * Проверяем наличие конфигурационного файла и его права доступа
 * Если конфигурационный файл отсутствует, запускаем процедуру установки
 */

if (file_exists($sConfigFile))
{
    if (!is_readable($sConfigFile))
    {
        echo "<p><b>Error</b>: Нет доступа к конфигурационному файлу: '$sConfigFile'. Проверьте права доступа к этому файлу.</p>";
    }
    else if (is_writable($sConfigFile))
    {
        echo "<p><b>Предупреждение безопасности</b>: конфигурационный файл '$sConfigFile' должен иметь атрибут ТОЛЬКО-ДЛЯ-ЧТЕНИЯ (read-only).</p>";
        echo "<p>Измените права доступа к файлу.</p>";
        echo "<p>Нажмите <a href=\"$sStartPage\">RUN EDSManager</a> для игнорироавния предупреждения безопасности и запуска EDSManager</p>";
        echo "<p>или нажмите <a href=\"$sSetupPage\">SETUP</a> для внесения изменений в настройки EDSManager.</p>";
    }
    else
    {
        header("Location: $sStartPage");
    }
}
else
{
    // Конфигурационный файл отсутствует, запускаем процедуру установки для его создания
    header("Location: $sSetupPage");
}
?>
