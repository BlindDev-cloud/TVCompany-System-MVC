<?php

declare(strict_types=1);

namespace App\Validators;

use App\Enums\Role;

class CreateAccountValidator extends AuthValidator
{
    public function checkRole(string $accountRole): bool
    {
        $roles = Role::all();

        foreach ($roles as $role){
            if($accountRole === $role->value){
                return true;
            }
        }

        return false;
    }
}