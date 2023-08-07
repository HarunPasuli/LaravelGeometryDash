<?php

namespace App\Http\Controllers;

use App\Models\LevelGuesser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LevelGuesserController extends Controller
{
    public function create() {
        return view('uploads.level-guesser.create');
    }


    public function store(Request $request) {
        // dd($request->all());
        $validatedData = $request->validate([
            'level' => 'required|string',
            'alt1' => 'nullable|string',
            'alt2' => 'nullable|string',
            'difficulty' => 'required|int',
            'filename' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // dd($request->all());
        if ($request->hasFile('filename')) {
            $image = $request->file('filename');
            $imagePath = $image->store('public/level_images');

            // Get the actual file name (without the directory path)
            $imageFileName = Str::afterLast($imagePath, '/');
            $imageFilePath = 'storage/level_images/' . $imageFileName;

            // Update the image path in the validated data
            $validatedData['filename'] = $imageFilePath;
        }


        $level = LevelGuesser::create($validatedData);

        // return redirect()->route('level-guesser.levelguesser');
    }

    public function show($id)
    {
        // Retrieve the data from the database based on the ID
        $level = LevelGuesser::findOrFail($id);

        // Extract the data
        $category = $level->category;
        $title = $level->title;
        $description = $level->description;
        $profileName = $level->profileName;
        return view('level-guesser.level', ['level' => $level, 'difficulty' => $level->difficulty, 'levelWasContent' => $level->level]);
    }
}
