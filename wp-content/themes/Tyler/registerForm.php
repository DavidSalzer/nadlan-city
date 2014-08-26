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
      
        <form id="nadlan-register-form">    
            <div class="register-step" id="step-1">
                 <?php the_content(); ?>
                <div class="row">              
                    <div class="col-sm-11">
                        <label>תאריך הגעה</label><br>
                        <select id="register-start-day">
                            <option value="">בחר תאריך</option>
                            <option value="1">ב' - 17/11/2014</option>
                            <option value="2">ג' - 18/11/2014</option>
                            <option value="3">ד' - 19/11/2014</option>
                            <option value="4">ה' - 20/11/2014</option>
                        </select>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-sm-11">
                        <label>תאריך עזיבה</label><br>
                        <select id="register-end-day">
                            <option value="">בחר תאריך</option>
                            <option value="1">ב' - 17/11/2014</option>
                            <option value="2">ג' - 18/11/2014</option>
                            <option value="3">ד' - 19/11/2014</option>
                            <option value="4">ה' - 20/11/2014</option>
                        </select>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-sm-11">
                    <label>סוג חדר</label><span class="remark">  (הודעה: לתשומת ליבך חדרי טריפל מכילים מטה זוגית אחת וספה נפתחת)</span><br>
                    <select id="register-room-type">
                        <option value="1">יחיד</option>
                        <option value="2">זוגי</option>
                        <option value="3">טריפל </option>
                        <option value="0">מבקר יום ללא לינה</option>
                    </select>
                </div>
                </div>
                <div class="row"> 
                    <div class="col-sm-11">
                        <label>סוג מיטה</label><span class="remark">  (* איננו מתחייבים כי נוכל לספק את בקשתך אך נשתדל לפעול עלפיה, בחדרים בהם אין מיטות נפרדות תהיה לרוב ספה הנפתחת למיטה)</span><br>
                        <select id="register-bed-type">
                            <option value="1">זוגית</option>
                            <option value="2">נפרדות</option>                        
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-11">
                        <button id="next-to-step-2" class="btn btn-secondary">הבא</button>
                    </div>
                </div>
           </div>        
           
            <div class="register-step" id="step-2">
                <label>פרטי המבקרים</label><br>
                <div id="details1">
                    <label>מבקר ראשון:</label><br>
                    <div class="row">
                        <div class="col-sm-6">
                            <input id="Fname1" type="text" value="" placeholder="שם פרטי">
                        </div>
                        <div class="col-sm-6">
                            <input id="Lname1" type="text" value="" placeholder="שם משפחה">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input id="title1" type="text" value="" placeholder='תואר: (עו" ד , רו"ח, ד"ר ...)'>
                        </div>
                        <div class="col-sm-6">
                            <input id="id1" type="text" value="" placeholder=" ת.ז">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input id="companyName1" type="text" value="" placeholder="שם חברה/עסק מטעמו הגעת">
                        </div>
                        <div class="col-sm-6">
                            <input id="companyJob1" type="text" value="" placeholder="תפקיד">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input id="Phone_Mobile1" type="text" value="" placeholder="טל' נייד לעדכונים במהלך הוועידה:">
                        </div>
                        <div class="col-sm-6">
                            <input id="Email1" type="text" value="" placeholder="אימייל">
                        </div>
                    </div>
                </div>
                <div id="details2">
                     <label>מבקר שני:</label><br>
                    <div class="row">
                        <div class="col-sm-6">
                            <input id="Fname2" type="text" value="" placeholder="שם פרטי">
                        </div>
                        <div class="col-sm-6">
                            <input id="Lname2" type="text" value="" placeholder="שם משפחה">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input id="title2" type="text" value="" placeholder='תואר: (עו" ד , רו"ח, ד"ר ...)'>
                        </div>
                        <div class="col-sm-6">
                            <input id="id2" type="text" value="" placeholder=" ת.ז">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input id="companyName2" type="text" value="" placeholder="שם חברה/עסק מטעמו הגעת">
                        </div>
                        <div class="col-sm-6">
                            <input id="companyJob2" type="text" value="" placeholder="תפקיד">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input id="Phone_Mobile2" type="text" value="" placeholder="טל' נייד לעדכונים במהלך הוועידה:">
                        </div>
                        <div class="col-sm-6">
                            <input id="Email2" type="text" value="" placeholder="אימייל">
                        </div>
                    </div>
                </div>
                <div id="details3">
                     <label>מבקר שלישי:</label><br>
                    <div class="row">
                        <div class="col-sm-6">
                            <input id="Fname3" type="text" value="" placeholder="שם פרטי">
                        </div>
                        <div class="col-sm-6">
                            <input id="Lname3" type="text" value="" placeholder="שם משפחה">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input id="title3" type="text" value="" placeholder='תואר: (עו" ד , רו"ח, ד"ר ...)'>
                        </div>
                        <div class="col-sm-6">
                            <input id="id3" type="text" value="" placeholder=" ת.ז">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input id="companyName3" type="text" value="" placeholder="שם חברה/עסק מטעמו הגעת">
                        </div>
                        <div class="col-sm-6">
                            <input id="companyJob3" type="text" value="" placeholder="תפקיד">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input id="Phone_Mobile3" type="text" value="" placeholder="טל' נייד לעדכונים במהלך הוועידה:">
                        </div>
                        <div class="col-sm-6">
                            <input id="Email3" type="text" value="" placeholder="אימייל">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-11">
                        <button id="next-to-step-3" class="btn btn-secondary">הבא</button>
                    </div>
                </div>
            </div>

            <div class="register-step" id="step-3">
                <label>פרטי תשלום</label><br>
                <div class="row">
                    <div class="col-sm-6">
                        <input id="invoiceN1" type="text" value="" placeholder="שם העסק להפקת חשבונית">
                    </div>
                    <div class="col-sm-6">
                        <input id="registrationNo" type="text" value="" placeholder=" מס עוסק מורשה / ח.פ">
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-6">
                    <input id="registrationAddress" type="text" value="" placeholder="כתובת למשלוח החשבונית">
                </div>
                <div class="col-sm-6">
                    <input id="registrationPhone" type="text" value="" placeholder="טל' לבירורים בענייני הפקת החשבונית">
                </div>
            </div>
                <div id="register-paypment-area">
                    <div class="row">
                        <div class="col-sm-11">
                            <label>סה"כ לתשלום</label><br>
                            <input id="register-sum" type="text" value="0" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-11">
                            <button id="siugnUp" class="btn btn-secondary">הירשם</button>
                            <form></form>
                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="formPay">
                                <input type="hidden" name="cmd" value="_xclick" />
                                <input type="hidden" name="business" value=" treut-facilitator@cambium.co.il" />
	                            <input type="hidden" name="charset" value="utf-8">
                                <input type="hidden" name="item_name" value="עיר הנדלן" />
	                            <input type="hidden" name="item_number" value="123" />
	                            <input type="hidden" name="currency_code" value="ILS" />
	                            <input type="hidden" name="amount" value="100" />
	                            <input type="hidden" name="return" value="http://nadlancity.cambium-team.com/?page_id=48/#done" />
	                            <input type="hidden" name="notify_url" value="http://nadlancity.cambium-team.com/?page_id=310" />
	                            <input type="hidden" name="cancel_return" value="http://nadlancity.cambium-team.com/?page_id=48/#cancel" /> <br />
    <!--<input type="image" name="submit" border="0"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">-->
                            </form>

                            <!--<?php echo do_shortcode('[qpp id="register"]'); ?>-->

                       

                        </div>
                    </div>
                </div>
            </div>            
           
            


        </form>

   

      </div>
<?php endwhile; // end of the loop. ?>
<?php get_footer();?>