<?php
    /*
          Template Name: Embedded Register Page
      */
    
    
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!--[if IE]>
        <meta name="X-UA-Compatible" content="IE=edge" >
        <![endif]-->
        <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ie8.css" />
        <![endif]-->
        <!--[if lte IE 7]>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap-ie7.css" />
        <style type="text/css">
            .col-xs-1,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9,.col-xs-10,.col-xs-11,.col-xs-12,.col-sm-1,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-10,.col-sm-11,.col-sm-12,.col-md-1,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-10,.col-md-11,.col-md-12,.input-group,.row,.content{
                box-sizing:border-box;behavior:url(<?php echo get_template_directory_uri(); ?>/js/boxsizing.htc)
            }
        </style>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ie7.css" />
        <![endif]-->
        <!-- HTML5 Shim, Respond.js and PIE.htc IE8 support of HTML5 elements, media queries and CSS3 -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <style type="text/css">
            .speakers .speaker .speaker-inner, .speakers .photo img, .connect, .sessions .session .speaker img,
            .connect .links a:hover:before, .sessions .session .session-inner, .location .explore, .location .map,
            .articles article .image, .facebook .fb-event, .facebook .fb-view, .twitter .view, .twitter .tweet,
            .sidebar .widget_latest_comments li a,.sidebar h2, .articles article .image, .comments-area h2,
            .commentlist .comment .comment-content,.commentlist .comment .comment-content:after,
            .timecounter, input[type=text], textarea, .landing .box, h1 img.img-circle {
                behavior: url("<?php echo get_template_directory_uri(); ?>/js/pie/PIE.htc");
            }
        </style>
        <![endif]-->
        <?php wp_head(); 
            wp_enqueue_script('nadlan-register', get_template_directory_uri() . '/js/nadlan-register.js', array('jquery'), false, true);        
        ?>

    </head>
    <body <?php body_class(); ?>>

        

        <form id="nadlan-register-form" class="container">
            <div class="row">
                <label> [במידה והנך בוחר בחדר זוגי/טריפל יהיה עלייך לשלם עבור כל החדר [ספירה לפי לילות] </label><br>
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
            <div class="row">
                <div class="col-sm-6">
                    <label>סה"כ לתשלום</label><br>
                    <input id="register-sum" type="text" value="0">
                </div>
            </div>

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
                    <input id="registrationPhone" type="text" value="" placeholder="טלפון לבירורים בענייני התשלום והפקת החשבונית">
                </div>
            </div>


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
                        <input id="companyName1" type="text" value="" placeholder="שם חברה / עסק מטעמו המשתתף מגיע">
                    </div>
                    <div class="col-sm-5">
                        <input id="companyJob1" type="text" value="" placeholder="תפקיד">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <input id="Phone_Mobile1" type="text" value="" placeholder="טל' נייד לקבלת עדכונים במהלך הוועידה:">
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
                        <input id="companyName2" type="text" value="" placeholder="שם חברה / עסק מטעמו המשתתף מגיע">
                    </div>
                    <div class="col-sm-5">
                        <input id="companyJob2" type="text" value="" placeholder="תפקיד">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <input id="Phone_Mobile2" type="text" value="" placeholder="טל' נייד לקבלת עדכונים במהלך הוועידה:">
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
                        <input id="companyName3" type="text" value="" placeholder="שם חברה / עסק מטעמו המשתתף מגיע">
                    </div>
                    <div class="col-sm-5">
                        <input id="companyJob3" type="text" value="" placeholder="תפקיד">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <input id="Phone_Mobile3" type="text" value="" placeholder="טל' נייד לקבלת עדכונים במהלך הוועידה:">
                    </div>
                    <div class="col-sm-5">
                        <input id="Email3" type="text" value="" placeholder="אימייל">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-8">
                <button id="siugnUp" class="btn btn-secondary">הירשם</button>
                    </div>
            </div>


        </form>

   

        <?php
             echo do_shortcode('[qpp form="register" id="ss" amount="0"  labels="off"]');
             wp_footer(); ?>

    </body>
</html>
