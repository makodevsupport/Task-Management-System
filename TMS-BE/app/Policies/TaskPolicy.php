<?php

namespace App\Policies;

use App\Models\User;
use Sereny\NovaPermissions\Policies\BasePolicy;


class TaskPolicy extends BasePolicy
{
    /**
     * Create a new policy instance.
     */
public $key = 'tasks';
    public function __construct()
    {
        //
    }
}
