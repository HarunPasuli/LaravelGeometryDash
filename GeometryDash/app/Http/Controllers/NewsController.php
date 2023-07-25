<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function create() {
        return view('news.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'uploaded_at' => 'required',
            'author' => 'required|string',
            'description' => 'required|string',
            'sources' => 'string',
        ]);

        $uploadedAt = Carbon::now();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/news_images');

            // Get the actual file name (without the directory path)
            $imageFileName = Str::afterLast($imagePath, '/');
            $imageFilePath = 'storage/news_images/' . $imageFileName;

            // Update the image path in the validated data
            $validatedData['image'] = $imageFilePath;
        }

        $news = News::create($validatedData);

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
