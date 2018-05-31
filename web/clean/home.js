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
//    var navSize = document.getElementById("mySidenav").style.width;
//    if (screen.width >= 768px) {
//        navSize = 250px;
//    } else {
//        navSize = 
//    }
    var navSize = document.getElementById("mySidenav").style.width;
    if (screen.width < 315) {
        navSize = 105px;
    } else {
        navSize = "33%";
    }
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function soon() {
    alert("Feature coming soon.");
}