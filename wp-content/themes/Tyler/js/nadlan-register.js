var priceArr, startDay, endDay, roomType, bedType, daysCount, sum;
var dataObj = {
    //client: [Fname, Lname, Phone_Mobile, Email, CitizenId],
    //arrRooms:[HouseType,BedType,RoomType],
    //arrPayment:[nvoiceN1,RegistrationNo1,Charge1,Reference,PriceIncVat,Price],
    Participant: [
    //    [Fname, Lname, Phone_Mobile, Email, CitizenId],
    //    [Fname, Lname, Phone_Mobile, Email, CitizenId]
    ]
};


$(document).ready(function () {
    //without staying to night | single(1 night,2 nights,3 nights) | double (1 night,2 nights,3 nights)| triple (1 night,2 nights,3 nights)
    priceArr = [[1000], [4000, 5500, 7500], [5600, 7200, 9000], [6000, 8400, 10500]];
    startDay = $("#register-start-day");
    endDay = $("#register-end-day");
    roomType = $("#register-room-type");
    bedType = $("#register-bed-type");

    daysNum = 0;
    sum = $("#register-sum");

    // updatePrice();

    //$("#nadlan-register-form").on("change", "#register-start-day,#register-end-day,#register-room-type", updatePrice);
    $("#nadlan-register-form").on("change", "#register-room-type", updateRoom);
    $("#siugnUp").on("click", payOnPaypal);

    $("#next-to-step-2").on("click", goToStep2);
    $("#next-to-step-3").on("click", goToStep3);
    window.onhashchange = changeHash;

    init();

});

function init() {
    if (window.location.hash == "#step-1") {
        changeHash();
    }
    else {
        registerNavigation("#step-1");
    }
}

//navigation and validation
function registerNavigation(step) {
    window.location.hash = step;

}

function changeHash() {
    $(".register-step").hide();
    $(window.location.hash).show();
}

function goToStep2() {
    //validate : if there are enter date and exit date
    if ((isValid(startDay)) && (isValid(endDay))) {
        daysNum = endDay.val() - startDay.val();
        if (checkIfDateIsValid()) {
            registerNavigation("#step-2");
        }
    }
    return false;

}

function goToStep3() {
    var valid = true;
    //validate
    //client & first participant
    var Fname1 = isValid($("#Fname1"));
    var Lname1 = isValid($("#Lname1"));
    var Phone_Mobile1 = isValid($("#Phone_Mobile1"));
    var Email1 = isValidEmail($("#Email1"));
    //var title1 = isValid($("#title1"));
    var id1 = isValid($("#id1"));
    //var companyName1 = isValid($("#companyName1"));
    //var companyJob1 = isValid($("#companyJob1"));

    if (Fname1 && Lname1 && Phone_Mobile1 && Email1 && title1 && id1 && companyName1 && companyJob1) {
        //create bamby object
        dataObj.client = [Fname1, Lname1, Phone_Mobile1, Email1, id1];
    }
    else {
        valid = false;
    }

    roomTypeVal = roomType.val();
    if (roomTypeVal >= "2") {
        var Fname2 = isValid($("#Fname2"));
        var Lname2 = isValid($("#Lname2"));
        var Phone_Mobile2 = isValid($("#Phone_Mobile2"));
        var Email2 = isValidEmail($("#Email2"));
       // var title2 = isValid($("#title2"));
        var id2 = isValid($("#id2"));
        //var companyName2 = isValid($("#companyName2"));
        //var companyJob2 = isValid($("#companyJob2"));

        if (Fname2 && Lname2 && Phone_Mobile2 && Email2 && title2 && id2 && companyName2 && companyJob2) {
            //create bamby object           
            dataObj.Participant[0] = [Fname2, Lname2, Phone_Mobile2, Email2, id2];
        }
        else {
            valid = false;
        }
    }

    if (roomTypeVal >= "3") {
        var Fname3 = isValid($("#Fname3"));
        var Lname3 = isValid($("#Lname3"));
        var Phone_Mobile3 = isValid($("#Phone_Mobile3"));
        var Email3 = isValidEmail($("#Email3"));
        //var title3 = isValid($("#title3"));
        var id3 = isValid($("#id3"));
        //var companyName3 = isValid($("#companyName3"));
        //var companyJob3 = isValid($("#companyJob3"));

        if (Fname3 && Lname3 && Phone_Mobile3 && Email3 && title3 && id3 && companyName3 && companyJob3) {
            //create bamby object
            dataObj.Participant[1] = [Fname3, Lname3, Phone_Mobile3, Email3, id3];
        }
        else {
            valid = false;
        }
    }

    if (valid) {
        updatePrice();
        registerNavigation("#step-3");
    }
    return false;

}

