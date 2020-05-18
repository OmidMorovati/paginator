<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'omidmorovati-paginator:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'publish all vendors';

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
        $this->callSilent('vendor:publish', ['--provider'=>'omidmorovati/paginator','--tag' => 'config']);
        $this->callSilent('vendor:publish', ['--provider'=>'omidmorovati/paginator','--tag' => 'assets']);;
        $this->info('omidmorovati/paginator vendors was installed successfully.');
    }
}
