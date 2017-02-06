<?php
namespace KarolPanczyszyn\TemperatureConverter;

interface TemperatureInterface
{
    public function __toString(): string;
    /**
     * Zwraca skalę, w której podana jest Temperature.
     *
     * @return int Enumeracja ScaleOfTemperature.
     */
    public function Scale(): int;
    /**
     * Tworzy obiekt Temperature o zadanej wartości w wybranej skali.
     * Jeżeli wartość jest temperaturą, dokonuje konwersji z jej skali.
     *
     * @param int|float|Temperature $value Wartość temperatury.
     *
     * @return TemperatureInterface Temperatura o zadanej wartości
     *                              w skali Fahrenheita.
     */
    public static function NewTemperature($value, int $scale): TemperatureInterface;
}
