var priceArr, startDay, endDay, roomType, daysCount, sum;
$(document).ready(function () {
    priceArr = [[1000], [4000, 5500, 7500], [5600, 7200, 9000], [6000, 8400, 10500]]; //without staying to night | single(1 night,2 nights,3 nights) | double (1 night,2 nights,3 nights)| triple (1 night,2 nights,3 nights)
    startDay = $("#register-start-day");
    endDay = $("#register-end-day");
    roomType = $("#register-room-type");
    daysNum = 0;
    sum = $("#register-sum");

    updatePrice();

    $("#nadlan-register-form").on("change", "#register-start-day,#register-end-day,#register-room-type", updatePrice);

    $("#nadlan-register-form button").on("click", payOnPaypal);

});

function checkIfCountIsValid() {
    if (daysNum < 0) {
        alert("הכנסת בחירה לא אפשרית");
        return false;
    }
    else return true;
}

function updatePrice() {
    daysNum = endDay.val() - startDay.val();


    if (checkIfCountIsValid()) {
        if (roomType.val() == "0") {
            sum.val(priceArr[roomType.val()] * daysNum);
        }
        else if (daysNum == 0) {
            sum.val(priceArr[0] * roomType.val());
        }
        else {
            sum.val(priceArr[roomType.val()][daysNum - 1]);
        }

        var product = daysNum + "  ימים עבור " + roomType.val() + " אנשים";
        var price = sum.val();
        $("#frmPayment .input:nth-child(1)").html(product);
        $("#frmPayment .input:nth-child(3)").html(price);
        $("#frmPayment input[name=amount]").val(price);
        return;

    }
    else {
        sum.val("0");
        return;
    }
}

function payOnPaypal() {
    if (sum.val() > 0) {
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