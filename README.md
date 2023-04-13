

![Laravel 9.19](https://img.shields.io/badge/Laravel-9.19-orange)


<h1 align="center">Webmaxstudio</h1>

## Постановка задачи
1) Функционал страницы регистрации:
   Форма регистрации с такими полями:
   Username;
   Phone number.

После регистрации пользователь получает сгенерированную уникальную ссылку на главную страницу, доступ к которой будет доступен в течение семи дней по этой уникальной ссылке. После истечения времени - ссылка становится недействительной.

2) Функционал главной страницы:
   Кнопка копирования своей уникальной ссылки;
   Кнопка для генерирования новой уникальной ссылки;
   Кнопка для деактивации текущей уникальной ссылки;
   Кнопка "Im feeling lucky". После нажатия на кнопку "Im feeling lucky" пользователю выводиться:
   Случайное число от 1 до 1000;
   Результат Win/Lose. Если случайное число парное - выводить пользователю результат Win. В противном случае выводить пользователю результат Lose;
   Сумма Win:
   Если случайное число более 900, сумма выигрыша должна составлять 70% от случайного числа;
   Если случайное число более 600, сумма выигрыша должна составлять 50% от случайного числа;
   Если случайное число более 300, сумма выигрыша должна составлять 30% от случайного числа;
   Если случайное число менее 300, сумма выигрыша должна составлять 10% от случайного числа.
   Кнопка History. После нажатия на кнопку "History" пользователю выводиться информация о последних 3-х результатах нажатия на кнопку "Im feeling lucky".

3) Работа с БД:
   В БД должны храниться данные:
   Зарегистрированных пользователей;
   Результатов нажатий на кнопку "Im feeling lucky".

4) Админ. панель:
   В админ. панели необходимо реализовать следующие функции:
   Список всех пользователей;
   Редактирование пользователя;
   Создание пользователя;
   Удаление пользователя.


## Setting up the project



    Clone the repository
    Run composer install
    Configure Laravel directory permissions (documentation)
    Create a database and setup the database configuration inside .env
    Run php artisan key:generate
    Run php artisan migrate --seed

    Admin panel link (id = 1 in DB) = /home/fhuefhreifyegyrfgtweeuyg

    Run npm install


### Screenshots


| Register page | Home page |
| ------------ | ------------- |
|<img src="https://github.com/melvin-rulit/Test_job/blob/master/screenshot%20project/registr_page.png" width="450">|<img src="https://github.com/melvin-rulit/Test_job/blob/master/screenshot%20project/home_page.png" width="450"> |




## License

Basically, feel free to use and re-use any way you want.

- - - - -

<div align=center>

Made with :heart: by [melvin-rulit](https://github.com/melvin-rulit).

</div>
