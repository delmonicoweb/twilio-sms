<?php

namespace Delmonicoweb\TwilioSms;

use Twilio\Rest\Client;

class TwilioSms
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Send a message to a phone number.
     *
     * @param  string  $number
     * @param  string  $message
     * @return \Twilio\Rest\Api\V2010\Account\MessageInstance
     * @throws \Twilio\Exceptions\TwilioException
     */
    public function sendSms(string $number, string $message): \Twilio\Rest\Api\V2010\Account\MessageInstance
    {
        return $this->client->messages->create(
            $number,
            [
                'from' => config('twilio-sms.from_phone'),
                [
                    'messagingServiceSid' => config('twilio-sms.messaging_service_sid'),
                    'body' => $message,
                ]
            ]
        );
    }
}
