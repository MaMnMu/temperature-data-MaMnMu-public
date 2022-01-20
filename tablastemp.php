<?php 
	require "vendor/autoload.php";
	
	use eftec\bladeone\bladeone;
	
	$Views = __DIR__ . '\Views';
	$Cache = __DIR__ . '\Cache';
	
	$Blade = new BladeOne($Views, $Cache);
        
        session_start();
        
        if (!empty($_POST)) {
            $strciudades = filter_input(INPUT_POST, 'ciudades');
            
            $arrciudades = explode(",", $strciudades);
            $_SESSION['ciudades'] = $arrciudades;
            $arrmeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');        
            
            
                foreach ($arrciudades as $ciudad) {
                    $arrtotal[$ciudad] = array();
                    foreach ($arrmeses as $mes) {
                        $arrtotal[$ciudad][$mes] = array();
                        $valor1 = rand(-10, 40);
                        $valor2 = rand(-10, 40);
                        $arrtotal[$ciudad][$mes]["min"] = min($valor1, $valor2);
                        $arrtotal[$ciudad][$mes]["max"] = max($valor1, $valor2);
                    }
                }
            
        } else {
            header("Location: index.php");
        }
        
        echo $Blade->run('tablastemp', ['arrtotal' => $arrtotal]);
?>

