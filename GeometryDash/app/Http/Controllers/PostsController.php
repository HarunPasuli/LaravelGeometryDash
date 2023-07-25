<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function create()
    {
        return view('uploads.posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|string',
            'description' => 'required|string',
        ]);

        $uploadedAt = Carbon::now();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/posts_images');

            // Get the actual file name (without the directory path)
            $imageFileName = Str::afterLast($imagePath, '/');
            $imageFilePath = 'storage/posts_images/' . $imageFileName;

            // Update the image path in the validated data
            $validatedData['image'] = $imageFilePath;
        }

        $post = Posts::create($validatedData);

        return redirect()->route('pages.index');
    }

    // public function show($id)
    // {
    //     // Retrieve the data from the database based on the ID
    //     $posts = Posts::findOrFail($id);

    //     // Extract the data
    //     $title = $posts->title;
    //     $description = $posts->description;
    //     $profileName = $posts->profileName;
    //     $posts->increment('views');
    //     return view('pages.post-page', ['post' => $posts]);
    // }
}
