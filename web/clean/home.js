function viewHome() {
    location.href = "/clean/home.php";
}

function viewProjects() {
    location.href = "/clean/projects.php";
}

function viewRooms() {
    location.href = "/clean/rooms.php";
}

function viewViews() {
    location.href = "/clean/view.php";
}

function openNav() {
    document.getElementById("mySidenav").style.width = "33%";
    document.getElementById("mySidenav").style.minWidth = "105px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mySidenav").style.minWidth = "0";
}

function soon() {
    alert("Feature coming soon.");
}

function popUp(num) {
    var popup = document.getElementById("myPopup" + num);
    popup.classList.toggle("show");
}

function showForm(divName, editName, val, pId = null) {
    var add = false;    
    var x = document.getElementById(divName);
    
    // if it's the add button, there should be no automatic text to edit
    if (val == 'add') {
        document.getElementById(editName).value = "";
        document.getElementById("submit").name = "add";
        document.getElementById("submit").value = "add";
        document.getElementById("remove").style.display = "none";
        add = true;
    }
    else {
        document.getElementById(editName).value = val;
        document.getElementById("submit").name = "rename";
        document.getElementById("submit").value = pId;
        document.getElementById("remove").value = pId;
        document.getElementById("remove").style.display = "initial";
        add = false;
    }

    // if this is a new button press, reveal the form
    if (val != x.class) {
        x.class = val;
        x.style.display = "block";
        if (add)
            location.href = "#submit";
        else
            location.href = "#remove";
    }
    else {
        if (x.style.display === "none") {
            x.style.display = "block";
            if (add)
                location.href = "#submit";
            else
                location.href = "#remove";
        }
        else {
            x.style.display = "none";
        }
    }
}

function saveChanges() {  
    var x = document.getElementsByClassName("cases");
    for (var i = 0; i < x.length; i++) {
        var myId = document.getElementById(x[i].id).style;
        alert("TOP: " + myId.top + ", LEFT: " + myId.left);
    }
}
     
// for desktop w/ mouse click events
function mouse(item, event, id) {
    var clickIsValid = true;
    var delay = 200; // milliseconds before click doesn't count
    var notAClick = function() {
        clickIsValid = false;
    }
    cancelClick = setTimeout( notAClick, delay );

    // make absolute and on top
    item.style.position = 'fixed';
    item.style.zIndex = 1000;

    moveAt(event.pageX, event.pageY);

    // centers the ball at (pageX, pageY) coordinates
    function moveAt(pageX, pageY) {
        item.style.left = pageX - item.offsetWidth / 2 + 'px';
        item.style.top = pageY - item.offsetHeight / 2 + 'px';
    }

    function onMouseMove(event) {
        moveAt(event.pageX, event.pageY);
    }

    // (3) move the ball on mousemove
    document.addEventListener('mousemove', onMouseMove);

    // (4) drop the ball, remove unneeded handlers
    item.onmouseup = function() {
        clearTimeout( cancelClick );
        if (clickIsValid) {
            alert("That was a click?");
        }
        document.removeEventListener('mousemove', onMouseMove);
        item.onmouseup = null;
    };
    clickIsValid = true;
};