<?php

namespace OmidMorovati\Paginator\Tests;

use Orchestra\Testbench\TestCase;
use OmidMorovati\Paginator\PaginatorServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [PaginatorServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
