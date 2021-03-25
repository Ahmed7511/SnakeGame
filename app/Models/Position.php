<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game; 
use App\Models\Snake; 
use App\Models\Position; 

class Position extends Model
{
    use HasFactory;
    protected $fillable =['snake_id','o_rder','row','col'];
    public $timestamps = false;

    public function snake()
    {
        return $this->belongsTo(Snake::class);
    }
    public function move($dir)
        {
                  switch($dir)
                     {
                    case "ArrowLeft":
                         $this->col -= 1;
                        break;
                    case "ArrowRight":
                         $this->col += 1;
                        break;
                    case "ArrowUp":
                         $this->row -= 1;
                          break;
                    case "ArrowDown":
                         $this->row += 1; 
                          break;
                      }
         }
        
 }
