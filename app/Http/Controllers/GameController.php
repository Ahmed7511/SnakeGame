<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Snake;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
      public function games()
          {
              return view("games");
           }

    public function start($id)
    {
        $game = Game::with(['eggs','snakes.positions'])->find($id);
        $snake_value = ['game_id'=>$game->id, 'user_id'=> Auth::user()->id];
        if(Snake::where($snake_value)->exists() == false)
        {
            $snake = Snake::create($snake_value);
            $row = random_int(0, $game['rows'] -1);
            $col = random_int(0, $game['cols'] -1);
            $pos = Position::create(['snake_id'=>$snake->id, 'o_rder'=>0, 'row'=>$row, 'col'=>$col]);
            $snake->positions->push($pos);
            $game->snakes->push($snake);
        }

        return view("game",["game"=> $game]);
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
