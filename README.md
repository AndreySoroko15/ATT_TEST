    # Тестовое задание 

В данном задании я реализовал вывод информации о заказе из базы в таблицу. Для таблицы присутствует сортировка по выбранному параметру (происходит на стороне сервера, асинхронно), а также поиск необходимого заказа по всем столбцам (на стороне клиента). 

       # Установка 

1. Склонируйте репозиторий проекта в папку "domains" вашего OpenServer

    git clone https://github.com/AndreySoroko15/ATT_TEST

2. Перейдите в профиль phpMyAdmin, создайте базу данных "att" и импортируйте sql файл

    расположение файла: db->att.sql

3. Настройте подключение к базе, для этого перейдите в db->config->config.ini и пропишите ваш логин, пароль

4. В OpenServer настройте имя домена (я использовал 'att') и проложите путь к корневой директории. 