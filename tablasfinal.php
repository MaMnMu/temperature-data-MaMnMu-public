<?php 
	require "vendor/autoload.php";
	
	use eftec\bladeone\bladeone;
	
	$Views = __DIR__ . '\Views';
	$Cache = __DIR__ . '\Cache';
	
	$Blade = new BladeOne($Views, $Cache);
        
        session_start();
        
        if (!empty($_POST)) {
            $arrmensual = filter_input(INPUT_POST, 'arrtotal', FILTER_VALIDATE_INT, FILTER_REQUIRE_ARRAY);
            
            $minimos = array();
            $maximos = array();
            $medias = array();
            foreach ($arrmensual as $ciudad => $arrmeses) {
                $colmin = array_column($arrmeses, 'min');
                $colmax = array_column($arrmeses, 'max');
                
                array_push($minimos, min($colmin));
                array_push($maximos, max($colmax));
                
                $suma = array_sum($colmin) + array_sum($colmax);
                $cant = count($colmin) + count($colmax);
                $media = $suma / $cant;
                array_push($medias, $media);
            }
            
            $ciudades = $_SESSION['ciudades'];
            array_multisort($maximos, SORT_DESC, SORT_NUMERIC, $minimos, SORT_ASC, SORT_NUMERIC, $ciudades, SORT_STRING, $medias);
            
            $arranual = array();
            for ($i = 0; $i < count($ciudades); $i++) {
                $arranual[$ciudades[$i]] = array();
                $arranual[$ciudades[$i]]['min'] = $minimos[$i];
                $arranual[$ciudades[$i]]['max'] = $maximos[$i];
                $arranual[$ciudades[$i]]['med'] = $medias[$i]; 
            }
        } else {
            header("Location: index.php");
        }
        
        echo $Blade->run('tablasfinal', ['arranual' => $arranual]);
?>
