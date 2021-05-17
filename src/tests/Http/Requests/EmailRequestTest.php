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
            self::assertTrue($this->validateRule('require', $rule));
        }
    }

    public function testIsMessageDefinedForOutOfStandardField()
    {
        self::assertEquals(
            ['required', 'email.required', 'phone.digits'],
            array_keys($this->emailRequest->messages())
        );
    }

    public function testExtraRequirementsFromRules()
    {
        $rules = $this->emailRequest->rules();

        self::assertTrue($this->validateRule('unique', $rules['email']), 'Error to validate email');
        self::assertTrue($this->validateRule('regex', $rules['phone']), 'Error to validate phone');
    }

    private function validateRule(string $toValidate, string $rule): bool
    {
        $regex = sprintf('/(%s)/', $toValidate);

        return self::PREG_MATCH_OK === preg_match($regex, $rule);
    }
}
