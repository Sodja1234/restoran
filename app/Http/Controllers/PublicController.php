<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class PublicController extends Controller
{
    public function index()
    {
        $categories = Category::with(['dishes' => function($query) {
            $query->where('is_available', true);
        }])->orderBy('sort_order', 'asc')->get();

        return view('welcome', compact('categories'));
    }
}
