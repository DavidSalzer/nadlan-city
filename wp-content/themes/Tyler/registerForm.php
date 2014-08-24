<?php
    /*
          Template Name: Embedded Register Page
      */
    
    
?>
<?php 
 get_header();
 wp_enqueue_script('nadlan-register', get_template_directory_uri() . '/js/nadlan-register.js', array('jquery'), false, true);   
  ?>
<?php while (have_posts()) : the_post(); ?>
    <?php $categories = get_the_category(); ?>
    <div class="heading">
        <div class="container">
            <h1><?php the_title() ?></h1>
        </div>
    </div>
    <div class="container">
       <?php the_content(); ?>
        <form id="nadlan-register-form">    
            <div class="register-step" id="step-1">
                <div class="row">              
                <div class="col-sm-3">
                    <label>תאריך כניסה</label><br>
                    <select id="register-start-day">
                        <option value="">בחר תאריך</option>
                        <option value="17">17/11/2014</option>
                        <option value="18">18/11/2014</option>
                        <option value="19">19/11/2014</option>
                        <option value="20">20/11/2014</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label>תאריך יציאה</label><br>
                    <select id="register-end-day">
                        <option value="">בחר תאריך</option>
                        <option value="17">17/11/2014</option>
                        <option value="18">18/11/2014</option>
                        <option value="19">19/11/2014</option>
                        <option value="20">20/11/2014</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label>סוג חדר</label><br>
                    <select id="register-room-type">
                        <option value="1">יחיד</option>
                        <option value="2">זוגי</option>
                        <option value="3">טריפל </option>
                        <option value="0">מבקר יום ללא לינה</option>
                    </select>
                </div>
            </div>
            </div>       
            <div class="row">
                <div class="col-sm-6">
                    <label>סה"כ לתשלום</label><br>
                    <input id="register-sum" type="text" value="0">
                </div>
            </div>
            <div class="register-step" id="step-2">
                <label>פרטי המבקרים</label><br>
                <div id="details1">
                    <label>מבקר ראשון:</label><br>
                    <div class="row">
                        <div class="col-sm-5">
                            <input id="Fname1" type="text" value="" placeholder="שם פרטי">
                        </div>
                        <div class="col-sm-5">
                            <input id="Lname1" type="text" value="" placeholder="שם משפחה">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <input id="title1" type="text" value="" placeholder='תואר: (עו" ד , רו"ח, ד"ר ...)'>
                        </div>
                        <div class="col-sm-5">
                            <input id="id1" type="text" value="" placeholder=" ת.ז">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <input id="companyName1" type="text" value="" placeholder="שם חברה/עסק מטעמו הגעת">
                        </div>
                        <div class="col-sm-5">
                            <input id="companyJob1" type="text" value="" placeholder="תפקיד">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <input id="Phone_Mobile1" type="text" value="" placeholder="טל' נייד לעדכונים במהלך הוועידה:">
                        </div>
                        <div class="col-sm-5">
                            <input id="Email1" type="text" value="" placeholder="אימייל">
                        </div>
                    </div>
                </div>
                <div id="details2">
                     <label>מבקר שני:</label><br>
                    <div class="row">
                        <div class="col-sm-5">
                            <input id="Fname2" type="text" value="" placeholder="שם פרטי">
                        </div>
                        <div class="col-sm-5">
                            <input id="Lname2" type="text" value="" placeholder="שם משפחה">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <input id="title2" type="text" value="" placeholder='תואר: (עו" ד , רו"ח, ד"ר ...)'>
                        </div>
                        <div class="col-sm-5">
                            <input id="id2" type="text" value="" placeholder=" ת.ז">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <input id="companyName2" type="text" value="" placeholder="שם חברה/עסק מטעמו הגעת">
                        </div>
                        <div class="col-sm-5">
                            <input id="companyJob2" type="text" value="" placeholder="תפקיד">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <input id="Phone_Mobile2" type="text" value="" placeholder="טל' נייד לעדכונים במהלך הוועידה:">
                        </div>
                        <div class="col-sm-5">
                            <input id="Email2" type="text" value="" placeholder="אימייל">
                        </div>
                    </div>
                </div>
                <div id="details3">
                     <label>מבקר שלישי:</label><br>
                    <div class="row">
                        <div class="col-sm-5">
                            <input id="Fname3" type="text" value="" placeholder="שם פרטי">
                        </div>
                        <div class="col-sm-5">
                            <input id="Lname3" type="text" value="" placeholder="שם משפחה">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <input id="title3" type="text" value="" placeholder='תואר: (עו" ד , רו"ח, ד"ר ...)'>
                        </div>
                        <div class="col-sm-5">
                            <input id="id3" type="text" value="" placeholder=" ת.ז">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <input id="companyName3" type="text" value="" placeholder="שם חברה/עסק מטעמו הגעת">
                        </div>
                        <div class="col-sm-5">
                            <input id="companyJob3" type="text" value="" placeholder="תפקיד">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <input id="Phone_Mobile3" type="text" value="" placeholder="טל' נייד לעדכונים במהלך הוועידה:">
                        </div>
                        <div class="col-sm-5">
                            <input id="Email3" type="text" value="" placeholder="אימייל">
                        </div>
                    </div>
                </div>
            </div>
            <div class="register-step" id="step-3">
                <label>פרטי תשלום</label><br>
                <div class="row">
                    <div class="col-sm-5">
                        <input id="invoiceN1" type="text" value="" placeholder="שם העסק להפקת חשבונית">
                    </div>
                    <div class="col-sm-5">
                        <input id="registrationNo" type="text" value="" placeholder=" מס עוסק מורשה / ח.פ">
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-5">
                    <input id="registrationAddress" type="text" value="" placeholder="כתובת למשלוח החשבונית">
                </div>
                <div class="col-sm-5">
                    <input id="registrationPhone" type="text" value="" placeholder="טל' לבירורים בענייני הפקת החשבונית">
                </div>
            </div>
                <div class="row">
                    <div class="col-sm-6 col-md-8">
                        <!--<button id="siugnUp" class="btn btn-secondary">הירשם</button>-->
                       <form></form>
                         <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="formPay">
<input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="business" value="treut@cambium.co.il" />
	<input type="hidden" name="item_name" value="nadlan city" />
	<input type="hidden" name="item_number" value="123" />
	<input type="hidden" name="currency_code" value="ILS" />
	<input type="hidden" name="amount" value="100" />
	<input type="hidden" name="return" value="http://nadlancity.cambium-team.com/?status=done" />
	<!--<input type="hidden" name="notify_url" value="<?php echo $conf->paypal->notifyUrl;?>" />-->
	<input type="hidden" name="cancel_return" value="http://nadlancity.cambium-team.com/?status=done" /> <br />
<!--<input type="image" name="submit" border="0"
src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
alt="PayPal - The safer, easier way to pay online">-->
</form>

                        <!--<?php echo do_shortcode('[qpp id="register"]'); ?>-->

                       

                    </div>
                </div>
            </div>            
           
            


        </form>

   

      </div>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>