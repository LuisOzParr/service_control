<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\UsersCollection;
use App\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return UsersCollection
     */
    public function index()
    {
        return new UsersCollection(User::all());
    }
}
