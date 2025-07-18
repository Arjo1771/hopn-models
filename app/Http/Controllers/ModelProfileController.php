<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelProfile;
use Illuminate\Support\Str;

class ModelProfileController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'model_type' => 'required',
            'price' => 'required|numeric',
            'youtube' => 'nullable|url',
        ]);

        $validated['slug'] = Str::slug($validated['name'] . '-' . uniqid());

        $model = ModelProfile::create($validated);

        return response()->json($model, 201);
    }

    public function index(Request $request)
    {
        $query = ModelProfile::query();

        if ($request->gender) $query->where('gender', $request->gender);
        if ($request->city) $query->where('city', $request->city);
        if ($request->model_type) $query->where('model_type', $request->model_type);
        if ($request->price_min) $query->where('price', '>=', $request->price_min);
        if ($request->price_max) $query->where('price', '<=', $request->price_max);

        return response()->json($query->get());
    }

    public function show($id)
    {
        return ModelProfile::findOrFail($id);
    }

    // ✅ Add this method
    public function showBySlug($slug)
    {
        $model = ModelProfile::where('slug', $slug)->firstOrFail();
        return response()->json($model);
    }
}
