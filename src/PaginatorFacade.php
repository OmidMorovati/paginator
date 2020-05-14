<?php

namespace OmidMorovati\Paginator;

use Illuminate\Support\Facades\Facade;

/**
 * @see \OmidMorovati\Paginator\Skeleton\SkeletonClass
 */
class PaginatorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'paginator';
    }
}
