<?php
declare(strict_types=1);
namespace KarolPanczyszyn\TemperatureConverter;

include_once 'TemperatureInterface.php';
include_once 'ScaleOfTemperature.php';
include_once 'NonnumericTemperatureException.php';
include_once 'TemperatureBelowAbsoluteZeroException.php';

class Temperature implements TemperatureInterface
{
    /** @var int|float Wartość temperatury. */
    private $value;
    /** @var int Enumeracja ScaleOfTemperature. */
    private $scaleValue;

    const KelvinAndCelsiusDifference = 273.15;
    const KelvinAndFahrenheitDifference = 459.67;
    const FahrenheitToKelvinRatio = 5.0 / 9;

    public function __toString(): string {
        $result = "{$this->value} ";
        switch ($this->scaleValue) {
            case ScaleOfTemperature::Kelvin:
                $result .= "K";
                break;
            case ScaleOfTemperature::Celsius:
                $result .= "°C";
                break;
            case ScaleOfTemperature::Fahrenheit:
                $result .= "°F";
                break;
            default:
                throw ScaleOfTemperature::InvalidValueException();
        }
        return $result;
    }
    public function scale(): int
    {
        return $this->scaleValue;
    }
    public static function NewTemperature($value, int $scale): TemperatureInterface
    {
        if ($value instanceof TemperatureInterface) {
            return $value->convert($scale);
        } else {
            return new Temperature($value, $scale);
        }
    }
    /**
     * Temperatura o zadanej wartości i skali termometrycznej.
     *
     * @param int|float $value Wartość temperatury.
     *
     */
    private function __construct($value, int $scale)
    {
        $this->value = $value;
        $this->scaleValue = $scale;
        $this->validate();
    }
    /**
     * Wyrzuca wyjątek, jeżeli ten obiek jest nieprawidłowy.
     * W przeciwnym razie, nie robi nic.
     *
     * @return void
     */
    private function validate() {
        if (!is_numeric($this->value)) {
            throw new NonnumericTemperatureException(
				"Temperatura musi być liczbą (jest '{$this->value}').");
        } else {
            switch ($this->scaleValue) {
                case ScaleOfTemperature::Kelvin:
                    if($this->value < 0) {
                        throw new TemperatureBelowAbsoluteZeroException();
                    }
                    break;
                case ScaleOfTemperature::Celsius:
                    if($this->value < -self::KelvinAndCelsiusDifference) {
                        throw new TemperatureBelowAbsoluteZeroException();
                    }
                    break;
                case ScaleOfTemperature::Fahrenheit:
                    if($this->value < -self::KelvinAndFahrenheitDifference) {
                        throw new TemperatureBelowAbsoluteZeroException();
                    }
                    break;
                default:
                    throw ScaleOfTemperature::InvalidValueException();
            }
        }
    }
    /**
     * Tworzy obiekt Temperature odpowiadający temperaturze
     * wywołującego obiektu w zadanej skali.
     *
     * @param int $scale Enumeracja ScaleOfTemperature.
     *
     * @return TemperatureInterface Temperatura o zadanej wartości
     *                              w zadanej skali.
     */
    private function convert(int $scale): TemperatureInterface
    {
        /** @var TemperatureInterface */
        $result = clone $this;
        if ($this->scaleValue !== $scale) {
            // Konwersja do skali Kelvina
            if ($this->scaleValue === ScaleOfTemperature::Celsius) {
                $result->value += self::KelvinAndCelsiusDifference;
            } elseif ($this->scaleValue === ScaleOfTemperature::Fahrenheit) {
                $result->value += self::KelvinAndFahrenheitDifference;
                $result->value *= self::FahrenheitToKelvinRatio;
            }
            // Konwersja ze skali Kelvina
            if ($scale === ScaleOfTemperature::Celsius) {
                $result->value -= self::KelvinAndCelsiusDifference;
            } elseif ($scale === ScaleOfTemperature::Fahrenheit) {
                $result->value -= self::KelvinAndFahrenheitDifference;
                $result->value /= self::FahrenheitToKelvinRatio;
            }
            $result->scaleValue = $scale;
        }
        return $result;
    }
}
