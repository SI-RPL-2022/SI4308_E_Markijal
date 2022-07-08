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
    
    public function login_admin()
    {

        $this->browse(function (browser $browser){
            $browser->visit('/')
                    ->clickLink('Login')
                    ->type('email', 'admin@mail.com')
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
        
    public function logout_admin()
    {

        $this->browse(function (browser $browser) {
            $browser->visit('/')
                    ->clickLink('Login')
                    ->type('email', 'admin@mail.com')
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
     * @group category
     * @return void
     */
    
    public function create_category()
    {

        $this->browse(function (browser $browser){
            $browser->visit('/')
                    ->clickLink('Login')
                    ->type('email', 'admin@mail.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->assertSee('Dashboard')
                    ->visit('/category')
                    ->visit('/category/create')
                    ->type('nama', 'Vacation')
                    ->press('Submit')
                    ->assertPathIs('/category')
                    ->assertSee('Vacation');
                  
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
                    ->type('email', 'admin@mail.com')
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
                    ->select('category_id','3')
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
                    ->type('email', 'admin@mail.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->assertSee('Dashboard')
                    ->visit('/user')
                    ->visit('/user/create')
                    ->type('name', 'dendy')
                    ->type('email','dendy@gmail.com')
                    ->type('password', 'password')
                    ->type('no_hp','081123456789')
                    ->type('alamat','jalan bisa ya')
                    ->select('role','user')
                    ->press('Submit')
                    ->assertPathIs('/user')
                    ->assertSee('dendy');
                  
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
     * @group users
     * @return void
     */
    
    public function booking_user()
    {
        $today = now();
        $this->browse(function (browser $browser)use($today){
            $browser->visit('/')
                    ->clickLink('Login')
                    ->type('email', 'test@mail.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/')
                    ->assertSee('MARKIJAL')
                    ->visit('/paket')
                    ->press('Book Now')
                    ->type('tanggal_pesan',$today->day)
                    ->type('tanggal_pesan', $today->month)
                    ->type('tanggal_pesan', $today->year)
                    ->press('Checkout')
                    ->assertPathIs('/profile')
                    ->assertsee('Profil Saya');

                  
        });
    }
    /**
     * A Dusk test example.
     * @test
     * @group up
     * @return void
     */
    
    public function update_users()
    {
        $today = now();
        $this->browse(function (browser $browser)use($today){
            $browser->visit('/')
                    ->clickLink('Login')
                    ->type('email', 'test@mail.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/')
                    ->assertSee('MARKIJAL')
                    ->visit('/profile')
                    ->assertsee('Profil Saya')
                    ->type('name', 'halo')
                    ->type('email','halo@gmail.com')
                    ->type('alamat','jalan bisa ya')
                    ->type('no_hp','081123456789')
                    ->type('password', 'password')
                    ->press('Update')
                    ->assertSee('Profil Saya');
                    
                    

                  
        });
    }
}
