<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
</head>
<body>
<form method="post" action="/think">
    @csrf
    <div class="bg-light p-5 rounded">
        <h2>Веб-приложение для проведения тестирования экстрасенсов</h2>
        <p class="lead" style="color:#db1689">Загадайте двухзначное число и нажмите кнопку</p>
        <button type="submit" class="btn btn-success">OK »</button>

        <hr>
        <span style="color:#008080"> История догадок экстрасенсов: </span>
        <table border="0">
            <tr>
                <td>Первый:</td>
                <td><? echo Session::get('ekstr1_all') ?></td>
            </tr>
            <tr>
                <td>Второй:</td>
                <td><? echo Session::get('ekstr2_all') ?></td>
            </tr>
        </table>
        <br>
        <span style="color:#008080"> История чисел пользователя: </span>
        <table border="0">
            <tr>
                <td>Пользователь:</td>
                <td><? echo Session::get('user_all') ?></td>
            </tr>
        </table>

        <br>
        <span style="color:#008080"> Достоверность (кол-во правильных ответов / к общему числу догадок): </span>
        <table border="0">
            <tr>
                <td>Экстрасенс 1:</td>
                <td><? echo Session::get('trust1')/Session::get('trustCount') ?></td>
            </tr>
            <tr>
                <td>Экстрасенс 2:</td>
                <td><? echo Session::get('trust2')/Session::get('trustCount') ?></td>
            </tr>
        </table>
    </div>
</form>
</body>
</html>
