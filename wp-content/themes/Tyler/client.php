<?php
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);
  
  
  #chek soap - sap in bmby
  #client side
  if($_SERVER["REQUEST_METHOD"]=="GET"){
      ini_set('soap.wsdl_cache_enabled',0); 
      ini_set('soap.wsdl_cache_ttl', '0');
        
     
           if(isset($_GET['form'])){
              
               $client = new SoapClient('http://www.bmby.com/ReservationsWebService/index.wsdl', 
                                        array("trace" => 1, "exception" => 0, 'soap_version' => SOAP_1_1)
                                        );   

               var_dump($client->__getFunctions());
               
               
              
               $token = $client->fnAuthenticate('4909','test1234');
              
             
            
               echo "<pre>";
               print_r($_GET['Participant']);
               echo "</pre>";
               
               
  
               if($_GET['form'] == "client"){
                  $result = $client->fnSetClient($token, $_GET);
                  $strResult = "CLientID";
               }elseif($_GET['form'] == "room"){
                   $arrRooms = array();
                   $clientid  = $_GET['ClientID'];
                   $arrRooms = $_GET['Room'];
                   $arrPayment = $_GET['Payment'];
                   //$arr[] = $_GET;
                   $result = $client->fnSetRegistration($token,$clientid, $arrRooms, $arrPayment); 
                   $strResult = "ContractID";
               }else{
                    $arrParticipants = array();
                    $arrParticipants = $_GET['Participant'];
                    $ContractID  = $_GET['ContractID'];
                    $result = $client->fnSetParticipants($token,$ContractID, $arrParticipants);  
                      
               }
                 
               echo '<pre>'.$strResult.print_r($result, true).'</pre>';
          
   } 
          
  
  } 
  
              
  
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<br />
<br />
<form method="get">
    שלב 1
   זיהוי נרשם ראשי  <br /> ################ <br />
    <input type="hidden" name="form" value="client" />
    Fname
    <input name="Fname" placeholer="Fname" />
    <br />
    
    Lname
    <input name="Lname" placeholer="Lname" />
    <br />
    
    phone
    <input name="Phone_Mobile" placeholer="phone" />
    <br />
    
    Email
    <input name="Email" placeholer="email" />
    <br />
    
    CitizenId
    <input name="CitizenId" placeholer="CitizenId" />
    
    <input type="submit" value="send" />

</form>
<br />
<br />
  שלב 2
 שליחת חדרים+ פרטי תשלום <br />  ################ <br />
<form method="get">
    <input type="hidden" name="form" value="room" />
    <table>
      <tr>
         <th>Room 1</th>
         <th>Room 2</th>
      </tr>
      <tr>
         <td>
           
            HouseType
            <input name="Room[0][HouseType]" placeholer="HouseType" />
            <br />
            
            BedType
            <input name="Room[0][BedType]" placeholer="BedType" />
            <br />
            
            RoomType
            <input name="Room[0][RoomType]" placeholer="RoomType" />
            <br />
         </td>
     
        
         <td>
           
            HouseType
            <input name="Room[1][HouseType]" placeholer="HouseType" />
            <br />
            
            BedType
            <input name="Room[1][BedType]" placeholer="BedType" />
            <br />
            
            RoomType
            <input name="Room[1][RoomType]" placeholer="RoomType" />
            <br />
         </td>
      </tr>
    </table>
    <br />
    ClientID
    <input name="ClientID" placeholer="ClientID" />
    <br />
            
    InvoiceN1
    <input name="Payment[InvoiceN1]" placeholer="InvoiceN1" />
    <br />
    
    RegistrationNo1
    <input name="Payment[RegistrationNo1]" placeholer="RegistrationNo1" />
    <br />
    
    Reference
    <input name="Payment[Reference]" placeholer="Reference" />
    <br />
    
    
    PriceIncVat
    <input name="Payment[PriceIncVat]" placeholer="PriceIncVat" />
    <br />
    
    Price
    <input name="Payment[Price]" placeholer="Price" />
    <br />
    
    
    <input type="submit" value="send" />

</form>
<br />
<br />
שלב 3
שליחת פרטי מתאכסנים <br /> ################ <br />
<form method="get">
    <input type="hidden" name="form" value="participant" />
    
    <table>
      <tr>
         <th>Participant 2</th>
         <th>Participant 3</th>
      </tr>
      <tr>
         <td>
            Fname
            <input name="Participant[0][Fname]" placeholer="Fname" />
            <br />
            
            Lname
            <input name="Participant[0][Lname]" placeholer="Lname" />
            <br />
            
            phone
            <input name="Participant[0][Phone_Mobile]" placeholer="phone" />
            <br />
            
            Email
            <input name="Participant[0][Email]" placeholer="email" />
            <br />
            
            CitizenId
            <input name="Participant[0][CitizenId]" placeholer="CitizenId" />
         </td>
         
         <td>
            Fname
            <input name="Participant[1][Fname]" placeholer="Fname" />
            <br />
            
            Lname
            <input name="Participant[1][Lname]" placeholer="Lname" />
            <br />
            
            phone
            <input name="Participant[1][Phone_Mobile]" placeholer="phone" />
            <br />
            
            Email
            <input name="Participant[1][Email]" placeholer="email" />
            <br />
            
            CitizenId
            <input name="Participant[1][CitizenId]" placeholer="CitizenId" />
         </td>
      </tr>
      </table>
         
    ContractID
     <input name="ContractID" placeholer="ContractID" />
    <br />
   
    <input type="submit" value="send" />
    
</form>
</html>
