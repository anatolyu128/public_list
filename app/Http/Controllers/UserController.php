<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function registrationForm()
    {
        return view("user.registration");
    }

    public function login()
    {
        return view('user.login');
    }

    public function getSalt( $email, $password)
    {
        $salt = explode("@", $email);
        $salt = $salt[0] . $password . $salt[1];

        return $salt;
    }

    public function getHash( $email, $password )
    {
        $salt = explode("@", $email);
        $hash = password_hash($salt[0] . $password . $salt[1], PASSWORD_BCRYPT, ["cost" => 14]);

        return $hash;
    }

    public function validateNewUser(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $hash = $this->getHash($request->email, $request->password);

        $user = new User;

        $user->email = $request->email;
        $user->password = $hash;
        $user->banned = 0;
        $user->isAdmin = 0;

        $user->save();

        return dump($request->all());
    }

    public function confirmAuth(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|'
        ]);

        $user = User::where("email", $request->email)->first();
        if($user === null) {
            $error = ValidationException::withMessages([
                'login' => ['Неверный email или пароль'],
            ]);
            throw $error;
        }

        if ( password_verify( $this->getSalt( $request->email, $request->password ), $user->password) === true ) {
            echo "Верный пароль!";
        } else {
            $error = ValidationException::withMessages([
                'login' => ['Неверный email или пароль'],
            ]);
            throw $error;
        }
    }

}
