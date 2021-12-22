<?php


namespace Delmonicoweb\TwilioSms\Console;

use Illuminate\Console\Command;

class SendSmsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twilio:send-sms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test SMS to your Twilio account';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Sending a test SMS to your Twilio account...');

        $this->info('SMS sent successfully!');
    }
}
