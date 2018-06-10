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
    var x = document.getElementById(divName);

    // if this is a new button press, reveal the form
    if (val != x.class) {
        x.class = val;
        x.style.display = "block";
        location.href = "#anchor";
    }
    else {
        if (x.style.display === "none") {
            x.style.display = "block";
            location.href = "#anchor";
        }
        else {
            x.style.display = "none";
        }
    }
    
    // if it's the add button, there should be no automatic text to edit
    if (val == 'add') {
        document.getElementById(editName).value = "";
        document.getElementById("submit").name = "add";
        document.getElementById("submit").value = "add";
    }
    else {
        document.getElementById(editName).value = val;
        document.getElementById("submit").name = "rename";
        document.getElementById("submit").value = pId;
    }
}

function saveChanges() {
//    var div = document.getElementById("yourDiv");
//    var rect = div.getBoundingClientRect();
//    alert("Coordinates: " + rect.left + "px, " + rect.top + "px");
    
    var x = document.getElementsByClassName("cases");
    for (var i = 0; i < x.length; i++) {
        var myId = x[i].id;
        alert("TOP: " + document.getElementById(x[i].id).style.top);
    }
}
     
// for desktop w/ mouse click events
function mouse(item, event) {
    var clickIsValid = true;
    var delay = 200; // milliseconds before click doesn't count
    
    var notAClick = function() {
        clickIsValid = false;
    }
    
    cancelClick = setTimeout( notAClick, delay );

    // (2) prepare to moving: make absolute and on top by z-index
    item.style.position = 'relative';
    item.style.zIndex = 1000;
    
    // move it out of any current parents directly into body
    // to make it positioned relative to the body
//    document.body.append(item);
    
    // ...and put that absolutely positioned ball under the cursor
    moveAt(event.pageX, event.pageY);
    
    alert(event.pageX + ", " + event.pageY);

    // centers the ball at (pageX, pageY) coordinates
    function moveAt(pageX, pageY) {
        item.style.left = pageX - item.offsetWidth / 2 + 'px';
        item.style.top = pageY - item.offsetHeight / 2 + 'px';
    }

    function onMouseMove(event) {
        var xc = event.pageX;
        var yc = event.pageY;
        
        var left = area.getBoundingClientRect().left;
        var right = area.getBoundingClientRect().right;
        var top = area.getBoundingClientRect().top;
        var bottom = area.getBoundingClientRect().bottom;
        
        // if too far to the right
        if (xc + (item.offsetWidth / 2 ) >= right) {
            xc = right - (item.offsetWidth);
            document.removeEventListener('mousemove', onMouseMove);
            item.onmouseup = null;
        }
        
        // if too far to the left
        if (xc - (item.offsetWidth / 2) <= left) {
            xc = left + (item.offsetWidth);
            document.removeEventListener('mousemove', onMouseMove);
            item.onmouseup = null;  
        }
        
        // if too far up
        if (yc + (item.offsetHeight / 2) >= bottom) {
            yc = bottom - (item.offsetHeight);
            document.removeEventListener('mousemove', onMouseMove);
            item.onmouseup = null;
        }
        
        // if too far down
        if (yc - (item.offsetHeight / 2) <= top) {
            yc = top + (item.offsetHeight);
            document.removeEventListener('mousemove', onMouseMove);
            item.onmouseup = null;
        }
        
        moveAt(xc, yc);
    }

    // (3) move the ball on mousemove
    document.addEventListener('mousemove', onMouseMove);

    // (4) drop the ball, remove unneeded handlers
    item.onmouseup = function() {
        clearTimeout( cancelClick );
        document.removeEventListener('mousemove', onMouseMove);
        item.onmouseup = null;
        if (clickIsValid) {
            alert("That was a click?");
        }
    };

    item.ondragstart = function() {
        return false;
    };
    
    // reset click to true.
    clickIsValid = true;
//    document.getElementById(area).append(item);
//    document.body.removeChild(item);
}