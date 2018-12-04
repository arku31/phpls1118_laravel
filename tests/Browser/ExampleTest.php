<?php

namespace Tests\Browser;

use Faker\Factory;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $faker = Factory::create();
            $password = $faker->password(10);
            $browser->visit('/')
                    ->assertSee('Laravel')
                    ->click('div.top-right.links > a:nth-child(2)')
                    ->type('name', 'Igor')
                    ->type('email', $faker->email)
                    ->type('password', $password)
                    ->type('password_confirmation', $password)
                    ->press('Register')
                    ->waitFor('.card-body', 3)
                    ->assertSee('You are logged in!')
            ;
        });
    }
}
