// red walls
window.onload = function() {
    var boundaries = document.getElementsByClassName("boundary");
    for (var i = 0; i < boundaries.length; i++) {
        boundaries[i].onmouseover = overBoundary;
    }
};

function overBoundary() {
    var boundaries = document.getElementsByClassName("boundary");
    for (var i = 0; i < boundaries.length; i++) {
        boundaries[i].style.backgroundColor = "red";
    }
    alert("You lose!")
}

//All the following is implementation of the next steps but I was not able to finish because my laptop died

// window.onload = function() {
//     var start = document.getElementById("start");
//     start.onmouseover = startHover;
//     var end = document.getElementById("end");
//     end.onmouseover = endHover;
//     var boundaries = document.getElementsByClassName("boundary");
//     for (var i = 0; i < boundaries.length; i++) {
//         boundaries[i].onmouseover = overBoundary;
//     }
// };

// function startHover() {
//     loser = false;
//     var boundaries = document.getElementsByClassName("boundary");
//     for (var i = 0; i < boundaries.length; i++) {
//         boundaries[i].style.backgroundColor = "#eeeeee";
//         boundaries[i].onmouseover = overBoundary;
//     }
// }

// function endHover() {
//     if(loser) {
//         alert("Sorry, you lost. :[");
//     } else {
//         alert("You win! :]");
//     }

// function overBoundary() {
//     loser = true;
//     var boundaries = document.getElementsByClassName("boundary");
//     for (var i = 0; i < boundaries.length; i++) {
//         boundaries[i].style.backgroundColor = "red";
//     }
// }




