<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Вывод данных из БД</title>
        <link rel="stylesheet" type="text/css" href="css/otchet.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    </head>
    <body>
        <div class="c">
            <table align=center>
                <tr>
                <th id="t1">Оценка</th>
                <th id="t2">Имя</th>
                <th id="t3">Email</th>
                <th id="t4">Отзыв</th>
                <th id="t5">Дата</th>
                </tr>
                <?php
                require_once 'allotzivi.php'; // подключаем скрипт
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
                        //вставка отзыва с оценкой 1
                        $result .= '<tr>';
                        if($elem['marks']==1){
                            $elem['marks']=★;
                            $result .= '<td class="s1 star">' . $elem['marks'] . '</td>';
                            $result .= '<td class="s1">' . $elem['name'] . '</td>';
                            $result .= '<td class="s1">' . $elem['email'] . '</td>';
                            $result .= '<td class="s1">' . $elem['message'] . '</td>';
                            $result .= '<td class="s1">' . $elem['date'] . '</td>';
                        }
                        //вставка отзыва с оценкой 2
                        if($elem['marks']==2){
                            $elem['marks']=★★;
                            $result .= '<td class="s2 star">' . $elem['marks'] . '</td>';
                            $result .= '<td class="s2">' . $elem['name'] . '</td>';
                            $result .= '<td class="s2">' . $elem['email'] . '</td>';
                            $result .= '<td class="s2">' . $elem['message'] . '</td>';
                            $result .= '<td class="s2">' . $elem['date'] . '</td>';
                        }
                        //вставка отзыва с оценкой 3
                        if($elem['marks']==3){
                            $elem['marks']=★★★;
                            $result .= '<td class="s3 star">' . $elem['marks'] . '</td>';
                            $result .= '<td class="s3">' . $elem['name'] . '</td>';
                            $result .= '<td class="s3">' . $elem['email'] . '</td>';
                            $result .= '<td class="s3">' . $elem['message'] . '</td>';
                            $result .= '<td class="s3">' . $elem['date'] . '</td>';
                        }
                        //вставка отзыва с оценкой 4
                        if($elem['marks']==4){
                            $elem['marks']=★★★★;
                            $result .= '<td class="s4 star">' . $elem['marks'] . '</td>';
                            $result .= '<td class="s4">' . $elem['name'] . '</td>';
                            $result .= '<td class="s4">' . $elem['email'] . '</td>';
                            $result .= '<td class="s4">' . $elem['message'] . '</td>';
                            $result .= '<td class="s4">' . $elem['date'] . '</td>';
                        }
                        //вставка отзыва с оценкой 5
                        if($elem['marks']==5){
                            $elem['marks']=★★★★★;
                            $result .= '<td class="s5 star">' . $elem['marks'] . '</td>';
                            $result .= '<td class="s5">' . $elem['name'] . '</td>';
                            $result .= '<td class="s5">' . $elem['email'] . '</td>';
                            $result .= '<td class="s5">' . $elem['message'] . '</td>';
                            $result .= '<td class="s5">' . $elem['date'] . '</td>';
                        }
                        $result .= '</tr>';
                    }
                    echo $result;
                    }
            		// закрываем подключение
            		mysqli_close($link);
                    }
                ?>
            </table>
        </div>
        <div class="container-fluid">
    	    <div class="row" id="frow">
    			<div class="col-lg-1 col-lg-offset-1 col-md-1 col-md-offset-1 col-sm-1 col-sm-offset-1 col-xs-1 col-xs-offset-1">
    				<input class="btn" type="button" value="На главную" onclick="window.location='index.php'">
    			</div>
    			<div class="col-lg-1 col-lg-offset-8 col-md-1 col-md-offset-8 col-sm-3 col-sm-offset-7 col-xs-3 col-xs-offset-6">
    				<input class="btn" type="button" value="Назад" onclick="window.location='otziv.php'">
    			</div>
    		</div>
    	</div>
    </body>
</html>