<div class="wrap">
  <h2>Bloat Buster Options</h2>
  <?php $active_tab = isset($_GET["tab"])
      ? $_GET["tab"]
      : "settings"; ?>
  <h2 class="nav-tab-wrapper">
  <a href="?page=bbuster-options&tab=settings" class="nav-tab <?php echo $active_tab ==
    "settings"
        ? "nav-tab-active"
        : ""; ?>">General</a>
    <a href="?page=bbuster-options&tab=export" class="nav-tab <?php echo $active_tab ==
    "export"
        ? "nav-tab-active"
        : ""; ?>">Export / Import Settings</a>
  </h2>

  <?php if ($active_tab == "settings") {
    require_once BBUSTER_PATH . 'includes/partials/option-page.php';
  } ?>

  <?php if ($active_tab == "export") {
    ?>
    <h3>Export / Import Settings</h3>
    <?php
    
    require_once BBUSTER_PATH . 'includes/partials/export-form.php';
    echo '<hr>';
    require_once BBUSTER_PATH . 'includes/partials/import-form.php';
  } ?>
</div>