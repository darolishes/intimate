```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progress;

class ProgressController extends Controller
{
    public function index()
    {
        $progresses = Progress::all();
        return response()->json($progresses);
    }

    public function show($id)
    {
        $progress = Progress::find($id);
        return response()->json($progress);
    }

    public function store(Request $request)
    {
        $progress = new Progress;
        $progress->character_id = $request->character_id;
        $progress->story_id = $request->story_id;
        $progress->progress = $request->progress;
        $progress->save();

        return response()->json([
            'message' => 'Progress successfully stored',
            'progress' => $progress
        ]);
    }

    public function update(Request $request, $id)
    {
        $progress = Progress::find($id);
        $progress->progress = $request->progress;
        $progress->save();

        return response()->json([
            'message' => 'Progress successfully updated',
            'progress' => $progress
        ]);
    }

    public function destroy($id)
    {
        $progress = Progress::find($id);
        $progress->delete();

        return response()->json([
            'message' => 'Progress successfully deleted',
        ]);
    }
}
```