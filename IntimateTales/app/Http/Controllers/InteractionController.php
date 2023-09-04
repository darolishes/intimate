```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interaction;
use Illuminate\Support\Facades\Auth;

class InteractionController extends Controller
{
    public function create(Request $request)
    {
        $interaction = new Interaction;
        $interaction->user_id = Auth::id();
        $interaction->story_id = $request->story_id;
        $interaction->content = $request->content;
        $interaction->save();

        return response()->json($interaction);
    }

    public function update(Request $request, $id)
    {
        $interaction = Interaction::find($id);
        $interaction->content = $request->content;
        $interaction->save();

        return response()->json($interaction);
    }

    public function delete($id)
    {
        $interaction = Interaction::find($id);
        $interaction->delete();

        return response()->json('Interaction deleted successfully');
    }

    public function show($id)
    {
        $interaction = Interaction::find($id);
        return response()->json($interaction);
    }

    public function index()
    {
        $interactions = Interaction::where('user_id', Auth::id())->get();
        return response()->json($interactions);
    }
}
```