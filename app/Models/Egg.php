<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egg extends Model
{
    use HasFactory;
   protected $fillable = ["row", "col", "game_id"];
   public $timestamps = false;

   public function game()
   {
       return $this->belonsTo(Game::class);
   }
}