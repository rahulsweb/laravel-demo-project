<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class Register extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertSee('Register')
                    ->type('first_name','rahul')
                    ->type('last_name','rahul')
                    ->type('email','rahul@gmail.com')
                    ->type('password','rahul')
                    ->type('confirm_password','rahul')
                    ->press('Create')
                    ->storeConsoleLog('Register')
                    ->assertPathIs('/');


                });
    }
}
