<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
   public function after_login_user_can_not_access_home_page_until_verified(){
       $user=factory(User::class)->create();
       $this->get('/home')->assertRedirect('/');

   }
}
