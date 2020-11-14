<!DOCTYPE html>
<html>
<head>
	<title>Отзыв о товаре</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css\bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css\style2.css">
</head>
<body>
    <?php
    	require_once 'otziv.php'; // подключаем скрипт
    	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['content'])){
    		// подключаемся к серверу
    		$link = mysqli_connect('127.0.0.1', "b91946q7_saims", "Saims2000", "b91946q7_saims") or die("Ошибка " . mysqli_error($link));
    		//получение значений с формы
    		$marks = htmlentities(mysqli_real_escape_string($link, $_POST['marks']));
    		$name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    		$email = htmlentities(mysqli_real_escape_string($link, $_POST['email']));
    		$content = htmlentities(mysqli_real_escape_string($link, $_POST['content']));
    		// создание строки запроса
    		$query ="INSERT INTO message VALUES(NULL, '$marks','$name', '$email','$content',NOW())";
    		// выполняем запрос
    		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    		// закрываем подключение
    		mysqli_close($link);
    		//сообщение о учтении отзыва
    		echo '<script>
    		    alert("Отзыв учтен!");
    			location.href= "index.php";
    		</script>';
    	}
    ?>
    <?php
        //подключеине к бд
        $connect_db = mysql_connect("localhost", "b91946q7_saims", "Saims2000");
        mysql_select_db("b91946q7_saims", $connect_db);
        //получение количества строк
        $posts = mysql_query("SELECT * FROM message", $connect_db);
        $num_rows = mysql_num_rows( $posts );
    ?>
    <div class="container-fluid">
    	<form method="POST">
    	    <div class="row" id="frow">
    			<div class="col-lg-1 col-lg-offset-1 col-md-1 col-md-offset-1 col-sm-1 col-sm-offset-1 col-xs-1 col-xs-offset-1">
    				<input type="button" value="На главную" onclick="window.location='index.php'">
    			</div>
    			<div class="col-lg-1 col-lg-offset-8 col-md-1 col-md-offset-8 col-sm-3 col-sm-offset-7 col-xs-3 col-xs-offset-6">
    				<input type="button" value="Отзывы (<?= $num_rows;?>)" onclick="window.location='allotzivi.php'">
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-6 col-xs-offset-1">
    				<p><strong>Отзыв о товаре</strong></p>
    			</div>			
    		</div>
    		<div class="row">
    			<div class="col-lg-6 col-lg-offset-1 col-md-9 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
    				<p>Все поля обязательны для заполнения</p>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-6 col-xs-offset-1">
    				<p><strong>Оцените товар</strong></p>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-lg-1 col-lg-offset-1 col-md-1 col-md-offset-1 col-sm-1 col-sm-offset-1 col-xs-1 col-xs-offset-1">
    				<div class="rating-area">
    					<input type="radio" id="star-5" name="marks" value="5" required>
    					<label for="star-5" title="Оценка «5»"></label>	
    					<input type="radio" id="star-4" name="marks" value="4" required>
    					<label for="star-4" title="Оценка «4»"></label>    
    					<input type="radio" id="star-3" name="marks" value="3" required>
    					<label for="star-3" title="Оценка «3»"></label>  
    					<input type="radio" id="star-2" name="marks" value="2" required>
    					<label for="star-2" title="Оценка «2»"></label>    
    					<input type="radio" id="star-1" name="marks" value="1" required>
    					<label for="star-1" title="Оценка «1»"></label>
    				</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-8 col-xs-offset-1">
    				<p>
    					Введите имя<br>
    					<input type="text" name="name" required>
    				</p>
    			</div>
    			<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-8 col-xs-offset-1">
    				<p>
    					Email<br>
    					<input type="email" name="email" required>
    				</p>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
    				<p>
    					Сообщение<br>
    					<textarea name="content" required></textarea>
    				</p>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-8 col-xs-offset-1">
    				<input type="submit" id="otbtn" value="Оставить отзыв">
    			</div>
    		</div>
    	</form>
    </div>
</body>
</html>