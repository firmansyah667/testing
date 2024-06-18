<?php require_once('config.php');?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>cocoteription Movie <?php echo $config->meta_title;?></title>
	<meta name="cocoteription" content="<?php echo $config->meta_cocoteription;?>">
	<meta name="keywords" content="<?php echo $config->meta_keywords;?>">

	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="article">
	<meta property="og:title" content=" | <?php echo $config->title;?>">
	<meta property="og:cocoteription" content="<?php echo $config->meta_cocoteription;?>">
	<meta property="og:url" content="<?php echo $_ocim->home_url();?>/">	
	<meta property="og:site_name" content="<?php echo $config->meta_title;?>">

	<link rel="icon" type="image/png" href="/favicon.png">

    <link href="//fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		
	<link href="/include/css/mov3.css" rel="stylesheet" type="text/css">
	<link href="include/css/style3.css" rel="stylesheet" type="text/css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		
</head>
<body>
	<nav class="navbar navbar-custom navbar-static-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle navbar-default" data-toggle="collapse" data-target="#togglenav">
					<span class="sr-only"></span>
					<i class="fa fa-align-justify"></i>
				</button>
				<a class="navbar-brand" href="<?php echo $_ocim->home_url();?>/cocote"><i class="fa fa-film"></i> <?php echo $config->title;?></a>
			</div>
			<div class="collapse navbar-collapse" id="togglenav">
				<form class="navbar-form navbar-left hidden-sm" role="search" action="/cocote/search.php" method="GET">
					<div class="form-group">
						<input type="text" name="q" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
				</form>
					
				<ul class="nav navbar-nav navbar-left navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<i class="fa fa-film"></i> Movie <span class="caret"></span>
						</a>
                                                <ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo $_ocim->home_url();?>/cocote/"><i class="fa fa-home"></i> Home</a></li>
							<li><a href="<?php echo $_ocim->home_url();?>/cocote/playing.php"><i class="fa fa-dot-circle-o"></i> Now Playing</a></li>
							<li><a href="<?php echo $_ocim->home_url();?>/cocote/toprated.php"><i class="fa fa-list-alt"></i> Top Rated</a></li>
							<li><a href="<?php echo $_ocim->home_url();?>/cocote/upcoming.php"><i class="fa fa-star-half-o"></i> Upcoming</a></li>
                                                </ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<i class="fa fa-file-video-o"></i> TV Show<span class="caret"></span>
						</a>
                                                <ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo $_ocim->home_url();?>/cocote/"><i class="fa fa-home"></i> Home</a></li>
							<li><a href="<?php echo $_ocim->home_url();?>/cocote/airing.php"><i class="fa fa-dot-circle-o"></i> TV shows Airing</a></li>
							<li><a href="<?php echo $_ocim->home_url();?>/cocote/ontheair.php"><i class="fa fa-list-alt"></i> On the Air</a></li>
							<li><a href="<?php echo $_ocim->home_url();?>/cocote/popular.php"><i class="fa fa-star-half-o"></i> Popular TV Series</a></li>
                                                </ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>	

		
	<div class="container box-container">
		<div class="row">