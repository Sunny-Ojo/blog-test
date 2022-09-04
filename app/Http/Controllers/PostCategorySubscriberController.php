<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PostCategorySubscriber;
use Illuminate\Http\Request;

class PostCategorySubscriberController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'email' => ['required']
        ]);
        //find the  subscription of the user 
        $categorySubscriber = PostCategorySubscriber::where([
          'category_id' =>  $request->category_id, 
          'email' => $request->email
        ])->first();
        if ($categorySubscriber) {
            return  back()->with('subscription-successful', 'You have already subscribed to this category newsletter');
        }

    //create the subscription
    try {
      PostCategorySubscriber::create([
      'email' => $request->email, 
      'category_id' => $request->category_id,
     ]
    );
     return  back()->with('subscription-successful', 'You have succcessfully subscribed to this category newsletter');
       } catch (\Throwable $th) {
        return  back()->with('error', $th->getMessage());
       }
    }
}
