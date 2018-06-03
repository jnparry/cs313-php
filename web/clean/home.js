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

function showForm(divName, className) {
    var x = document.getElementById(divName);

    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

//function posit() {
//    
//    alert("Left: " + left + ", Right: " + right + ", Top: " + top + ", Bottom: " + bottom);
//}
     
// for desktop w/ mouse click events
function mouse(item, event) { // (1) start the process

    // (2) prepare to moving: make absolute and on top by z-index
    item.style.position = 'absolute';
    item.style.zIndex = 1000;
    // move it out of any current parents directly into body
    // to make it positioned relative to the body
    document.body.append(item);
    // ...and put that absolutely positioned ball under the cursor

    moveAt(event.pageX, event.pageY);

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
        
        if (xc + (item.offsetWidth / 2 ) >= right) {
            xc = right - (item.offsetWidth);
            document.removeEventListener('mousemove', onMouseMove);
            item.onmouseup = null;
        }
        if (xc - (item.offsetWidth / 2) <= left) {
            xc = left + (item.offsetWidth);
//            document.removeEventListener('mousemove', onMouseMove);
//            item.onmouseup = null;  
        }
        if (yc + (item.offsetHeight / 2) >= bottom) {
            yc = bottom - (item.offsetHeight);
//            document.removeEventListener('mousemove', onMouseMove);
//            item.onmouseup = null;
        }
        if (yc - (item.offsetHeight / 2) <= top) {
            yc = top + (item.offsetHeight);
//            document.removeEventListener('mousemove', onMouseMove);
//            item.onmouseup = null;
        }
        
        moveAt(xc, yc);
    }

    // (3) move the ball on mousemove
    document.addEventListener('mousemove', onMouseMove);

    // (4) drop the ball, remove unneeded handlers
    item.onmouseup = function() {
        document.removeEventListener('mousemove', onMouseMove);
        item.onmouseup = null;
    };

    item.ondragstart = function() {
        return false;
    };
}

// for phone w/ touch events
function touch(item, event) { // (1) start the process

    // (2) prepare to moving: make absolute and on top by z-index
    item.style.position = 'absolute';
    item.style.zIndex = 1000;
    // move it out of any current parents directly into body
    // to make it positioned relative to the body
    document.body.append(item);
    // ...and put that absolutely positioned ball under the cursor

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
    item.ontouchend = function() {
    document.removeEventListener('mousemove', onMouseMove);
    item.ontouchend = null;
    };

    item.ondragstart = function() {
        return false;
    };
}