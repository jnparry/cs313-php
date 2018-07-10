function saveChanges() {  
    $.get('saveLocation.php', { key: 'value1', key2: 'value2' }).done(function(data) {
        alert(data);
    });
//    var x = document.getElementsByClassName("cases");
//    for (var i = 0; i < x.length; i++) {
//        var myId = document.getElementById(x[i].id).style;
//        alert("TOP: " + myId.top + ", LEFT: " + myId.left);
//    }
}