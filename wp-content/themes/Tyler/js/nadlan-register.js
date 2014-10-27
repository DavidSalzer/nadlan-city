var priceArr, startDay, endDay, roomType, bedType, daysCount, sum;
var dataObj = {
    //client: [Fname1, Lname1, Phone_Mobile1, Email1, title1,id1,companyName1,companyJob1,uploadImag1]
    //arrRooms:[HouseType,BedType,RoomType],
    //arrPayment:[nvoiceN1,RegistrationNo1,Charge1,Reference,PriceIncVat,Price],
    Participant: [
    //    [Fname1, Lname1, Phone_Mobile1, Email1, title1,id1,companyName1,companyJob1,uploadImag1];
    //    [Fname1, Lname1, Phone_Mobile1, Email1, title1,id1,companyName1,companyJob1,uploadImag1];
    ]
};


$(document).ready(function () {
    //without staying to night | single(1 night,2 nights,3 nights) | double (1 night,2 nights,3 nights)| triple (1 night,2 nights,3 nights)
    priceArr = [[3540], [4720, 6490, 8850], [6608, 8496, 10620], [7080, 9912, 12390]];

    //init general parameters
    startDay = $("#register-start-day");
    endDay = $("#register-end-day");
    roomType = $("#register-room-type");
    bedType = $("#register-bed-type");
    paymentType = $("#split-payment");
    sum = $("#register-sum");

    uploadImag1 = "";
    uploadImag2 = "";
    uploadImag3 = "";
    daysNum = 0;

    isPayment1Change = 0;
    isPayment2Change = 0;
    isPayment3Change = 0;

    //attach events
    window.onhashchange = changeHash;

    $("#nadlan-register-form").on("change", "#register-room-type", updateRoom);
    $("#nadlan-register-form").on("change", "#split-payment", updatepaymentDetails);

    $("#step-3").on("change", "#amount1,#amount2,#amount3,#payment-checkbox-1,#payment-checkbox-2,#payment-checkbox-3", updatePaymentSpread);
    $(".upload-imag-icon").on("change", "input", uploaduserImage);


    $("#next-to-step-2").on("click", goToStep2);
    $("#next-to-step-3").on("click", goToStep3);

    $("#siugnUp").on("click", saveUser);
    $("#siugnUpWithPay").on("click", saveUser);


    init();

});

function init() {
    if (window.location.hash == "#step-1") {
        changeHash();
    }
    else {
        registerNavigation("#step-1");
    }
    //sort select elements
    sortSelect(document.getElementById('registrationAddressCity1'));
    $('#registrationAddressCity1  option[value="18"]').attr('selected', 'selected');

    setTimeout(function () {
        $(window).scrollTop(0);
    }, 500);

    //save mediaId
    if ((location.search.indexOf("media=") > -1) && (localStorage)) {
        localStorage.setItem("media", window.location.search.split("media=")[1]);
    }

}

//sort selects element
function sortSelect(selElem) {
    var tmpAry = new Array();
    for (var i = 0; i < selElem.options.length; i++) {
        tmpAry[i] = new Array();
        tmpAry[i][0] = selElem.options[i].text;
        tmpAry[i][1] = selElem.options[i].value;
    }
    tmpAry.sort();
    while (selElem.options.length > 0) {
        selElem.options[0] = null;
    }
    for (var i = 0; i < tmpAry.length; i++) {
        var op = new Option(tmpAry[i][0], tmpAry[i][1]);
        selElem.options[i] = op;
    }
    return;
}

function getTotalSum() {
    return sum.val().slice(0, -4);
}
//*************************navigation and validation************************
function registerNavigation(step) {
    window.location.hash = step;

}

function changeHash() {
    $(".register-step").hide();
    $(window.location.hash).show();
}

function goToStep1() {
    registerNavigation("#step-1");
}


function goToStep2() {
    //validate : if there are enter date and exit date
    if ((isValid(startDay)) && (isValid(endDay))) {
        daysNum = endDay.val() - startDay.val();
        //check if user enter valid dates
        if (checkIfDateIsValid()) {
            updateRoom(); //save room array
            registerNavigation("#step-2");
        }
    }
    return false;
}

