<div class="wrap">
  <h2>Bloat Buster Plugin Options</h2>

  <form method="post" action="options.php">

    <?php settings_fields('bloat_buster'); ?>

    <h4>Enable</h4>
    
    <p>
      <input name="_bbuster_disable_emoji" id="_bbuster_disable_emoji" type="checkbox" value="1" <?php checked('1', get_option('_bbuster_disable_emoji')); ?> />
      <label for="_bbuster_disable_emoji" class="description">Remove Emoji Scripts</label>
    </p>

    <p>
      <input name="_bbuster_disable_fse_global_styles" id="_bbuster_disable_fse_global_styles" type="checkbox" value="1" <?php checked('1', get_option('_bbuster_disable_fse_global_styles')); ?> />
      <label for="_bbuster_disable_fse_global_styles" class="description">Remove Full Site Editing Global Styles</label>
    </p>

    <p class="submit">
      <input type="submit" class="button-primary" value="Save Settings">
    </p>

  </form>
</div>