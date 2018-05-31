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
    var canvas = document.getElementById("myCanvas");
//    canvas.width = window.innerWidth;
    var ctx = canvas.getContext('2d');
    ctx.moveTo(0,0);
    ctx.lineTo(200,100);
    ctx.stroke();
}