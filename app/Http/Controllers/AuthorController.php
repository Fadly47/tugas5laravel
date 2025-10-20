<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::all();

        if ($authors->isEmpty()){
            return response()->json([
                "success"=> true,
                "message"=> "resource data not found!"
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all resources",
            "data" => $authors
        ], 200);
    }

public function store(Request $request) {
    // 1. validator 
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:100',
        'photo'=> 'required|image|mimes:jpeg,jpg,png|max:2048',
        'bio' => 'required|string'
    ]);
    // 2. cek validator error
    if ($validator->fails()) {
        return response()->json([
            'success' => false ,
            'message' => $validator->errors()
        ], 422);
    }
    // 3. upload image
    $image = $request->file('photo');
    $image->store('authors', 'public');
    // 4. insert data
     $author = Author::create([
        'name' => $request->name, 
        'photo' => $image->hashName(),
        'bio' => $request->bio
    ]);


    // 5. respons (error/berhasil)

    return response()->json([
        'success' => true,
        'message' => 'resource added succesfully!',
        'data' => $author
    ], 201);
}

public function show(string $id) {
    $author = Author::find($id);

    if (!$author) {
        return response()->json([
            'success' => false,
            'message' => 'resource not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'message' => 'get detail resource',
        'data' => $author
    ], 200);
}


public function update(string $id, Request $request) {
     // 1. Mencari data
     $author = Author::find($id);

     if (!$author) {
        return response()->json([
            'success' => false,
            'message' => 'Resource not found',
        ], 404);
     }

     // 2. Validator
     $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:100',
        'photo'=> 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        'bio' => 'required|string'
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
        'bio' => $request->bio
    ];

     // 4. handle image (upload, delete image)
    if($request->hasFile('photo')) {
        $image = $request->file('photo');
        $image->store('photo', 'public');

        if($author->photo) {
            storage::disk('public')->delete('author/' . $author->photo);
        }

        $data['photo'] = $image->hashName();
    }

     // 5. Update data baru ke database
     $author->update($data);

     return response()->json([
        'success' => true,
        'message' => 'Resource updated successfully',
        'data' => $author
    ], 200);
}

    public function destroy(string $id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'resource not found'
            ], 404);
        }

        if ($author->photo) {
            // Delete from storage
            Storage::disk('public')->delete('authors/' . $author->photo);
        } 

        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Delete Resorce successfully'
        ]);
    }
    }