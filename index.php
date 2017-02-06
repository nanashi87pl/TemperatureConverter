<?php
namespace KarolPanczyszyn\TemperatureConverter;

if(getcwd() == '/') {
	set_include_path('.:/');
}else {
	set_include_path('.:/:' . getcwd());
}
include_once 'model/KarolPanczyszyn/TemperatureConverter/Temperature.php';

function getParameter($name, $default=false)
{
    $result = $default;
    if(isset($_GET[$name])) {
        $result = trim($_GET[$name]);
    }
    return $result;
}

function errorDiv($content): string
{
    return '<div class="error">'.$content.'</div>';
}

$value = getParameter('temperature', '');
$sourceScaleText = getParameter('from');
$destinationScaleText = getParameter('to');

$errors = "";
$resultAvailable = false;
/// Fałsz oznacza, że mogą wystąpić dodatkowe błędy,
/// nie związane ze źródłem problemu.
$canTry = true; 
if(count($_GET) === 0) {
    $canTry = false;
} else {
    if($value === "") {
        $errors .= errorDiv("Wartość temperatury jest wymagana.");
        $canTry = false;
    }
    if($sourceScale === false) {
        $errors .= errorDiv("Skala źródłowa jest wymagana.");
        $canTry = false;
    }
    if($destinationScale === false) {
        $errors .= errorDiv("Skala docelowa jest wymagana.");
        $canTry = false;
    }
    if($canTry === true) {
		try {
			$sourceScale = ScaleOfTemperature::FromString($sourceScaleText);
			$destinationScale = ScaleOfTemperature::FromString($destinationScaleText);
		} catch (\OutOfRangeException $e) {
			$errors .= errorDiv("Przesłano nieporawidłową wartość skali (HTML zmieniony w przeglądarce).");
		}
	}
}

if($canTry === true) {
    try {
        $sourceTemperature = Temperature::NewTemperature($value, $sourceScale);
        $destinationTemperature = Temperature::NewTemperature($sourceTemperature, $destinationScale);
        $resultAvailable = true;
    } catch (NonnumericTemperatureException $e) {
        $errors .= errorDiv($e->getMessage());
    } catch (TemperatureBelowAbsoluteZeroException $e) {
        $errors .= errorDiv("Wartość temperatury nie może być poniżej zera absolutnego.");
    } catch (OutOfRangeException $e) {
        $errors .= errorDiv("Przesłano nieporawidłową wartość skali (reprezentacja numeryczna).");
    }

}

include 'view/TemperatureConverter.php';
