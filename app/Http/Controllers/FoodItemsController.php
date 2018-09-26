<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodItems;

class FoodItemsController extends Controller
{
    public function breakfast(){
        $fooditems = FoodItems::select ('id', 'name','description','price','photo')
        ->where('category', 'breakfast')->get();
        return view('pages.food', compact('fooditems'));
    }

    public function lunch(){
        $fooditems = FoodItems::select ('id', 'name','description','price','photo')
        ->where('category', 'lunch')->get();
        return view('pages.food', compact('fooditems'));
    }

    public function cake(){
        $fooditems = FoodItems::select ('id', 'name','description','price','photo')
        ->where('category', 'cake')->get();
        return view('pages.food', compact('fooditems'));
    }
}
