<?php
declare(strict_types=1);

include_once 'KarolPanczyszyn/TemperatureConverter/Temperature.php';
include_once 'KarolPanczyszyn/TemperatureConverter/ScaleOfTemperature.php';

use PHPUnit\Framework\TestCase;
use KarolPanczyszyn\TemperatureConverter\Temperature;
use KarolPanczyszyn\TemperatureConverter\ScaleOfTemperature;
use KarolPanczyszyn\TemperatureConverter\NonnumericTemperatureException;
use KarolPanczyszyn\TemperatureConverter\TemperatureBelowAbsoluteZeroException;

/**
 * @covers Temperature
 */
final class TemperatureTest extends TestCase
{
    public function testCanBeCreatedFromValidNumberAndSclase(): void
    {
        $this->assertInstanceOf(
            Temperature::class,
            Temperature::NewTemperature(1, ScaleOfTemperature::Fahrenheit)
        );
    }

    public function testCannotBeCreatedFromInvalidScale(): void
    {
        $this->expectException(OutOfRangeException::class);

        Temperature::NewTemperature(1, -1);
    }

    public function testCannotBeCreatedFromNonnumericTemperature(): void
    {
        $this->expectException(NonnumericTemperatureException::class);

        Temperature::NewTemperature("not a number", ScaleOfTemperature::Kelvin);
    }

    public function testCannotBeCreatedBelowAbsoluteZero(): void
    {
        $this->expectException(TemperatureBelowAbsoluteZeroException::class);

        Temperature::NewTemperature(-1, ScaleOfTemperature::Kelvin);
    }

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            '1 K',
            "".Temperature::NewTemperature(1, ScaleOfTemperature::Kelvin)
        );
    }
}
