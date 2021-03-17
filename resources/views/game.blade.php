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
                    }
                        window.onload = on_load;
                 
         </script>
</body>
</html>