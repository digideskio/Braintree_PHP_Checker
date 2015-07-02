<?php
error_reporting(0);

function error($msg) { return '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> ' . $msg . '</div>';}
function success($msg) { return '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ' . $msg . '</div>';}

$html = '';

if(version_compare(PHP_VERSION, '5.4.0', '<')) {
  $html .= error('PHP Version +5.4.0 Required');
}else{
  $html .= success('PHP Version +5.4.0');
}

$requiredExtensions = array('xmlwriter', 'openssl', 'dom', 'hash', 'curl');
foreach ($requiredExtensions AS $ext) {
  if (!extension_loaded($ext)) {
    $html .= error('Extension ' . $ext . ' Required');
  }else{
    $html .= success('Extension ' . $ext . ' Installed');
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Braintree Requirements</title>
  <meta name="description" content="Check Braintree Requirements">
  <meta name="author" content="Skinod">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style type="text/css">
    html {
      position: relative;
      min-height: 100%;
    }
    .container {
      width: auto;
      max-width: 680px;
      padding: 0 15px;
    }
    .container .text-muted {
      margin: 20px 0;
    }
  </style>
</head>
<body>
  <div class="container">
      <div class="page-header">
        <h1>Braintree Requirements</h1>
      </div>
      <?php echo $html; ?>
      <p>© <?php echo date('Y'); ?> By <a href="http://skinod.com">Skinod</a></p>
    </div>
</body>
</html>
