<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class dailyMidnight extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'name:dailyremove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'do the job everyday at 12';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
