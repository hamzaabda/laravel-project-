<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $users = [
            ['id' => 1, 'name' => "Ahmed"],
            ['id' => 2, 'name' => "Omar"],
            ['id' => 3, 'name' => "Khaled"],
        ];

        // Optionnel : Affichage en console pour debug (supprimé ici car Laravel utilise les responses HTTP)
        // foreach ($users as $user) {
        //     echo $user['id'] . ',' . $user['name'] . "\n";
        // }

        return response()->json($users);
    }
}
