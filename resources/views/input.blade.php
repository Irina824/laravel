@if($error != '')
    <div>
        <ul>
           <li> <span style="color:#db1689"> {{ $error }} </span></li>
        </ul>
    </div>
@endif
<form method="post" action="/input">
    @csrf
    <div id="myEkstr">
        <hr>
        <span style="color:#008080"> Экстрасенсы считают,что вы загадали указанные числа: </span>
        <table border="0">

            <?php for ($i = 1; $i < Session::get('countExtrasens')+1; $i++) { ?>
                <tr align="center">
                    <td>Экстрасенс {{ $i }} : <?= Session::get('extr'.$i) ?> </td>
                </tr>
            <? } ?>

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
    let element = document.getElementById('setNumber');
    let maskOptions = {
        mask: '00',
        lazy: false
    }
    let mask = new IMask(element, maskOptions);
</script>
