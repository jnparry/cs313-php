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

function setUpCanvas() {
    var width = window.innerWidth;
    var height = window.innerHeight;
    
    var stage = new Konva.Stage({
        container: 'container',
        width: width,
        height: height
    });
    
    var layer = new Konva.Layer();
    var rectX = stage.getWidth() / 2 - 50;
    var rectY = stage.getHeight() / 2 - 25;
    
    var box = new Konva.Rect({
        x: rectX,
        y: rectY,
        width: 100,
        height: 50,
        fill: '#00D2FF',
        stroke: 'black',
        strokeWidth: 4,
        draggable: true
    });
    
    // add cursor styling
    box.on('mouseover', function() {
        document.body.style.cursor = 'pointer';
    });
    box.on('mouseout', function() {
        document.body.style.cursor = 'default';
    });
    
    layer.add(box);
    stage.add(layer);
    
    alert("wuddupp");
}