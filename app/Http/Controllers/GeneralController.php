<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Product;

class GeneralController extends Controller
{
    public function choosePokemon(Request $request)
    {
        if ($request->isMethod('post')) {

            $pokemon = $request->input('pokemon');

            echo "youve chosen this pokemon: $pokemon";
        } else {
            echo 'request method not allowed';
        }
    }

    public static function fastPrint($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    public static function homePage()
    {
        $allPosts = Post::all();
        $userPosts = [];
        $userId = Auth::id();

        if (Auth::check()) {
            $userPosts = Post::where('user_id', $userId)->get();
        }

        return view('pages.initial', [
            'allPosts' => $allPosts,
            'userPosts' => $userPosts,
            'userId' => $userId
        ]);
    }

    public static function shopPage()
    {
        $admin = false;
        $products = Product::all();

        if (Auth::check() && Auth::user()->role === 'admin') {
            $admin = true;
        }

        return view('pages.shop', [
            'admin' => $admin,
            'products' => $products
        ]);
    }
}
