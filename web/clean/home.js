var publicX;
var publicY;

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

function setUp() {
    var x = document.getElementsByClassName("cases");
    for (var i = 0; i < x.length; i++) {
        var item = document.getElementById(x[i].id)
    
        var xc = item.style.left;
        var yc = item.style.top;

//        alert(xc + ", " + yc);
        var left = area.getBoundingClientRect().left;
        var top = area.getBoundingClientRect().top;

        item.style.left = left + xc + item.offsetWidth + "px";
        item.style.top = top + yc + item.offsetHeight + "px";
    }
}
  
function savePos(item, event) {
//    alert("FIRE");
//    publicX = event.pageX;
//    publicY = event.pageY;
//    alert(publicX + ", " + publicY);
//    alert(item.offsetLeft + ", " + item.offsetTop);
//    alert(document.getElementById("area").offsetLeft + ", " + document.getElementById("area").offsetTop);
}

// for desktop w/ mouse click events
function mouse(item, event, id) {
    var myOffset = document.getElementById("area");
    var left = area.getBoundingClientRect().left;
    var right = area.getBoundingClientRect().right;
    var top = area.getBoundingClientRect().top;
    var bottom = area.getBoundingClientRect().bottom;
    
    var clickIsValid = true;
    var delay = 200; // milliseconds before click doesn't count
    var notAClick = function() {
        clickIsValid = false;
    }
    cancelClick = setTimeout( notAClick, delay );

    // make absolute and on top
    item.style.zIndex = 1000;
//    item.style.position = fixed;

//    moveAt(event.pageX, event.pageY);

    // centers the ball at (pageX, pageY) coordinates
    function moveAt(pageX, pageY) {
        item.style.left = (pageX - left - item.offsetWidth) + 'px';
        item.style.top = (pageY - top - item.offsetHeight) + 'px';
    }

    function onMouseMove(event) {
        var xc = event.pageX;
        var yc = event.pageY;
        
        // if too far to the right
        if (xc + (item.offsetWidth / 2 ) >= right) {
            xc = right - (item.offsetWidth);
            document.removeEventListener('mousemove', onMouseMove);
            item.onmouseup = null;
        }
//        
//        // if too far to the left
//        if (xc - (item.offsetWidth / 2) <= left) {
//            xc = left + (item.offsetWidth);
//            document.removeEventListener('mousemove', onMouseMove);
//            item.onmouseup = null;  
//        }
//        
//        // if too far up
//        if (yc + (item.offsetHeight / 2) >= bottom) {
//            yc = bottom - (item.offsetHeight);
//            document.removeEventListener('mousemove', onMouseMove);
//            item.onmouseup = null;
//        }
//        
//        // if too far down
//        if (yc - (item.offsetHeight / 2) <= top) {
//            yc = top + (item.offsetHeight);
//            document.removeEventListener('mousemove', onMouseMove);
//            item.onmouseup = null;
//        }
        
        moveAt(xc, yc);
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

// for mobile w/ touch events
function touch(item, event, id) {
//    var myOffset = document.getElementById("area");
//    var left = area.getBoundingClientRect().left;
//    var right = area.getBoundingClientRect().right;
//    var top = area.getBoundingClientRect().top;
//    var bottom = area.getBoundingClientRect().bottom;
//    
    var clickIsValid = true;
    var delay = 200; // milliseconds before click doesn't count
    var notAClick = function() {
        clickIsValid = false;
    }
    cancelClick = setTimeout( notAClick, delay );

    // make absolute and on top
    item.style.zIndex = 1000;
//    item.style.position = fixed;

    console.log("Before");
    moveAt(event.touches[0].pageX, event.touches[0].pageY);
    console.log("after");

    // centers the ball at (pageX, pageY) coordinates
    function moveAt(pageX, pageY) {
        item.style.left = (pageX - document.getElementById("area").offsetLeft) + 'px';
        item.style.top = (pageY - document.getElementById("area").offsetTop) + 'px';
        console.log(pageX + ", " + pageY);
        console.log("Offest: " + item.offsetWidth + ", " + item.offsetHeight);
    }

    function onFingerMove(event) {
        var xc = event.changedTouches[0].pageX;
        var yc = event.changedTouches[0].pageY;
        console.log("FINGERMOVE: " + event.changedTouches[0].pageX + ", " + event.changedTouches[0].pageY); 
//        // if too far to the right
//        if (xc + (item.offsetWidth / 2 ) >= right) {
//            xc = right - (item.offsetWidth);
//            document.removeEventListener('mousemove', onMouseMove);
//            item.onmouseup = null;
//        }
//        
//        // if too far to the left
//        if (xc - (item.offsetWidth / 2) <= left) {
//            xc = left + (item.offsetWidth);
//            document.removeEventListener('mousemove', onMouseMove);
//            item.onmouseup = null;  
//        }
//        
//        // if too far up
//        if (yc + (item.offsetHeight / 2) >= bottom) {
//            yc = bottom - (item.offsetHeight);
//            document.removeEventListener('mousemove', onMouseMove);
//            item.onmouseup = null;
//        }
//        
//        // if too far down
//        if (yc - (item.offsetHeight / 2) <= top) {
//            yc = top + (item.offsetHeight);
//            document.removeEventListener('mousemove', onMouseMove);
//            item.onmouseup = null;
//        }
        
        moveAt(xc, yc);
    }

    // (3) move the ball on mousemove
    document.addEventListener('touchmove', onFingerMove);

    // (4) drop the ball, remove unneeded handlers
    item.ontouchend = function() {
        clearTimeout( cancelClick );
        if (clickIsValid) {
            alert("That was a click?");
        }
        document.removeEventListener('touchmove', onFingerMove);
        item.ontouchend = null;
    };
    
    // (4) drop the ball, remove unneeded handlers
    item.ontouchcancel = function() {
        clearTimeout( cancelClick );
        if (clickIsValid) {
            alert("That was a click?");
        }
        document.removeEventListener('touchmove', onFingerMove);
        item.ontouchcancel = null;
    };
    clickIsValid = true;
};