<?php

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function createUser(Request $request)
    {
        $userDTO = new UserDTO(
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );

        $user = $this->userService->createUser($userDTO);

        return response()->json($user);
    }
    public function createStaticUser()
    {
        $userDTO = new UserDTO(
            "samar elsayed mohammed",
            "samar@gmail.com",
            "123456789",
        );

        $user = $this->userService->createUser($userDTO);

        return response()->json($user);
    }
}
