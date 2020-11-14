<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Отчеты</title>
        <link rel="stylesheet" type="text/css" href="css/otchet.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="container-fluid text-center">
    		<div class="row">
                <form method="post" action="otchet2.php">
                    <button class="btn col-lg-1 col-lg-offset-1 col-md-1 col-md-offset-1 col-sm-2 col-xs-2">Очистить</button>
                    <select class="btn col-lg-1 col-lg-offset-2 col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-2 col-xs-offset-1" name="ms">
                        <option value="">Оценка</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <select class="btn col-lg-1 col-lg-offset-2 col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-2 col-xs-offset-1" name="bm">
                        <option value="">Условие</option>
                        <option value="big">Больше</option>
                        <option value="min">Меньше</option>
                    </select>
                    <input class="btn col-lg-1 col-lg-offset-2 col-md-1 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-2 col-xs-offset-1" type="submit" value="Выбрать">
                </form>
            </div>
            <div class="c">
                <table align="center">
                    <tr>
                    <th>Оценка товара</th>
                    <th>Сообщение</th>
                    <th>Дата отзыва</th>
                    </tr>
                    <?php
                    require_once 'otchet2.php'; // подключаем скрипт
                        $ms  = $_POST["ms"];
                		$bm  = $_POST["bm"];
                		// подключаемся к серверу
                		$link = mysqli_connect('127.0.0.1', "b91946q7_saims", "Saims2000", "b91946q7_saims") or die("Ошибка " . mysqli_error($link));
                		// создание строки запроса
                		$query = 'SELECT * FROM message';
                		// выполняем запрос
                		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
                		if ( mysqli_num_rows($result) == 0 )
                        {
                            echo '<tr><td colspan=3>Список пуст!</td></tr>';
                        }
                        else {
                            for ($r = []; $row = mysqli_fetch_assoc($result); $r[] = $row);
                            {
                            $result = '';
                            // цикл перебора массива данных из БД
                            foreach ($r as $elem) {
                                //вывод информации об отзыве с оценкой 1
                                if($elem['marks']==1 && $elem['marks']== $ms && $bm==""){
                                    $result .= '<tr>';
                                    $elem['marks']=★;
                                    $result .= '<td class="s1 star">' . $elem['marks'] . '</td>';
                                    $result .= '<td class="s1">' . $elem['message'] . '</td>';
                                    $result .= '<td class="s1">' . $elem['date'] . '</td>';
                                    $result .= '</tr>';
                                    if($elem['marks']==2)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==3)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==4)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==5)
                                        $result .= '<tr class="_rowToDelete">';
                                }
                                //вывод информации,где оценка меньше 1
                                if($elem['marks']==1 && $elem['marks']== $ms && $bm=="min"){
                                    $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==2)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==3)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==4)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==5)
                                        $result .= '<tr class="_rowToDelete">';
                                }
                                //вывод информации,где оценка больше 1
                                if($ms==1 && $bm=="big"){
                                    if($elem['marks']==2){
                                        $result .= '<tr>';
                                        $elem['marks']=★★;
                                        $result .= '<td class="s2 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s2">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s2">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                    if($elem['marks']==3){
                                        $result .= '<tr>';
                                        $elem['marks']=★★★;
                                        $result .= '<td class="s3 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s3">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s3">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                    if($elem['marks']==4){
                                        $result .= '<tr>';
                                        $elem['marks']=★★★★;
                                        $result .= '<td class="s4 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s4">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s4">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                    if($elem['marks']==5){
                                        $result .= '<tr>';
                                        $elem['marks']=★★★★★;
                                        $result .= '<td class="s5 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s5">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s5">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                }
                                //вывод информации об отзыве с оценкой 2
                                if($elem['marks']==2 && $elem['marks']== $ms && $bm==""){
                                    $result .= '<tr>';
                                    $elem['marks']=★★;
                                    $result .= '<td class="s2 star">' . $elem['marks'] . '</td>';
                                    $result .= '<td class="s2">' . $elem['message'] . '</td>';
                                    $result .= '<td class="s2">' . $elem['date'] . '</td>';
                                    $result .= '</tr>';
                                    if($elem['marks']==1)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==3)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==4)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==5)
                                        $result .= '<tr class="_rowToDelete">';
                                }
                                //вывод информации,где оценка меньше 2
                                if($ms==2 && $bm=="min"){
                                    if($elem['marks']==1){
                                        $result .= '<tr>';
                                        $elem['marks']=★;
                                        $result .= '<td class="s1 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s1">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s1">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                        if($elem['marks']==2)
                                            $result .= '<tr class="_rowToDelete">';
                                        if($elem['marks']==3)
                                            $result .= '<tr class="_rowToDelete">';
                                        if($elem['marks']==4)
                                            $result .= '<tr class="_rowToDelete">';
                                        if($elem['marks']==5)
                                            $result .= '<tr class="_rowToDelete">';
                                    }
                                }
                                //вывод информации,где оценка больше 2
                                if($ms==2 && $bm=="big"){
                                    if($elem['marks']==3){
                                        $result .= '<tr>';
                                        $elem['marks']=★★★;
                                        $result .= '<td class="s3 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s3">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s3">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                    if($elem['marks']==4){
                                        $result .= '<tr>';
                                        $elem['marks']=★★★★;
                                        $result .= '<td class="s4 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s4">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s4">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                    if($elem['marks']==5){
                                        $result .= '<tr>';
                                        $elem['marks']=★★★★★;
                                        $result .= '<td class="s5 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s5">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s5">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                }
                                //вывод информации об отзыве с оценкой 3
                                if($elem['marks']==3 && $elem['marks']== $ms && $bm==""){
                                    $result .= '<tr>';
                                    $elem['marks']=★★★;
                                    $result .= '<td class="s3 star">' . $elem['marks'] . '</td>';
                                    $result .= '<td class="s3">' . $elem['message'] . '</td>';
                                    $result .= '<td class="s3">' . $elem['date'] . '</td>';
                                    $result .= '</tr>';
                                    if($elem['marks']==1)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==2)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==4)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==5)
                                        $result .= '<tr class="_rowToDelete">';
                                }
                                //вывод информации,где оценка меньше 3
                                if($ms==3 && $bm=="min"){
                                    if($elem['marks']==1){
                                        $result .= '<tr>';
                                        $elem['marks']=★;
                                        $result .= '<td class="s1 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s1">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s1">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                    if($elem['marks']==2){
                                        $result .= '<tr>';
                                        $elem['marks']=★★;
                                        $result .= '<td class="s2 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s2">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s2">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                }
                                //вывод информации,где оценка больше 3
                                if($ms==3 && $bm=="big"){
                                    if($elem['marks']==4){
                                        $result .= '<tr>';
                                        $elem['marks']=★★★★;
                                        $result .= '<td class="s4 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s4">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s4">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                    if($elem['marks']==5){
                                        $result .= '<tr>';
                                        $elem['marks']=★★★★★;
                                        $result .= '<td class="s5 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s5">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s5">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                }
                                //вывод информации об отзыве с оценкой 4
                                if($elem['marks']==4 && $elem['marks']== $ms && $bm==""){
                                    $result .= '<tr>';
                                    $elem['marks']=★★★★;
                                    $result .= '<td class="s4 star">' . $elem['marks'] . '</td>';
                                    $result .= '<td class="s4">' . $elem['message'] . '</td>';
                                    $result .= '<td class="s4">' . $elem['date'] . '</td>';
                                    $result .= '</tr>';
                                    if($elem['marks']==1)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==2)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==3)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==5)
                                        $result .= '<tr class="_rowToDelete">';
                                }
                                //вывод информации,где оценка меньше 4
                                if($ms==4 && $bm=="min"){
                                    if($elem['marks']==1){
                                        $result .= '<tr>';
                                        $elem['marks']=★;
                                        $result .= '<td class="s1 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s1">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s1">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                    if($elem['marks']==2){
                                        $result .= '<tr>';
                                        $elem['marks']=★★;
                                        $result .= '<td class="s2 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s2">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s2">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                    if($elem['marks']==3){
                                        $result .= '<tr>';
                                        $elem['marks']=★★★;
                                        $result .= '<td class="s3 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s3">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s3">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                }
                                //вывод информации,где оценка больше 4
                                if($ms==4 && $bm=="big"){
                                    if($elem['marks']==5){
                                        $result .= '<tr>';
                                        $elem['marks']=★★★★★;
                                        $result .= '<td class="s5 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s5">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s5">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                }
                                //вывод информации об отзыве с оценкой 5
                                if($elem['marks']==5 && $elem['marks']== $ms && $bm==""){
                                    $result .= '<tr>';
                                    $elem['marks']=★★★★★;
                                    $result .= '<td class="s5 star">' . $elem['marks'] . '</td>';
                                    $result .= '<td class="s5">' . $elem['message'] . '</td>';
                                    $result .= '<td class="s5">' . $elem['date'] . '</td>';
                                    $result .= '</tr>';
                                    if($elem['marks']==1)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==2)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==3)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==4)
                                        $result .= '<tr class="_rowToDelete">';
                                }
                                //вывод информации,где оценка меньше 5
                                if($ms==5 && $bm=="min"){
                                    if($elem['marks']==1){
                                        $result .= '<tr>';
                                        $elem['marks']=★;
                                        $result .= '<td class="s1 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s1">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s1">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                    if($elem['marks']==2){
                                        $result .= '<tr>';
                                        $elem['marks']=★★;
                                        $result .= '<td class="s2 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s2">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s2">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                    if($elem['marks']==3){
                                        $result .= '<tr>';
                                        $elem['marks']=★★★;
                                        $result .= '<td class="s3 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s3">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s3">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                    if($elem['marks']==4){
                                        $result .= '<tr>';
                                        $elem['marks']=★★★★;
                                        $result .= '<td class="s4 star">' . $elem['marks'] . '</td>';
                                        $result .= '<td class="s4">' . $elem['message'] . '</td>';
                                        $result .= '<td class="s4">' . $elem['date'] . '</td>';
                                        $result .= '</tr>';
                                    }
                                }
                                //вывод информации,где оценка больше 5
                                if($ms==5 && $bm=="big"){
                                    $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==2)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==3)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==4)
                                        $result .= '<tr class="_rowToDelete">';
                                    if($elem['marks']==1)
                                        $result .= '<tr class="_rowToDelete">';
                                }
                            }
                        echo $result;
                        }
                		// закрываем подключение
                		mysqli_close($link);
                        }
                    ?>
                </table>
            </div>
            <script type="text/javascript">
                // скрипт удаления строки в таблице
        	    $(function() {
                  $("#removeBtn").click(function() {
                    $("._rowToDelete").remove() ;
                  });
                }) ;
            </script>
            <div class="col-lg-1 col-lg-offset-1 col-md-1 col-md-offset-1 col-sm-1 col-sm-offset-1 col-xs-1 col-xs-offset-1">
    				<input class="btn b" type="button" value="Назад" onclick="window.location='admin.php'">
    		</div>
        </div>
    </body>
</html>