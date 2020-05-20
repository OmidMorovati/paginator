<?php

namespace OmidMorovati\Paginator\Tests;

use Illuminate\Database\Eloquent\Collection;
use OmidMorovati\Paginator\PaginatorServiceProvider;
use Tests\TestCase;

class PaginateTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [PaginatorServiceProvider::class];
    }

    public function testModelCanPaginate()
    {
        $this->assertInstanceOf(Collection::class,\App\User::makePaginate(12)->get());
        $this->assertCount(12,\App\User::makePaginate(12)->get());
    }

    public function testCollectionCanRenderPaginate()
    {
        $collection=\App\User::all();
        $html=$collection->renderPaginate();
        $this->assertIsString($html);
        $this->assertStringContainsString('</div>',$html);
    }
}
