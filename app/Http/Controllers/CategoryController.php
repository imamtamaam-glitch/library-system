<?php
namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = [
            'Fiksi',
            'Non Fiksi',
            'Sejarah',
            'Religi',
            'Self Improvement'
        ];
        
        return view('categories.index', compact('categories'));
    }
}