/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */
"use strict";
var loser = null;  // whether the user has hit a wall

window.onload = function() {
    $("start").observe("click",startClick);
};

// called when mouse enters the walls; 
// signals the end of the game with a loss
function overBoundary(event) {
    // $("boundary1").addClassName("youlose");
    var boundarys = $$(".boundary");
    for(var i = 0; i<boundarys.length;i++){
        boundarys[i].addClassName("youlose");
    }
    $("status").innerHTML="You lose!";

	
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
    // $("boundary1").observe("mouseover",overBoundary);
    var boundarys = $$(".boundary");
    for(var i = 0; i<boundarys.length;i++){
        boundarys[i].removeClassName("youlose");
        boundarys[i].observe("mouseover",overBoundary);
    }
    document.body.observe("mouseover",overBody);
    $("end").observe("mouseover",overEnd);
    $("status").innerHTML="Click the \"S\" to begin.";
      
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
    $("status").innerHTML="You win! :)";
    var boundarys = $$(".boundary");
    for(var i = 0; i<boundarys.length;i++){
        boundarys[i].stopObserving("mouseover");
    }
    document.body.stopObserving("mouseover");
    $("end").stopObserving("mouseover");
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
    if(event.element().tagName === 'BODY'){
        overBoundary();
    }
}



