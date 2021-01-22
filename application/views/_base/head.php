<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $page_title;?></title>
    <meta name="theme-color" content="#203750" />

<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicons -->
<link rel="shortcut icon" href="../assets/dist/images/logo.png"/>
<link rel="apple-touch-icon" href="../assets/dist/images/logo.ico"/>

<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800,300" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<base href="<?php echo $base_url; ?>" />
<?php
	foreach ($meta_data as $name => $content)if (!empty($content))echo "<meta name='$name' content='$content'>".PHP_EOL;
	foreach ($stylesheets as $media => $files){
		foreach ($files as $file){
			$url = starts_with($file, 'http') ? $file : base_url($file);
			echo "<link href='$url' rel='stylesheet' media='$media'>".PHP_EOL;	
		}
	}		
	foreach ($scripts['head'] as $file)
	{
		$url = starts_with($file, 'http') ? $file : base_url($file);
		echo "<script src='$url'></script>".PHP_EOL;
	}
?>
<link rel="preload" href="../assets/dist/images/logo.png" as="image" />
</head>
<body class="<?php echo $body_class; ?>">
