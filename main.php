<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Kutsyn Vladymyr ITech 5 lab</title>
</head>
<body>
	<br>
	<form action="user statistic.php" method="GET"> <!-- 1 -->
		<label>Статистика работы в сети клиента (по имени клиента):</label>
		
		<select name='username'>
			<?php
				include 'bd.php';
				$Name_Select = "SELECT name FROM client";
				$sth = $conn->prepare($Name_Select);
				$sth->execute();
				
				$result = $sth->fetchAll(PDO::FETCH_NUM);

				echo '<option selected = "selected">Выберите пользователя</option>';

				foreach($result as $name)
				{
					echo "<option>$name[0]</option>";
				}
				$conn=null;
			?>
			</select>
		<input type="submit">
	</form>

	<br>
	<form action="time interval statistic.php" method="GET"><!-- 2 -->
		<label>Статистика работы сети за указанный промужуток времени:</label>
		<br>
		С <input type="datetime-local" name = "startTime">
		<br>
		По <input type="datetime-local" name = "endTime">
		<br>
		<input type="submit">
	</form>



	<br>
	<form action="zero balance users.php" method="GET"><!-- 3 -->
		<label>Список клиентов с отрицательным балансом:</label>
		<br>
		<input type="submit">
	</form>
</body>
</html>
