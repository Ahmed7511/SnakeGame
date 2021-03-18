<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Egg;
use App\Models\Snake;
class Game extends Model
{
    use HasFactory;
    protected $fillable = ["rows", "cols", "eggs", "snakes","user_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function eggs()
    {
        return $this->HasMany(Egg::class);
    }
    public function snakes()
    {
        return $this->HasMany(Snake::class);
    }
}
