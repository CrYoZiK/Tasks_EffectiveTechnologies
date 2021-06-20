<?php
include "figures_classes.php";
//include "function.php";
?>

<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Task3_EffectiveGroup</title>
</head>
<body class="background_body">
	<pre>
		<?php

			echo "Результат сортировки фигур, полученных из файла, \n с предыдущего запуска, если есть";
			echo "\n \r";
			echo "\n \r";

			$fileName = "objectFigure.txt";
			// Чтение из файла
			$dataGet = getFigureFromFile($fileName);
			echoSortFigureAreaAndTitle($dataGet);

			echo "\n \r";
			echo "\n \r";
			echo "Тест Список используемых заводов";
			echo "\n \r";
			echo "\n \r";

			//Массив заводво, которые будет использовать случайный завод
			$Factorys[0] = new FactoryRectangle;
			$Factorys[1] = new FactoryCircle;
			$Factorys[2] = new FactoryTriangle;

			$RandomFactory = new FactoryRandomFigure($Factorys);

			$CountFigureObj = 20; //количество создаваемых фигур
			print_r($Factorys);

			echo "\n \r";
			echo "\n \r";
			echo "Список случайно сформированных фигур фигур";
			echo "\n \r";
			echo "\n \r";

			srand(time());
			//Создание объектов
			for ($i = 0; $i < $CountFigureObj; $i++) {
				$array[$i] = $RandomFactory->Create();
				echo $array[$i]->getTitle();
				echo $array[$i]->getFigureArea();
				echo "\n";
			}

			// Запись в файл
			$dataPut = serialize($array);
			file_put_contents($fileName, $dataPut);

			unset($dataGet);
			// Чтение из файла
			$dataGet = getFigureFromFile($fileName);
			$countDataGet = count($dataGet);

			echo "\n \r";
			echo "\n \r";
			echo "Список случайно сформированных фигур фигур из файла, \n если есть";
			echo "\n \r";
			echo "\n \r";

			if ($dataGet != NULL) {
				for ($i = 0; $i < $countDataGet; $i++) {
					echo $dataGet[$i]->getTitle();
					echo $dataGet[$i]->getFigureArea();
					echo "\n";
				}
			}

			echo "\n \r";
			echo "\n \r";
			echo "Результат сортировки фигур из файла, если есть";
			echo "\n \r";
			echo "\n \r";

			echoSortFigureAreaAndTitle($dataGet);

		?>
	</pre>
</body>
</html>