<?php
function fromDecimalToBinary($decimalNumber)
{ 
	try {
		if ($decimalNumber < 0 || $decimalNumber > 65536) {
			throw new Exception();
		} elseif ($decimalNumber == 0) {
			return (string)0;
		} else {
			$excessList = [];
			while ($decimalNumber > 0){
				$excess = $decimalNumber % 2;
				$decimalNumber = floor($decimalNumber / 2);
				array_unshift($excessList, $excess);
			}
			$binaryNum = (binary)implode($excessList);
			return ($binaryNum);
		}
	} catch (Exception $e) {
		return NULL;
	}
}

function fromBinaryToDecimal($binaryNum)
{
	try{
		if (!preg_match('/^[01]{1,16}$/', $binaryNum) && $binaryNum != "10000000000000000") {
			throw new Exception();
    	} else {
			$binaryArr = str_split($binaryNum);
			$binaryArr = array_reverse($binaryArr);
			$decimalArr = [];
			for ($pow = 0; $pow < count($binaryArr); $pow++){
				if ($binaryArr[$pow] == "1"){
					array_push($decimalArr, pow(2, $pow));
				}
			}
			return array_sum($decimalArr);
		}
	} catch (Exception $e) {
		return false;
	}
}

function showFibonacciNumbers($countOfFibNum)
{
	try {
		if ($countOfFibNum > 0) {
			$firstFib = 1;
			$secondFib = 1;
			if ($countOfFibNum >= 2 ) {
				echo $firstFib . ", " . $secondFib;
			} elseif ($countOfFibNum == 1) {
				echo $firstFib;
			}
			for ($i = 3; $i <= $countOfFibNum; $i++) {
				$nextFib = $firstFib + $secondFib;
				echo ", " . $nextFib;
				$firstFib = $secondFib;
				$secondFib = $nextFib;
			}
			return true;
		} else {
			throw new Exception();
		}
	} catch (Exception $e) {
		return false;
	}
}

function myPow($num, $pow)
{
	try {
		if (is_numeric($num) && is_numeric($pow) && is_int($num) && is_int($pow)) {
			if ($pow > 0 || $pow < 0) {
				$moduleOfPow = abs($pow);
				$numResult = $num;
				for($i = 1; $i < $moduleOfPow; $i++){
					$numResult *= $num;
				}
				$numResult = ($pow < 0) ? (1/$numResult) : $numResult;
				return $numResult;
			} elseif ($pow == 0) {
				return 1;
			} else return false;
		} else {
			throw new Exception();
		}
	} catch (Exception $e) {
		return false;
	}
}

function checkIfTheIpIsInTheRange($ip){
	try {
		ipVerification($ip);
		$verifiableIp = addZeroToIP($ip);
		$ipRanges = [
			["010.010.001.100", "010.255.255.255"],
			["172.031.000.000", "172.031.255.255"],
			["180.168.000.000", "180.168.255.250"],
			["192.168.100.250", "194.168.200.100"],
		];
		foreach ($ipRanges as $oneOfRange) {
			if ($verifiableIp >= $oneOfRange[0] && $verifiableIp <= $oneOfRange[1]) {
				return true;
			}
		}
		return false;
	} catch (Exception $e) {
		return NULL;
	}
}

function ipVerification($ip)
{
	$ipInArr = explode(".", $ip);
	if (count($ipInArr) != 4) {
		throw new Exception();
	} else {
		foreach ($ipInArr as $ipPart) {
			$a = !ctype_digit((string)$ipPart);
			$b = ($ipPart < 0 || $ipPart > 255);
			if (!ctype_digit((string)$ipPart) || ($ipPart < 0 || $ipPart > 255)) {
				throw new Exception();
			}
		}
	}
	return true;
};

function addZeroToIP($ip)
{
	$ipArr = explode(".", $ip);
	for ($i = 0; $i < count($ipArr); $i++) {
		$numLength = strlen($ipArr[$i]);
		if ($numLength < 3) {
			while (strlen($ipArr[$i]) < 3) {
				$ipArr[$i] = "0" . $ipArr[$i];
			}
		}
	}
	return implode(".", $ipArr);
}

//Массивы

