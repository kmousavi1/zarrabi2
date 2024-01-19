<?php

namespace App\Console\Commands;

use App\Services\SendDataService;
use Illuminate\Console\Command;

class SendNewData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-new-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        SendDataService::Send();
    }
}
