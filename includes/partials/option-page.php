<form method="post" action="options.php">
  <?php settings_fields('bloat_buster'); ?>

  <h3>Enable</h3>
  
  <p>
    <input name="_bbuster_disable_emoji" id="_bbuster_disable_emoji" type="checkbox" value="1" <?php checked('1', get_option('_bbuster_disable_emoji')); ?> />
    <label for="_bbuster_disable_emoji" class="description">Remove Emoticons Scripts</label>
  </p>

  <p>
    <input name="_bbuster_disable_fse_global_styles" id="_bbuster_disable_fse_global_styles" type="checkbox" value="1" <?php checked('1', get_option('_bbuster_disable_fse_global_styles')); ?> />
    <label for="_bbuster_disable_fse_global_styles" class="description">Remove Full Site Editing Global Styles</label>
  </p>

  <p>
    <input name="_bbuster_remove_rsd_link" id="_bbuster_remove_rsd_link" type="checkbox" value="1" <?php checked('1', get_option('_bbuster_remove_rsd_link')); ?> />
    <label for="_bbuster_remove_rsd_link" class="description">Remove RSD Links</label>
  </p>

  <p>
    <input name="_bbuster_remove_shortlink" id="_bbuster_remove_shortlink" type="checkbox" value="1" <?php checked('1', get_option('_bbuster_remove_shortlink')); ?> />
    <label for="_bbuster_remove_shortlink" class="description">Remove Shortlink</label>
  </p>

  <p>
    <input name="_bbuster_disable_embed" id="_bbuster_disable_embed" type="checkbox" value="1" <?php checked('1', get_option('_bbuster_disable_embed')); ?> />
    <label for="_bbuster_disable_embed" class="description">Disable Embed</label>
  </p>

  <p>
    <input name="_bbuster_disable_xmlrpc" id="_bbuster_disable_xmlrpc" type="checkbox" value="1" <?php checked('1', get_option('_bbuster_disable_xmlrpc')); ?> />
    <label for="_bbuster_disable_xmlrpc" class="description">Disable XML-RPC</label>
  </p>

  <p>
    <input name="_bbuster_hide_wp_version" id="_bbuster_hide_wp_version" type="checkbox" value="1" <?php checked('1', get_option('_bbuster_hide_wp_version')); ?> />
    <label for="_bbuster_hide_wp_version" class="description">Hide WordPress Version</label>
  </p>

  <p>
    <input name="_bbuster_disable_heartbeat" id="_bbuster_disable_heartbeat" type="checkbox" value="1" <?php checked('1', get_option('_bbuster_disable_heartbeat')); ?> />
    <label for="_bbuster_disable_heartbeat" class="description">Disable Heartbeat</label>
  </p>

  <p>
    <input name="_bbuster_dequeue_dashicon" id="_bbuster_dequeue_dashicon" type="checkbox" value="1" <?php checked('1', get_option('_bbuster_dequeue_dashicon')); ?> />
    <label for="_bbuster_dequeue_dashicon" class="description">Disable Dashicons on the Front-end</label>
  </p>

  <p class="submit">
    <input type="submit" class="button-primary" value="Save Settings">
  </p>
</form>