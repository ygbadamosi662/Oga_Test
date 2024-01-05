<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    use HasUuids;

    /**
     * Set the password attribute.
     *
     * @param mixed $pwd The value to set the password attribute to.
     * @return void
     */
    public function setPasswordAttribute($pwd)
    {
        $this->attributes['password'] = Hash::make($pwd);
    }

    /**
     * Authenticates the user with the provided password.
     *
     * @param string $pwd The password to authenticate with.
     * @throws Some_Exception_Class Exception thrown if authentication fails.
     * @return bool Returns true if authentication is successful, false otherwise.
     */
    public function authenticate($pwd)
    {
        try {
            return Hash::check($pwd, $this->password);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
