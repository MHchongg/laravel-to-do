<?php

namespace App\Policies;

use App\Models\ToDo;
use App\Models\User;

class ToDoPolicy
{
    /**
     * Create a new policy instance.
     */
    public function edit_todo (User $user, ToDo $todo) {
        return $todo->user_id === $user->id;
    }
}
