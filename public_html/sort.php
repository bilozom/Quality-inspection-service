<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Отчеты</title>
        <link rel="stylesheet" type="text/css" href="css/otchet.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    </head>
    <body>
        <div class="container-fluid text-center">
    		<div class="row">
                <form action="sort.php">
                    <button class="btn col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-2 col-xs-offset-1">Все</button>
                    <input class="btn col-lg-2 col-lg-offset-2 col-md-2 col-md-offset-2 col-sm-2 col-sm-offset-2 col-xs-3 col-xs-offset-1" type="button" value="По возрастанию" onclick="rez1()">
                    <input class="btn col-lg-2 col-lg-offset-2 col-md-2 col-md-offset-2 col-sm-2 col-sm-offset-2 col-xs-3 col-xs-offset-1" type="button" value="По убыванию" onclick="rez2()">
                </form>
            </div>
            <div class="c">
                <table id="table" align=center>
                    <tr>
                    <th>Оценка товара</th>
                    <th>Имя</th>
                    <th>Дата отзыва</th>
                    </tr>
                    <?php
                        require_once 'sort.php'; // подключаем скрипт
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
                                $result .= '<tr>';
                                // вставка в таблицу отзыва с оценкой 1
                                if($elem['marks']==1){
                                    $elem['marks']=★;
                                    $result .= '<td class="s1 star">' . $elem['marks'] . '</td>';
                                    $result .= '<td class="s1">' . $elem['name'] . '</td>';
                                    $result .= '<td class="s1">' . $elem['date'] . '</td>';
                                }
                                // вставка в таблицу отзыва с оценкой 2
                                if($elem['marks']==2){
                                    $elem['marks']=★★;
                                    $result .= '<td class="s2 star">' . $elem['marks'] . '</td>';
                                    $result .= '<td class="s2">' . $elem['name'] . '</td>';
                                    $result .= '<td class="s2">' . $elem['date'] . '</td>';
                                }     
                                // вставка в таблицу отзыва с оценкой 3
                                if($elem['marks']==3){
                                    $elem['marks']=★★★;
                                    $result .= '<td class="s3 star">' . $elem['marks'] . '</td>';
                                    $result .= '<td class="s3">' . $elem['name'] . '</td>';
                                    $result .= '<td class="s3">' . $elem['date'] . '</td>';
                                }
                                // вставка в таблицу отзыва с оценкой 4
                                if($elem['marks']==4){
                                    $elem['marks']=★★★★;
                                    $result .= '<td class="s4 star">' . $elem['marks'] . '</td>';
                                    $result .= '<td class="s4">' . $elem['name'] . '</td>';
                                    $result .= '<td class="s4">' . $elem['date'] . '</td>';
                                }
                                // вставка в таблицу отзыва с оценкой 5
                                if($elem['marks']==5){
                                    $elem['marks']=★★★★★;
                                    $result .= '<td class="s5 star">' . $elem['marks'] . '</td>';
                                    $result .= '<td class="s5">' . $elem['name'] . '</td>';
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
            
            <script>
                //скрипт сортировки по убыванию
                function rez1(){
                    let sortedRows = Array.from(table.rows).slice(1).sort((rowA, rowB) => rowA.cells[0].innerHTML > rowB.cells[0].innerHTML ? 1 : -1);
                    table.tBodies[0].append(...sortedRows);
                }
                //скрипт сортировки по возрастанию
                function rez2(){
                    let sortedRows = Array.from(table.rows).slice(1).sort((rowA, rowB) => rowA.cells[0].innerHTML > rowB.cells[0].innerHTML ? -1 : 1);
                    table.tBodies[0].append(...sortedRows);
                }
            </script>
            <div class="col-lg-1 col-lg-offset-1 col-md-1 col-md-offset-1 col-sm-1 col-sm-offset-1 col-xs-1 col-xs-offset-1">
    			<input class="btn b" type="button" value="Назад" onclick="window.location='admin.php'">
    		</div>
        </div>
    </body>
</html>