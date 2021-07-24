<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{

    public function __invoke()
    {
        header('Content-Type: application/json');
        return  json_encode(User::all()->map->username);
    }
}
