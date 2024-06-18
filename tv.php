<?php 
require_once('config.php');
require_once('include/movies.php');
//$short = $_ocim->home_url() .'/?do=watch&id='. $id ;
$short = seo_movie($id,$row['title']);
function get_tiny_url($url)  {  
	$ch = curl_init();  
	$timeout = 5;  
	curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  
	$data = curl_exec($ch);  
	curl_close($ch);  
	return $data;  
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $row['title'];?> (<?php echo date('Y', strtotime( $row['release_date'] ) );?>)</title>
	<meta name="cocoteription" content="<?php echo $_ocim->short($row['overview']);?>">
	<meta name="keywords" content="<?php echo $keywords;?>">

	<link rel="icon" type="image/png" href="/favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

	<link href="/include/css/mov3.css" rel="stylesheet" type="text/css">
	<link href="include/css/style3.css" rel="stylesheet" type="text/css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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
    
    <?php 
$bitly  = "http://api.bitly.com/v3/shorten?login=rimamoose&apiKey=R_d0a92893da1c42b9a09d19ad4440450f&longUrl=$short&format=txt";
 
//Bitly will return a short url as text
$short_url = @file_get_contents($bitly);
 
//display or return our short url
echo $short_url;
?>
</head>
<body>
	<nav class="navbar navbar-custom navbar-static-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle navbar-default" data-toggle="collapse" data-target="#togglenav">
					<span class="sr-only"></span>
					<i class="fa fa-align-justify"></i>
				</button>
				<a class="navbar-brand" href="./"><i class="fa fa-film"></i> <?php echo $config->title;?></a>
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
<div id="google_translate_element" style="margin-bottom: 5px;"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>		
	<div class="container box-container">

		<div class="row">

		<div class="col-md-12">
                <div class="row">
                        <?php
                  	if ( empty( $page ) ) {
                        	$page = 1;
                        }
			$Movie = $tmdb->getPopularTVShows($page);
                  	if ($Movie['results'] != null) {
                                $i = 0;
                      		foreach($Movie['results'] as $row) {

                                        if ($row[poster_path]!=null) {
                                           	$image = '//i1.wp.com/image.tmdb.org/t/p/w300'.$row[poster_path].'?resize=300,450';
                                        }elseif ($row[backdrop_path]!=null) {
                                        	$image = '//i1.wp.com/image.tmdb.org/t/p/w300'.$row[backdrop_path].'?resize=300,450';
                                       	}else{
                                           	$image = '//i1.wp.com/'.$_ocim->get_domain($_ocim->home_url()).'/include/images/no-poster-w185.jpg?resize=300,450';
                                        }	
                                ?>			
				<div class="col-md-2 col-sm-4 col-xs-6">
					<div class="movie-list text-center" data-toggle="tooltip" data-placement="top" title="<?php echo $row[original_name];?>">
						<a href="<?php echo $_ocim->home_url();?>/cocote/play.php?id=<?php echo $row[id];?>">
							<div class="thumbnail"><img src="<?php echo $image;?>" class="img-responsive"></div>

							<div class="movie-list-title nowrap"><?php echo $row[original_name];?></div>
                                                </a>
                                                <div class="label label-info"><?php echo $row[vote_average];?>/10 by <?php echo $row[vote_count];?> user</div>
					</div>
				</div>
				<?php 
                                if ($i++ == 17) break;
                                }   
                        }
                        ?>							

                        <div class="clearfix"></div>
                        <nav class="text-center">
                        <?php
                        if ($Movie['total_results'] > 19) :
                                require_once('include/CSSPagination.class.php');
                                if ($Movie['total_results'] > 1000) :
                                        $totalResults = 1000;
                                else:
                                        $totalResults = $Movie['total_results'];
                                endif;                                
                                $limit  = 20; 
                                $link   = "/cocote/tv.php";
                                $pagination = new CSSPagination($totalResults, $limit, $link, '?'); // create instance object
                                $pagination->setPage($_GET[page]); // dont change it
                                echo $pagination->showPage();
                        endif;
                        ?>
                        </nav>

		</div>
	</div>
	</div>
	</div>
<?php include('.footer.php');?>