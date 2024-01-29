<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Content/css/jeu.css">
        <title>Volleyball</title>
    </head>
    <body>
        <div id="map" >
            <div id="character" >
                <img src="Content/img/character_down.png" alt="character">
            </div>
            
            <div class="solid interract" id="pnj" >
                <div class="container">
                    <div class="pop-up" id="pop-up-pnj">
                        <h4>Membre</h4>
                        <p>Bonjour, bienvenue dans le club ! Si tu souhaite te rendre sur le forum, il faut interragir avec le tableau.</p>
                        <button class="reponse reponse-fin" id="reponse-fin-pnj" data-parent="pop-up-pnj">Ok, merci !</button>
                    </div>
                    <p class="push" id="pnj-interract">Appuyez sur "A"</p>
                    <img src="Content/img/pnj_face.png" alt="pnj">
                </div>
            </div>
            <div class="solid interract" id="board">
                <div class="container">
                    <div class="pop-up" id="pop-up-board">
                        <h4>Tableau</h4>
                        <p>Salut à toi membre du club ! Veux tu aller sur le forum, ou veux tu rester ici ?</p>
                        <button class="reponse reponse-fin" id="reponse-fin-board" data-parent="pop-up-board">Je veux rester ici.</button>
                        <a href="?controller=accueil" class="reponse">Je souhaite aller sur le forum.</a>
                    </div>
                    <p class="push" id="board-interract">Appuyez sur "A"</p>
                    <img src="Content/img/tableau.png" alt="tableau">
                </div>
            </div>
            
        </div>
        <script src="Content/js/jeu.js"></script>
    </body>
</html>