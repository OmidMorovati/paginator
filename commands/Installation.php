<?php

namespace OmidMorovati\Paginator\Commands;

use Illuminate\Console\Command;

class Installation extends Command
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
        $this->callSilent('vendor:publish', ['--tag' => 'OMPaginatorConfig']);
        $this->callSilent('vendor:publish', ['--tag' => 'OMPaginatorAssets']);
        $this->callSilent('vendor:publish', ['--tag' => 'OMPaginatorViews']);
        $this->info('omidmorovati/paginator Vendors Installed successfully.');
    }
}
