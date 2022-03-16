<?php

function bbuster_options_page()
{
  global $bbuster_options;

  ob_start(); ?>
  <div class="wrap">
    <h2>Bloat Buster Plugin Options</h2>

    <form method="post" action="options.php">

      <?php settings_fields('bbuster_settings_group'); ?>

      <h4>Enable</h4>
      <p>
        <input name="bbuster_disable_auto_updates" id="bbbuster_disable_auto_updates" type="checkbox" value="1" <?php checked('1', $bbuster_options[0]); ?> />
        <label for="bbuster_disable_auto_updates" class="description">Disable the Theme and Plugin Auto Updates</label>
      </p>

      <p>
        <input name="bbuster_disable_emoji" id="bbuster_disable_emoji" type="checkbox" value="1" <?php checked('1', $bbuster_options[1]); ?> />
        <label for="bbuster_disable_emoji" class="description">Remove Emoji Scripts</label>
      </p>

      <p>
        <input name="bbuster_disable_fse_global_styles" id="bbuster_disable_fse_global_styles" type="checkbox" value="1" <?php checked('1', $bbuster_options[2]); ?> />
        <label for="bbuster_disable_fse_global_styles" class="description">Remove Full Site Editing Global Styles</label>
      </p>

      <p class="submit">
        <input type="submit" class="button-primary" value="Save Settings">
      </p>

    </form>
  </div>
<?php
  echo ob_get_clean();
}

function bbuster_add_options_link()
{
  add_options_page('Bloat Buster Options', 'Bloat Buster', 'manage_options', 'bbuster-options', 'bbuster_options_page');
}

add_action('admin_menu', 'bbuster_add_options_link');

function bbuster_register_settings()
{
  register_setting('bbuster_settings_group', 'bbuster_disable_auto_updates');
  register_setting('bbuster_settings_group', 'bbuster_disable_emoji');
  register_setting('bbuster_settings_group', 'bbuster_disable_fse_global_styles');
}

add_action('admin_init', 'bbuster_register_settings');
