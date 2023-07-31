<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before()
    {
    }

    public function create(User $user)
    {
        return true;
    }

    public function view(User $user,User $model)
    {
        //Aca se aplican las reglas de validacion de politicas de usuario
        return true;
    }

    public function update(User $user,User $model)
    {
        //Aca se aplican las reglas de validacion de politicas de usuario
        return true;
    }

    public function delete(User $user,User $model)
    {
        //Aca se aplican las reglas de validacion de politicas de usuario
        if ($model->exists) {
            // Aca se aplican las reglas de validacion de politicas de usuario
            return true;
        } else {
            // Si el modelo no existe, arrojar una excepción
            throw new \Exception('El usuario que se quiere eliminar no existe');
        }
    }
}
