<?php

namespace Mariojgt\Skeleton\Commands;

use Illuminate\Console\Command;
use Artisan;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:skeleton';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command will install Skeleton package';

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
     * @return int
     */
    public function handle()
    {
        // Copy the need file to make the onix pacakge to run
        Artisan::call('vendor:publish', [
            '--provider' => 'Mariojgt\Skeleton\SkeletonProvider',
            '--force'    => true
        ]);

        // Migrate
        Artisan::call('migrate');

        $this->newLine();
        $this->info('The command was successful!');
    }
}
