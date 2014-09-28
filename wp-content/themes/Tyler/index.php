<?php
get_header();

// Get Theme Options
//$ef_options = get_option( 'eventframework' );
$ef_options = EF_Event_Options::get_theme_options();
?>
<!-- LANDING - BIG PICTURE -->
<div class="container widget">
    <div class="landing">
        <div class="bg"<?php if ( isset( $ef_options['ef_hero'] ) ) { ?> style="background-image: url('<?php echo $ef_options['ef_hero']; ?>')"<?php } ?>></div>
        <h1 style="position: relative;">
            <span class="first-title" <?php if ( isset( $ef_options['ef_title_color']) ) echo 'style="color:' . $ef_options['ef_title_color'] . '"'; ?>><?php if ( isset( $ef_options['ef_herotitle'] ) ) { echo stripslashes( $ef_options['ef_herotitle'] ); } ?>
                
            </span>    
            <p class="lead text-fit second-title" <?php if (!empty($ef_options['ef_subtitle_color'])) echo 'style="color:' . $ef_options['ef_subtitle_color'] . '"'; ?>>
                <?php if ( isset( $ef_options['ef_herotagline'] ) ) { echo esc_attr( stripslashes( $ef_options['ef_herotagline'] ) ); } ?>
                </p>                
                <span class="text-img"></span>        
                <span class="palne-nadlan"></span>
        </h1>        
        
        <?php 
        $widget_ef_registration = get_option('widget_ef_registration');
        
        if (is_active_widget(false, false, 'ef_registration') && is_array( $widget_ef_registration ) ) {
			$reg_widget = reset( $widget_ef_registration );
			if( $reg_widget['registrationshowcalltoaction'] == 1 ) { ?>
            	<a href="<?php echo home_url( '/' ); ?>?page_id=48" class="btn btn-lg btn-secondary sign-up-btn">הרשמה</a>
        	<?php 
			}
		} ?>
                        
        <div class="row">
            <div class="col-md-6" id="event-calendar">
                <div class="box">
                    <!--<i class="icon-calendar"></i>-->
                    <!--<div class="icon-calendar"></div>-->
                    <div id="send-to-calendar"></div>
                    <div class="box-inner">
                        <div>
                            <span class="sub"><?php _e('WHEN', 'tyler') ?></span>
                            <span class="title"><?php if ( isset( $ef_options['ef_eventdate'] ) ) { echo stripslashes( $ef_options['ef_eventdate'] ); } ?></span>
                            <span class="desc"><?php if ( isset( $ef_options['ef_eventstartingtime'] ) ) { echo stripslashes( $ef_options['ef_eventstartingtime'] ); } ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <i class="icon-map-marker"></i>
                    <div class="box-inner">
                        <div>
                            <span class="sub"><?php _e('WHERE', 'tyler'); ?></span>
                            <span class="title"><?php if ( isset( $ef_options['ef_eventcitycountry'] ) ) { echo stripslashes( $ef_options['ef_eventcitycountry'] ); } ?></span>
                            <span class="desc"><?php if ( isset( $ef_options['ef_eventlocation'] ) ) { echo stripslashes( $ef_options['ef_eventlocation'] ); } ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (is_active_sidebar('homepage'))
    dynamic_sidebar('homepage');
?>

<?php get_footer(); ?>
