<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\Search;

class SearchControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testindex()
    {
        $SearchController = new SearchController;

        $boo = $SearchController->searchAll();

        $this->AssertNull($boo);
    }
}
