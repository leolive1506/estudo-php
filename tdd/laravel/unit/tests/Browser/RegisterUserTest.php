<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterUserTest extends DuskTestCase
{
    /** @test */
    public function check_if_root_site_is_correct()
    {
        // vai em / e ve se tem a palavra Laravel
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

    /** @test */
    public function registrarNovoUsuarioEstaFuncionando()
    {
        $this->browse(function(Browser $browser) {
            $browser->visit('/register')
                ->type('name', 'Leo teste')
                ->type('email', 'dddd@precpago.com.br')
                ->type('password', 'asdfasdf')
                ->type('password_confirmation', 'asdfasdf')
                ->press('REGISTER')
                ->assertPathIs('/dashboard')
                ->assertSee('logged');
            // $browser->storeSource('register.blade.php');
        });
    }

     /** @test */
    public function checkIfLoginFunctionIsWorking()
    {
        $this->browse(function(Browser $browser) {
            $browser->visit('/login') // rota
                ->type('email', 'leonardolivelopes2@gmail.com') // (campoInput, valor)
                ->type('password', 'asdfasdf')
                ->press('LOGIN') // clica em Login
                ->assertPathIs('/dashboard'); // Certificar se o caminho é dashboard
        });
    }


}
