<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <style>
            button
            {
                width:100px;
                height:145px;
                margin:2px;
                text-align:center;
                vertical-align:middle;
                border:1px solid black;
                background-image: url("./image/hearthstone.jpg");
                border:none;
            }
            img{
                width:90px;
                height:90px;
                padding:auto;
            }
            body{
                background-color:brown;
            }
        </style>
    </head>f
    <body>
        <center>
            <div id="maDiv"></div>
            <script>
                function melangerTableau(a){
                    var lgr = a.length, temp, r;
                    while(0 !== lgr){
                        r = Math.floor(Math.random() * lgr);
                        lgr = lgr - 1;
                        temp = a[lgr];
                        a[lgr] = a[r];
                        a[r] = temp;
                    }
                    return a;
                }
                
                function afficherGrille(){
                    var gr = "";
                    for(var i=1; i <=5;i++){
                        for(var j=1; j <= 6; j++){
                            gr = gr + "<button class='btn btn-primary m-2'></button>"
                        }
                        gr = gr + "<br>";
                    }
                
                    maDiv.innerHTML = gr;
                }
            
                //afficherGrille();
                function traitement(id){
                    click = click + 1;
                    if(click === 1){
                        exId = id;
                    }
                    if (click === 2){
                        click = 0;
                        for(var i = 0; i<=29;i++){
                            boutons[i].onclick = function(e){e.preventDefault();};
                        }
                        ref = setTimeout(function(){topChrono(id,exId);},1000);
                    }
                    //ref = setTimeout (function(){topChrono(id);},2000);
                }
                
                function topChrono(id,exId){
                    if(boutons[id].innerHTML !== boutons[exId].innerHTML){
                        boutons[id].innerHTML = "";
                        boutons[exId].innerHTML = "";
                    }
                    else{
                        boutons[id].style.background = "Lavender";
                        boutons[id].disabled = true;
                        boutons[exId].style.background = "Lavender";
                        boutons[exId].disabled = true;
                    }    
                    trait();
                }
                
                function affectedId(){
                    for(var i=0;i<=29;i++){
                        boutons[i].id=i;
                    }
                }
                
                function trait(){
                    for(var i = 0; i <= 29;i++){
                        boutons[i].onclick = function(e){
                            var id = e.target.id;
                            e.target.innerHTML = "<img src='./image/"+ t[id]+"'>";
                            traitement(id);
                        };
                    }
                }
                
                //Programme Principal
                var ref;
                var click=0;
                var maDiv = document.getElementById("maDiv");
                var boutons = document.getElementsByTagName('button');
                var t = melangerTableau(["image1.jpg", "image2.png", "image3.jpg", "image4.png", "image5.png", "image6.png", "image7.jpg", "image8.jpg", "image9.jpg", "image10.jpg", "image11.png", "image12.jpg", "image13.jpg", "image14.jpg", "image15.png",
                "image1.jpg", "image2.png", "image3.jpg", "image4.png", "image5.png", "image6.png", "image7.jpg", "image8.jpg", "image9.jpg", "image10.jpg", "image11.png", "image12.jpg", "image13.jpg", "image14.jpg", "image15.png"]);
                
                afficherGrille();
                affectedId();
                trait();
            </script>
        </center>
    </body>
</html>
<?php $this->load->view('_header', array('nav_commande' => TRUE, 'selected' => 'search')) ?>
<?php $this->load->view('_footer') ?>