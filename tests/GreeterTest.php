<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class GreeterTest extends TestCase
{
    public function testGreetsWithName(): void
    {
        // Arrange: siapkan objek yang diuji
        $greeter = new Greeter();

        // Act: jalankan perilaku yang diuji
        $greeting = $greeter->greet('Syahadan');

        // Assert: bandingkan hasil dengan harapan
        $this->assertSame('Assalamualaikum, Syahadan!', $greeting);
    }

    #[DataProvider('nameProvider')]
    public function testGreetsEachName(string $name, string $expected): void
    {
        $greeter = new Greeter();

        $this->assertSame($expected, $greeter->greet($name));
    }

    // Data provider: setiap baris = satu kasus uji
    public static function nameProvider(): array
    {
        return [
            'nama pendek'       => ['Ani', 'Assalamualaikum, Ani!'],
            'nama dengan spasi' => ['Siti Aminah', 'Assalamualaikum, Siti Aminah!'],
            'huruf kecil'       => ['dedi', 'Assalamualaikum, dedi!'],
        ];
    }
}