<?php
declare(strict_types=1);

include_once 'KarolPanczyszyn/TemperatureConverter/Temperature.php';
include_once 'KarolPanczyszyn/TemperatureConverter/ScaleOfTemperature.php';

use PHPUnit\Framework\TestCase;
use KarolPanczyszyn\TemperatureConverter\ScaleOfTemperature;

/**
 * @covers ScaleOfTemperature
 */
final class ScaleOfTemperatureTest extends TestCase
{
    public function testCanBeCreatedFromValidString(): void
    {
        $this->assertInstanceOf(
            int::class,
            ScaleOfTemperature::FromString("Fahrenheit")
        );
    }

    public function testCannotBeCreatedFromInvalidString(): void
    {
        $this->expectException(OutOfRangeException::class);

        ScaleOfTemperature::FromString("Not a name of temperature scale.");
    }
}
