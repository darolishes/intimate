```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{
    public function createCharacter(Request $request)
    {
        $character = new Character;
        $character->name = $request->name;
        $character->description = $request->description;
        $character->user_id = Auth::id();
        $character->save();

        return response()->json($character);
    }

    public function updateCharacter(Request $request, $id)
    {
        $character = Character::find($id);
        $character->name = $request->name;
        $character->description = $request->description;
        $character->save();

        return response()->json($character);
    }

    public function deleteCharacter($id)
    {
        $character = Character::find($id);
        $character->delete();

        return response()->json('Character deleted successfully');
    }

    public function getCharacter($id)
    {
        $character = Character::find($id);

        return response()->json($character);
    }

    public function getAllCharacters()
    {
        $characters = Character::where('user_id', Auth::id())->get();

        return response()->json($characters);
    }
}
```