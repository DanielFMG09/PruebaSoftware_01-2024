<?php


use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller{

    public  function store(Request $request){

        $request>validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'confirmed', 
                rules\Password::min(1)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()
            ],
            'password_confirmation' => ['required']
        ]);

    }
}


?>