<?php 
require_once('config.php');
require_once('include/tvseries.php');
//$short = $_ocim->home_url() .'/?do=play&id='. $id;
$short = seo_tv( $id, $row['name'] ) ;

//daftar disini https://bitly.com/a/oauth_apps
require_once('include/bitly.php');
$client_id = '';
$client_secret = '';
$user_access_token = '7f0330fdf15ad747b94aa6b8efbf421a11efe6a7';
$user_login = '';
$user_api_key = '';

$params = array();
$params['access_token'] = $user_access_token;
$params['longUrl'] = $short;
$params['domain'] = 'bit.ly'; // alternatif domain : bit.ly,bitly.com,j.mp
$results = bitly_get('shorten', $params);

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $row['name'];?><?php echo $cocote_title;?></title>
	<meta name="cocoteription" content="<?php echo $_ocim->short($row['overview']);?>">
	<meta name="keywords" content="<?php echo $keywords;?>">

	<link rel="icon" type="image/png" href="/favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		
    <link href="/include/css/mov3.css" rel="stylesheet" type="text/css">
	<link href="include/css/style3.css" rel="stylesheet" type="text/css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> 
		<script src="https://oss.maxcdn.com/respond/1.3/respond.min.js"></script>
	<![endif]-->

    <script type="text/javascript">
        function selectText(obj) {      // adapted from Denis Sadowski (via StackOverflow.com)
            if (document.selection) {
                var range = document.body.createTextRange();
                range.moveToElementText(obj);
                range.select();
            }
            else if (window.getSelection) {
                var range = document.createRange();
                range.selectNode(obj);
                window.getSelection().addRange(range);
            }
        }
    </script>
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
							<li><a href="<?php echo $_ocim->home_url();?>/cocote/playing"><i class="fa fa-dot-circle-o"></i> Now Playing</a></li>
							<li><a href="<?php echo $_ocim->home_url();?>/cocote/toprated"><i class="fa fa-list-alt"></i> Top Rated</a></li>
							<li><a href="<?php echo $_ocim->home_url();?>/cocote/upcoming"><i class="fa fa-star-half-o"></i> Upcoming</a></li>
                                                </ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<i class="fa fa-file-video-o"></i> TV Show<span class="caret"></span>
						</a>
                                                <ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo $_ocim->home_url();?>/cocote/tv"><i class="fa fa-home"></i> Home</a></li>
							<li><a href="<?php echo $_ocim->home_url();?>/cocote/airing"><i class="fa fa-dot-circle-o"></i> TV shows Airing</a></li>
							<li><a href="<?php echo $_ocim->home_url();?>/cocote/ontheair"><i class="fa fa-list-alt"></i> On the Air</a></li>
							<li><a href="<?php echo $_ocim->home_url();?>/cocote/popular"><i class="fa fa-star-half-o"></i> Popular TV Series</a></li>
                                                </ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>		
		
	<div class="container box-container">

		<div class="row">

		<div class="col-md-12">

			<div class="choice-menu">
				<a class="btn btn-success" href="/cocote">Home</a>
				<a class="btn btn-primary active" href="./">cocoteription</a>
			</div>

			<div class="row" style="margin-top:25px;">
			<div class="col-md-12">
			        <div class="row">
				<div class="col-sm-4 col-xs-12">
					<img src="<?php echo $images;?>" alt="<?php echo $row['title'];?> (<?php echo $omdbapi['Year'];?>)" class="img-responsive thumbnail" style="margin:0 auto;">
                                        <div class="text-center">
                                                <label>Big Images Random</label>
                                                <textarea class="form-control"><?php echo $images;?></textarea>
                                                <label>Small Images</label>
                                                <textarea class="form-control"><?php echo $images_small;?></textarea>
                                        </div>
					<table class="table table-striped">
						<thead><caption class="text-center">Seasons List</caption></thead>
                                                <tbody>	
							<tr>
								<td><ul><?php echo $season_cocote;?></li></ul></td>
							</tr>
 			                        </tbody>
					</table>
				</div>
				<div class="col-sm-8 col-xs-12">
					<table class="table table-striped">
						<thead><caption class="text-center">Title Generate</caption></thead>
                                                <tbody>	
							<tr>
								<td class="title1"><?php echo $row['name'];?><?php echo $cocote_title;?></td>

							</tr>
                                                        <tr>
                                                                <td class="title2"><?php echo $row['name'];?><?php echo $cocote_title;?> Full</td><br>
                                                        </tr>
                                                        <tr>
                                                                <td class="title3"><?php echo $row['name'];?><?php echo $cocote_title;?> Full Episode</td><br>
                                                        </tr>

 			                        </tbody>
					</table>
					<table class="table table-striped">
						<thead><caption class="text-center">cocoteription Generate</caption></thead>
                                                <tbody>	
							<tr>
								<td class="long-cocoteription-generate">Watch<?php echo $row['name'];?><?php echo $cocote_title;?> Full Episode For Free
                                                                    <br>Watch or Download here : <?php echo $results['data']['url'];?>
                                                                    <br>
                                                                    <br><?php echo $row['name'];?><?php echo $cocote_title;?>
                                                                    <br><?php echo $row['name'];?><?php echo $cocote_title;?> Full
                                                                    <br><?php echo $row['name'];?><?php echo $cocote_title;?> Full Online HD
                                                                    <br><?php echo $row['name'];?><?php echo $cocote_title;?> Full Episode Online
                                                                    <br><?php echo $row['name'];?><?php echo $cocote_title;?> Full HD Stream
                                                                    <br><?php echo $row['name'];?><?php echo $cocote_title;?> Full Stream in HD
                                                                    <br><?php echo $row['name'];?><?php echo $cocote_title;?> Full Free
                                                                    <br><?php echo $row['name'];?><?php echo $cocote_title;?> Full Episode Free
                                                                    <br><?php echo $row['name'];?><?php echo $cocote_title;?> Full Episode Online
                                                                    <br><?php echo $row['name'];?><?php echo $cocote_title;?> Full Episode Online Free
                                                                    <br><?php echo $row['name'];?><?php echo $cocote_title;?> Full Episode HD
                                                                    <br><?php echo $row['name'];?><?php echo $cocote_title;?> Full Episode HD Watch Free
                                                                    <br><?php echo $row['name'];?><?php echo $cocote_title;?> Full Episode Online Free
                                                                    <br>

