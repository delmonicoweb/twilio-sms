<?php

namespace Delmonicoweb\TwilioSms\Tests;

use Delmonicoweb\TwilioSms\Facades\TwilioSms;
use Delmonicoweb\TwilioSms\TwilioSmsServiceProvider;
use Orchestra\Testbench\TestCase;

class CommandTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            TwilioSmsServiceProvider::class
        ];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'TwilioSms' => TwilioSms::class,
        ];
    }

    public function testSendSms()
    {
        $this->artisan('twilio:send-sms')
            ->expectsOutput('Sending SMS to +1234567890')
            ->assertExitCode(0);
    }
}
