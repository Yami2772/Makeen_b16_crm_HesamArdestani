<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LogTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'LogTest';

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
        echo 'kose nane harki ino nemikhoone';
    }
}
