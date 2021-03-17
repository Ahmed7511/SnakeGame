<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
           ici on affichera la liste des games <br/>
           un utilisateur peut créer une partie en configurant: <br/>
       
       <ul>
           <li>le nombre de  lignes</li>
           <li>le nombre de colonnes</li>
           <li>le nombre d'oeufs</li>
           <li>le nombre de serpents/joueurs </li>
       </ul>
   L'utilisateur qui a créé la partie la rejoint automatiquement <br/>
   un utilisateur peut rejoindre une partie qui existe déjà <br/>
   une fois le nombre de joueurs fixé à la création de la partie est atteint, la partie commence automatiquement <br/>
   
 <div>
   <form id="form">
           <input id="input_user_id" name="user_id" placeholder="user_id" type="number" min="1" value="{{Auth::user()->id}}"
                 step="1" style="display:none;"/>
        <label for="rows">rows</label>
        <input id="rows" name="rows" placeholder="rows" type="number" min="5" max="50" value="10"
                 step="1"/>
         <label for="cols">cols</label>
         <input id="cols" name="cols" placeholder="cols" type="number" min="5" max="50" value="10"
                step="1"/>
           <label for="eggs">eggs</label>
          <input id="eggs" name="eggs" placeholder="eggs" type="number" min="1" max="20" value="10"
                     step="1"/><label for="snakes">snakes</label>
              <input id="snakes" name="snakes" placeholder="snakes" type="number" min="1" max="4" value="1"
              step="1"/>
            <input id="btn_games_create" type="submit" value="create"/>
   </form>
</div>
<div id="div_games"></div>

</body>
    <script type="text/javascript" src="/js/snake.js" ></script>

</html>