<h4>Export</h4>
<form action="<?php echo admin_url('admin-post.php')?>" method="post">
  <input type="hidden" name="action" value="export_settings">
  <input type="hidden" name="data" value="settingsid">
  <input type="submit" class ="button-secondary" value="Export Settings">
</form>

<p class="description">Export your current settings as a JSON file that can be shared or used to restore your Bloat Buster settings on another site.</p>