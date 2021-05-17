<?php

namespace Tests\Models;

use App\Models\Email;
use Tests\TestCase;

class EmailTest extends TestCase
{
    private Email $instance;

    protected function setUp(): void
    {
        $this->instance = new Email();

        parent::setUp();
    }

    public function testIsAttributesSetAsFillable(): void
    {
        $expected = ['name', 'email', 'phone', 'message', 'ip', 'attachment'];
        $actual = $this->instance->getFillable();

        self::assertEquals($expected, $actual);
    }
}
