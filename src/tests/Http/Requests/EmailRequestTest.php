<?php

namespace Tests\Http\Requests;

use App\Http\Requests\EmailRequest;
use Tests\TestCase;

class EmailRequestTest extends TestCase
{
    private const PREG_MATCH_OK = 1;

    private EmailRequest $emailRequest;

    public function setUp(): void
    {
        $this->emailRequest = new EmailRequest();
    }

    public function testIsAllEmailFieldsRequired()
    {
        foreach ($this->emailRequest->rules() as $field => $rule) {
            self::assertSame(self::PREG_MATCH_OK, preg_match('/(required)/', $rule));
        }
    }

    public function testIsMessageDefinedForOutOfStandardField()
    {
        self::assertEquals(
            ['required', 'email.required', 'phone.digits'],
            array_keys($this->emailRequest->messages())
        );
    }
}