<br>Watch Now : <?php echo $results['data']['url'];?>
                                                                </td>
							</tr>
 			                        </tbody>
					</table>
					<table class="table table-striped">
                                                <tbody>
							<tr><th width="150">Title</th><td>:</td><td><?php echo $row['name'];?><?php echo $cocote_title;?></td></tr>
							<tr><th>Original Title</th><td>:</td><td><?php echo $row['original_name'];?><?php echo $cocote_title;?></td></tr>
							<tr><th>Target URL:</th><td>:</td><td class="url-lp"> <?php echo $short;?></td></tr>
							<tr><th>Target short URL:</th><td>:</td><td class="shorturlnya"> <?php echo $results['data']['url'];?></td></tr>
							<tr><th>Nama Thumbnail:</th><td>:</td><td class="nama-thumbnail"> <?php echo $row['name'];?><?php echo $cocote_title;?>TV Series.jpg</td></tr> 
 			                        </tbody>
					</table>
				</div>
				</div>
			</div>
			</div>
		</div>

        	<?php if (!$_id[2] AND $row2 != null ):?>
		<div class="col-md-12">
		<h3 class="text-center">Episodes List</h3>
			<?php
                  	if ($row2['episodes']!=null) {
                      		foreach( $row2['episodes'] as $episodes) {

                                        if ($episodes['still_path']!=null) {
                                           	$still_path = 'http://image.tmdb.org/t/p/w185'.$episodes['still_path'];
                                       	}else{
                                           	$still_path = '/include/images/no-backdrop.png';
                                        }	
                        	?>
				<div class="col-md-4 col-sm-6 col-xs-12 media">
						<h4 class="media-heading" style="font-size: 14px;font-weight: 700;"><a href="<?php echo $_ocim->home_url();?>/cocote/play.php?id=<?php echo $id;?>-<?php echo $episodes['episode_number'];?>" title="<?php echo $episodes['name'];?>">Episode <?php echo $episodes['episode_number'];?> : <?php echo $episodes['name'];?></a></h4>
						<div style="font-size:12px;"><?php echo date('d F Y', strtotime($episodes['air_date']));?></div>
				</div>
				<?php 
                                }   
                        }
                        ?>
		</div>
        	<?php endif;?>
		</div>
	</div>
<?php include('footer.php');?>