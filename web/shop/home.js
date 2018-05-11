// Get the modal
var modal = document.getElementById('add');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the more details, open the modal 
document.getElementById("dekMask").onclick = function() {
    modal.style.display = "block";
    document.getElementById("description").innerHTML = "[Insert description for deku mask]"
}

document.getElementById("deiMask").onclick = function() {
    modal.style.display = "block";
    document.getElementById("description").innerHTML = "[Insert description for deity mask]"
}

document.getElementById("gorMask").onclick = function() {
    modal.style.display = "block";
    document.getElementById("description").innerHTML = "[Insert description for gorgon mask]"
}

document.getElementById("majMask").onclick = function() {
    modal.style.display = "block";
    document.getElementById("description").innerHTML = "[Insert description for majora mask]"
}

document.getElementById("keaMask").onclick = function() {
    modal.style.display = "block";
    document.getElementById("description").innerHTML = "[Insert description for keaton mask]"
}

document.getElementById("kafMask").onclick = function() {
    modal.style.display = "block";
    document.getElementById("description").innerHTML = "[Insert description for kafei mask]"
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

function add(item) {
    alert(item);
    $.get("/shop/phpSession.php",{
        name:item
    },
    function(data,status){
        alert("Data: " + data + "\nStatus: " + status);
    });
}

//
//,function(ret){
//        // maybe do something here...
//    }