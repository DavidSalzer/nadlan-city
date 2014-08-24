var priceArr, startDay, endDay, roomType, daysCount, sum;
$(document).ready(function () {
    //without staying to night | single(1 night,2 nights,3 nights) | double (1 night,2 nights,3 nights)| triple (1 night,2 nights,3 nights)
    priceArr = [[1000], [4000, 5500, 7500], [5600, 7200, 9000], [6000, 8400, 10500]];
    startDay = $("#register-start-day");
    endDay = $("#register-end-day");
    roomType = $("#register-room-type");
    daysNum = 0;
    sum = $("#register-sum");

    // updatePrice();

    $("#nadlan-register-form").on("change", "#register-start-day,#register-end-day,#register-room-type", updatePrice);

    $("#nadlan-register-form button").on("click", payOnPaypal);

    $(".register-step").hide();
    $("#step-1").show();

});

function checkIfCountIsValid() {
    if (daysNum == null) {
        return false;
    }
    if (daysNum < 0) {
        alert("הכנסת בחירה לא אפשרית");
        return false;
    }
    else return true;
}

function updatePrice() {
    if ((endDay.val() != "") && (startDay.val() != "")) {
        daysNum = endDay.val() - startDay.val();
    } else {
        daysNum = null;
    }



    if (checkIfCountIsValid()) {
        roomTypeVal = roomType.val();

        if (roomTypeVal == "0") {
            sum.val(priceArr[roomTypeVal] * daysNum);
        }
        else if (daysNum == 0) {
            sum.val(priceArr[0] * roomTypeVal);
        }
        else {
            sum.val(priceArr[roomTypeVal][daysNum - 1]);
        }

        var product = daysNum + "  ימים עבור " + roomTypeVal + " אנשים";
        var price = sum.val();
        $("#frmPayment .input:nth-child(1)").html(product);
        $("#frmPayment .input:nth-child(3)").html(price);
        $("#frmPayment input[name=amount]").val(price);

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


        return;

    }
    else {
        sum.val("0");
        return;
    }
}

function payOnPaypal() {
    if (sum.val() > 0) {
        var invoiceN1 = isValid($("#invoiceN1"));
        var registrationNo = isValid($("#registrationNo"));
        var registrationAddress = isValid($("#registrationAddress"));
        var registrationPhone = isValid($("#registrationPhone"));

        //client & first participant
        var Fname1 = isValid($("#Fname1"));
        var Lname1 = isValid($("#Lname1"));
        var Phone_Mobile1 = isValid($("#Phone_Mobile1"));
        var Email1 = isValid($("#Email1"));
        var title1 = isValid($("#title1"));
        var id1 = isValid($("#id1"));
        var companyName1 = isValid($("#companyName1"));
        var companyJob1 = isValid($("#companyJob1"));

        var charge = isValid($("#register-sum"));

        var sendObj = {
            client: {
                Fname: "",
                Lname: "",
                Phone_Mobile: "",
                Email: ""
            },
            room: {
                HouseName: "",
                RoomType: "",
                BaddType: ""
            },
            Participants: {
                Fname1: "",
                Lname1: "",
                Phone_Mobile1: "",
                Email1: "",
                title1: "",
                id1: "",
                Company1: ""
            },
            paiment: {
                InvoiceN1: "",
                RegitrationNo: "",
                Charge: "",
                creditReference: ""
            }
        }


        $(".qpp-style").fadeIn();

        //    jQuery.post('wp-admin/admin-ajax.php', {
        //        product: product,
        //        price: sum.val(),
        //        action: 'payOnPaypal'
        //    },
        //function (data) {

        //    console.log(data);
        //    $("#nadlan-register-form").append(data);
        //});
    }
    else {
        $(".qpp-style").fadeOut();
        alert("לא הזנת נתונים")
    }
    return false;
}

function isValid(input) {
    if (input.val() != "") {
        return input.val();
    }
    else {
        return null;
    }
}