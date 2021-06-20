<?php
include "figures_classes.php";
?>

<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Task3_EffectiveGroup</title>
</head>
<body class="background_body">
	<pre>
		<?php

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

			$fileName = "objectFigure.txt";

			// Запись в файл
			$dataPut = serialize($array);
			file_put_contents($fileName, $dataPut);

			// Чтение из файла
			if (file_exists($fileName)) {
				if ($dataGet = file_get_contents($fileName)) {
					try {
						$dataGet = unserialize($dataGet);
					} catch (Exception $e) {
						echo "Объекты не обнаружены";
					}
				}
			} else {
				echo "Файла не существует";
			}
			$countDataGet = count($dataGet);

			echo "\n \r";
			echo "\n \r";
			echo "Список случайно сформированных фигур фигур из файла";
			echo "\n \r";
			echo "\n \r";

			for ($i = 0; $i < $countDataGet; $i++) {
				echo $dataGet[$i]->getTitle();
				echo $dataGet[$i]->getFigureArea();
				echo "\n";
			}

			echo "\n \r";
			echo "\n \r";
			echo "Результат сортировки фигур";
			echo "\n \r";
			echo "\n \r";

			// Сортировка простым выбором
			$RightBorder = $countDataGet;
			for ($i = 0; $i < $countDataGet; $i++) {
				$MinArea = $dataGet[0]->getFigureArea();
				$Min = $dataGet[0];
				$iMin = 0;
				for ($j = 0; $j < $RightBorder; $j++) {
					if ($dataGet[$j]->getFigureArea() < $MinArea) {
						$MinArea = $dataGet[$j]->getFigureArea();
						$Min = $dataGet[$j];
						$iMin = $j;
					}
				}
				$dataGet[$iMin] = $dataGet[$RightBorder - 1];
				$dataGet[$RightBorder - 1] = $Min;
				$RightBorder--;
			}

			for ($i = 0; $i < $countDataGet; $i++) {
				echo $dataGet[$i]->getTitle();
				echo $dataGet[$i]->getFigureArea();
				echo "\n";
			}

		?>
	</pre>
</body>
</html>