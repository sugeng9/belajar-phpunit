<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class KonversiSuhuTest extends TestCase
{
    #[DataProvider('fahrenheitProvider')]
    public function testCelsiusKeFahrenheitMengonversiSuhuDenganBenar(float $celsius, float $expected): void
    {
        // Arrange
        $konversi = new KonversiSuhu();

        // Act
        $hasil = $konversi->celsiusKeFahrenheit($celsius);

        // Assert
        $this->assertEqualsWithDelta($expected, $hasil, 0.001);
    }

    public static function fahrenheitProvider(): array
    {
        return [
            'titik beku'   => [0.0, 32.0],
            'titik didih'  => [100.0, 212.0],
            'suhu negatif' => [-40.0, -40.0],
            'suhu tubuh'   => [36.6, 97.88],
        ];
    }

    #[DataProvider('kelvinProvider')]
    public function testCelsiusKeKelvinMengonversiSuhuDenganBenar(float $celsius, float $expected): void
    {
        // Arrange
        $konversi = new KonversiSuhu();

        // Act
        $hasil = $konversi->celsiusKeKelvin($celsius);

        // Assert
        $this->assertEqualsWithDelta($expected, $hasil, 0.001);
    }

    public static function kelvinProvider(): array
    {
        return [
            'titik beku'   => [0.0, 273.15],
            'titik didih'  => [100.0, 373.15],
            'suhu negatif' => [-273.15, 0.0],
            'suhu tubuh'   => [36.6, 309.75],
        ];
    }
}