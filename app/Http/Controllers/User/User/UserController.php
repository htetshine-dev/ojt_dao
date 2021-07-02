<?php

namespace App\Http\Controllers\User\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Services\User\UserServiceInterface;

class UserController extends Controller
{
    private $userInterface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserServiceInterface $userInterface)
    {

      $this->middleware('auth');
      $this->userInterface = $userInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = $this->userInterface->getUserList();
        return $users;
    }

}
