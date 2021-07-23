
<?php if (isset ($_SESSION["userid"])): ?>

    <!-- начало colMenu -->
    <div id="colMenu">

        <div class="text">
            <select id="org_id" title="" style="width: 100%; height: 30px">
                <option value=""> Все организации </option>
                <option value=""> Только моя организация </option>
            </select>
        </div>

        <ul class="cd-accordion-menu animated">
            <li class="has-children">
                <input type="checkbox" name ="group-1" id="group-1" checked>
                <label for="group-1">Главное</label>

                <ul>
                    <li><a href="..\">Основной экран</a></li>

                    <li><a href="#0">Справка о ключевой информации</a></li>
                    <li><a href="#0">Справка о носителе</a></li>
                    <li><a href="#0">Справка об ответственном лице</a></li>
                    <li><a href="#0">Справка о файле</a></li>
                    <li><a href="#0">Справка об экземпляре СКЗИ</a></li>
                    <li><a href="#0">Справка об организации</a></li>
                    <li><a href="#0">Перечень ключевой информации</a></li>

                    <li><a href="#0">Перечень ключевых документов</a></li>
                    <li><a href="#0">Перечень экземпляров СКЗИ</a></li>
                    <li><a href="#0">Журнал учета ключевых документов</a></li>
                    <li><a href="#0">Журнал учета СКЗИ</a></li>

                </ul>
            </li>

            <li class="has-children">
                <input type="checkbox" name ="group-2" id="group-2">
                <label for="group-2">Криптоключи</label>

                <ul>

                    <li class="has-children">
                        <input type="checkbox" name ="sub-group-2-1" id="sub-group-2-1">
                        <label for="sub-group-2-1">Документы</label>

                        <ul>

                            <li><a href="#0">Акт создания ключевых документов</a></li>
                            <li><a href="#0">Акт передачи ключевых документов</a></li>
                            <li><a href="#0">Акт уничтожения ключевых документов</a></li>
                            <li><a href="#0">Акт ввода в эксплуатацию ключевой информации</a></li>
                            <li><a href="#0">Акт вывода из эксплуатации ключевой информации</a></li>

                        </ul>

                    </li>
                    <li class="has-children">
                        <input type="checkbox" name ="sub-group-2-2" id="sub-group-2-2">
                        <label for="sub-group-2-2">Справочники</label>


                        <ul>
                            <li><a href="#0">Ключевая информация</a></li>
                            <li><a href="#0">Носители ключевой информации</a></li>
                            <li><a href="#0">Назначения ключевой информации</a></li>
                            <li><a href="#0">Форматы ключевой информации</a></li>
                            <li><a href="#0">Информационные системы</a></li>
                            <li><a href="#0">Организации</a></li>
                            <li><a href="#0">Ответственные лица</a></li>

                        </ul>
                    </li>
                    <li class="has-children">
                        <input type="checkbox" name ="sub-group-2-3" id="sub-group-2-3">
                        <label for="sub-group-2-3">Отчеты</label>

                        <ul>

                            <li><a href="#0">Анализ данных</a></li>
                            <li><a href="#0">Сводный перечень КИ и КД</a></li>
                            <li><a href="#0">Перечень ключевой информации, находящейся в эксплуатации</a></li>
                            <li><a href="#0">Перечень ключевых документов</a></li>
                            <li><a href="#0">Справка об информационной системе</a></li>
                            <li><a href="#0">Справка о ключевой информации</a></li>
                            <li><a href="#0">Справка о носителе ключевой информации</a></li>
                            <li><a href="#0">Справка об организации</a></li>
                            <li><a href="#0">Справка об ответственном лице</a></li>
                            <li><a href="#0">Журнал учета ключевых документов (ФАПСИ 152, для органа криптографической защиты)</a></li>
                            <li><a href="#0">Журнал учета ключевых документов (ФАПСИ 152, для обладателя конфиденциальной информации)</a></li>

                        </ul>

                    </li>
                </ul>
            </li>

            <li class="has-children">
                <input type="checkbox" name ="group-3" id="group-3">
                <label for="group-3">СКЗИ</label>

                <ul>

                    <li class="has-children">
                        <input type="checkbox" name ="sub-group-3-1" id="sub-group-3-1">
                        <label for="sub-group-3-1">Документы</label>

                        <ul>

                            <li><a href="#0">Акт поступления СКЗИ</a></li>
                            <li><a href="#0">Акт списания СКЗИ</a></li>
                            <li><a href="#0">Акт передачи СКЗИ</a></li>
                            <li><a href="#0">Акт ввода СКЗИ в эксплуатацию</a></li>
                            <li><a href="#0">Акт вывода СКЗИ из эксплуатации</a></li>

                        </ul>

                    </li>

                    <li class="has-children">
                        <input type="checkbox" name ="sub-group-3-2" id="sub-group-3-2">
                        <label for="sub-group-3-2">Справочники</label>

                        <ul>

                            <li><a href="#0">Экземпляры СКЗИ</a></li>
                            <li><a href="#0">Модели СКЗИ</a></li>
                            <li><a href="#0">Объекты информационной инфраструктуры</a></li>
                            <li><a href="#0">Форматы ключевой информации</a></li>
                            <li><a href="#0">Организации</a></li>
                            <li><a href="#0">Ответственные лица</a></li>
                            <li><a href="#0">Информационные системы</a></li>

                        </ul>

                    </li>

                    <li class="has-children">
                        <input type="checkbox" name ="sub-group-3-3" id="sub-group-3-3">
                        <label for="sub-group-3-3">Отчеты</label>

                        <ul>

                            <li><a href="#0">Анализ данных</a></li>
                            <li><a href="#0">Перечень экземпляров СКЗИ</a></li>
                            <li><a href="#0">Справка об экземпляре СКЗИ</a></li>
                            <li><a href="#0">Справка об ответственном лице</a></li>
                            <li><a href="#0">Справка об организации</a></li>
                            <li><a href="#0">Справка об информационной системе</a></li>
                            <li><a href="#0">Справка об объекте информационной инфраструктуры</a></li>
                            <li><a href="#0">Журнал учета СКЗИ (ФАПСИ 152, для органа криптографической защиты)</a></li>
                            <li><a href="#0">Журнал учета СКЗИ (ФАПСИ 152, для обладателя конфиденциальной информации)</a></li>

                        </ul>

                    </li>
                </ul>
            </li>

            <li class="has-children">
                <input type="checkbox" name ="group-4" id="group-4">
                <label for="group-4">ВНД и ОРД</label>

                <ul>

                    <li class="has-children">
                        <input type="checkbox" name ="sub-group-4-1" id="sub-group-4-1">
                        <label for="sub-group-4-1">Документы</label>

                        <ul>
                            <li><a href="#0">Внутренние документы</a></li>
                        </ul>
                    </li>

                    <li class="has-children">
                        <input type="checkbox" name ="sub-group-4-2" id="sub-group-4-2">
                        <label for="sub-group-4-2">Справочники</label>

                        <ul>
                            <li><a href="#0">Виды документов</a></li>
                            <li><a href="#0">Информационные системы</a></li>
                            <li><a href="#0">Органы, принимающие документы</a></li>
                            <li><a href="#0">Ответственные лица</a></li>
                            <li><a href="#0">Роли</a></li>
                        </ul>
                    </li>

                    <li class="has-children">
                        <input type="checkbox" name ="sub-group-4-3" id="sub-group-4-3">
                        <label for="sub-group-4-3">Отчеты</label>

                        <ul>
                            <li><a href="#0">Матрица полномочий</a></li>
                            <li><a href="#0">Справка об информационной системе</a></li>

                        </ul>
                    </li>

                </ul>
            </li>

            <li class="has-children">
                <input type="checkbox" name ="group-5" id="group-5">
                <label for="group-5">Администрирование</label>

                <ul>
                    <li><a href="admin.php">Инструменты администратора</a></li>
                    <li><a href="../setup/mysql_db_update.php">Обновить БД</a></li>
                    <li><a href="#0">Уничтожение помеченных объектов</a></li>
                    <li><a href="#0">Матрица полномочий</a></li>

                </ul>
            </li>

            <li class="has-children">
                <input type="checkbox" name ="group-6" id="group-6">
                <label for="group-6">Выход</label>

                <ul>
                    <li><a href="logoff.php">Выход</a></li>
                </ul>
            </li>
        </ul> <!-- cd-accordion-menu -->



    </div>
    <!-- конец colMenu -->

<?php else: header("Location: /"); ?>
<?php endif; ?>