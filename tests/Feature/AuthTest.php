<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
class AuthTest extends TestCase
{
    /**
     * usuario invitado redireccionado al login.
     *
     * @test
     */
    use RefreshDatabase;
    public function guest_redirect_login()
    {
        $response = $this->get('/');
        $response->assertRedirect('login');
    }
    /** usuario autenticado puede entrar al home
     * @test
     */
    public function user_authenticate_can_view_home()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create([
            'email' => 'user@spyfb.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);
        $this->assertDatabaseCount('users', 1);
        $this->actingAs($user);
        $response = $this->get('/home');
        $response->assertStatus(200);
    }
    /** invitado no puede ir al home
     *  redireccionar al login.
     * @test
     */
    public function guest_can_not_view_home()
    {
        $response = $this->get('/home');
        $response->assertRedirect('login');
    }
    /** usuario puede autenticarse
     * @test
     */
    public function user_can_authenticate()
    {
        // $this->withoutExceptionHandling();
        $user = User::factory()->create([
            'email' => 'user@spyfb.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);
        $response = $this->post('login', [
            'email' => 'user@spyfb.com',
            'password' => 'password'
        ]);
        // dd($response->content());
        $response->assertRedirect('/home');
    }
}