// Get the modal
var modal = document.getElementById('add');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the more details, open the modal 
document.getElementById("dekMask").onclick = function() {
    modal.style.display = "block";
    document.getElementById("description").innerHTML = "The Deku Mask is one of four Masks used for Transformation. When worn, it transforms Link into a Deku Scrub. The Mask contains the spirit of the Deku Butler's Son that Link inhabits when donning the Mask, granting him new abilities. With the transformation comes the special abilities of that species; including a new fighting style, the ability to hop across water, a bubble attack that uses Magic Power, and the ability to briefly fly by using a Deku Flower."
}

document.getElementById("deiMask").onclick = function() {
    modal.style.display = "block";
    document.getElementById("description").innerHTML = "The Fierce Deity's Mask is one of four Transformation Masks. When worn, it transforms Link into the Fierce Deity Link. In this state, Link has an adult size and voice, and attacks with a double-handed, helix-edged sword which can release Sword Beams at the cost of magic. Link has significantly greater strength and range while in this form. When obtained, it is suggested to be as dangerous as Majora's Mask."
}

document.getElementById("gorMask").onclick = function() {
    modal.style.display = "block";
    document.getElementById("description").innerHTML = "In Majora's Mask, the Goron Mask is one of four Masks used for Transformation. When worn, it transforms Link into a Goron. The Mask contains the spirit of the fallen Goron hero Darmani III, and when Link dons the Mask, he inhabits the warrior's body. The transformation grants all the special abilities of that species, including a new fighting style, the ability to carry Powder Kegs, a special Goron Pound attack, and the ability to roll at high speed while attacking with spikes, which consumes Magic Power."
}

document.getElementById("majMask").onclick = function() {
    modal.style.display = "block";
    document.getElementById("description").innerHTML = "Majora's Mask is the primary antagonist in the Majora's Mask, once used by an ancient tribe as a form of hexing and torture. The mask is primarily seen being worn by the game's supposed antagonist, Skull Kid, who uses its dark magic to wreak havoc across Termina."
}

document.getElementById("keaMask").onclick = function() {
    modal.style.display = "block";
    document.getElementById("description").innerHTML = "In Ocarina of Time, the Keaton Mask is the first mask Link obtains in the Mask Trading Sequence. The Keaton character is renowned throughout Hyrule as a popular figure, predominately amongst children. However, most reactions from adults are of nostalgia, confusion or admiration. In Majora's Mask, the mask can be used to summon a Keaton. To do this, Link must stand in any ring of moving bushes and cut them all before they disappear."
}

document.getElementById("kafMask").onclick = function() {
    modal.style.display = "block";
    document.getElementById("description").innerHTML = "The mask is given to Link by Madame Aroma, who handmade it herself. The mask is used to help gather information about the missing person, Kafei."
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function setItem(name) {
    document.getElementById("selectedItem").value = name;
}