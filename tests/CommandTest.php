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

    /** @test */
    // @codingStandardsIgnoreLine
    public function it_can_send_an_sms(): void
    {


        $this->artisan('twilio:send-sms')
             ->assertExitCode(0);
    }
}
