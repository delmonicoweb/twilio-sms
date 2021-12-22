<?php

namespace Delmonicoweb\TwilioSms;

use Delmonicoweb\TwilioSms\Console\SendSmsCommand;
use Exception;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Twilio\Rest\Client;

class TwilioSmsServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishConfig();
            $this->commands([
                SendSmsCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/twilio-sms.php', 'twilio-sms');

        $this->app->bind(TwilioSms::class, function () {

            $this->ensureConfigValuesAreSet();

            $client = new Client(config('twilio-sms.account_sid'), config('twilio-sms.auth_token'));

            return new TwilioSms($client);
        });
    }

    /**
     * Ensure the config values are set..
     *
     * @return void
     * @throws \Exception
     */
    protected function ensureConfigValuesAreSet()
    {
        if (!config('twilio-sms.account_sid') || !config('twilio-sms.auth_token') || !config('twilio-sms.from_phone')) {
            throw new Exception('Please provide accountSid, authToken and fromPhone in config/twilio-sms.php');
        }
    }

    /**
     * Publish the config file.
     *
     * @return void
     */
    protected function publishConfig()
    {
        $this->publishes([
            __DIR__.'/../config/twilio-sms.php' => config_path('twilio-sms.php'),
        ], 'twilio-sms-config');
    }
}
