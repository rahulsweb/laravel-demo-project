<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddCartTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->assertSee('Quick Heal')
            ->visit(
                $browser->attribute('#add_to_cart', 'href')
            )
            ->assertPathIs('/');
               
        
        });
    }
}
