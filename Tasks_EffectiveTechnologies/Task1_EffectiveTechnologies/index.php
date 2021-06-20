<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Task1_EffectiveGroup</title>	
</head>
<body>
	<pre>

<?php
			$Str1 = "get-books-count";
			$Str2 = "Set_Currency_Value";
			$Str3 = "  my exAmPlE __   __get_table--  --NAME-for_-_-  ---list  ";

			echo $Str1;
			echo "\n Результат: \n";
			echo StringToCamelCase($Str1), "\n \r";

			echo $Str2;
			echo "\n Результат: \n";
			echo StringToCamelCase($Str2), "\n \r";

			echo $Str3;
			echo "\n Результат: \n";
			echo StringToCamelCase($Str3), "\n \r";

		function StringToCamelCase($Str)
		{
			$StrRes = "";
			$j = 0;
			$chekFirstLetter = 0;
			$chekNewWord = 1;

			for ($i = 0; $i < strlen($Str); $i++) {
														  
				if (($Str[$i] != "-") && ($Str[$i] != "_") && ($Str[$i] != " ")) {

					if (($chekFirstLetter == 0) && ($chekNewWord == 1)) {
						$StrRes[$j] = $Str[$i];
						$chekFirstLetter = 1;
					} else if ($chekNewWord == 1) {
						$StrRes[$j] = strtoupper($Str[$i]);
					} else {
						$StrRes[$j] = strtolower($Str[$i]);
					}
					$j++;
					$chekNewWord = 0;
					
				} else {
					$chekNewWord = 1;
				}
			}
			return $StrRes;
		}

?>
	</pre>
</body>
</html>