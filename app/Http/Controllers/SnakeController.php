<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ResponseStatus;
use App\Models\User;
use App\Models\Game;
use App\Models\Egg;
use App\Models\Snake;
use App\Models\Position;

class SnakeController extends Controller
{
     
    public function move(Request $request)
    {
        $game_id = $request->game_id;
        $snake_dir = $request->direction;
       
        $snake = Snake::with(['positions','game'])->where(['game_id'=>$game_id, 'user_id'=>Auth::user()->id])->get();
         $snake->each->action($snake_dir);
       //echo $snake; 
       $game = Game::with(['eggs','snakes.positions'])->find($game_id);
       return response()->json($game, ResponseStatus::OK);
      

        
    }
    
}
