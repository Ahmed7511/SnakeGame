<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\Egg;
use App\Models\ResponseStatus;
use Illuminate\Http\Request;

class GameApiController extends Controller
{
       public function create(Request $request)
              {
                   $game = Game::create($request->all());
                   
                   for($e=0; $e<$game['eggs']; $e++)
                   {
                        $row = random_int(0, $game['rows'] -1 );
                        $col = random_int(0, $game['cols'] -1 );
                        $egg = Egg::create(['game_id'=>$game['id'], 'row'=>$row, 'col'=> $col]);   
                   }
                   for($s=0; $s<$game['snakes']; $s++)
                   {
                        $row = random_int(0, $game['rows'] -1 );
                        $col = random_int(0, $game['cols'] -1 );
                        $snake = Snake::create(['game_id'=>$game['id'], 'row'=>$row, 'col'=> $col]);   
                   }
                   $game = Game::find($game['id']);
                    return response()->json($game, ResponseStatus::CREATED);
              }
              
       public function read_all()
              {
                $games = Game::all();
                      if(empty($games))
                    {
                      return response()->json($games, ResponseStatus::NO_CONTENT);
                    }
                     return response()->json($games, ResponseStatus::OK);
             }

             
}

