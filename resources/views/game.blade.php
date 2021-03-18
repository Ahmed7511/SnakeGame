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
        function on_load()
                 {
                    var game = {!! json_encode($game->toArray()) !!};
                  
                    for(let e = 0; e < game["eggs"].length; ++e)
                           {
                              let row = game["eggs"][e]["row"];
                              let col = game["eggs"][e]["col"];
                              let td_id =  row + "" + col;
                              let td = document.getElementById(td_id);
                                  td.style.backgroundColor = "yellow";
                              }
                              for(let s = 0; s < game["snakes"].length; ++s)
                         {
                              let snake = game["snakes"][s];
                              //console.log(snake)
                                     for(let e = 0; e < snake["positions"].length; ++e)
                                           {
                                               let pos = snake["positions"][e];
                                               let row = pos["row"];
                                                let col = pos["col"];
                                               // console.log(pos)
                                               let td_id =  row + "" + col;
                                                  let td = document.getElementById(td_id);
                                                    td.style.backgroundColor = "green";
                                      } 
                          }
                          document.onkeydown = on_key_down;
                    }
                        window.onload = on_load;
                 function on_key_down(e)
                            {
                                 e = e || window.event;
                                    console.log(e);
                                  console.log(e.key);//e.key == "ArrowLeft" ou bien "ArrowRight" ou bien "ArrowUp" ou bien "ArrowDown"
                             }
         </script>
</body>
</html>