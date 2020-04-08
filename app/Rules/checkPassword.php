<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class checkPassword implements Rule
{
private $username;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($username)
    {
        $this->username = $username;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
            $user = User::where('username',$this->username)->first();
            $password = isset($user) ? $user->password : null;
        return Hash::check($value,$password);

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Ce n'est pas le bon mot de passe";
    }
}
