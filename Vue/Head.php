<?php
function afficheEntete($niveau) { ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    
    <title>Toutbois</title>
    
    <!-- Bootstrap Core CSS -->
    <link href="<?php for($i=0;$i<$niveau;$i++){echo '../';} ?>css/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php for($i=0;$i<$niveau;$i++){echo '../';} ?>css/toutbois.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]--> 
</head>
<body>
<?php
}
?>
