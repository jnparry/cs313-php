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

function blurCard() {
    var cardnumber = document.forms["myForm"]["cardnumber"].value;
    if (cardnumber.length < 16) {
        document.getElementById("invalid-cardnumber").innerHTML = ("Incorrect card number. Needs 16 digits.");
        return false;
    }
}

function blurExp() {
    var expiration = document.forms["myForm"]["expiration"].value;
    var expirpos   = expiration.search(/^((0[1-9])|(1[0-2]))\/((201[2-9])|(20[2-9][0-9]))$/);

    if (expirpos != 0) {
        document.getElementById("invalid-expiration").innerHTML = ("Incorrect format. Please use MM/YYYY. Year should not be less than 2011.\
");
        return false;
    }
}

function validate() {
    document.getElementById("invalid"           ).innerHTML = ""; // reset the invalid notifications                                         
    document.getElementById("invalid-number"    ).innerHTML = "";
    document.getElementById("invalid-cardnumber").innerHTML = "";
    document.getElementById("invalid-expiration").innerHTML = "";

    var fname      = document.forms["myForm"]["fname"     ].value;
    var lname      = document.forms["myForm"]["lname"     ].value;
    var address    = document.forms["myForm"]["address"   ].value;
    var myNumber   = document.forms["myForm"]["number"    ].value
    var cardnumber = document.forms["myForm"]["cardnumber"].value;
    var expiration = document.forms["myForm"]["expiration"].value;

    var pos      = myNumber  .search(/^\d{3}-\d{3}-\d{4}$/);
    var expirpos = expiration.search(/^((0[1-9])|(1[0-2]))\/((201[2-9])|(20[2-9][0-9]))$/);

    if (fname == ""      || lname == ""      || address == "" || myNumber == "" || creditcard == "" ||
        cardnumber == "" || expiration == "" || !document.getElementById("visa").checked &&
        !document.getElementById("mc").checked && !document.getElementById("ae").checked) {
        document.getElementById("invalid").innerHTML = "All sections must be filled out.";
        if      (fname      == "")                                 {                                    setFocus(); }
        else if (lname      == "")                                 { document.getElementById("lname"     ).focus(); }
        else if (address    == "")                                 { document.getElementById("address"   ).focus(); }
        else if (myNumber   == "")                                 { document.getElementById("number"    ).focus(); }
        else if (visa       == false)                              { document.getElementById("visa"      ).focus(); }
        else if (!document.getElementById("visa").checked &&
                 !document.getElementById("mc"  ).checked &&
                 !document.getElementById("ae"  ).checked)         { document.getElementById("visa"      ).focus(); }
        else if (cardnumber == "")                                 { document.getElementById("cardnumber").focus(); }
        else if (expiration == "")                                 { document.getElementById("expiration").focus(); }
        return false;
    }
    blurNumber();
    blurCard();
    blurExp();
}