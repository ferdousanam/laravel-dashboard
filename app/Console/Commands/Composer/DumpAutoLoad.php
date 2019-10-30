<?php

namespace App\Console\Commands\Composer;

use Illuminate\Console\Command;

class DumpAutoLoad extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'composer:dump-autoload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for Composer Dump Autoload From Artisan Command';

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
        exec('composer dump-autoload');
        $this->info('Composer Dump Autoload has been executed');
    }
}
