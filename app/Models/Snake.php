<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position; 

class Snake extends Model
{
    use HasFactory;
    protected $fillable = ['game_id', 'user_id'];
        public $timestamps = false;
          public function game()
                  {
                      return $this->belongsTo(Game::class);
                   }
          public function user()
                   {
                      return $this->belongsTo(User::class);
                   }
           public function positions()
           {
               return $this->hasMany(Position::class)->orderBy('o_rder','ASC');
           }        
}
