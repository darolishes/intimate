```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $table = 'stories';

    protected $fillable = [
        'title',
        'description',
        'character_id',
        'progress_id',
    ];

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function progress()
    {
        return $this->hasOne(Progress::class);
    }

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }
}
```