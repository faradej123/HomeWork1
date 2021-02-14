<?php
function fromDecimalToBinary($decimalNumber){ 
    if ($decimalNumber > 0 && $decimalNumber <= 65536){
        $excessList = array();
        while ($decimalNumber > 0){
		    $excess = $decimalNumber % 2;
		    $decimalNumber = floor($decimalNumber / 2);
		    array_unshift($excessList, $excess);
		}
        $binaryNum = (binary)implode($excessList);
        return ($binaryNum);
    } elseif ($decimalNumber == 0){
		return (string)0;
	}
    else return false;
}

function fromBinaryToDecimal($binaryNum){
	if (preg_match('/^[01]{1,16}$/', $binaryNum) || $binaryNum == "10000000000000000"){
		$binaryArr = str_split($binaryNum);
		$binaryArr = array_reverse($binaryArr);
		$decimalArr = array();
		for ($pow = 0; $pow < count($binaryArr); $pow++){
			if ($binaryArr[$pow] == "1"){
				array_push($decimalArr, pow(2, $pow));
			}
		}
		return array_sum($decimalArr);
	}
	else return false;
}

function showFibonacciNumbers($countOfFibNum){
	if ($countOfFibNum > 0){
		$firstFib = 1;
		$secondFib = 1;
		for ($i = 0; $i < $countOfFibNum; $i++) {
			if($i > 1){
				$nextFib = $firstFib + $secondFib;
				echo ", " . $nextFib;
				$firstFib = $secondFib;
				$secondFib = $nextFib;
			}
			elseif($i == 0){
				echo $firstFib;
			}elseif($i == 1){
				echo ", " . $secondFib;
			}
		}
	} else {
		return false;
	}
}

function myPow($num, $pow){
	if(is_numeric($num) && is_numeric($pow)){
		 if ($pow > 0 || $pow < 0) {
			$moduleOfPow = abs($pow);
			$numResult = $num;
			for($i = 1; $i < $moduleOfPow; $i++){
				$numResult *= $num;
			}
			$numResult = ($pow < 0) ? (1/$numResult) : $numResult;
			return $numResult;
		} elseif ($pow == 0){
			return 1;
		} else return false;
	} else {
		return false;
	}
}

function checkIfTheIpIsInTheRange($ip){
	if(!ipVerification($ip)){
		return NULL;
	}
	$verifiableIp = addZeroToIP($ip);
	$ipRanges = array(
		array("010.010.001.100", "010.255.255.255"),
		array("172.031.000.000", "172.031.255.255"),
		array("180.168.000.000", "180.168.255.250"),
		array("192.168.100.250", "192.168.200.100"),
	);
	foreach($ipRanges as $oneOfRange){
		if($verifiableIp >= $oneOfRange[0] && $verifiableIp <= $oneOfRange[1]){
			return true;
		}
	}
	return false;
}

function ipVerification($ip){
	$ipInArr = explode(".", $ip);
	if(count($ipInArr) != 4){
		return false;
	}else{
		foreach($ipInArr as $ipPart){
			$a = !ctype_digit((string)$ipPart);
			$b = ($ipPart < 0 || $ipPart > 255);
			if(!ctype_digit((string)$ipPart) || ($ipPart < 0 || $ipPart > 255)){
				return false;
			}
		}
	}
	return true;
};

function addZeroToIP($ip){
	$ipArr = explode(".", $ip);
	for($i = 0; $i < count($ipArr); $i++){
		$numLength = strlen($ipArr[$i]);
		if($numLength < 3){
			while(strlen($ipArr[$i]) < 3){
				$ipArr[$i] = "0" . $ipArr[$i];
			}
		}
	}
	return implode(".", $ipArr);
}

//Массивы

function showRatios($someArray){
	$positiveNum = 0;
	$negativeNum = 0;
	$zeroNum = 0; 
	$simpleNum = 0;
	foreach($someArray as $num){
		if($num > 0){
			$positiveNum++;
		}elseif($num < 0){
			$negativeNum++;
		}elseif($num == 0){
			$zeroNum++;
		}

		if($num == 2 || $num == 3){
			$simpleNum++;
		}else{
			$isSimpleNum = false;
			$moduleOfNum = abs($num);
			for($i = 2; $i < $moduleOfNum; $i++){
				if($num % $i){
					$isSimpleNum = true;
				}else{
					$isSimpleNum = false;
					break;
				}
			}
			if($isSimpleNum){
				$simpleNum++;
			}
		}
	}
	$totalNumCount = count($someArray);
	$positiveNumPercent = $positiveNum * 100 / $totalNumCount;
	$negativeNumPercent = $negativeNum * 100 / $totalNumCount;
	$zeroNumPercent = $zeroNum * 100 / $totalNumCount;
	$simpleNumPercent = $simpleNum * 100 / $totalNumCount;
	echo "Позитивных: " . round($positiveNumPercent) . "%<br>Отрицательных: " . round($negativeNumPercent) . "%<br>Нулевых: " . round($zeroNumPercent) . "%<br>Простых: " . round($simpleNumPercent) . "%";
}

function myBubblesort($arrToSort){
	if(!is_array($arrToSort)){
		return NULL;
	}else{
		for($i = 1; $i <= count($arrToSort)-1; $i++){
			for($j = 1; $j <= count($arrToSort)-1; $j++){
				if($arrToSort[$j] < $arrToSort[$j-1]){
					$temp = $arrToSort[$j-1];
					$arrToSort[$j-1] = $arrToSort[$j];
					$arrToSort[$j] = $temp;
				}
			}
		}
	}
	return $arrToSort;
}

