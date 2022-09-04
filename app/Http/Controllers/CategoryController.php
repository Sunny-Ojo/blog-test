<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
         ]);
        Category::create([
            'name' =>  $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return back()->with('success', 'Category added');
    }
}
