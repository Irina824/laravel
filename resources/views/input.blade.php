<form method="post" action="/input">
    @csrf
    <div id="myEkstr">
        <hr>
        <span style="color:#008080"> Экстрасенсы считают,что вы загадали указанные числа: </span>
        <table border="0">
            <tr>
                <td>Первый</td>
                <td>Второй</td>
            </tr>
            <tr align="center">
                <td> <input type="text" name="setEkstr1" id="setEkstr1" size="5" readonly value="<? echo Session::get('ekstr1') ?>"> </td>
                <td> <input type="text" name="setEkstr2" id="setEkstr2" size="5" readonly value="<? echo Session::get('ekstr2') ?>"> </td>
            </tr>
        </table>

        <br>
        <span style="color:#008080"> Введите двухзначное число, которое вы загадали: </span>
        <br>
        <input type="text" name="setNumber" id="setNumber">
        <input type="submit" class="btn btn-success" value="ok" name="ok">
    </div>
</form>

<script src="https://unpkg.com/imask"> </script>
<script>
    var element = document.getElementById('setNumber');
    var maskOptions = {
        mask: '00',
        lazy: false
    }
    var mask = new IMask(element, maskOptions);

</script>
