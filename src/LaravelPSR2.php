<?php

namespace App\Console\Commands;

use Config;
use Illuminate\Console\Command;

class LaravelPSR2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkstyle';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run PSR-2 check on directory';

    /**
     * Create a new command instance.
     *
     * @param  DripEmailer  $drip
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
        $directories = implode(" ", Config::get('laravel-phpcs.directories'));
        exec('phpcs --report=html --standard=PSR2 ' . $directories);
    }
}