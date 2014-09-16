<?php
$ef_options = EF_Event_Options::get_theme_options();
?>

<footer>
    <div class="container">
        <div class="row row-sm">
            <a id="cambium-logo" href="http://cambium.co.il/" target="_blank"></a>
            <?php dynamic_sidebar('footer'); ?>
        </div>
    </div>
    <div class="credits">
        <?php 
        if ( isset( $ef_options['ef_footer_content'] ) ) {
        	echo stripslashes( $ef_options['ef_footer_content'] ); 
        }
        ?>
        <div class="footer-tyler-event">
        	Powered by <a href="http://eventmanagerblog.com/event-wordpress-theme-tyler">Tyler WordPress Theme</a>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

<!-- SCROLL UP BTN -->
<a href="#" id="scroll-up"><?php _e('UP', 'tyler'); ?></a>

<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>

<!-- backdrop -->
<div id="backdrop"></div>

<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 988860976;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/988860976/?value=0&amp;guid=ON&amp;script=0"/>
    </div>
</noscript>

</body>
</html>
