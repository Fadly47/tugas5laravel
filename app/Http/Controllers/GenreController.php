<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::all();

        if ($genres->isEmpty()){
            return response()->json([
                "success"=> true,
                "message"=> "resource data not found!"
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all resources",
            "data" => $genres
        ], 200);
    }

public function store(Request $request) {
    // 1. validator 
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:100',
        'description' => 'required|string',
    ]);
    // 2. cek validator error
    if ($validator->fails()) {
        return response()->json([
            'success' => false ,
            'message' => $validator->errors()
        ], 422);
    }
    // 3. insert data
     $genre = Genre::create([
        'name' => $request->name, 
        'description' => $request->description,
    ]);
    // 4. respons (error/berhasil)

    return response()->json([
        'success' => true,
        'message' => 'resource added succesfully!',
        'data' => $genre
    ], 201);
}


public function show(string $id) {
    $genres = Genre::find($id);

    if (!$genres) {
        return response()->json([
            'success' => false,
            'message' => 'resource not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'message' => 'get detail resource',
        'data' => $genres
    ], 200);
}


public function update(string $id, Request $request) {
     // 1. Mencari data
     $genre = Genre::find($id);

     if (!$genre) {
        return response()->json([
            'success' => false,
            'message' => 'Resource not found',
        ], 404);
     }

     // 2. Validator
     $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:100',
        'description' => 'required|string',
    ]);
    
    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => $validator->errors()
        ], 422);
    }
     // 3. Siapkan data yang ingin di update
     $data = [
        'name' => $request->name, 
        'description' => $request->description,
    ];


     // 5. Update data baru ke database
     $genre->update($data);

     return response()->json([
        'success' => true,
        'message' => 'Resource updated successfully',
        'data' => $genre
    ], 200);
}

    public function destroy(string $id) {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'resource not found'
            ], 404);
        }
        $genre->delete();

        return response()->json([
            'success' => true,
            'message' => 'Delete Resorce successfully'
        ]);
    }
    }
