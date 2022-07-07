<?php

namespace Tests\Browser;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @test
     * @group login
     * @return void
     */
    
    public function login_user()
    {

        $this->browse(function (browser $browser){
            $browser->visit('/')
                    ->clickLink('Login')
                    ->type('email', 'taylor@laravel.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home');
                  
        });
    }
    /**
     * A Dusk test example.
     * @test
     * @group logout
     * @return void
     */
        
    public function logout_user()
    {

        $this->browse(function (browser $browser) {
            $browser->visit('/')
                    ->clickLink('Login')
                    ->type('email', 'taylor@laravel.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->visit('/logout')
                    ->assertPathIs('/logout');
        });
    }
    /**
     * A Dusk test example.
     * @test
     * @group regist
     * @return void
     */
    public function register()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Register')
                    ->type('name','test')
                    ->type('email','test@mail.com')
                    ->type('password','password')
                    ->type('no_hp','081123456789')
                    ->type('alamat','jalan bisa ya')
                    ->type('password_confirmation','password')
                    ->press('Register')
                    ->assertPathIs('/');
                    
        });
        
    }
    /**
     * A Dusk test example.
     * @test
     * @group category
     * @return void
     */
    
    public function create_category()
    {

        $this->browse(function (browser $browser){
            $browser->visit('/')
                    ->clickLink('Login')
                    ->type('email', 'taylor@laravel.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->assertSee('Dashboard')
                    ->visit('/category')
                    ->visit('/category/create')
                    ->type('nama', 'Haji')
                    ->press('Submit')
                    ->assertPathIs('/category')
                    ->assertSee('Haji');
                  
        });
    }
    /**
     * A Dusk test example.
     * @test
     * @group package
     * @return void
     */
    
    public function create_package()
    {
 
        $this->browse(function (browser $browser) {
            $browser->visit('/')
                    ->clickLink('Login')
                    ->type('email', 'taylor@laravel.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->assertSee('Dashboard')
                    ->visit('/category')
                    ->visit('/category/create')
                    ->type('nama', 'Haji')
                    ->press('Submit')
                    ->assertPathIs('/category')
                    ->assertSee('Haji')
                    ->visit('/package')
                    ->visit('/package/create')
                    ->type('nama_paket', 'Haji')
                    ->type('harga_satuan', '500')
                    ->type('tujuan', 'arab')
                    ->type('stok', '20')
                    ->select('category_id','1')
                    ->press('Submit')
                    ->assertPathIs('/package')
                    ->assertSee('Haji');
                  
        });
    }
    /**
     * A Dusk test example.
     * @test
     * @group user
     * @return void
     */
    
    public function create_user()
    {
       
        $this->browse(function (browser $browser){
            $browser->visit('/')
                    ->clickLink('Login')
                    ->type('email', 'taylor@laravel.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->assertSee('Dashboard')
                    ->visit('/user')
                    ->visit('/user/create')
                    ->type('name', 'Haji')
                    ->type('email','haji@gmail.com')
                    ->type('password', 'password')
                    ->type('no_hp','081123456789')
                    ->type('alamat','jalan bisa ya')
                    ->select('role','user')
                    ->press('Submit')
                    ->assertPathIs('/user')
                    ->assertSee('Haji');
                  
        });
    }
}
