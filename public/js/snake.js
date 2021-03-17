

// let Egg1 = document.getElementById('7,8');
// var Egg2 = document.getElementById('12,18');
// var Egg3 = document.getElementById('14,12');
// var Egg4 = document.getElementById('2,17');
// var Egg5 = document.getElementById('4,3');
// var table = document.getElementById('table');

//     //  Egg1.style.background ="red";
//      Egg2.style.background ="red";
//      Egg3.style.background ="red";
//      Egg4.style.background ="red";
//      Egg5.style.background ="red";
//    //  window.location ="snake?id=" + 0+"&params="+0;
//   //  if( window.location ="snake?id=" + 7+"&params="+8 ){
//   //   Egg1.style.background = "green";
//   //      lastId = document.getElementsById('8,8');
        
//   //     lastId.style.background ="green";
//   //  }

// var getUrlParameter = function getUrlParameter(sParam) {
//   var sPageURL = window.location.search.substring(1),
//       sURLVariables = sPageURL.split('&'),
//       sParameterName,
//       i;

//   for (i = 0; i < sURLVariables.length; i++) {
//       sParameterName = sURLVariables[i].split('=');

//       if (sParameterName[0] === sParam) {
//           return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
//       }
//   }
//   return false;
// };
// var row = getUrlParameter('row');
// var col = getUrlParameter('col');
         
//       row =  parseInt(row);
//       col = parseInt(col);
        
//           var id = row+","+col;
//           Egg1.style.background = "red";
        
//            if(col<0 || row<0 ){
//               alert('perdu !!');
//               window.location ="snake?row=" + 0+"&col="+0;
              
          
//           }else if(col>19 || row>19){
//             alert('perdu !!');
//             window.location ="snake?row=" + 0+"&col="+0;
//           }
//           else{
//             var td = document.getElementById(id);
          
//             td.style.background = "green";
         
//             document.addEventListener('keyup', logKey)
              
//               async function logKey(e) {
               
//                 switch(e.keyCode){
                  
//                   case 40: //bas
//                     newRow =  row + 1;
//                     window.location ="snake?row=" + newRow +"&col="+col;
//                     newId = newRow+","+ col;
//                     newId.style.background = "green";
                    
//                   break;
//                   case 38 ://Haut
                   
//                   newRow =  row - 1;
//                    window.location ="snake?row=" + newRow+"&col="+col;
//                    newId = newRow+","+ col;
//                    newId.style.background = "green";
//                  break;
                 
//                  case 37: //gauche
                  
//                    newCol =  col - 1;
//                    window.location ="snake?row=" + row+"&col="+newCol;
//                    newId = row+","+ newCol;
//                    newId.style.background = "green";
//                   break;
//                    case 39://droite
                   
//                    newCol =  col + 1;
//                    window.location ="snake?row=" + row+"&col="+newCol;
//                    newId = row+","+ newCol;
//                    newId.style.background = "green";
//                   break;
//                   default :
                 
//                 }
//               }
//           }    
      

// const urlAPI = "http://localhost:8000/api/games";

       
// let form = document.getElementById('form');

// form.addEventListener('submit', function(e){
//   // var inputs = document.getElementsByTagName("input"); // on recupére tous les inputs
//   // for (var i = 0; i < inputs.length; i++) {
//   //   if (!inputs[i].value) {
//   //             //  if inputs.value = '' ;
//   //             error = "veuillez renseigner tous les champs !";
//   //   } else if (inputs[i].value) {
//   //             e.preventDefault(); // stopper le comporetement normale
//               startGame();
//   //   } 
//   // }
// })
 
// const startGame = async function(){
// var rows = document.getElementById('rows').value;
// var cols = document.getElementById('cols').value;
// var eggs = document.getElementById('eggs').value;
// var snakes = document.getElementById('snakes').value;
   
//   let response = await fetch(urlAPI,
//                        {
//                         method: "post",
//                         headers: { "content-type": "application/json" },
//                         body : JSON.stringify({rows, cols, eggs, snakes})
//                        })

//                        .then(response =>console.log(response))
//                        .catch((error) =>console.log(error))

//                   window.location = "http://localhost:8000/grid";

//}

class JsGamesApiReadAll
       {
           static create_html_table(games)
             {
              let table = document.createElement("table");
                table.id = "table_games";
                let fields = ["id", "rows", "cols", "eggs", "snakes"];
               // thead
                let thead = document.createElement("thead");
                let tr = document.createElement("tr");
              

                       for(let j = 0; j < fields.length; ++j)
                    {
                        let field = fields[j];
                        let td = document.createElement("td");
                         td.innerHTML = field;
                     tr.appendChild(td);
                    }
                     thead.appendChild(tr);
                     table.appendChild(thead);
               // thead
               // tbody
                     let tbody = document.createElement("tbody");
                     for (let i = 0; i < games.length; ++i)
                            {
                            let game = games[i];
                            let tr = document.createElement("tr");
                               for(let j = 0; j < fields.length; ++j)
                                   {
                                  let field = fields[j];
                                   let td = document.createElement("td");
                                         td.innerHTML = game[field];
                                         
                                   tr.appendChild(td);
                                   }
                                   let objLink = document.createElement("a");
                                
                                   objLink.href= "/game/start/"+game["id"];
                                   objLink.target = "_blank";
                                   objLink.innerHTML = "start";
                               let td = document.createElement("td");
                            td.appendChild(objLink);
                             tr.appendChild(td);
                           tbody.appendChild(tr);
                           table.appendChild(tbody);
                              }
                  // tbody
            return table;
               }
        
               static handle_response(games)
                          { 
                      let table = JsGamesApiReadAll.create_html_table(games);
                      let div = document.getElementById("div_games");
                      
                      div.innerHTML = "";
                        div.appendChild(table);
                          }

              static send_request()
                         {
                      let xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function ()
                                {
                            if (this.readyState == 4 && this.status == 200) 
                                   {
                                 JsGamesApiReadAll.handle_response(JSON.parse(xhttp.responseText)); 
                                     }
                                 };
                          xhttp.open("GET", "/api/games", true);
                          xhttp.send();
                           }
}

class JsGamesApiCreate
    {
             static create_html_table_tr(game)
              {
                let fields = ["id", "rows", "cols", "eggs", "snakes"];
                
                let tr = document.createElement("tr");
               
              
                
                for(let j = 0; j < fields.length; ++j)
                       {
                 let field = fields[j];
                 let td = document.createElement("td");
                 
                
                  td.innerHTML = game[field] ;
                  tr.appendChild(td);
                          }
                          

          return tr;
                  }
            
            static handle_response(game)
            {
            let table = document.getElementById("table_games");
            let tbody = document.getElementsByTagName("tbody")[0];
            let tr = JsGamesApiCreate.create_html_table_tr(game);
             tbody.appendChild(tr);
             }

            static send_request()
            {
           let form = document.getElementById("form");
           let form_data = new FormData(form);
           let xhttp = new XMLHttpRequest(); 
               xhttp.onreadystatechange = function ()
            {
                if (this.readyState == 4 && this.status == 201)
                    {
                      JsGamesApiCreate.handle_response(JSON.parse(xhttp.responseText));
                      }
                    };
                     xhttp.open("POST", "/api/games", true);
                       xhttp.send(form_data);
              }

              static configure_form()
                   {
               let form = document.getElementById("form");
                  form.addEventListener("submit", function (event)
                        {
                            event.preventDefault();
                            JsGamesApiCreate.send_request();
                        });
                     } 
   }

 function on_load()
       {
            JsGamesApiReadAll.send_request();
            JsGamesApiCreate.configure_form();
        }
window.onload = on_load;