```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::all();
        return view('story', ['stories' => $stories]);
    }

    public function create(Request $request)
    {
        $story = new Story;
        $story->title = $request->title;
        $story->description = $request->description;
        $story->character_id = $request->character_id;
        $story->save();

        return response()->json($story, 201);
    }

    public function update(Request $request, $id)
    {
        $story = Story::findOrFail($id);
        $story->title = $request->title;
        $story->description = $request->description;
        $story->character_id = $request->character_id;
        $story->save();

        return response()->json($story, 200);
    }

    public function delete($id)
    {
        $story = Story::findOrFail($id);
        $story->delete();

        return response()->json(null, 204);
    }
}
```