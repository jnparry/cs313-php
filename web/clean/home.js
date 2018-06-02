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

//function dragArea(item) {
//    item.onmousedown = 
        
function myFunction(item, event) { // (1) start the process

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
    item.onmouseup = function() {
    document.removeEventListener('mousemove', onMouseMove);
    item.onmouseup = null;
    };

    item.ondragstart = function() {
        return false;
    };
}
//}

//function setUpCanvas() {
//    var width = window.innerWidth;
//    var height = window.innerHeight;
//    
//    var stage = new Konva.Stage({
//        container: 'myCanvas',
//        width: width,
//        height: height
//    });
//    
//    var layer = new Konva.Layer();
//    var rectX = stage.getWidth() / 2 - 50;
//    var rectY = stage.getHeight() / 2 - 25;
//    
//    var box = new Konva.Rect({
//        x: rectX,
//        y: rectY,
//        width: 100,
//        height: 50,
//        fill: '#00D2FF',
//        stroke: 'black',
//        strokeWidth: 4,
//        draggable: true
//    });
//    
//    // add cursor styling
//    box.on('mouseover', function() {
//        document.body.style.cursor = 'pointer';
//    });
//    box.on('mouseout', function() {
//        document.body.style.cursor = 'default';
//    });
//    
//    layer.add(box);
//    stage.add(layer);
//    
//    alert("wuddupp");
//}