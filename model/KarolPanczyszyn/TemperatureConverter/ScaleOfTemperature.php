<?php
namespace KarolPanczyszyn\TemperatureConverter;

use \OutOfRangeException;

abstract class ScaleOfTemperature
{
    const Kelvin = 0;
    const Celsius = 1;
    const Fahrenheit = 2;
    public static function InvalidValueException(): OutOfRangeException
    {
        return new OutOfRangeException('Nieprawidłowa wartość'
            .' enumeracji SkalaTermometryczna.');
    }
    public static function FromString($text)
    {
        switch ($text) {
            case "Kelvin":
                return self::Kelvin;
            case "Celsius":
                return self::Celsius;
            case "Fahrenheit":
                return self::Fahrenheit;
            default:
                throw ScaleOfTemperature::InvalidValueException();
        }
	}
}
