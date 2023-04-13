

![Laravel 9.19](https://img.shields.io/badge/Laravel-9.19-orange)


<h1 align="center">RoiUp HR</h1>

## Тестовое задание PHP (Laravel)
1) Форма реєстрації з такими полями:
   - Ім'я користувача;
   - Номер телефону.

Після реєстрації користувач отримує згенероване унікальне посилання на головну
сторінку, доступ до якої буде доступний протягом семи днів за цим унікальним
посиланням. Після закінчення часу - посилання стає недійсним.

2) Функціонал головної сторінки
   - Кнопка копіювання свого унікального посилання;
   - Кнопка для генерування нового унікального посилання;
   - Кнопка для деактивації поточного унікального посилання;
   - Кнопка "Мені пощастить”
   - Кнопка “Історія”. Після натискання на кнопку "Історія" користувачу виводиться інформація про останні 3 результати натискання на кнопку "Мені пощастить".

   Після натискання на кнопку "Мені пощастить" користувачу виводиться:
   - Випадкове число від 1 до 1000;
   - Результат Win/Lose. Якщо випадкове число парне - виводити користувачурезультат Win.В іншому випадку виводити користувачу результат Lose;
   -  Сума Win:

   Якщо випадкове число більше 900, сума виграшу повинна складати 80%
   від випадкового числа;
   Якщо випадкове число більше 600, сума виграшу повинна складати 60%
   від випадкового числа;
   Якщо випадкове число більше 300, сума виграшу повинна складати 20%
   від випадкового числа;
   Якщо випадкове число менше 300, сума виграшу повинна складати 10%
   від випадкового числа.

3) Работа з БД:
   У БД повинні зберігатися дані:
   - Зареєстрованих користувачів;
   - Результатів натискання на кнопку "Мені пощастить".

4) Адмiн. панель:
   У адмін. панелі необхідно реалізувати наступні функції:
   - Список всіх користувачів
   - Редагування користувача;
   - Створення користувача;
   - Видалення користувача.


## Setting up the project



    Clone the repository
    Run composer install
    Configure Laravel directory permissions (documentation)
    Create a database and setup the database configuration inside .env
    Run php artisan key:generate
    Run php artisan migrate --seed
    Run npm install

Admin panel link (id = 1 in DB) = /home/fhuefhreifyegyrfgtweeuyg

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
