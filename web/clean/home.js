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
        document.addEventListener('mousemove', moving);
        
        function moving(event) {
            moveAt(event.pageX, event.pageY);
        }
//        document.getElementById("area").onmouseover = function() {overArea()};
//        document.getElementById("area").onmouseout = function() {leaveArea()};
//
//        function overArea() {
//            moveAt(event.pageX, event.pageY);
//        }

//        function leaveArea() {
//        document.getElementById("demo").style.color = "black";
//        }
        
//        var xc = event.pageX;
//        var yc = event.pageY;
//        var divWidth = document.getElementById("area").style.width;
//        
//        if (xc - divWidth >= divWidth) {
//            xc = divWidth;
//        }
//        if (xc <= divWidth) {
//            xc = divWidth;
//        }
//        
//        moveAt(xc, yc);
    }

    // (3) move the ball on mousemove
//    document.addEventListener('mousemove', onMouseMove);
    document.getElementById("area").addEventListener('mouseover', onMouseMove);

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