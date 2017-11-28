<?php

	// 1. Массивы зверей.
	
	echo '1. Массивы зверей:';

	$arr_afr = array();
	$arr_afr[0] = 'Hexaprotodon liberiensis';
	$arr_afr[1] = 'Potamochoerus porcus';
	$arr_afr[2] = 'Antilopinae';
	$arr_afr[3] = 'Viverra';
	$arr_afr[4] = 'Syncerus caffer';

	echo '<pre>';
	print_r($arr_afr);
	echo '</pre>';

	$arr_asi = array();
	$arr_asi[0] = 'Gavia adamsii';
	$arr_asi[1] = 'Ardeola bacchus';
	$arr_asi[2] = 'Dendrocopos leucotos';
	$arr_asi[3] = 'Estrilda';
	$arr_asi[4] = 'Delichon';

	echo '<pre>';
	print_r($arr_asi);
	echo '</pre>';

	$arr_eur = array();
	$arr_eur[0] = 'Fringilla teydea';
	$arr_eur[1] = 'Phylloscopus';
	$arr_eur[2] = 'Uria';
	$arr_eur[3] = 'Hemithraupis guira amazonica';
	$arr_eur[4] = 'Pica';

	echo '<pre>';
	print_r($arr_eur);
	echo '</pre>';

	$arr_ame = array();
	$arr_ame[0] = 'Agamia';
	$arr_ame[1] = 'Rollandia rolland';
	$arr_ame[2] = 'Riparia  riparia';
	$arr_ame[3] = 'Guira';
	$arr_ame[4] = 'Merganetta armata ';

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
			}
		}
	}

	echo '2. Массив зверей из 2-х слов:';
	echo '<pre>';
	print_r($arr_two);
	echo '</pre>';

	// 3. Перемешать первые и вторые слова.
	$arr_shuffle = array();
	$arr_first = array();
	$arr_second = array();
	for ($i=0; $i<count($arr_two); $i++) 
	{
		$b1 = explode(' ',$arr_two[$i]);
		$arr_first[] = $b1[0];
		$arr_second[] = $b1[1];
	}
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

	// echo '<pre>';
	// print_r($arr_first);
	// echo '</pre>';


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
