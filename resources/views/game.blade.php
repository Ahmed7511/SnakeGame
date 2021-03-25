<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Grille de jeu {{$game["id"]}}
         <table style="min-width:100px;min-height:100px;">
                <tbody>
                         @for ($i = 0; $i < $game["rows"]; $i++)
                       <tr>
                              @for ($j = 0; $j < $game["cols"]; $j++)
                              <td id=<?= $i, $j ?> width="30px" height="30px" style="background-color:gray;"></td>
                              @endfor
                      </tr>
                         @endfor
               </tbody>
         </table>
                  

         <script>
    
                    var game = {!! json_encode($game->toArray()) !!};
                  
                    function color_game_objects(game, colors)
                          {
                              for(let e = 0; e < game["eggs"].length; ++e)
                                   {  
                                      let row = game["eggs"][e]["row"];
                                      let col = game["eggs"][e]["col"];
                                    
                                      let td_id =  row + "" + col;
                                      //console.log(td_id);
                                       let td = document.getElementById(td_id);
                                        td.style.backgroundColor = colors["egg"];
                                    }
                      for(let s = 0; s < game["snakes"].length; ++s)
                               {
                        let snake = game["snakes"][s];
                             for(let e = 0; e < snake["positions"].length; ++e)
                                    {
                                 let pos = snake["positions"][e];
                                 let row = pos["row"];
                                 let col = pos["col"];
                                 let td_id =  row + "" + col;
                                 let td = document.getElementById(td_id);
                                 td.style.backgroundColor = colors["snake"];
                                       }
                                }
                         }
                 function show_game_objects(game)
                         {
                               color_game_objects(game, {"egg" : "yellow", "snake" : "green"});
                         }
                         function hide_game_object(game)
                          {
                            color_game_objects(game, {"egg" : "gray", "snake" : "gray"});
                            window.location.reload ; 
                          }
                
                function handle_response_move(game)
                                {
                                  show_game_objects(game);
                                  document.game = game;
                                     }
            
              function send_request_move(game, direction)
                                   {
                                          let xhttp = new XMLHttpRequest(); 
                                             xhttp.onreadystatechange = function ()
                                                    {
                                                          if (this.readyState == 4 && this.status == 200)
                                                            { 
                                                                  hide_game_object(game);
                                                                 // console.log(xhttp.responseText);
                                                                   handle_response_move(JSON.parse(xhttp.responseText));
                                                               }
                                                      };
                                               xhttp.open("GET", "/move?game_id=" + game["id"] + "&direction=" + direction, true);
                                                xhttp.send();
                                    
                                      }
                function on_key_down(e)
                            { 
                                e = e || window.event;
                              direction = e.key;
                           //console.log(e.key);//e.key == "ArrowLeft" ou bien "ArrowRight" ou bien "ArrowUp" ou bien "ArrowDown"
                               send_request_move(document.game, direction);
                            } 
             
             function on_load()
                 {
                        var game = {!! json_encode($game->toArray()) !!};
                            show_game_objects(game);
                             console.log(game);
                               document.game = game;
                                document.onkeydown = on_key_down;
                 }
                window.onload = on_load;
                             
         </script>
</body>
</html>