window.onload = preparePage();
window.onload = setupItemAZ();

function preparePage() {
    
    var divOne = document.getElementById("divOne");
    
    divOne.addEventListener("click", function() {
        divOne.innerHTML="<h1>Billie Eilish Official Mask</h1><br><img style='width: 50%;' src='images/merchandise/Mask.png'>";
    });
    
    if (document.getElementById("buttonOne").clicked == true) {
        setupItemAZ();
    }
}

function setupItemAZ() {
    
    var names = ["Bohlsh", "Book", "Yellow Bottle", "Green Bottle", "Black Doll", "Yellow Doll", "Dress", "White Hoodie", "Red Hoodie", "Mask", "Black Mask", "My Future Vinyl", "Necklace", "No Time To Die Vinyl", "Puzzle", "White Sweatshirt", "T Shirt", "Vinyl Set", "WWAFAWDWG Vinyl", "Green Hoodie", "Blue Hoodie"];
    
    var divTwo = document.getElementById("divTwo");
     
    names.sort();
    
    var i;
    
    divTwo.innerHTML = "";
        
    for (i = 0; i < 20; i=i+3 ) {
        divTwo.innerHTML = divTwo.innerHTML + "<div class='row'> <div class='col-sm-4 text-center'> <img class='img-fluid' src='images/merchandise/" + names[i] + ".png'> <h4>" + names[i] + "</h4> </div> <div class='col-sm-4 text-center'> <img class='img-fluid' src='images/merchandise/" + names[i+1] + ".png'> <h4>" + names[i+1] + "</h4> </div> <div class='col-sm-4 text-center'> <img class='img-fluid' src='images/merchandise/" + names[i+2] + ".png'> <h4>" + names[i+2] + "</h4> </div> </div>";
    }
}

function setupItemZA() {
    
    var names = ["Bohlsh", "Book", "Yellow Bottle", "Green Bottle", "Black Doll", "Yellow Doll", "Dress", "White Hoodie", "Red Hoodie", "Mask", "Black Mask", "My Future Vinyl", "Necklace", "No Time To Die Vinyl", "Puzzle", "White Sweatshirt", "T Shirt", "Vinyl Set", "WWAFAWDWG Vinyl", "Green Hoodie", "Blue Hoodie"];
    
    var divTwo = document.getElementById("divTwo");
    
    names.sort();
    names.reverse();
    
    var i;
    
    divTwo.innerHTML = "";
    
    for (i = 0; i < 20; i=i+3 ) {
        divTwo.innerHTML = divTwo.innerHTML + "<div class='row'> <div class='col-sm-4 text-center'> <img class='img-fluid' src='images/merchandise/" + names[i] + ".png'> <h4>" + names[i] + "</h4> </div> <div class='col-sm-4 text-center'> <img class='img-fluid' src='images/merchandise/" + names[i+1] + ".png'> <h4>" + names[i+1] + "</h4> </div> <div class='col-sm-4 text-center'> <img class='img-fluid' src='images/merchandise/" + names[i+2] + ".png'> <h4>" + names[i+2] + "</h4> </div> </div>";
    }
}

$(document).ready(function(){
    $(".jumbotron").mouseenter(function(){
        $(".jumbotron").addClass("setBlue");;
    });
});
