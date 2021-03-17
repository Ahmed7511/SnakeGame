<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Snake;

class GameController extends Controller
{
      public function games()
          {
              return view("games");
           }

    public function start($id)
    {
        $game = Game::with(['eggs'])->find($id);

        return view("game",["game"=> $game]);
    }


}
