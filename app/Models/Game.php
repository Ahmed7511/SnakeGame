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

    public static function object_at($game_id, $row, $col)
    {
        $eggs = Egg::where(['game_id' => $game_id, 'row' => $row, 'col' => $col])->get();
          if(count($eggs) != 0)
                  {
                    return $eggs[0];
                   }
                          $snakes_ids = Snake::where(['game_id' => $game_id])->select(['id']);
                          $snakes_positions = Position::whereIn('snake_id', $snakes_ids)->where(['row' => $row, 'col' => $col])->get();
                        if(count($snakes_positions) != 0)
                               {
                                  $pos = $snakes_positions[0];
                                 $snake = Snake::with(['positions'])->find($pos->snake_id);
                                  return $snake;
                                }
                    return null;
                   }
}
