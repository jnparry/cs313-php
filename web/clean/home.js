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

function redirectToSignIn() {
    location.href = "/clean/signin.php";
}

function redirectToSignUp() {
    location.href = "/clean/signup.php";
}

function popUp(num) {
    var popup = document.getElementById("myPopup" + num);
    popup.classList.toggle("show");
}

function setModalContent(content) {
    document.getElementById("myModalContent").innerHTML = content;
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
    var theForm;
    // Start by creating a <form>
    theForm = document.createElement('form');
    theForm.action = 'saveLocation.php';
    theForm.method = 'post';
    
    var i = 0;
    var x = document.getElementsByClassName("cases");
    for (i; i < x.length; i++) {
        var myId = document.getElementById(x[i].id).style;
        var strTop = myId.top;
        var strLeft = myId.left;
        var cutId = (x[i].id).substr(8);
        
        if (strTop)
            strTop = (parseInt(strTop.slice(0, -2)));
        if (strLeft)
            strLeft = (parseInt(strLeft.slice(0, -2)));
        
        var myName = ("left" + i);
        newCoord = document.createElement('input');
        newCoord.type = 'hidden';
        newCoord.name = myName;
        newCoord.value = strLeft;
        theForm.appendChild(newCoord);
        
        var myName2 = ("top" + i);
        newCoord2 = document.createElement('input');
        newCoord2.type = 'hidden';
        newCoord2.name = myName2;
        newCoord2.value = strTop;
        theForm.appendChild(newCoord2);
     
        var myName3 = ("id" + i);
        idNum = document.createElement('input');
        idNum.type = 'hidden';
        idNum.name = myName3;
        idNum.value = cutId;
        theForm.appendChild(idNum);
    }
    
    items = document.createElement('input');
    items.type = 'hidden';
    items.name = 'num';
    items.value = i;
    theForm.appendChild(items);
    
    document.getElementById('hidden_form_container').appendChild(theForm);
    theForm.submit();
}

function deleteBC(id) {
    var theForm;
    
    // Start by creating a <form>
    theForm = document.createElement('form');
    theForm.action = 'removeBC.php';
    theForm.method = 'post';
    
    newItem = document.createElement('input');
    newItem.type = 'hidden';
    newItem.name = "bookcase"
    newItem.value = id;
    theForm.appendChild(newItem);
    
    document.getElementById('hidden_form_container2').appendChild(theForm);
    theForm.submit();
}

function mouse(item, event, id) {
    // this no longer contains anything. Has been adapted for mobile.
}

// for mobile w/ touch events
var waitABit = false;

function touch(item, event, id, idnum) {
    console.log(window.getComputedStyle(trash, null).getPropertyValue('padding-left'));

    var left = area.getBoundingClientRect().left;
    var right = area.getBoundingClientRect().right;
    var top = area.getBoundingClientRect().top;
    var bottom = area.getBoundingClientRect().bottom;

    // put on top
    item.style.zIndex = 1000;

    moveAt(event.touches[0].pageX, event.touches[0].pageY);

    // centers the ball at (pageX, pageY) coordinates
    function moveAt(pageX, pageY) {
        item.style.left = (pageX - document.getElementById("area").offsetLeft - (item.offsetWidth / 2)) + 'px';
        item.style.top = (pageY - document.getElementById("area").offsetTop - (item.offsetHeight / 2)) + 'px';
    }

    function onFingerMove(event) {
        var xc = event.changedTouches[0].pageX;
        var yc = event.changedTouches[0].pageY;
        var rect1 = document.getElementById(id).getBoundingClientRect();
        var rect2 = document.getElementById("trash").getBoundingClientRect();
        var widthHalf = ((rect2.right - rect2.left) / 2);
        var heightHalf = ((rect2.bottom - rect2.top) / 2)
        var overlap = null;

        // if too far to the right
        if (xc + (item.offsetWidth / 2 ) >= right) {
            xc = right - (item.offsetWidth);
            document.removeEventListener('touchmove', onFingerMove);
            item.ontouchend = null;
            item.ontouchcancel = null;
        }

        // if too far to the left
        if (xc - (item.offsetWidth / 2) <= left) {
            xc = left + (item.offsetWidth);
            document.removeEventListener('touchmove', onFingerMove);
            item.ontouchend = null;
            item.ontouchcancel = null;
        }

        // if too far up
        if (yc + (item.offsetHeight / 2) >= bottom) {
            yc = bottom - (item.offsetHeight);
            document.removeEventListener('touchmove', onFingerMove);
            item.ontouchend = null;
            item.ontouchcancel = null;
        }

        // if too far down
        if (yc - (item.offsetHeight / 2) <= top) {
            yc = top + (item.offsetHeight);
            document.removeEventListener('touchmove', onFingerMove);
            item.ontouchend = null;
            item.ontouchcancel = null;
        }

        if ( !(rect1.right < (rect2.left + widthHalf) || rect1.left > (rect2.right - widthHalf) || rect1.bottom < (rect2.top + heightHalf) || rect1.top > (rect2.bottom - heightHalf))) {
            if (!waitABit) {
                document.removeEventListener('touchmove', onFingerMove);
                item.ontouchend = null;
                item.ontouchcancel = null;

                if (confirm('Are you sure you want to delete this bookcase?'))
                    deleteBC(idnum);
                else
                    waitABit = true;
            }
        } else // if no overlap; one or more is true
            waitABit = false;

        moveAt(xc, yc);
    }

    // (3) move the ball on mousemove
    document.addEventListener('touchmove', onFingerMove);

    // (4) drop the ball, remove unneeded handlers
    item.ontouchend = function() {
        document.removeEventListener('touchmove', onFingerMove);
        item.ontouchend = null;
    };
    
    // (4) drop the ball, remove unneeded handlers
    item.ontouchcancel = function() {
        document.removeEventListener('touchmove', onFingerMove);
        item.ontouchcancel = null;
    };
};