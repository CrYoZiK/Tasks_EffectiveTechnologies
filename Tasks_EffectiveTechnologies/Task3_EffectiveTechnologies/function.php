<?php

function getTitleString($obj)
{
	echo "Привет, я ", get_class($obj), ", Моя площадь = ";
}
function echoSortFigureAreaAndTitle($dataGet)
{
	if ($dataGet != NULL) {
		$countDataGet = count($dataGet);
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
	} else {
		echo "Объекты отсутствуют";
	}
}
function getFigureFromFile($fileName)
{
	if (file_exists($fileName)) {
		$dataGet = file_get_contents($fileName);
		if($dataGet = unserialize($dataGet)) {
			return $dataGet;
		} else {
			echo "сериализация не удалась \n";
		}
	} else {
		echo "Файла не существует \n";
	}
}
