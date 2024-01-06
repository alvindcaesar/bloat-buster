<h4>Import</h4>
<form method="post" enctype="multipart/form-data" action="<?php echo admin_url( 'admin-post.php' ); ?>" id="importForm">
  <input type="hidden" name="action" value="import_settings">
  <input type="file" name="json_file" id="json_file" onchange="checkFile()">
  <?php wp_nonce_field( 'import_settings' ); ?>
  <button type="submit" class="button-secondary" id="submitButton" disabled>Import Settings</button>
</form>

<p class="description">To import your Bloat Buster settings from a JSON file, follow these steps:</p>
<ol>
  <li>Click on the "Browse" button.</li>
  <li>Select the JSON file containing your Bloat Buster settings that you want to import.</li>
  <li>Click on the "Import Settings" button to initiate the import process.</li>
  <li>Once the import is complete, your Bloat Buster settings will be automatically updated.</li>
</ol>
<p>Please note that importing settings from a JSON file will overwrite your current Bloat Buster settings, so make sure to back up your current settings before importing.</p>

<script>
  function checkFile() {
    var fileInput = document.getElementById('json_file');
    var submitButton = document.getElementById('submitButton');
    submitButton.disabled = !fileInput.files.length;
  }
</script>