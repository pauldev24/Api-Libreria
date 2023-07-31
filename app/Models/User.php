<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function createModel($request)
    {
        $user = $this;
        $user->name = $request->name;
        $user->email = $request->email;
        //Hash para crear llave de encriptacion
        $user->password = Hash::make($request->password);
        $user->save();

        return $user;
    }

    public function updateModel($request)
    {
        $this->update($request->only(['name', 'email']));

        return $this;
    }

    public function deleteModel()
    {
        //Puedo hacer algo antes de eliminar

        return $this->delete();
    }
}
