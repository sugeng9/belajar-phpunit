<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class EmailTest extends TestCase
{
    public function testCanBeCreatedFromValidEmail(): void
    {
        $address = 'user@example.com';

        $email = Email::fromString($address);

        $this->assertInstanceOf(Email::class, $email);
        $this->assertSame($address, $email->asString());
        $this->assertStringContainsString('@', $email->asString());
    }

     #[DataProvider('validAddressProvider')]
    public function testValidAddressesAreReturnedAsIs(string $address): void
    {
        $email = Email::fromString($address);

        $this->assertSame($address, $email->asString());
    }

    // Data provider: setiap baris = satu alamat email valid
    public static function validAddressProvider(): array
    {
        return [
            'tanpa titik'   => ['syahadan@gmail.com'],
            'dengan angka'  => ['Syahadan2305@gmail.com'],
            'subdomain'     => ['admin@vote.polbeng.ac.id'],
            'tanda plus'    => ['Syaha+adan@gmail.com'],
        ];
    }
}