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

            <?php for ($i = 1; $i < Session::get('countExtrasens')+1; $i++) { ?>
                <tr>
                    <td> <span style="color:#db1689"> Экстрасенс {{$i}}: </span> <?= Session::get('extrAll'.$i) ?> </td>
                </tr>
            <? } ?>

        </table>
        <br>
        <span style="color:#008080"> История чисел пользователя: </span>
        <table border="0">
            <tr>
                <td> <span style="color:#db1689"> Пользователь: </span> </td>
                <td>{{ $userAll }}</td>
            </tr>
        </table>

        <br>
        <span style="color:#008080"> Достоверность (кол-во правильных ответов / к общему числу догадок): </span>
        <table border="0">

            <?php for ($i = 1; $i < Session::get('countExtrasens')+1; $i++) { ?>
                <tr>
                    <td> <span style="color:#db1689"> Экстрасенс <?= $i ?> : </span> </td>
                    <td><?= Session::get('trustTrue'.$i) ?></td>
                </tr>
            <? } ?>

        </table>
    </div>
</form>
</body>
</html>