function goToStep3() {
    var valid = true;

    //client & first participant
    var Fname1 = isValid($("#Fname1"));
    var Lname1 = isValid($("#Lname1"));
    var Phone_Mobile1 = isNumeric($("#Phone_Mobile1"));
    var Email1 = isValidEmail($("#Email1"));
    var title1 = isValid($("#title1"));
    var id1 = isNumeric($("#id1"));
    var companyName1 = isValid($("#companyName1"));
    var companyJob1 = isValid($("#companyJob1"));

    //check if client details is valid
    if (Fname1 && Lname1 && Phone_Mobile1 && Email1 && title1 && id1 && companyName1 && companyJob1) {
        //create bamby object
        dataObj.client = [Fname1, Lname1, Phone_Mobile1, Email1, parseInt(title1, 10), id1, companyName1, parseInt(companyJob1, 10), uploadImag1];
        $("#payment-name-1").html(" - " + Fname1 + " " + Lname1);
    }
    else {
        valid = false;
    }

    //check if there is another participent
    roomTypeVal = roomType.val();
    if (roomTypeVal >= "2") {
        var Fname2 = isValid($("#Fname2"));
        var Lname2 = isValid($("#Lname2"));
        var Phone_Mobile2 = isNumeric($("#Phone_Mobile2"));
        var Email2 = isValidEmail($("#Email2"));
        var title2 = isValid($("#title2"));
        var id2 = isNumeric($("#id2"));
        var companyName2 = isValid($("#companyName2"));
        var companyJob2 = isValid($("#companyJob2"));

        if (Fname2 && Lname2 && Phone_Mobile2 && Email2 && title2 && id2 && companyName2 && companyJob2) {
            //create bamby object           
            dataObj.Participant[0] = [Fname2, Lname2, Phone_Mobile2, Email2, parseInt(title2, 10), id2, companyName2, parseInt(companyJob2, 10), uploadImag2];
            $("#payment-name-2").html(" - " + Fname2 + " " + Lname2);
        }
        else {
            valid = false;
        }
    }

    if (roomTypeVal >= "3") {
        var Fname3 = isValid($("#Fname3"));
        var Lname3 = isValid($("#Lname3"));
        var Phone_Mobile3 = isNumeric($("#Phone_Mobile3"));
        var Email3 = isValidEmail($("#Email3"));
        var title3 = isValid($("#title3"));
        var id3 = isNumeric($("#id3"));
        var companyName3 = isValid($("#companyName3"));
        var companyJob3 = isValid($("#companyJob3"));

        if (Fname3 && Lname3 && Phone_Mobile3 && Email3 && title3 && id3 && companyName3 && companyJob3) {
            //create bamby object
            dataObj.Participant[1] = [Fname3, Lname3, Phone_Mobile3, Email3, parseInt(title3, 10), id3, companyName3, parseInt(companyJob3, 10), uploadImag3];
            $("#payment-name-3").html(" - " + Fname3 + " " + Lname3);
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


//*************************update details************************
//update how many participate 
function updateRoom() {
    dataObj.arrRooms = [];
    bedTypeVal = bedType.val();
    roomTypeVal = roomType.val();

    //one day without night
    if (daysNum == 0) {
        dataObj.arrRooms[0] = [];
        dataObj.arrRooms[0][0] = "Z" + (parseInt(startDay.val(), 10));
        //BedType
        dataObj.arrRooms[0][1] = bedTypeVal;
        //RoomType
        dataObj.arrRooms[0][2] = roomTypeVal;
    }
    for (var i = 0; i < daysNum; i++) {
        dataObj.arrRooms[i] = [];
        //HouseType
        //if without night
        if (roomTypeVal == "0") {
            dataObj.arrRooms[i][0] = "Z" + (parseInt(startDay.val(), 10) + i);
        }
        else {
            dataObj.arrRooms[i][0] = "A" + (parseInt(startDay.val(), 10) + i);
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
        $("#split-payment").show();
        $("#split-payment-label").show();
        //$("#split-payment-3").hide();
    }
    else if (roomTypeVal == "3") {
        $("#details2").show();
        $("#details3").show();
        $("#split-payment").show();
        $("#split-payment-label").show();
        //$("#split-payment-3").show();
    }
    else {// 0/1
        $("#details2").hide();
        $("#details3").hide();
        $("#split-payment-label").hide();
        $("#split-payment").hide();
    }
}

function updatepaymentDetails() {
    var paymentTypeVal = paymentType.val();
    $("#amount1").show();
    $("#payment-name-1").show();
    $(".nadlan-tooltip").hide();
    //if to split
    if (paymentTypeVal == "1") {
        roomTypeVal = roomType.val();
        if (roomTypeVal == "2") {
            $("#payment2").show();
            $("#payment3").hide();
            $("#amount1,#amount2").val(getTotalSum() / 2);
            $(".nadlan-tooltip").hide();
            $("#payment-checkbox-2").hide();
            $("#payment-checkbox-1").hide();
            $("#payment-checkbox-1").hide().prop('checked', true);
            $("#payment-checkbox-2").hide().prop('checked', true);
            $("#payment-checkbox-3").hide().prop('checked', false);
        }
        else if (roomTypeVal == "3") {
            $("#payment2").show();
            $("#payment3").show();
            $("#amount1,#amount2,#amount3").val(getTotalSum() / 3);
            $(".nadlan-tooltip").show();
            $("#payment-checkbox-1").show().prop('checked', true);
            $("#payment-checkbox-2").show().prop('checked', true);
            $("#payment-checkbox-3").show().prop('checked', true);
        }
    }
    else {//ont to split
        $("#payment2").hide();
        $("#payment3").hide();
        $("#amount1").hide();
        $("#payment-name-1").hide();
        $("#payment-checkbox-1").hide().prop('checked', false);
        $("#payment-checkbox-2").hide().prop('checked', false);
        $("#payment-checkbox-3").hide().prop('checked', false);
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

        //if without night -> no check how mach days
        if (roomTypeVal == "0") {
            sum.val(priceArr[roomTypeVal] + ' ש"ח');
        }
        else {
            sum.val(priceArr[roomTypeVal][daysNum - 1] + ' ש"ח');
        }

        return;
    }
    else {
        goToStep1();
        sum.val('0 ש"ח');
        return;
    }
}

function updatePaymentSpread(e) {
    var isPayment1 = $("#payment-checkbox-1").is(":checked");
    var isPayment2 = $("#payment-checkbox-2").is(":checked");
    var isPayment3 = $("#payment-checkbox-3").is(":checked");

    //if (e.target.id.indexOf("amount1") > -1) { isPayment1Change = 1; }
    //if (e.target.id.indexOf("amount2") > -1) { isPayment2Change = 1; }
    //if (e.target.id.indexOf("amount3") > -1) { isPayment3Change = 1; }

    ////get dif
    //var difference = parseInt(getTotalSum(), 10) - (parseInt(e.target.value, 10));
    //if (e.target.id.indexOf("1") > -1) {
    //    $("#amount2,#amount3").val(difference / 2);
    //}
    //if (e.target.id.indexOf("2") > -1) {
    //    $("#amount1,#amount3").val(difference / 2);
    //}
    //if (e.target.id.indexOf("3") > -1) {
    //    $("#amount1,#amount2").val(difference / 2);
    //}


    if (e.target.id.indexOf("checkbox") > -1) {
        //if 3 are pay =1,2,3
        if (isPayment1 && isPayment2 && isPayment3) {

            $("#amount1,#amount2,#amount3").val(getTotalSum / 3);



        }
        //if 2 are pay =1 + 2 | 2 + 3 | 1 + 3
        else if ((isPayment1 && isPayment2) || (isPayment2 && isPayment3) || (isPayment1 && isPayment3)) {
            if (!isPayment1) {
                $("#amount2,#amount3").val(getTotalSum() / 2);
                $("#amount1").val(0);
            }
            else if (!isPayment2) {
                $("#amount1,#amount3").val(getTotalSum() / 2);
                $("#amount2").val(0);
            }
            else if (!isPayment3) {
                $("#amount1,#amount2").val(getTotalSum() / 2);
                $("#amount3").val(0);
            }
        }
        //if 1 is pay = 1 | 2 | 3
        else {
            if (isPayment1) {
                $("#amount1").val(getTotalSum());
                $("#amount2").val(0);
                $("#amount3").val(0);
            }
            else if (isPayment2) {
                $("#amount2").val(getTotalSum());
                $("#amount1").val(0);
                $("#amount3").val(0);
            }
            else if (isPayment3) {
                $("#amount3").val(getTotalSum());
                $("#amount2").val(0);
                $("#amount1").val(0);
            }
        }
    }

    //if amount is changed
    //else if (e.target.id.indexOf("amount") > -1) {
    //    var difference = parseInt(getTotalSum(), 10) - parseInt(e.target.value, 10);

    //    //if 3 are pay =1,2,3
    //    if (isPayment1 && isPayment2 && isPayment3) {
    //        if (e.target.id.indexOf("1") > -1) {
    //            $("#amount2,#amount3").val(difference / 2);
    //        }
    //        if (e.target.id.indexOf("2") > -1) {
    //            $("#amount1,#amount3").val(difference / 2);
    //        }
    //        if (e.target.id.indexOf("3") > -1) {
    //            $("#amount1,#amount2").val(difference / 2);
    //        }

    //    }
    //    //if 2 are pay =1 + 2 | 2 + 3 | 1 + 3
    //    else if ((isPayment1 && isPayment2) || (isPayment2 && isPayment3) || (isPayment1 && isPayment3)) {
    //        if (!isPayment1) {
    //            if (e.target.id.indexOf("2") > -1) {
    //                $("#amount3").val(difference);
    //            }
    //            else {
    //                $("#amount2").val(difference);
    //            }
    //        }
    //        else if (!isPayment2) {
    //            if (e.target.id.indexOf("1") > -1) {
    //                $("#amount3").val(difference);
    //            }
    //            else {
    //                $("#amount1").val(difference);
    //            }
    //        }
    //        else if (!isPayment3) {
    //            if (e.target.id.indexOf("1") > -1) {
    //                $("#amount2").val(difference);
    //            }
    //            else {
    //                $("#amount1").val(difference);
    //            }
    //        }


    //    }
    //}
}

//*************************save and pay************************
function saveUser() {
    // var toPay = false;
    dataObj.toPAy = false;
    if ($(this).attr("id") == "siugnUpWithPay") {
        dataObj.toPAy = true;
    }
    else {
        dataObj.toPAy = false;
    }

    //if is shoham
    if (location.search.indexOf("shoham") > -1) {
        dataObj.shoham = true;
    }
    else {
        dataObj.shoham = false;
    }

    //save mediaId
    if (location.search.indexOf("media=") > -1) {
        //if (localStorage) {
        //    localStorage.setItem("media", window.location.search.split("media=")[1]);
        //}
        dataObj.mediaID = window.location.search.split("media=")[1];
    }
    else {
        if (localStorage && localStorage.getItem("media")) {
            dataObj.mediaID = localStorage.getItem("media");
        }
        else {
            dataObj.mediaID = "";
        }
    }

    //if the sum is not 0
    if (getTotalSum() > 0) {
        dataObj.price = parseInt(getTotalSum(), 10);
        var isPayment1 = $("#payment-checkbox-1").is(":checked");
        var isPayment2 = $("#payment-checkbox-2").is(":checked");
        var isPayment3 = $("#payment-checkbox-3").is(":checked");
        var paymentTypeVal = paymentType.val();
        //if someone is pay
        if (isPayment1 || isPayment2 || isPayment3 || (paymentTypeVal == "0")) {

            dataObj.arrPayment = [];

            var valid = true;
            //validate 
            var charge1 = parseInt($("#amount1").val(), 10);
            if (paymentTypeVal == "0") {
                charge1 = getTotalSum();
            }

            if (isPayment1 || (paymentTypeVal == "0")) {
                var invoiceN1 = isValid($("#invoiceN1"));
                var registrationNo = isNumeric($("#registrationNo1"));
                if(registrationNo&&registrationNo.length!=9){
                    registrationNo = null;
                    $("#registrationNo1").addClass("alert");
                }
                var registrationAddressCity = isValid($("#registrationAddressCity1"));
                var registrationAddressStreet = isValid($("#registrationAddressStreet1"));
                var registrationAddressZip = isNumeric($("#registrationAddressZip1"));
                var registrationPhone = isNumeric($("#registrationPhone1"));

                //if is valid
                if (invoiceN1 && registrationNo && registrationAddressCity && registrationAddressStreet && registrationAddressZip && registrationPhone) {

                    dataObj.arrPayment[0] = [invoiceN1, registrationNo, charge1, registrationAddressZip, registrationAddressCity, registrationAddressStreet, registrationPhone];
                }
                else {
                    valid = false;
                }
            }
            else {
                dataObj.arrPayment[0] = [];
            }





            //if to split
            if (paymentTypeVal == "1") {
                var charge2 = 0, charge3 = 0;



                if (isPayment2) {
                    charge2 = parseInt($("#amount2").val(), 10);
                }
                if (isPayment3) {
                    charge3 = parseInt($("#amount3").val(), 10);
                }
                //if the amount is the same sum            
                if ((charge1 + charge2 + charge3) == getTotalSum()) {
                    if (isPayment2) {
                        var invoiceN2 = isValid($("#invoiceN2"));
                        var registrationNo2 = isNumeric($("#registrationNo2"));
                        var registrationAddress2 = isValid($("#registrationAddress2"));

                        if (invoiceN2 && registrationNo2 && charge2 && registrationAddress2) {
                            dataObj.arrPayment[1] = [invoiceN2, registrationNo2, charge2, registrationAddress2];
                        }
                        else {
                            valid = false;
                        }

                    }
                    else {
                        dataObj.arrPayment[1] = [];
                    }

                    if (isPayment3) {
                        var invoiceN3 = isValid($("#invoiceN3"));
                        var registrationNo3 = isNumeric($("#registrationNo3"));
                        var registrationAddress3 = isValid($("#registrationAddress3"));

                        if (invoiceN3 && registrationNo3 && charge3 && registrationAddress3) {
                            dataObj.arrPayment[2] = [invoiceN3, registrationNo3, charge3, registrationAddress3];
                        }
                        else {
                            valid = false;
                        }

                    }
                    else {
                        dataObj.arrPayment[2] = [];
                    }
                }

                else {
                    alert("סכומי החשבוניות לא תואמות לסכום הכללי או שסימנת משתתף ולא הזנת לו סכום");
                    return false;
                }
            }

            var terms = $("#terms-of-use").is(":checked");
            // var content=$("#content").is(":checked");
            $(".check-alert").removeClass("check-alert");

            if (terms && valid) {
                showLoader();
                //if valid save post in db
                $.post('wp-admin/admin-ajax.php', {
                    //data: encodeURI(JSON.stringify(dataObj)),
                    data: (JSON.stringify(dataObj)),
                    action: 'addSystemUser'
                },
            function (data) {
                hideLoader();
                if (data) {
                    if (data[data.length - 1] != "}") {
                        data = data.slice(0, -1);
                    }
                    var result = JSON.parse(data);
                    if (result.error) {
                        console.log(result.errorMassege);
                        switch (result.error) {
                            case "401":
                                {
                                    alert("Incorrect ProjectID and/or password. or Invalid username and ProjectID format. Values may not be empty");
                                    break;
                                }
                            case "402":
                                {
                                    alert("Need to Authenticate first.");
                                    break;
                                }
                            case "403":
                                {
                                    alert("Need to Insert Fname or Lname Phone_Mobile");
                                    break;
                                }
                            case "406":
                                {
                                    alert("Need to Insert CLientID");
                                    break;
                                }
                            case "400":
                                {
                                    alert("Need to Insert Room");
                                    break;
                                }
                            case "404":
                                {
                                    alert("Need to Insert HouseType,BedType,RoomType");
                                    break;
                                }
                            case "421":
                                {
                                    alert("No room vacancy in the second hotel too");
                                    break;
                                }
                            case "411":
                                {
                                    alert("Need to Insert ContractID");
                                    break;
                                }
                            case "407":
                                {
                                    alert("Need to Insert Id");
                                    break;
                                }
                            default:
                                {
                                    alert("בעיה לא ידועה");
                                    break;
                                }
                        }

                    }
                    else {
                        alert("הרשמך התקבלה, מספר הזמנה:" + result.data + " . סיכום ההזמנה ישלח במייל.");
                        $("#nadlan-register-form input,#nadlan-register-form select").val("");
                        $("#siugnUpWithPay,#siugnUp").hide();
                        if (dataObj.toPAy) {
                            $.post('wp-admin/admin-ajax.php', {
                                price: dataObj.price,
                                contractId: result.data,
                                action: 'payInPelecard'
                            },
                        function (data) {
                            if ((data) && (data != "")) {
                                $("body").append(data);
                                $("#pelecard_payment_form").hide();
                                $("#submit_pelecard_payment_form").click();
                            }

                        });

                        }
                        else {
                            //$("#nadlan-register-form input,#nadlan-register-form select").val("");
                            window.location = domain + "?page_id=" + signupNum;
                        }
                    }
                    console.log(data);
                }

            });
            }
            else {
                $("#terms-of-use").addClass("check-alert");
            }

        }
        else {
            alert("אף אחד לא רשום לתשלום");
        }

    }
    else {
        alert("לא הזנת תאריכים")
        goToStep1();

    }
    return false;
}


//*************************validate input************************

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

function isNumeric(input) {
    var obj = input.val();
    if (obj != "") {
        var result = !jQuery.isArray(obj) && (obj - parseFloat(obj) + 1) >= 0;
        if (result) {
            input.removeClass("alert");
            return obj;
        }
    }
    input.addClass("alert");
    return null;
}

//check if dates is valid
function checkIfDateIsValid() {
    if ((daysNum != null) && (daysNum >= 0)) {
        $("#register-start-day,#register-end-day").removeClass("alert");
        //if one day -> check user choose without night
        if ((daysNum == 0) && (roomType.val() != 0)) {
            roomType.addClass("alert");
            alert("בחרת להשתתף ביום אחד, אך לא סימנת שזה ללא שינה");
            return false;
        }
        //if one night in second day
        if ((endDay.val() == "3") && (startDay.val() == "2")) {
            alert("אי אפשר להגיע ללילה אחד בתאריכים אלו");
            return false;
        }
        return true;
    }

    $("#register-start-day,#register-end-day").addClass("alert");
    alert("לא הזנת את כל התאריכים או שהזנת תאריכים לא אפשריים");
    return false;
}

function showLoader() {
    $("#nadlan-mask").show();
}

function hideLoader() {
    $("#nadlan-mask").hide();
}
//*************************upload image************************

function uploaduserImage() {
    $this = $(this);
    var i = $this.attr("id").slice(-1);
    //uploadImage($this, function (url) {
    //    $this.parents(".upload-imag-icon").css("background-image", "url(" + url + ")");
    //});

    $this.upload(domain + 'wp-content/themes/Tyler/uploadImage.php', function (url) {
        //if this image was upload
        if (url.indexOf("upload") > -1) {
            if (i == "1") {
                uploadImag1 = domain + 'wp-content/themes/Tyler/' + url;
            }
            if (i == "2") {
                uploadImag2 = domain + 'wp-content/themes/Tyler/' + url;
            }
            if (i == "3") {
                uploadImag3 = domain + 'wp-content/themes/Tyler/' + url;
            }
            console.log(url);

            $this.parents(".upload-imag-icon").css("background-image", "url(" + domain + 'wp-content/themes/Tyler/' + url + ")");
        }
    });
}
