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
    

}
