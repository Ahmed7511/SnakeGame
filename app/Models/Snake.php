<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game; 

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

           public function move($snake_dir)
           {
              $pos = clone $this->positions[0]; // on recupére la position 
              $pos->move($snake_dir);
              
              // vérifier le contenu de la pos
               $obj = Game::object_at($this->game_id, $pos->row, $pos->col);
               if($obj instanceof Snake)
               {
                   //supprimer le snake qui a bougé vers une case qui contient un snake
                   $this->delete();
               }
               else if($obj instanceof Egg)
               {
                   // suprimer l'Egg manger par le snake
                   $this->delete();
                  // et puis on recupére la nouvelle pos aprés l'augmentation de la taille de Snake
                  $pos = Position::create(['snake_id'=>$this->id, 'row'=>$pos->row,'col'=>$pos->col, 'o_rder'=>$pos->o_rder -1]);
               
                }
                else
                {
                    $last_pos = $this->positions[count($this->positions)-1];
                    $last_pos->update(['row'=>$pos->row, 'col'=>$pos->col,'o_rder'=>$pos->order -1]);
                }
           }
}
