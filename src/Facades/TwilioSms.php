<?php

namespace Delmonicoweb\TwilioSms\Facades;

use Illuminate\Support\Facades\Facade as BaseFacade;

class TwilioSms extends BaseFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'twilio-sms';
    }
}
