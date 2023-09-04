```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Story;
use App\Models\Progress;
use App\Models\Interaction;

class ApiController extends Controller
{
    public function getCharacter($id)
    {
        $character = Character::find($id);
        return response()->json($character);
    }

    public function getStory($id)
    {
        $story = Story::find($id);
        return response()->json($story);
    }

    public function getProgress($id)
    {
        $progress = Progress::find($id);
        return response()->json($progress);
    }

    public function getInteraction($id)
    {
        $interaction = Interaction::find($id);
        return response()->json($interaction);
    }
}
```