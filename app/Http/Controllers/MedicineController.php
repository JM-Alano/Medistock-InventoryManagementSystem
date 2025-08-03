<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{
  public function index(Request $request)
    {
        $perPage = $request->get('perPage', 10); // default to 10 if not provided
        $medicines = Medicine::paginate($perPage);

        return view('medicine', compact('medicines'));
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'medicine_name' => 'required|string|max:255',
        'brand_name' => 'required|string|max:255',
        'dosage' => 'required|string|max:255',
        'catergory' => 'required|string|max:255',
    ]);

    Medicine::create($validated);

    return redirect()->route('medicine')->with('success', 'Medicine added successfully.');
}
  public function search(Request $request)
{
    $query = $request->input('query');

    $medicines = Medicine::where('medicine_name', 'like', "%$query%")
        ->orWhere('brand_name', 'like', "%$query%")
        ->orWhere('dosage', 'like', "%$query%")
        ->orWhere('category', 'like', "%$query%")
        ->paginate(10);

    return response()->json([
        'table' => view('profile.partials.medicine-table-body', compact('medicines'))->render(),
    ]);
}


}