function transposeTheMatrix($matrix){
	if(!is_array($matrix) || !verifyMatrixSize($matrix)){
		return NULL;
	} else {
		$newArr = array();
		$matrixCount = count($matrix);
		for($i = 0; $i < $matrixCount; $i++){
			$rowCount = count($matrix[$i]);
			for($j = 0; $j < $rowCount; $j++){
				$newArr[$j][] = $matrix[$i][$j];
			}
		}
		return $newArr;
	}
}

function matrixMultiplication($matrix1, $matrix2){
	if(!verificationForMatrixMultiplication($matrix1, $matrix2)){
		return NULL;
	}else{
		$finalMatrix = array();
		$rowCount = count($matrix1);
		for($i = 0; $i < $rowCount; $i++){
			$columnCount = count($matrix1[$i]);
			for($j = 0; $j < $columnCount; $j++){
				$finalMatrix[$i][$j] = $matrix1[$i][$j] * $matrix2[$i][$j];
			}
		}
		return $finalMatrix;
	}	
}

function verificationForMatrixMultiplication($matrix1, $matrix2){
	if(!array_key_exists(0, $matrix1) || !array_key_exists(0, $matrix2) || !array_key_exists(0, $matrix1[0]) || !array_key_exists(0, $matrix2[0])){
		return false;
	} else {
		$verifyResultMatrix1 = verifyMatrixSize($matrix1);
		$verifyResultMatrix2 = verifyMatrixSize($matrix2);
		if($verifyResultMatrix1 && $verifyResultMatrix2 && $verifyResultMatrix1 == $verifyResultMatrix2){
			return true;
		}else{
			return false;
		}
	}
}

///////////////////////////////////////////////////////////////


function deleteNotValidRowFromMatrix($matrix){
	if(!verifyMatrixSize($matrix)){
		return false;
	}
	$matrixWithValidRow = array();
	$rowCount = count($matrix);
	for($i = 0; $i < $rowCount; $i++){
		$columnCount = count($matrix[$i]);
		$summ = 0;
		$isZero = false;
		for($j = 0; $j < $columnCount; $j++){
			$summ += $matrix[$i][$j];
			if($matrix[$i][$j] == 0){
				$isZero = true;
			}
		}
		if(!($summ > 0 && $isZero)){
			array_push($matrixWithValidRow, $matrix[$i]);
		}
	}
	return $matrixWithValidRow;
}

function verifyMatrixSize($matrix){
	if(!array_key_exists(0, $matrix) || !array_key_exists(0, $matrix[0])){
		return false;
	} else {
		$standartMatrixRows = count($matrix);
		$standartMatrixColumn = count($matrix[0]);
		$matrixRows = 0;
		foreach($matrix as $row){
			$matrixRows++;
			$matrixColumn = 0;
			foreach($row as $column){
				if(!is_numeric($column)){
					return false;
				}
				$matrixColumn++;
			}
			if($matrixColumn != $standartMatrixColumn){
				return false;
			}
		}
		if($standartMatrixRows != $matrixRows){
			return false;
		}
		return array($matrixRows, $matrixColumn);
	}
}

echo "Я сам смотрю результат возврата функций в дебагере, поэтому не приделял много внимания визульной части страницы, если нужно сделать более читабельно - пишите <br><br>";
echo "Конвертация с десятичных в бинарные: ";
var_dump(fromDecimalToBinary(111));
echo "<br>";
echo "Конвертация с бинарных в дестичные: ";
var_dump(fromBinaryToDecimal("11"));
echo "<br>";
echo "Фибоначи: ";
showFibonacciNumbers(3);
echo "<br>";
echo "Возведение в степень: ";
var_dump(myPow(5, -3));
echo "<br>";
echo "Проверка диапазона IP: ";
var_dump(checkIfTheIpIsInTheRange("155.10.1.111"));
echo "<br><br>";
echo "<b>Массивы:</b>";
echo "<br>Процентное соотношение разных элементов массива:<br>";
$someArray = array(1, 2, -1, 0, 7, 10, 3, -5, 0, -7);
showRatios($someArray);
echo "<br><br>Сортировка массива<br>";
var_dump(myBubblesort($someArray));
echo "<br><br>Переворачивание матрицы<br>";
$someArray2 = array(
	array(-1,6,-3,7,-4),
	array(-8,-4,6,-3,9),
	array(7,-4,9,-1,7),
);
$someArray3 = array(
	array(3,2,4,2,1),
	array(0,2,4,1,5),
	array(3,2,4,2,5),
);
$someArray12121 = array(
	1
);
var_dump(transposeTheMatrix($someArray2));
echo "<br><br>Переумножение массива:<br>";
var_dump(matrixMultiplication($someArray2, $someArray3));
echo "<br><br>Удаление строк и столбцов с положительной суммой и нулевым элементом<br>";

$someArray4 = array(
	array(3,2,-4,2,0),
	array(0,2,-4,1,-5),
	array(3,-2,4,-2,5),
	array(3,2,4,2,5),
	array(-3,-2,4,2,-5),
);
$someArray4 = deleteNotValidRowFromMatrix($someArray4);
$newArr = transposeTheMatrix($someArray4);
$newArr = deleteNotValidRowFromMatrix($newArr);
$newArr = transposeTheMatrix($newArr);
var_dump($newArr);