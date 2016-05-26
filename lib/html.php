<?php

/**
 * Output a Google Analytics tag.
 * Gets $tacking_id from $options.
 */
function analytics_tag() {
    $tracking_id = get_option('ga_settings_tracking');
    $code = "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '%s', 'auto');
  ga('send', 'pageview');

</script>";
    echo sprintf($code, $tracking_id);
    return true;
}