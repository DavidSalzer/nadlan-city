<?php
    // Exit if accessed directly
    if ( !defined( 'ABSPATH' ) ) exit;
    /**
     * Register the Event Description Widget
     * 
     * @package Event Framework
     * @since 1.0.0
     */
    /**
     * Ef_Event_Description_Widget Widget Class.
     * 
     * 
     * @package Event Description
     * @since 1.0.0
     */
    class Ef_Event_Description_Widget extends WP_Widget {
        /**
         * Contact Widget setup.
         * 
         * @package Event Framework
         * @since 1.0.0
         */
        function Ef_Event_Description_Widget() {
    
            $widget_name = EF_Framework_Helper::get_widget_name();
    
            /* Widget settings. */
            $widget_ops = array( 'classname' => 'ef_event_description', 'description' => __( 'Shows the event description', 'dxef' ) );
    
            /* Create the widget. */
            $this->WP_Widget( 'ef_event_description', $widget_name . __( ' Event Description', 'dxef' ), $widget_ops );
    
        }
    
        /**
         * Output of Widget Content
         * 
         * Handle to outputs the
         * content of the widget
         * 
         * @package Event Framework
         * @since 1.0.0
         */
        function widget( $args, $instance ) {
    
            $eventdescriptiontitle		= isset( $instance['eventdescriptiontitle'] ) ? $instance['eventdescriptiontitle'] : '';
            $eventdescriptionsubtitle	= isset( $instance['eventdescriptionsubtitle'] ) ? $instance['eventdescriptionsubtitle'] : '';
            $eventdescriptioncontent	= isset( $instance['eventdescriptioncontent'] ) ? $instance['eventdescriptioncontent'] : '';
    
            echo stripslashes( $args['before_widget'] );
?>

<!-- TEXT -->
<div id="tile_description" class="container widget">
    <h2><?php echo stripslashes($eventdescriptiontitle); ?></h2>
    <h3><?php echo stripslashes($eventdescriptionsubtitle); ?></h3>
    <p>
        <div id="nadlan-description">
            <div class="speakers">
                <div class="speaker  featured">
                    <a href="" class="speaker-inner">
                        <span class="photo">
                            <img src="<?php echo get_template_directory_uri() . '/images/mic.jpg'; ?>" class="attachment-tyler-speaker wp-post-image" alt="ועידות" title="ועידות">
                        </span>
                        <span class="name"><span class="text-fit"><span class="text-fit-inner" style="display:block">7 ועידות תוכן מקצועיות<br>בראשות 15 יושבי ראש</span></span></span>

                    </a>
                </div>
                <div class="speaker  featured">
                    <a href="" class="speaker-inner">
                        <span class="photo">
                            <img src="<?php echo get_template_directory_uri() . '/images/tie.jpg'; ?>" class="attachment-tyler-speaker wp-post-image" alt="מרצים" title="מרצים">
                        </span>
                        <span class="name"><span class="text-fit"><span class="text-fit-inner" style="display:block">250 מרצים מומחים מהארץ ומחו"ל!</span></span></span>

                    </a>
                </div>
                <div class="speaker  featured">
                    <a href="" class="speaker-inner">
                        <span class="photo">
                            <img src="<?php echo get_template_directory_uri() . '/images/men.jpg'; ?>" class="attachment-tyler-speaker wp-post-image" alt="משתתפים" title="משתתפים">
                        </span>
                        <span class="name"><span class="text-fit"><span class="text-fit-inner" style="display:block">בהשתתפות 2000 בכירים מעולם הנדל"ן</span></span></span>

                    </a>
                </div>
                <div class="speaker  featured">
                    <a href="" class="speaker-inner">
                        <span class="photo">
                            <img src="<?php echo get_template_directory_uri() . '/images/net.jpg'; ?>" class="attachment-tyler-speaker wp-post-image" alt="בילינג" title="בילינג">
                        </span>
                        <span class="name" style="letter-spacing: -0.1px;"><span><span style="display:block">מינגלינג ונטוורקינג עם אלפי משתתפים מתחומים הנדל"ן השונים</span></span></span>

                    </a>
                </div>
                <div class="speaker  featured">
                    <a href="" class="speaker-inner">
                        <span class="photo">
                            <img src="<?php echo get_template_directory_uri() . '/images/sun.jpg'; ?>" class="attachment-tyler-speaker wp-post-image" alt="פנאי" title="פנאי">
                        </span>
                        <span class="name"><span class="text-fit"><span class="text-fit-inner" style="display:block">אירוח, בידור ופנאי בפורמט "הכל כלול"</span></span></span>

                    </a>
                </div>

            </div>

            <h2>הועידות...</h2>
            <div class="sessions condensed">

                <div class="session">
                    <a href="<?php echo home_url( '/' ); ?>?page_id=124" class="session-inner">
                        <span class="title"><span class="text-fit"><span class="text-fit-inner" style="display:block">הוועידה השנתית לבניה לגובה</span></span></span>
                        <span class="desc">יושבי הראש של הועידה</span>
                        <span class="speakers-thumbs">
                            <span class="speaker  featured">
                                <img width="319" height="319" src="http://nadlancity2014.co.il/wp-content/uploads/2014/08/-----------------2-212x212.jpg" class="attachment-post-thumbnail wp-post-image" alt="ישראל דוד" title="ישראל דוד">
                            </span>
                            <span class="speaker  featured">
                                <img width="319" height="319" src="http://nadlancity2014.co.il/wp-content/uploads/2014/08/--------------------1-212x212.jpg" class="attachment-post-thumbnail wp-post-image" alt="יוסי סיוון" title="יוסי סיוון">
                            </span>
                            <span class="speaker  featured">
                                <img width="319" height="319" src="http://nadlancity2014.co.il/wp-content/uploads/2014/08/----------------1-212x212.jpg" class="attachment-post-thumbnail wp-post-image" alt="רחל פללר" title="רחל פללר">
                            </span>
                        </span>
                        <span class="more">
                                      לפרטים נוספים <i class="icon-angle-right"></i>
                        </span>
                    </a>
                </div>
                <div class="session">
                    <a href="<?php echo home_url( '/' ); ?>?page_id=169" class="session-inner">
                        <span class="title"><span class="text-fit"><span class="text-fit-inner" style="display:block">הוועידה השנתית למגורים</span></span></span>
                        <span class="desc">יושבי הראש של הועידה</span>
                        <span class="speakers-thumbs">
                            <span class="speaker  featured">
                                <img width="319" height="319" src="http://nadlancity2014.co.il/wp-content/uploads/2014/08/-------------------1-212x212.jpg" class="attachment-post-thumbnail wp-post-image" alt="שמשון הראל" title="שמשון הראל">
                            </span>
                            <span class="speaker  featured">
                                <img width="319" height="319" src="http://nadlancity2014.co.il/wp-content/uploads/2014/08/---------------2-212x212.jpg" class="attachment-post-thumbnail wp-post-image" alt="דרור נגל" title="דרור נגל">
                            </span>
                        </span>
                        <span class="more">
                                      לפרטים נוספים <i class="icon-angle-right"></i>
                        </span>
                    </a>
                </div>
                <div class="session">
                    <a href="<?php echo home_url( '/' ); ?>?page_id=172" class="session-inner">
                        <span class="title"><span class="text-fit"><span class="text-fit-inner" style="display:block">הוועידה השנתית למשרדים ופארקי תעסוקה</span></span></span>
                        <span class="desc">יושבי הראש של הועידה</span>
                        <span class="speakers-thumbs">
                            <span class="speaker  featured">
                                <img width="319" height="319" src="http://nadlancity2014.co.il/wp-content/uploads/2014/08/IMG-5145-212x212.jpg" class="attachment-post-thumbnail wp-post-image" alt="אבי יעקובוביץ" title="אבי יעקובוביץ">
                            </span>
                            <span class="speaker  featured">
                                <img width="319" height="319" src="http://nadlancity2014.co.il/wp-content/uploads/2014/08/------------------212x212.jpg" class="attachment-post-thumbnail wp-post-image" alt="ג'קי מוקמל" title="ג'קי מוקמל">
                            </span>
                        </span>
                        <span class="more">
                                      לפרטים נוספים <i class="icon-angle-right"></i>
                        </span>
                    </a>
                </div>
                <div class="session">
                    <a href="<?php echo home_url( '/' ); ?>?page_id=171" class="session-inner">
                        <span class="title"><span class="text-fit"><span class="text-fit-inner" style="display:block">הוועידה השנתית לתכנון ופיתוח מוניציפלי</span></span></span>
                        <span class="desc">יושבי הראש של הועידה</span>
                        <span class="speakers-thumbs">
                            <span class="speaker  featured">
                                <img width="319" height="319" src="http://nadlancity2014.co.il/wp-content/uploads/2014/09/----------------1-212x212.jpg" class="attachment-post-thumbnail wp-post-image" alt="יונה יהב" title="יונה יהב">
                            </span>
                            <span class="speaker  featured">
                                <img width="319" height="319" src="http://nadlancity2014.co.il/wp-content/uploads/2014/08/-----------------1-212x212.jpg" class="attachment-post-thumbnail wp-post-image" alt="דניאלה פז" title="דניאלה פז">
                            </span>
                        </span>
                        <span class="more">
                                      לפרטים נוספים <i class="icon-angle-right"></i>
                        </span>
                    </a>
                </div>
                <div class="session">
                    <a href="<?php echo home_url( '/' ); ?>?page_id=167" class="session-inner">
                        <span class="title"><span class="text-fit"><span class="text-fit-inner" style="display:block">הוועידה השנתית להתחדשות עירונית</span></span></span>
                        <span class="desc">יושבי הראש של הועידה</span>
                        <span class="speakers-thumbs">
                            <span class="speaker  featured">
                                <img width="319" height="319" src="http://nadlancity2014.co.il/wp-content/uploads/2014/08/--------------------212x212.jpg" class="attachment-post-thumbnail wp-post-image" alt="אילן שרקון" title="אילן שרקון">
                            </span>
                            <span class="speaker  featured">
                                <img width="319" height="319" src="http://nadlancity2014.co.il/wp-content/uploads/2014/08/---------------5-212x212.jpg" class="attachment-post-thumbnail wp-post-image" alt="זיו כספי" title="זיו כספי">
                            </span>
                        </span>
                        <span class="more">
                                      לפרטים נוספים <i class="icon-angle-right"></i>
                        </span>
                    </a>
                </div>

                <div class="session">
                    <a href="<?php echo home_url( '/' ); ?>?page_id=165" class="session-inner">
                        <span class="title"><span class="text-fit"><span class="text-fit-inner" style="display:block">הוועידה השנתית לשיווק נדל"ן ומשכנתאות</span></span></span>
                        <span class="desc">יושבי הראש של הועידה</span>
                        <span class="speakers-thumbs">
                            <span class="speaker  featured">
                                <img width="319" height="319" src="http://nadlancity2014.co.il/wp-content/uploads/2014/08/---------------3-212x212.jpg" class="attachment-post-thumbnail wp-post-image" alt="רוני כהן" title="רוני כהן">
                            </span>
                            <span class="speaker  featured">
                                <img width="319" height="319" src="http://nadlancity2014.co.il/wp-content/uploads/2014/08/-----------------3-212x212.jpg" class="attachment-post-thumbnail wp-post-image" alt="אורנה פרי" title="אורנה פרי">
                            </span>
                        </span>
                        <span class="more">
                                      לפרטים נוספים <i class="icon-angle-right"></i>
                        </span>
                    </a>
                </div>
                <div class="session">
                    <a href="<?php echo home_url( '/' ); ?>?page_id=121" class="session-inner">
                        <span class="title"><span class="text-fit"><span class="text-fit-inner" style="display:block">הוועידה השנתית לאדריכלות ועיצוב פנים</span></span></span>
                        <span class="desc">יושבי הראש של הועידה</span>
                        <span class="speakers-thumbs">
                            <span class="speaker  featured">
                                <img width="319" height="319" src="http://nadlancity2014.co.il/wp-content/uploads/2014/08/--------------------------212x212.jpg" class="attachment-post-thumbnail wp-post-image" alt="אירית אקסלרוד" title="אירית אקסלרוד">
                            </span>
                            <span class="speaker  featured">
                                <img width="319" height="319" src="http://nadlancity2014.co.il/wp-content/uploads/2014/08/----------------------212x212.jpg" class="attachment-post-thumbnail wp-post-image" alt="יונתן מונג'ק" title="יונתן מונג'ק">
                            </span>
                        </span>
                        <span class="more" data-track="8">
                                      לפרטים נוספים <i class="icon-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>


        </div>

    </p>
</div><?php
    
        echo stripslashes($args['after_widget']);
    
    }
    
    /**
     * Update Widget Setting
     * 
     * Handle to updates the widget control options
     * for the particular instance of the widget
     * 
     * @package Event Framework
     * @since 1.0.0
     */
    function update( $new_instance, $old_instance ) {
    
        $instance = $old_instance;
    
        /* Set the instance to the new instance. */
        $instance = $new_instance;
    
        /* Input fields */
        $instance['eventdescriptiontitle']		= strip_tags( $new_instance['eventdescriptiontitle'] );
        $instance['eventdescriptionsubtitle']	= strip_tags( $new_instance['eventdescriptionsubtitle'] );
        $instance['eventdescriptioncontent']	= $new_instance['eventdescriptioncontent'];
    
        return $instance;
    
    }
    
    /**
     * Display Widget Form
     * 
     * Displays the widget
     * form in the admin panel
     * 
     * @package Event Framework
     * @since 1.0.0
     */
    function form( $instance ) {
    
        $eventdescriptiontitle		= isset( $instance['eventdescriptiontitle'] ) ? $instance['eventdescriptiontitle'] : '';
        $eventdescriptionsubtitle	= isset( $instance['eventdescriptionsubtitle'] ) ? $instance['eventdescriptionsubtitle'] : '';
        $eventdescriptioncontent	= isset( $instance['eventdescriptioncontent'] ) ? $instance['eventdescriptioncontent'] : '';
?>

<em><?php _e('Title:', 'dxef'); ?></em><br />
<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'eventdescriptiontitle' ); ?>" value="<?php echo stripslashes($eventdescriptiontitle); ?>" />
<br /><br />
<em><?php _e('Subtitle:', 'dxef'); ?></em><br />
<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'eventdescriptionsubtitle' ); ?>" value="<?php echo stripslashes($eventdescriptionsubtitle); ?>" />
<br /><br />
<em><?php _e('Content:', 'dxef'); ?></em><br />
<textarea id="eventdescriptioncontent" name="<?php echo $this->get_field_name( 'eventdescriptioncontent' ); ?>" class="widefat" rows="10"><?php echo esc_html($eventdescriptioncontent);?></textarea>
<br /><br />
<input type="hidden" name="submitted" value="1" /><?php
    
        }
    }
    //Register Widget
    register_widget( 'Ef_Event_Description_Widget' );
