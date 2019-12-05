<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\User;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{





    /**
     * A basic browser test example.
     *
     * @return void
     */

    public function testNotLogin()
    {
        $this->browse(function ($browser)  {
            $browser->visit('/login')
                    ->type('email', 'swara1@gmail.com')
                    ->type('password', '123456789')
                    ->press('Login')
                    ->assertSee('Not Exist Email and PassWord');
           
                   
        }); 
    }


    public function testLogin()
    {
        

        $this->browse(function ($browser)  {
            $browser->visit('/login')
                    ->type('email', 'swara1@gmail.com')
                    ->type('password', '12345678')
                    ->press('Login')
                    ->assertPathIs('/');
                   
        });
    }
}
