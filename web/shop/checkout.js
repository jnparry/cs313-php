function setFocus() {
    document.getElementById("fname").focus();
}

function blurNumber() {
    var myNumber = document.forms["myForm"]["number"    ].value;
    var pos      = myNumber.search(/^\d{3}-\d{3}-\d{4}$/);

    if (pos != 0) {
        document.getElementById("invalid-number").innerHTML = ("Incorrect format. Please use xxx-xxx-xxxx");
        return false;
    }
}

//function validate() {
//    document.getElementById("invalid"           ).innerHTML = ""; // reset the invalid notifications                   
//
//    var fname   = document.forms["myForm"]["fname" ].value;
//    var lname   = document.forms["myForm"]["lname" ].value;
//    var street  = document.forms["myForm"]["street"].value;
//    var city    = document.forms["myForm"]["city"  ].value
//    var zipcode = document.forms["myForm"]["zip"   ].value;
//
//
//}