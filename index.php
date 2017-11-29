<?php

	// 1. Массивы зверей.
	
	echo '1. Массивы зверей:';

	$arr_afr = array('Hexaprotodon liberiensis', 'Potamochoerus porcus', 'Antilopinae', 'Viverra', 'Syncerus caffer');
	echo '<pre>';
	print_r($arr_afr);
	echo '</pre>';

	$arr_asi = array('Gavia adamsii', 'Ardeola bacchus', 'Dendrocopos leucotos', 'Estrilda', 'Delichon');
	echo '<pre>';
	print_r($arr_asi);
	echo '</pre>';

	$arr_eur = array('Fringilla teydea', 'Phylloscopus', 'Uria', 'Hemithraupis guira amazonica', 'Pica');
	echo '<pre>';
	print_r($arr_eur);
	echo '</pre>';

	$arr_ame = array('Agamia', 'Rollandia rolland', 'Riparia  riparia', 'Guira', 'Merganetta armata ');
	echo '<pre>';
	print_r($arr_ame);
	echo '</pre>';

	$arr_cont = array();
	$arr_cont['africa'] = $arr_afr;
	$arr_cont['asia'] = $arr_asi;
	$arr_cont['europe'] = $arr_eur;
	$arr_cont['america'] = $arr_ame;

	echo '<pre>';
	print_r($arr_cont);
	echo '</pre>';

	// 2. Массив зверей из 2-х слов.
	$arr_two = array();
	$arr_first = array();
	$arr_second = array();
	foreach ($arr_cont as $cont => $value) {
		foreach ($value as $key => $animal) {
			$a1 = explode(' ', $animal);
			// Убираем лишние пробелы
			foreach ($a1 as $k => $v) {
				if ($v == '') {
					unset($a1[$k]);
				}
			}
			if (count($a1) == 2) {
				$arr_two[] = implode(' ',$a1);
				$arr_first[] = $a1[0];
				$arr_second[] = $a1[1];
			}
		}
	}

	echo '2. Массив зверей из 2-х слов:';
	echo '<pre>';
	print_r($arr_two);
	echo '</pre>';

	// 3. Перемешать первые и вторые слова.
	$arr_shuffle = array();
	shuffle($arr_first);
	shuffle($arr_second);
	for ($i=0; $i<count($arr_two); $i++)
	{
		$arr_shuffle[] = $arr_first[$i].' '.$arr_second[$i];
	}

	echo '3. Перемешать первые и вторые слова:';
	echo '<pre>';
	print_r($arr_shuffle);
	echo '</pre>';

	// 4-5. Принадлежность регионам через запятую.
	echo '4-5. Принадлежность регионам через запятую:';
	foreach ($arr_cont as $cont => $value) {
		echo "<h2>$cont</h2>";
		$arr_str = array();
		foreach ($value as $animal) {
			for ($i=0; $i<count($arr_first); $i++)
			{
				if (strpos($animal, $arr_first[$i]) !== false) {
					$arr_str[] = $arr_shuffle[$i];
				}
			}
		}
		echo implode(',', $arr_str);
	}
?>
