<?php

namespace Test\Database\Factories;

use App\Models\Email;
use Database\Factories\EmailFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\TestCase;

class EmailFactoryTest extends TestCase
{
    use DatabaseMigrations;

    public function testIsDefiningAnEmail()
    {
        self::assertInstanceOf(Email::class, Email::factory()->make());
    }

    public function testHasEmailFactorySameDataDefinitionForEmail()
    {
        $expected = (new Email())->getFillable();
        $actual = array_keys((new EmailFactory())->definition());

        self::assertSame($expected, $actual);
    }
}
