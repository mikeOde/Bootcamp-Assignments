
window.onload=function(){
    
    var start = document.getElementById("start");
    start.onmouseover = startGame;            // restarts the game on mouse over start but keeps the score running
    start.onclick = resetScore;               // restarts the game and the score on click on startS               
    var end = document.getElementById("end");
    var gameBorder = document.getElementById("game");
    gameBorder.onmouseleave = userCheating;

    var loser = false;
    var score = 0;
    var isCheating = false;                   // used to stop game when user exits the maze and tries to reach the end from outside
    var gameEnded = false;                    // used to stop scoring and boundaries color change after reaching the end and before restarting
    var crossedBorder = false;                // used to stop scoring after hitting the boundaries, before restarting           
    
    function startGame(){
        userCheating = false;
        gameEnded = false;
        crossedBorder = false;
        loser = false;
        document.getElementById("status").innerHTML  = "Begin by moving your mouse over the \"S\". Your score is: " + score;
        var boundaries = document.getElementsByClassName("boundary");
        console.log(boundaries);
        for (var i = 0; i < boundaries.length - 1; i++) {
            boundaries[i].style.backgroundColor = "#eeeeee";
            boundaries[i].onmouseover = overBorders;
        }
        end.onmouseover = endGame;
    }

    function userCheating(){
        if(gameEnded == false){                 //this condition controls not showing the cheating message after user wins the round 
            isCheating = true;
            document.getElementById("status").innerHTML  = "Cheating is not allowed";
        }
    }

    function resetScore(){
        score = 0;
        document.getElementById("status").innerHTML  = "Begin by moving your mouse over the \"S\". Your score is: " + score;
    }

    function overBorders() {
        if(gameEnded == false && crossedBorder == false){      //this condition pauses the game after the player made it to the end and after he hits the boundaries but before restarting 
            loser = true;
            var boundaries = document.getElementsByClassName("boundary");
            for (var i = 0; i < boundaries.length - 1; i++){
            boundaries[i].style.backgroundColor = "red";
            }
        crossedBorder = true;
        score -= 10;
        document.getElementById("status").innerHTML  = "You lost! Your score is: " + score;
        }
    }

    function endGame() {
        if (gameEnded == false && userCheating == false) {   
            if(loser){
                score -= 10;
                console.log(score);
            } else {
                score += 5;
                document.getElementById("status").innerHTML  = "You Won! Your score is: " + score;
                var boundaries = document.getElementsByClassName("boundary");
                for (var i = 0; i < boundaries.length - 1; i++) {
                    boundaries[i].style.backgroundColor = "green";
                }
                console.log(score);
            }
            gameEnded = true;
        }
    }
}