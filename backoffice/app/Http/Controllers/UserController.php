<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController
{
    public function __construct()
    {
        parent::__construct(User::class, 'users');
    }
}
