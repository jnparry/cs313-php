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
    var navSize = document.getElementById("mySidenav");
    navSize.style.width = "33%";
    navSize.style.minWidth = "105px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function soon() {
    alert("Feature coming soon.");
}