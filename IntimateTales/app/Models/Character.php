```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $table = 'characters';

    protected $fillable = [
        'name',
        'description',
        'strength',
        'intelligence',
        'charisma',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stories()
    {
        return $this->hasMany(Story::class);
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }
}
```