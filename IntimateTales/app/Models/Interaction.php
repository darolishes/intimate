```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    use HasFactory;

    protected $table = 'interactions';

    protected $fillable = [
        'character_id',
        'story_id',
        'interaction_type',
        'interaction_details',
        'timestamp'
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