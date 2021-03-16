<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $phone = '+79184444444';
    protected $email = 's_admin@mail.ru';

    use DatabaseTransactions;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_user()
    {
        $user = new User();
        $user->phone = $this->phone;
        $user->save();
//                'email' => $this->email,
//                'password' => '123456789'
//        ::create([
//                'phone' => $this->phone,
//                'email' => $this->email,
//                'password' => '123456789'
//            ]
//        );
//        self::assertNotEmpty($user);
//
//        self::assertEquals($this->phone, $user->phone);
//        self::assertEquals($this->email, $user->email);
//        self::assertNotEmpty($user->password);
    }
}