function checkIfDateIsValid() {
    if (daysNum == null) {
        return false;
    }
    if (daysNum < 0) {
        $("#register-start-day,#register-end-day").addClass("alert");
        alert("הכנסת בחירה לא אפשרית");

        return false;
    }
    else {
        $("#register-start-day,#register-end-day").removeClass("alert");
        return true;
    }
}

//update how many participate 
function updateRoom() {
    dataObj.arrRooms = [];
    bedTypeVal = bedType.val();
    roomTypeVal = roomType.val();

    for (var i = 0; i < daysNum; i++) {
        dataObj.arrRooms[i] = [];
        //HouseType
        //if without night
        if (roomTypeVal == "0") {
            dataObj.arrRooms[i][0] = "Z" + (startDay.val() + i);
        }
        else {
            dataObj.arrRooms[i][0] = "A" + (startDay.val() + i);
        }
        //BedType
        dataObj.arrRooms[i][1] = bedTypeVal;
        //RoomType
        dataObj.arrRooms[i][2] = roomTypeVal;
    }

   
    //show and hide details
    if (roomTypeVal == "2") {
        $("#details2").show();
        $("#details3").hide();
    }
    else if (roomTypeVal == "3") {
        $("#details2").show();
        $("#details3").show();
    }
    else {// 0/1
        $("#details2").hide();
        $("#details3").hide();
    }
}

function updatePrice() {
    if ((endDay.val() != "") && (startDay.val() != "")) {
        daysNum = endDay.val() - startDay.val();
    } else {
        daysNum = null;
    }
    if (checkIfDateIsValid()) {
        roomTypeVal = roomType.val();

        if (roomTypeVal == "0") {
            sum.val(priceArr[roomTypeVal] * (daysNum+1));
        }
        else if (daysNum == 0) {
            sum.val(priceArr[0] * roomTypeVal);
        }
        else {
            sum.val(priceArr[roomTypeVal][daysNum - 1]);
        }

        //var product = daysNum + "  ימים עבור " + roomTypeVal + " אנשים";
        var price = sum.val();

        $("#formPay [name='amount']").val(price);


        return;

    }
    else {
        sum.val("0");
        return;
    }
}


function payOnPaypal() {
    if (sum.val() > 0) {
        //validate 
        var invoiceN1 = isValid($("#invoiceN1"));
        var registrationNo = isValid($("#registrationNo"));
        var registrationAddress = isValid($("#registrationAddress"));
        // var registrationPhone = isValid($("#registrationPhone"));

        //To do: add paypal and referance
        dataObj.arrPayment = [invoiceN1, registrationNo, registrationAddress, "", "", sum.val()],

        //if valid save post in db
        $.post('wp-admin/admin-ajax.php', {
            data: encodeURI(JSON.stringify(dataObj)),
            action: 'addSystemUser'
        },
        function (data) {

            console.log(data);

        });
    }
    else {
        alert("לא הזנת נתונים")
    }
    return false;
}

//validate input
function isValid(input) {
    if (input.val() != "") {
        if (input.attr("placeholder") != input.val()) {
            if (input.hasClass("alert")) {
                input.removeClass("alert");
            }
            return input.val();
        }
        else {
            input.addClass("alert");
            return null;
        }
    }
    else {
        input.addClass("alert");
        return null;
    }
}

function isValidEmail(input) {
    var email = input.val();
    if (email != "") {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!re.test(email)) {
            input.addClass("alert");
            return null;
        }
        else {
            input.removeClass("alert");
            return input.val();
        }
    }
    input.addClass("alert");
    return null;
}



