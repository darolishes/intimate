```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $table = 'progress';

    protected $fillable = [
        'character_id',
        'story_id',
        'current_scene',
        'choices_made',
    ];

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
```