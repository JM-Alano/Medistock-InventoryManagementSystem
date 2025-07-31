<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all(); // You might want to paginate in production
        return view('medicine', compact('medicines'));
    }
}
