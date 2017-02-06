<?php
namespace KarolPanczyszyn\TemperatureConverter;

include_once 'InvalidTemperatureException.php';

class TemperatureBelowAbsoluteZeroException extends InvalidTemperatureException
{
}
