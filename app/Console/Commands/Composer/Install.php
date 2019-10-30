<?php

namespace App\Console\Commands\Composer;

use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'composer:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for Composer install from Artisan Command';

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
        exec('composer install');
        $this->info('Composer Install has been executed');
    }
}