function showRatios($someArray)
{
	try {
		if (!is_array($someArray) || empty($someArray)) {
			throw new Exception();
		}
		$positiveNum = 0;
		$negativeNum = 0;
		$zeroNum = 0; 
		$simpleNum = 0;
		foreach ($someArray as $num) {
			if ($num > 0) {
				$positiveNum++;
			} elseif ($num < 0) {
				$negativeNum++;
			} elseif ($num == 0) {
				$zeroNum++;
			}

			if ($num == 2 || $num == 3) {
				$simpleNum++;
			} else {
				$isSimpleNum = false;
				$moduleOfNum = abs($num);
				for ($i = 2; $i < $num; $i++) {
					if ($num % $i){
						$isSimpleNum = true;
					} else {
						$isSimpleNum = false;
						break;
					}
				}
				if ($isSimpleNum) {
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
	} catch (Exception $e) {
		return NULL;
	}
}

function myBubblesort($arrToSort)
{
	try {
		if (!is_array($arrToSort)) {
			throw new Exception();
		} else {
			for ($i = 1; $i <= count($arrToSort)-1; $i++) {
				for ($j = 1; $j <= count($arrToSort)-1; $j++) {
					if ($arrToSort[$j] < $arrToSort[$j-1]) {
						$temp = $arrToSort[$j-1];
						$arrToSort[$j-1] = $arrToSort[$j];
						$arrToSort[$j] = $temp;
					}
				}
			}
		}
		return $arrToSort;
	} catch (Exception $e) {
		return NULL;
	}
}

function transposeTheMatrix($matrix)
{
	try {
		if (!is_array($matrix) || !verifyMatrixSize($matrix)) {
			throw new Exception();
		} else {
			$newArr = [];
			$matrixCount = count($matrix);
			for ($i = 0; $i < $matrixCount; $i++) {
				$rowCount = count($matrix[$i]);
				for ($j = 0; $j < $rowCount; $j++) {
					$newArr[$j][] = $matrix[$i][$j];
				}
			}
			return $newArr;
		}
	} catch (Exception $e) {
		return NULL;
	}
}

function matrixMultiplication($matrix1, $matrix2)
{
	try {
		if (!verificationForMatrixMultiplication($matrix1, $matrix2)) {
			throw new Exception();
		} else {
			$finalMatrix = [];
			$rowCount = count($matrix1);
			for ($i = 0; $i < $rowCount; $i++) {
				$columnCount = count($matrix1[$i]);
				for($j = 0; $j < $columnCount; $j++){
					$finalMatrix[$i][$j] = $matrix1[$i][$j] * $matrix2[$i][$j];
				}
			}
			return $finalMatrix;
		}	
	} catch (Exception $e) {
		return NULL;
	}
}

function verificationForMatrixMultiplication($matrix1, $matrix2)
{
	try {
		if (!array_key_exists(0, $matrix1) || !array_key_exists(0, $matrix2) || !array_key_exists(0, $matrix1[0]) || !array_key_exists(0, $matrix2[0])) {
			throw new Exception();
		} else {
			$verifyResultMatrix1 = verifyMatrixSize($matrix1);
			$verifyResultMatrix2 = verifyMatrixSize($matrix2);
			if ($verifyResultMatrix1 && $verifyResultMatrix2 && $verifyResultMatrix1 == $verifyResultMatrix2) {
				return true;
			} else {
				return false;
			}
		}
	} catch (Exception $e) {
		return false;
	}
}

function deleteNotValidRowFromMatrix($matrix)
{
	try {
		if (!verifyMatrixSize($matrix)) {
			throw new Exception();
		}
		$matrixWithValidRow = [];
		$rowCount = count($matrix);
		for ($i = 0; $i < $rowCount; $i++) {
			$columnCount = count($matrix[$i]);
			$summ = 0;
			$isZero = false;
			for ($j = 0; $j < $columnCount; $j++) {
				$summ += $matrix[$i][$j];
				if($matrix[$i][$j] == 0){
					$isZero = true;
				}
			}
			if (!($summ > 0 && $isZero)) {
				array_push($matrixWithValidRow, $matrix[$i]);
			}
		}
		return $matrixWithValidRow;
	} catch (Exception $e) {
		return false;
	}
}

function verifyMatrixSize($matrix)
{
	try {
		if (!array_key_exists(0, $matrix) || !array_key_exists(0, $matrix[0])) {
			throw new Exception();
		} else {
			$standartMatrixRows = count($matrix);
			$standartMatrixColumn = count($matrix[0]);
			$matrixRows = 0;
			foreach ($matrix as $row) {
				$matrixRows++;
				$matrixColumn = 0;
				foreach ($row as $column) {
					if (!is_numeric($column)) {
						throw new Exception();
					}
					$matrixColumn++;
				}
				if ($matrixColumn != $standartMatrixColumn) {
					throw new Exception();
				}
			}
			if ($standartMatrixRows != $matrixRows) {
				throw new Exception();
			}
			return array($matrixRows, $matrixColumn);
		}
	} catch (Exception $e) {
		return false;
	}
}

function showRatiosWithRecursion($someArray)
{
	try {
		if (!is_array($someArray) || empty($someArray)) {
			throw new Exception();
		}
		$returnedData = [
			"positiveNum" => 0,
			"negativeNum" => 0,
			"zeroNum" => 0,
			"simpleNum" => 0,
		];

		$result = recursiveShowRatiosF($someArray, $returnedData);
		$totalNumCount = count($someArray);
		$positiveNumPercent = $result["positiveNum"] * 100 / $totalNumCount;
		$negativeNumPercent = $result["negativeNum"] * 100 / $totalNumCount;
		$zeroNumPercent = $result["zeroNum"] * 100 / $totalNumCount;
		$simpleNumPercent = $result["simpleNum"] * 100 / $totalNumCount;
		echo "Позитивных: " . round($positiveNumPercent) . "%<br>Отрицательных: " . round($negativeNumPercent) . "%<br>Нулевых: " . round($zeroNumPercent) . "%<br>Простых: " . round($simpleNumPercent) . "%";
	} catch (Exception $e) {
		return NULL;
	}
}

function recursiveShowRatiosF($someArray, $returnedData, $i = 0)
{
	if (count($someArray) == $i) {
		return $returnedData;
	}
	if ($someArray[$i] > 0) {
		$returnedData["positiveNum"]++;
	} elseif ($someArray[$i] < 0) {
		$returnedData["negativeNum"]++;
	} elseif($someArray[$i] == 0) {
		$returnedData["zeroNum"]++;
	}
	if ($someArray[$i] == 2 || $someArray[$i] == 3) {
		$returnedData["simpleNum"]++;
	} else {
		$isSimpleNum = false;
		$moduleOfNum = abs($someArray[$i]);
		for ($j = 2; $j < $someArray[$i]; $j++) {
			if ($someArray[$i] % $j) {
				$isSimpleNum = true;
			} else {
				$isSimpleNum = false;
				break;
			}
		}
		if ($isSimpleNum) {
			$returnedData["simpleNum"]++;
		}
	}
	$i++;
	return recursiveShowRatiosF($someArray, $returnedData, $i);
}

function myBubblesortWithRecursion($arrToSort)
{
	try {
		if (!is_array($arrToSort)) {
			throw new Exception();
		} else {

			$arrToSort = recursiveBubbleF($arrToSort);
		}
		return $arrToSort;
	} catch (Exception $e) {
		return NULL;
	}
}

function recursiveBubbleF($arrToSort, $i = 0)
{
	if (count($arrToSort) == $i) {
		return $arrToSort;
	}
	for ($j = 1; $j <= count($arrToSort)-1; $j++) {
		if ($arrToSort[$j] < $arrToSort[$j-1]) {
			$temp = $arrToSort[$j-1];
			$arrToSort[$j-1] = $arrToSort[$j];
			$arrToSort[$j] = $temp;
		}
	}
	$i++;
	return recursiveBubbleF($arrToSort, $i);
}

function transposeTheMatrixWithRecursion($matrix)
{
	try {
		if (!is_array($matrix) || !verifyMatrixSize($matrix)) {
			throw new Exception();
		} else {
			$newMatrix = recursiveTransposeF($matrix);
			return $newMatrix;
		}
	} catch (Exception $e) {
		return false;
	}
}

function recursiveTransposeF($matrix, $i = 0, $newMatrix = [])
{
	if (count($matrix) == $i) {
		return $newMatrix;
	}
	$rowCount = count($matrix[$i]);
	for ($j = 0; $j < $rowCount; $j++) {
		$newMatrix[$j][] = $matrix[$i][$j];
	}
	$i++;
	return recursiveTransposeF($matrix, $i, $newMatrix);
}

function matrixMultiplicationWithRecursion($matrix1, $matrix2)
{
	try {
		if (!verificationForMatrixMultiplication($matrix1, $matrix2)) {
			throw new Exception();
		} else {
			return recursiveMultiplication($matrix1, $matrix2);
		}	
	} catch (Exception $e) {
		return false;
	}
}


function recursiveMultiplication($matrix1, $matrix2, $i = 0, $finalMatrix = [])
{
	if (count($matrix1) == $i) {
		return $finalMatrix;
	}
	$columnCount = count($matrix1[$i]);
	for ($j = 0; $j < $columnCount; $j++) {
		$finalMatrix[$i][$j] = $matrix1[$i][$j] * $matrix2[$i][$j];
	}
	$i++;
	return recursiveMultiplication($matrix1, $matrix2, $i, $finalMatrix);
}

function deleteNotValidRowFromMatrixWithRecursion($matrix)
{
	try {
		if (!verifyMatrixSize($matrix)) {
			throw new Exception();
		}
		$matrixWithValidRow = [];
		$rowCount = count($matrix);
		return recursiveDeleteF($matrix);
	} catch (Exception $e) {
		return false;
	}
}

function recursiveDeleteF($matrix, $i = 0, $matrixWithValidRow = [])
{
	if (count($matrix) == $i) {
		return $matrixWithValidRow;
	}
	$columnCount = count($matrix[$i]);
	$summ = 0;
	$isZero = false;
	for ($j = 0; $j < $columnCount; $j++) {
		$summ += $matrix[$i][$j];
		if($matrix[$i][$j] == 0){
			$isZero = true;
		}
	}
	if (!($summ > 0 && $isZero)) {
		array_push($matrixWithValidRow, $matrix[$i]);
	}
	$i++;
	return recursiveDeleteF($matrix, $i, $matrixWithValidRow);
}

$anyArr = [
	[ 
	  [ 
	    [ 
		  1, 
		  10, 
		  20, 
		  [ "ololo" => "lolo", "cheto-tam" => "taram" ], 
	    ], 
	    1, 
	  ], 
	  [ "qwe","wasd" ], 
	],
	[ 1, 2, 3, 4 ],
	[ 5 ]
];

function showAllValueFromAnyArr($anyArr)
{
	try {
		if (!is_array($anyArr) || empty($anyArr)) {
			throw new Exception();
		} else {
			recurciveShowValues($anyArr);
		}
	} catch (Exception $e) {
		return NULL;
	}
}

function recurciveShowValues($arr)
{
	try {
		if (!is_array($arr)) {
			throw new Exception();
		}
		foreach ($arr as $value) {
			if (is_array($value)) {
				recurciveShowValues($value);
			} else {
				echo $value . "; ";
			}
		}
	} catch (Exception $e) {
		return NULL;
	}
}

echo "Я сам смотрю результат возврата функций в дебагере, поэтому не приделял много внимания визульной части страницы, если нужно сделать более читабельно - пишите <br><br>";
echo "Конвертация с десятичных в бинарные: ";
var_dump(fromDecimalToBinary(-111));
echo "<br>";
echo "Конвертация с бинарных в дестичные: ";
var_dump(fromBinaryToDecimal("11111111111"));
echo "<br>";
echo "Фибоначи: ";
showFibonacciNumbers(3);
echo "<br>";
echo "Возведение в степень: ";
var_dump(myPow(-3, -3));
echo "<br>";
echo "Проверка диапазона IP: ";
var_dump(checkIfTheIpIsInTheRange("193.168.101.111"));
echo "<br><br><br><b>Массивы:</b>";
echo "<br>Процентное соотношение разных элементов массива:<br>";
$someArray = [1, 2, -1, 0, 7, 10, 3, -5, 0, -7];
showRatios($someArray);
echo "<br><br>Сортировка массива<br>";
var_dump(myBubblesort($someArray));
echo "<br><br>Переворачивание матрицы<br>";
$someArray2 = [
	[-1,6,-3,7,-4],
	[-8,-4,6,-3,9],
	[7,-4,9,-1, 1],
];
$someArray3 = [
	[3,2,4,2,1],
	[0,2,4,1,5],
	[3,2,4,2,5],
];
$someArray12121 = [
	1
];
var_dump(transposeTheMatrix($someArray2));
echo "<br><br>Переумножение массива:<br>";
var_dump(matrixMultiplication($someArray2, $someArray3));
echo "<br><br>Удаление строк и столбцов с положительной суммой и нулевым элементом<br>";
$someArray4 = [
	[3,2,-4,2,0],
	[0,2,-4,1,-5],
	[3,-2,4,-2,5],
	[3,2,4,2,5],
	[-3,-2,4,2,-5],
];
$newArr = deleteNotValidRowFromMatrix($someArray4);
$newArr = transposeTheMatrix($newArr);
$newArr = deleteNotValidRowFromMatrix($newArr);
$newArr = transposeTheMatrix($newArr);
var_dump($newArr);
echo "<br><br><br><b>Рекурсии</b><br>Процентное соотношение разных элементов массива:<br>";
showRatiosWithRecursion($someArray);
echo "<br><br>Сортировка массива<br>";
var_dump(myBubblesortWithRecursion($someArray));
echo "<br><br>Переворачивание матрицы<br>";
var_dump(transposeTheMatrixWithRecursion($someArray2));
echo "<br><br>Переумножение массива:<br>";
var_dump(matrixMultiplicationWithRecursion($someArray2, $someArray3));
echo "<br><br>Удаление строк и столбцов с положительной суммой и нулевым элементом<br>";
$newArr2 = deleteNotValidRowFromMatrixWithRecursion($someArray4);
$newArr2 = transposeTheMatrix($newArr2);
$newArr2 = deleteNotValidRowFromMatrixWithRecursion($newArr2);
$newArr2 = transposeTheMatrix($newArr2);
var_dump($newArr2);
echo "<br><br>Вывод значений массива<br>";
showAllValueFromAnyArr($anyArr);
