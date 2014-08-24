<?php
    
    function validPay(){
            //call from paypal_ipn.php
            global $conf;
            global $order;
    
            $req = 'cmd=_notify-validate'; // Add 'cmd=_express-checkout-mobile' to beginning of the acknowledgement
            foreach ($_POST as $key => $value) { // Loop through the notification NV pairs
                $value = urlencode(stripslashes($value)); // Encode these values
                $req .= "&$key=$value"; // Add the NV pairs to the acknowledgement
            }
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$conf->paypal->url);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
    
            if( !($res = curl_exec($ch)) ) {
                curl_close($ch);
                exit;
            }
            curl_close($ch);
    
            $orderID = $_POST['item_number'];
            $payment_status = $_POST['payment_status'];
            $payment_currency = $_POST['mc_currency'];
            $payment_amount = $_POST['mc_gross'];
            $payer_email = $_POST['payer_email'];
            $txn_id = $_POST['txn_id'];
            $receiver_email = $_POST['receiver_email'];		
    
            $log =date("Y-m-d H:i:s");
            $log .=" res=".$res;
            $log .=" payment_status=".$payment_status;
            $log .=" orderID=".$orderID;
            $log .=" amount=".$payment_amount;
            $log .=" txn_id=".$txn_id;
            $log .=" data=".$req;		
    
            file_put_contents($conf->paypal->log, $log."\n", FILE_APPEND | LOCK_EX);
    
            if ($res=="VERIFIED") {
                //call order func.
                $secsess=true;
                if ($payment_currency!="ILS"){
                    $secsess=false;
                    $payment_status +=" currency_error";
                }
                if ($receiver_email!=$conf->paypal->user){
                    $secsess=false;
                    $payment_status +=" payer_email_error";
                }
                $order->paypalresponse($orderID,$payment_status,$payment_amount,$txn_id);		
            }
        }
    
?>