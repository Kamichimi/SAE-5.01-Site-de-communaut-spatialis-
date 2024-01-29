const vitesse = 6;

window.onload = function (event) {
    
    let intervalId;

    document.addEventListener("keydown", function (event) {
        if (!intervalId) {
            intervalId = setInterval(() => {
                if(!popUpIsOpened()){
                    controles(event.key);
                }
                proximite();
            }, 50);
        }
    });

    document.addEventListener("keyup", function (event) {
        clearInterval(intervalId);
        intervalId = null;
    });

    const reponsesFin = [].slice.call(document.getElementsByClassName("reponse-fin"));
    
    reponsesFin.forEach(reponseFin => {
        reponseFin.addEventListener("click", closePopUp);
    });
    
    
    
}

function controles(keyPressed) {

    const c = document.getElementById("character");
    const styleC = getComputedStyle(c);
    const sprite = c.getElementsByTagName("img")[0];
    const downSrc = "Content/img/character_down.png"
    const upSrc = "Content/img/character_up.png"
    const leftSrc = "Content/img/character_left.png"
    const rightSrc = "Content/img/character_right.png"
    const spriteSrc = sprite.getAttribute("src")
    // const col = collisions();

    switch (keyPressed) {

        // down
        case "s":
            if(parseInt(styleC.top) < window.innerHeight - 50){
                c.style.top = parseInt(styleC.top) + vitesse + "px";
            }
            if(spriteSrc != downSrc){
                sprite.setAttribute("src", downSrc);
            }
            break;

        // up
        case "z":
            if(parseInt(styleC.top) > 0){
                c.style.top = parseInt(styleC.top) - vitesse + "px";
            }
            if(spriteSrc != upSrc){
                sprite.setAttribute("src", upSrc);
            }
            break;

        // left
        case "q":
            if(parseInt(styleC.left) > 0){
                c.style.left = parseInt(styleC.left) - vitesse + "px";
            }
            if(spriteSrc != leftSrc){
                sprite.setAttribute("src", leftSrc);
            }
            break;
    
        //right
        case "d":
            if(parseInt(styleC.left) < window.innerWidth - 50){
                c.style.left = parseInt(styleC.left) + vitesse + "px";
            }
            if(spriteSrc != rightSrc){
                sprite.setAttribute("src", rightSrc);
            }
            break;

        case "a":
            interractions();
    
        default:
            return;
    }

}

function proximite() {

    const chara = document.getElementById("character");
    const pnj = document.getElementById("pnj");
    const board = document.getElementById("board");
    const charaStyle = getComputedStyle(chara);
    const pnjStyle = getComputedStyle(pnj);
    const boardStyle = getComputedStyle(board);
    const charaX = parseInt(charaStyle.left) + parseInt(charaStyle.width) / 2;
    const pnjX = parseInt(pnjStyle.left) + parseInt(pnjStyle.width) / 2;
    const boardX = parseInt(boardStyle.left) + parseInt(boardStyle.width) / 2;
    const charaY = parseInt(charaStyle.top) + parseInt(charaStyle.height) / 2;
    const pnjY = parseInt(pnjStyle.top) + parseInt(pnjStyle.height) / 2;
    const boardY = parseInt(boardStyle.top) + parseInt(boardStyle.height) / 2;
    const infoPnj = document.getElementById("pnj-interract");
    const infoBoard = document.getElementById("board-interract");

    if(Math.abs(charaX - pnjX) < parseInt(charaStyle.width) / 2 + parseInt(pnjStyle.width) / 2  + 20 && Math.abs(charaY - pnjY) < parseInt(charaStyle.height) / 2 + parseInt(pnjStyle.height) / 2  + 20){
        infoPnj.style.visibility = "visible";
    }

    else{
        infoPnj.style.visibility = "hidden";
    }

    if(Math.abs(charaX - boardX) < parseInt(charaStyle.width) / 2 + parseInt(boardStyle.width) / 2  + 20 && Math.abs(charaY - boardY) < parseInt(charaStyle.height) / 2 + parseInt(boardStyle.height) / 2  + 20){
        infoBoard.style.visibility = "visible";
    }

    else{
        infoBoard.style.visibility = "hidden";
    }
}

function interractions(){

    const interractions = [].slice.call(document.getElementsByClassName("interract"));

    interractions.forEach(interraction => {

        let p = interraction.getElementsByClassName("push");
        let flag = false;

        if(p !== null && getComputedStyle(p[0]).visibility == "visible"){

            p[0].style.visibility="hidden";
            [].slice.call(interraction.getElementsByClassName("pop-up"))[0].style.visibility="visible";
            flag = true;

        }

        if(flag){
            return;
        }
    });

}

function popUpIsOpened(){

    const popUps = [].slice.call(document.getElementsByClassName("pop-up"));

    for (const popUp of popUps ) {
        
        if(popUp.style.visibility == "visible"){
            return true;
        }

    }

    return false;
}

function collisions(){

    const objets = [].slice.call(document.getElementsByClassName("solid"));
    const chara = document.getElementById("character");
    const charaStyle = getComputedStyle(chara);
    const charaX = parseInt(charaStyle.left) + parseInt(charaStyle.width) / 2;
    const charaY = parseInt(charaStyle.top) + parseInt(charaStyle.height) / 2;

    objets.forEach(objet => {
        
        let objetStyle = getComputedStyle(objet);
        let objetX = parseInt(objetStyle.left) + parseInt(objetStyle.width) / 2;
        let objetY = parseInt(objetStyle.top) + parseInt(objetStyle.height) / 2;

        if(charaX - objetX < parseInt(charaStyle.width) / 2 + parseInt(objetStyle.width) / 2 + vitesse ){
            console.log("q");
            return "q";
        }

        if(charaX - objetX > -parseInt(charaStyle.width) / 2 + parseInt(objetStyle.width) / 2 + vitesse ){
            console.log("d");
            return "d";
        }

        if(charaY - objetY < parseInt(charaStyle.height) / 2 + parseInt(objetStyle.height) / 2 + vitesse ){
            console.log("z");
            return "z";
        }

        if(charaY - objetY > -parseInt(charaStyle.height) / 2 + parseInt(objetStyle.height) / 2 + vitesse ){
            console.log("s");
            return "s";
        }
        
    });
}

function closePopUp(e){

    document.getElementById(e.target.dataset.parent).style.visibility="hidden";
    

}