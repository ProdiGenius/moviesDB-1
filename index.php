<!DOCTYPE HTML>
<html>
<head>
<meta name="title" content="Watch Movies and TV Shows Online for Free - Watch it Free! - Putlocker, Sockshare, novamov, firedrive"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="jquery-ui-1.8.13.custom.min.js"></script>
<script src="jquery.min.js"></script>
<script type='text/javascript' src="jssor.slider.mini.js"></script>
<title> Watch Movies and TV Shows Online for Free </title>
<link rel='stylesheet' type ='text/css' href='style.css' />
</head>

<body>
<?php
	include 'datalogin.php';
?>

<div id="header">
	<div id="Home"><a href="http://www.watchitfree.me" style="text-decoration:none;">HOME</a></div>
</div>

<div id="page-content">
	<div id="gallery">
		<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 320px;
            overflow: hidden;">
		<div><img u="image" src="cloudb.jpg" width="600" height="320" /></div>
		<div><img u="image" src="inceptionb.jpg" width="600" height="320" /></div>
		<div><img u="image" src="captainb.jpg" width="600" height="320" /></div>
		<div><img u="image" src="avengersb.jpg" width="600" height="320" /></div>
		</div>
	</div>
	<div id="video-cat-section">
		<div id="movie-cat">
			<div id="movie-bar">
			<h1 style="padding:10px 15px; font-family:Arial; font-size:12.5px; font-weight:bold; color:#3B3B3B;">MOVIES</h1>
			<ul class="browse-cat-list">
			<li><a href="/TV-shows-AZ"
				title="Browse Tv-Shows Titles A-Z">Movies by Title (A-Z)</a>
			<li><a href="/TV-shows-Recent-episodes"
				title="Browse recently aired episodes">Recently Added Movies</a>
			<li><a href="/TV-shows-Popular"
				title="Browse Tv-shows by Popularity">Popular Movies</a>
			<li><a href="/TV-shows-Release-date"
				title="Browse Tv-shows by Release date">Movies by Release Date</a>
			<li><a href="/TV-shows-Genres"	
				title="Browse Tv-Shows by Genre">Browse Movies by Genre</a>
			</ul>
			</div>
		</div>
		<div id="tv-cat">
		<div id="tv-bar">
			<h1 style="padding:10px 15px; font-family:Arial; font-size:12.5px; font-weight:bold; color:#3B3B3B;">TV-SHOWS</h1>
			<ul class="browse-cat-list">
			<li><a href="/TV-shows-AZ"
				title="Browse Tv-Shows Titles A-Z">Tv-Shows by Title (A-Z)</a>
			<li><a href="/TV-shows-Recent-episodes"
				title="Browse recently aired episodes">Recently Aired Episodes</a>
			<li><a href="/TV-shows-Popular"
				title="Browse Tv-shows by Popularity">Popular Tv-Shows</a>
			<li><a href="/TV-shows-Release-date"
				title="Browse Tv-shows by Release date">Browse by Release Date</a>
			<li><a href="/TV-shows-Genres"	
				title="Browse Tv-Shows by Genre">Browse Tv-shows by Genre</a>
			</ul>
		</div>	
		</div>
	</div>
	
	<!-- Content for after release - 
	<div id="sidebar-content">
		<div id="ad-box">
		<br></br>
		<h1 align="center">AD BOX</h1>
		</div>
		<div id="comment-box-header">
		<p align="center" style="font-family:verdana; color:#565656;">RECENT COMMENTS</p>
		</div>
	</div> --> 
	<div id="sidebar-content">
		<div id="ad-box">
		<h2 style="text-align:center; color:#70716F; margin-top: 20px;"> Welcome to the official WatchItFree
		<span style="color:#FC8700;">ALPHA!</span></h2>
		<br></br>
		<p style="margin:0px 10px 0px 10px; font-weight:bold; color:#70716F;"> WatchItFree.me is currently in ALPHA stage. This means that the movie library you see here
		is only a sample of what's to come in the future! However, until full release, we will still be
		adding <span>Newly Released</span> films in High quality. For movie and website updates you can
		like and follow us on Facebook and Twitter. Make sure to also Bookmark this page to continue viewing
		our selection of free movies in the future!
		<br></br>
		</div>	
	</div>
	
	<div id="movie-section">
		<ul id="category-list">
		<li class="active"><a class="button" href="#1">NEW MOVIES</a></li>
		<li class="inactive"><a class="button" href="#1">HD MOVIES</a></li>
		<li class="inactive"><a class="button" href="#1">MOST POPULAR</a></li>
		</ul>
		<section class="sec fade">
			<ul class="movie-display" id="new-movs">
				<div>
					<a href="/watch-the-amazing-spider-man-2-2014.html" title="The Amazing Spider-Man 2 (2014)">
					<img class="hoverable" id="js-img-lazy" alt="The Amazing Spider-Man 2 (2014)"
						src="spiderman.jpg"/></a>
				</div>
				<div style="margin-left: 0px;"><a href="" title="300: Rise of an Empire (2014)">
					<img class="hoverable" id="js-img-lazy" alt="300: Rise of an Empire (2014)"
						src="300.jpg"/></a>
				</div>
				<div><a href="" title="Captain America (2014)">
					<img class="hoverable" id="js-img-lazy" alt="Captain America: The Winter Soldier (2014)"
						src="captain.jpg"/></a>
				</div>
				<div><a href="" title="Divergent (2014)">
					<img class="hoverable" id="js-img-lazy" alt="Divergent (2014)"
						src="divergent.jpg"/></a>
				</div>
				<div><a href="" title="1">
					<img class="hoverable" id="js-img-lazy"
						src="captain.jpg"/></a>
				</div>
				<div><a href="" title="1">
					<img class="hoverable" id="js-img-lazy"
						src="2.jpg"/></a>
				</div>
			</ul>
		<div class="threeColList">
		<ul>
		<?php
					
			$table_list = "SHOW TABLES FROM `yossil01_movies' ";
            //$table_list = "SHOW TABLES FROM `movies` ";
						
			$rs = mysql_query($table_list);
			
			while ($row = mysql_fetch_array($rs))
			{
				echo "<li><a class='mainLink' href='movie.php?id=$row[0]'>$row[0]</a>";
			}
		?>
		</ul>
		<ul style="margin: 0px 30px 0px 30px;">
        <li><a class="mainLink" href="/watch-maleficent-2014-1.html"
            title="Maleficent (2014)">Maleficent (2014)</a>
        
            <li><a class="mainLink" href="/watch-rooster-doodle-doo-2014.html"
            title="Rooster Doodle-doo (2014)">Rooster Doodle-doo (2014)</a>
        
            <li><a class="mainLink" href="/watch-summer-s-shadow-2014.html"
            title="Summer's Shadow (2014)">Summer's Shadow (2014)</a>
        
            <li><a class="mainLink" href="/watch-a-long-way-down-2014.html"
            title="A Long Way Down (2014)">A Long Way Down (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-angriest-man-in-brooklyn-2014.html"
            title="The Angriest Man in Brooklyn (2014)">The Angriest Man in Brooklyn (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-red-house-2014.html"
            title="The Red House (2014)">The Red House (2014)</a>
        
            <li><a class="mainLink" href="/watch-one-small-hitch-2013.html"
            title="One Small Hitch (2013)">One Small Hitch (2013)</a>
        
            <li><a class="mainLink" href="/watch-blue-ruin-2013.html"
            title="Blue Ruin (2013)">Blue Ruin (2013)</a>
        
            <li><a class="mainLink" href="/watch-anna-2013.html"
            title="Anna (2013)">Anna (2013)</a>
        
            <li><a class="mainLink" href="/watch-dawn-of-the-planet-of-the-apes-2014.html"
            title="Dawn of the Planet of the Apes (2014)">Dawn of the Planet of the Apes (2014)</a>
        
		</ul>
		<ul>
        <li><a class="mainLink" href="/watch-the-art-of-the-steal-2013.html"
            title="The Art of the Steal (2013)">The Art of the Steal (2013)</a>
        
            <li><a class="mainLink" href="/watch-the-fault-in-our-stars-2014.html"
            title="The Fault in Our Stars (2014)">The Fault in Our Stars (2014)</a>
        
            <li><a class="mainLink" href="/watch-think-like-a-man-too-2014.html"
            title="Think Like a Man Too (2014)">Think Like a Man Too (2014)</a>
        
            <li><a class="mainLink" href="/watch-wings-sky-force-heroes-2014.html"
            title="Wings: Sky Force Heroes (2014)">Wings: Sky Force Heroes (2014)</a>
        
            <li><a class="mainLink" href="/watch-premature-2014.html"
            title="Premature (2014)">Premature (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-immigrant-2013.html"
            title="The Immigrant (2013)">The Immigrant (2013)</a>
        
            <li><a class="mainLink" href="/watch-five-thirteen-2013.html"
            title="Five Thirteen (2013)">Five Thirteen (2013)</a>
        
            <li><a class="mainLink" href="/watch-i-ll-follow-you-down-2013.html"
            title="I'll Follow You Down (2013)">I'll Follow You Down (2013)</a>
        
            <li><a class="mainLink" href="/watch-war-of-the-worlds-goliath-2012.html"
            title="War of the Worlds: Goliath (2012)">War of the Worlds: Goliath (2012)</a>
        
            <li><a class="mainLink" href="/watch-killing-daddy-2014.html"
            title="Killing Daddy (2014)">Killing Daddy (2014)</a>
        </ul>
    <a class="showMore" href="/new-movies.html">more »</a>
	</div>
		</section>	
		<section class="sec">
			<ul class="movie-display" id="hd-movs">
				<div>
					<a href="" title="The Amazing Spider-Man 2 (2014)">
					<img class="hoverable" id="js-img-lazy" alt="The Amazing Spider-Man 2 (2014)"
						src="spiderman.jpg"/></a>
				</div>
				<div style="margin-left: 0px;"><a href="" title="300: Rise of an Empire (2014)">
					<img class="hoverable" id="js-img-lazy" alt="300: Rise of an Empire (2014)"
						src="300.jpg"/></a>

				</div>
				<div><a href="" title="Captain America (2014)">
					<img class="hoverable" id="js-img-lazy" alt="Captain America: The Winter Soldier (2014)"
						src="captain.jpg"/></a>
				</div>
				<div><a href="" title="Divergent (2014)">
					<img class="hoverable" id="js-img-lazy" alt="Divergent (2014)"
						src="divergent.jpg"/></a>
				</div>
				<div><a href="" title="1">
					<img class="hoverable" id="js-img-lazy"
						src="captain.jpg"/></a>
				</div>
				<div><a href="" title="1">
					<img class="hoverable" id="js-img-lazy"
						src="2.jpg"/></a>
				</div>
			</ul>
		<div class="threeColList">
		<ul>
            <li><a class="mainLink" href="/watch-the-hooligan-factory-2014.html"
            title="The Hooligan Factory (2014)">The Hooligan Factory (2014)</a>

            <li><a class="mainLink" href="/watch-tammy-2014.html"
            title="Tammy (2014)">Tammy (2014)</a>
        
            <li><a class="mainLink" href="/watch-appleseed-alpha-2014.html"
            title="Appleseed Alpha (2014)">Appleseed Alpha (2014)</a>
        
            <li><a class="mainLink" href="/watch-godzilla-2014.html"
            title="Godzilla (2014)">Godzilla (2014)</a>
        
            <li><a class="mainLink" href="/watch-road-to-paloma-2014.html"
            title="Road to Paloma (2014)">Road to Paloma (2014)</a>
        
            <li><a class="mainLink" href="/watch-a-million-ways-to-die-in-the-west-2014.html"
            title="A Million Ways to Die in the West (2014)">A Million Ways to Die in the West (2014)</a>
        
            <li><a class="mainLink" href="/watch-x-men-days-of-future-past-2014.html"
            title="X-Men: Days of Future Past (2014)">X-Men: Days of Future Past (2014)</a>
        
            <li><a class="mainLink" href="/watch-beneath-v-2013.html"
            title="Beneath (V) (2013)">Beneath (V) (2013)</a>
        
            <li><a class="mainLink" href="/watch-blended-2014.html"
            title="Blended (2014)">Blended (2014)</a>
        
            <li><a class="mainLink" href="/watch-heatstroke-2013.html"
            title="Heatstroke (2013)">Heatstroke (2013)</a>
		</ul>
		<ul style="margin: 0px 30px 0px 30px;">
        <li><a class="mainLink" href="/watch-maleficent-2014-1.html"
            title="Maleficent (2014)">Maleficent (2014)</a>
        
            <li><a class="mainLink" href="/watch-rooster-doodle-doo-2014.html"
            title="Rooster Doodle-doo (2014)">Rooster Doodle-doo (2014)</a>
        
            <li><a class="mainLink" href="/watch-summer-s-shadow-2014.html"
            title="Summer's Shadow (2014)">Summer's Shadow (2014)</a>
        
            <li><a class="mainLink" href="/watch-a-long-way-down-2014.html"
            title="A Long Way Down (2014)">A Long Way Down (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-angriest-man-in-brooklyn-2014.html"
            title="The Angriest Man in Brooklyn (2014)">The Angriest Man in Brooklyn (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-red-house-2014.html"
            title="The Red House (2014)">The Red House (2014)</a>
        
            <li><a class="mainLink" href="/watch-one-small-hitch-2013.html"
            title="One Small Hitch (2013)">One Small Hitch (2013)</a>
        
            <li><a class="mainLink" href="/watch-blue-ruin-2013.html"
            title="Blue Ruin (2013)">Blue Ruin (2013)</a>
        
            <li><a class="mainLink" href="/watch-anna-2013.html"
            title="Anna (2013)">Anna (2013)</a>
        
            <li><a class="mainLink" href="/watch-dawn-of-the-planet-of-the-apes-2014.html"
            title="Dawn of the Planet of the Apes (2014)">Dawn of the Planet of the Apes (2014)</a>
        
		</ul>
		<ul>
        <li><a class="mainLink" href="/watch-the-art-of-the-steal-2013.html"
            title="The Art of the Steal (2013)">The Art of the Steal (2013)</a>
        
            <li><a class="mainLink" href="/watch-the-fault-in-our-stars-2014.html"
            title="The Fault in Our Stars (2014)">The Fault in Our Stars (2014)</a>
        
            <li><a class="mainLink" href="/watch-think-like-a-man-too-2014.html"
            title="Think Like a Man Too (2014)">Think Like a Man Too (2014)</a>
        
            <li><a class="mainLink" href="/watch-wings-sky-force-heroes-2014.html"
            title="Wings: Sky Force Heroes (2014)">Wings: Sky Force Heroes (2014)</a>
        
            <li><a class="mainLink" href="/watch-premature-2014.html"
            title="Premature (2014)">Premature (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-immigrant-2013.html"
            title="The Immigrant (2013)">The Immigrant (2013)</a>
        
            <li><a class="mainLink" href="/watch-five-thirteen-2013.html"
            title="Five Thirteen (2013)">Five Thirteen (2013)</a>
        
            <li><a class="mainLink" href="/watch-i-ll-follow-you-down-2013.html"
            title="I'll Follow You Down (2013)">I'll Follow You Down (2013)</a>
        
            <li><a class="mainLink" href="/watch-war-of-the-worlds-goliath-2012.html"
            title="War of the Worlds: Goliath (2012)">War of the Worlds: Goliath (2012)</a>
        
            <li><a class="mainLink" href="/watch-killing-daddy-2014.html"
            title="Killing Daddy (2014)">Killing Daddy (2014)</a>

        </ul>
    <a class="showMore" href="/new-movies.html">more »</a>
	</div>
		</section>	
		<section class="sec fade">
			<ul class="movie-display" id="most-pop">
								<div>
					<a href="" title="The Amazing Spider-Man 2 (2014)">
					<img class="hoverable" id="js-img-lazy" alt="The Amazing Spider-Man 2 (2014)"
						src="spiderman.jpg"/></a>
				</div>
				<div style="margin-left: 0px;"><a href="" title="300: Rise of an Empire (2014)">
					<img class="hoverable" id="js-img-lazy" alt="300: Rise of an Empire (2014)"
						src="300.jpg"/></a>

				</div>
				<div><a href="" title="Captain America (2014)">
					<img class="hoverable" id="js-img-lazy" alt="Captain America: The Winter Soldier (2014)"
						src="captain.jpg"/></a>
				</div>
				<div><a href="" title="Divergent (2014)">
					<img class="hoverable" id="js-img-lazy" alt="Divergent (2014)"
						src="divergent.jpg"/></a>
				</div>
				<div><a href="" title="1">
					<img class="hoverable" id="js-img-lazy"
						src="captain.jpg"/></a>
				</div>
				<div><a href="" title="1">
					<img class="hoverable" id="js-img-lazy"
						src="2.jpg"/></a>
				</div>
			</ul>
		<div class="threeColList">
		<ul>
            <li><a class="mainLink" href="/watch-the-hooligan-factory-2014.html"
            title="The Hooligan Factory (2014)">The Hooligan Factory (2014)</a>

            <li><a class="mainLink" href="/watch-tammy-2014.html"
            title="Tammy (2014)">Tammy (2014)</a>
        
            <li><a class="mainLink" href="/watch-appleseed-alpha-2014.html"
            title="Appleseed Alpha (2014)">Appleseed Alpha (2014)</a>
        
            <li><a class="mainLink" href="/watch-godzilla-2014.html"
            title="Godzilla (2014)">Godzilla (2014)</a>
        
            <li><a class="mainLink" href="/watch-road-to-paloma-2014.html"
            title="Road to Paloma (2014)">Road to Paloma (2014)</a>
        
            <li><a class="mainLink" href="/watch-a-million-ways-to-die-in-the-west-2014.html"
            title="A Million Ways to Die in the West (2014)">A Million Ways to Die in the West (2014)</a>
        
            <li><a class="mainLink" href="/watch-x-men-days-of-future-past-2014.html"
            title="X-Men: Days of Future Past (2014)">X-Men: Days of Future Past (2014)</a>
        
            <li><a class="mainLink" href="/watch-beneath-v-2013.html"
            title="Beneath (V) (2013)">Beneath (V) (2013)</a>
        
            <li><a class="mainLink" href="/watch-blended-2014.html"
            title="Blended (2014)">Blended (2014)</a>
        
            <li><a class="mainLink" href="/watch-heatstroke-2013.html"
            title="Heatstroke (2013)">Heatstroke (2013)</a>
		</ul>
		<ul style="margin: 0px 30px 0px 30px;">
        <li><a class="mainLink" href="/watch-maleficent-2014-1.html"
            title="Maleficent (2014)">Maleficent (2014)</a>
        
            <li><a class="mainLink" href="/watch-rooster-doodle-doo-2014.html"
            title="Rooster Doodle-doo (2014)">Rooster Doodle-doo (2014)</a>
        
            <li><a class="mainLink" href="/watch-summer-s-shadow-2014.html"
            title="Summer's Shadow (2014)">Summer's Shadow (2014)</a>
        
            <li><a class="mainLink" href="/watch-a-long-way-down-2014.html"
            title="A Long Way Down (2014)">A Long Way Down (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-angriest-man-in-brooklyn-2014.html"
            title="The Angriest Man in Brooklyn (2014)">The Angriest Man in Brooklyn (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-red-house-2014.html"
            title="The Red House (2014)">The Red House (2014)</a>
        
            <li><a class="mainLink" href="/watch-one-small-hitch-2013.html"
            title="One Small Hitch (2013)">One Small Hitch (2013)</a>
        
            <li><a class="mainLink" href="/watch-blue-ruin-2013.html"
            title="Blue Ruin (2013)">Blue Ruin (2013)</a>
        
            <li><a class="mainLink" href="/watch-anna-2013.html"
            title="Anna (2013)">Anna (2013)</a>
        
            <li><a class="mainLink" href="/watch-dawn-of-the-planet-of-the-apes-2014.html"
            title="Dawn of the Planet of the Apes (2014)">Dawn of the Planet of the Apes (2014)</a>
        
		</ul>
		<ul>
        <li><a class="mainLink" href="/watch-the-art-of-the-steal-2013.html"
            title="The Art of the Steal (2013)">The Art of the Steal (2013)</a>
        
            <li><a class="mainLink" href="/watch-the-fault-in-our-stars-2014.html"
            title="The Fault in Our Stars (2014)">The Fault in Our Stars (2014)</a>
        
            <li><a class="mainLink" href="/watch-think-like-a-man-too-2014.html"
            title="Think Like a Man Too (2014)">Think Like a Man Too (2014)</a>
        
            <li><a class="mainLink" href="/watch-wings-sky-force-heroes-2014.html"
            title="Wings: Sky Force Heroes (2014)">Wings: Sky Force Heroes (2014)</a>
        
            <li><a class="mainLink" href="/watch-premature-2014.html"
            title="Premature (2014)">Premature (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-immigrant-2013.html"
            title="The Immigrant (2013)">The Immigrant (2013)</a>
        
            <li><a class="mainLink" href="/watch-five-thirteen-2013.html"
            title="Five Thirteen (2013)">Five Thirteen (2013)</a>
        
            <li><a class="mainLink" href="/watch-i-ll-follow-you-down-2013.html"
            title="I'll Follow You Down (2013)">I'll Follow You Down (2013)</a>
        
            <li><a class="mainLink" href="/watch-war-of-the-worlds-goliath-2012.html"
            title="War of the Worlds: Goliath (2012)">War of the Worlds: Goliath (2012)</a>
        
            <li><a class="mainLink" href="/watch-killing-daddy-2014.html"
            title="Killing Daddy (2014)">Killing Daddy (2014)</a>

        </ul>
    <a class="showMore" href="/new-movies.html">more »</a>
	</section>
	</div>

	<div id="genre-section">
		<ul id="genre-list">
		<li class="active"><a class="button" href="#1">ACTION</a></li>
		<li class="inactive"><a class="button" href="#1">DRAMA</a></li>
		<li class="inactive"><a class="button" href="#1">COMEDY</a></li>
		</ul>
			<section class="sec2 fade">
			<ul class="genre-display" id="action-movs">
				<div>
					<a href="" title="The Amazing Spider-Man 2 (2014)">
					<img class="hoverable" id="js-img-lazy" alt="The Amazing Spider-Man 2 (2014)"
						src="spiderman.jpg"/></a>
				</div>
				<div style="margin-left: 0px;"><a href="" title="300: Rise of an Empire (2014)">
					<img class="hoverable" id="js-img-lazy" alt="300: Rise of an Empire (2014)"
						src="300.jpg"/></a>
				</div>
				<div><a href="" title="Captain America (2014)">
					<img class="hoverable" id="js-img-lazy" alt="Captain America: The Winter Soldier (2014)"
						src="captain.jpg"/></a>
				</div>
				<div><a href="" title="Divergent (2014)">
					<img class="hoverable" id="js-img-lazy" alt="Divergent (2014)"
						src="divergent.jpg"/></a>
				</div>
				<div><a href="" title="1">
					<img class="hoverable" id="js-img-lazy"
						src="captain.jpg"/></a>
				</div>
				<div><a href="" title="1">
					<img class="hoverable" id="js-img-lazy"
						src="2.jpg"/></a>
				</div>
			</ul>
		<div class="threeColList">
		<ul>
            <li><a class="mainLink" href="/watch-the-hooligan-factory-2014.html"
            title="The Hooligan Factory (2014)">The Hooligan Factory (2014)</a>

            <li><a class="mainLink" href="/watch-tammy-2014.html"
            title="Tammy (2014)">Tammy (2014)</a>
        
            <li><a class="mainLink" href="/watch-appleseed-alpha-2014.html"
            title="Appleseed Alpha (2014)">Appleseed Alpha (2014)</a>
        
            <li><a class="mainLink" href="/watch-godzilla-2014.html"
            title="Godzilla (2014)">Godzilla (2014)</a>
        
            <li><a class="mainLink" href="/watch-road-to-paloma-2014.html"
            title="Road to Paloma (2014)">Road to Paloma (2014)</a>
        
            <li><a class="mainLink" href="/watch-a-million-ways-to-die-in-the-west-2014.html"
            title="A Million Ways to Die in the West (2014)">A Million Ways to Die in the West (2014)</a>
        
            <li><a class="mainLink" href="/watch-x-men-days-of-future-past-2014.html"
            title="X-Men: Days of Future Past (2014)">X-Men: Days of Future Past (2014)</a>
        
            <li><a class="mainLink" href="/watch-beneath-v-2013.html"
            title="Beneath (V) (2013)">Beneath (V) (2013)</a>
        
            <li><a class="mainLink" href="/watch-blended-2014.html"
            title="Blended (2014)">Blended (2014)</a>
        
            <li><a class="mainLink" href="/watch-heatstroke-2013.html"
            title="Heatstroke (2013)">Heatstroke (2013)</a>
		</ul>
		<ul style="margin: 0px 30px 0px 30px;">
        <li><a class="mainLink" href="/watch-maleficent-2014-1.html"
            title="Maleficent (2014)">Maleficent (2014)</a>
        
            <li><a class="mainLink" href="/watch-rooster-doodle-doo-2014.html"
            title="Rooster Doodle-doo (2014)">Rooster Doodle-doo (2014)</a>
        
            <li><a class="mainLink" href="/watch-summer-s-shadow-2014.html"
            title="Summer's Shadow (2014)">Summer's Shadow (2014)</a>
        
            <li><a class="mainLink" href="/watch-a-long-way-down-2014.html"
            title="A Long Way Down (2014)">A Long Way Down (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-angriest-man-in-brooklyn-2014.html"
            title="The Angriest Man in Brooklyn (2014)">The Angriest Man in Brooklyn (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-red-house-2014.html"
            title="The Red House (2014)">The Red House (2014)</a>
        
            <li><a class="mainLink" href="/watch-one-small-hitch-2013.html"
            title="One Small Hitch (2013)">One Small Hitch (2013)</a>
        
            <li><a class="mainLink" href="/watch-blue-ruin-2013.html"
            title="Blue Ruin (2013)">Blue Ruin (2013)</a>
        
            <li><a class="mainLink" href="/watch-anna-2013.html"
            title="Anna (2013)">Anna (2013)</a>
        
            <li><a class="mainLink" href="/watch-dawn-of-the-planet-of-the-apes-2014.html"
            title="Dawn of the Planet of the Apes (2014)">Dawn of the Planet of the Apes (2014)</a>
        
		</ul>
		<ul>
        <li><a class="mainLink" href="/watch-the-art-of-the-steal-2013.html"
            title="The Art of the Steal (2013)">The Art of the Steal (2013)</a>
        
            <li><a class="mainLink" href="/watch-the-fault-in-our-stars-2014.html"
            title="The Fault in Our Stars (2014)">The Fault in Our Stars (2014)</a>
        
            <li><a class="mainLink" href="/watch-think-like-a-man-too-2014.html"
            title="Think Like a Man Too (2014)">Think Like a Man Too (2014)</a>
        
            <li><a class="mainLink" href="/watch-wings-sky-force-heroes-2014.html"
            title="Wings: Sky Force Heroes (2014)">Wings: Sky Force Heroes (2014)</a>
        
            <li><a class="mainLink" href="/watch-premature-2014.html"
            title="Premature (2014)">Premature (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-immigrant-2013.html"
            title="The Immigrant (2013)">The Immigrant (2013)</a>
        
            <li><a class="mainLink" href="/watch-five-thirteen-2013.html"
            title="Five Thirteen (2013)">Five Thirteen (2013)</a>
        
            <li><a class="mainLink" href="/watch-i-ll-follow-you-down-2013.html"
            title="I'll Follow You Down (2013)">I'll Follow You Down (2013)</a>
        
            <li><a class="mainLink" href="/watch-war-of-the-worlds-goliath-2012.html"
            title="War of the Worlds: Goliath (2012)">War of the Worlds: Goliath (2012)</a>
        
            <li><a class="mainLink" href="/watch-killing-daddy-2014.html"
            title="Killing Daddy (2014)">Killing Daddy (2014)</a>
        </ul>
    <a class="showMore" href="/action-movies.html">more »</a>
	</div>
		</section>	
		<section class="sec2">
			<ul class="genre-display" id="drama-movs">
				<div>
					<a href="" title="The Amazing Spider-Man 2 (2014)">
					<img class="hoverable" id="js-img-lazy" alt="The Amazing Spider-Man 2 (2014)"
						src="spiderman.jpg"/></a>
				</div>
				<div style="margin-left: 0px;"><a href="" title="300: Rise of an Empire (2014)">
					<img class="hoverable" id="js-img-lazy" alt="300: Rise of an Empire (2014)"
						src="300.jpg"/></a>

				</div>
				<div><a href="" title="Captain America (2014)">
					<img class="hoverable" id="js-img-lazy" alt="Captain America: The Winter Soldier (2014)"
						src="captain.jpg"/></a>
				</div>
				<div><a href="" title="Divergent (2014)">
					<img class="hoverable" id="js-img-lazy" alt="Divergent (2014)"
						src="divergent.jpg"/></a>
				</div>
				<div><a href="" title="1">
					<img class="hoverable" id="js-img-lazy"
						src="captain.jpg"/></a>
				</div>
				<div><a href="" title="1">
					<img class="hoverable" id="js-img-lazy"
						src="2.jpg"/></a>
				</div>
			</ul>
		<div class="threeColList">
		<ul>
            <li><a class="mainLink" href="/watch-the-hooligan-factory-2014.html"
            title="The Hooligan Factory (2014)">The Hooligan Factory (2014)</a>

            <li><a class="mainLink" href="/watch-tammy-2014.html"
            title="Tammy (2014)">Tammy (2014)</a>
        
            <li><a class="mainLink" href="/watch-appleseed-alpha-2014.html"
            title="Appleseed Alpha (2014)">Appleseed Alpha (2014)</a>
        
            <li><a class="mainLink" href="/watch-godzilla-2014.html"
            title="Godzilla (2014)">Godzilla (2014)</a>
        
            <li><a class="mainLink" href="/watch-road-to-paloma-2014.html"
            title="Road to Paloma (2014)">Road to Paloma (2014)</a>
        
            <li><a class="mainLink" href="/watch-a-million-ways-to-die-in-the-west-2014.html"
            title="A Million Ways to Die in the West (2014)">A Million Ways to Die in the West (2014)</a>
        
            <li><a class="mainLink" href="/watch-x-men-days-of-future-past-2014.html"
            title="X-Men: Days of Future Past (2014)">X-Men: Days of Future Past (2014)</a>
        
            <li><a class="mainLink" href="/watch-beneath-v-2013.html"
            title="Beneath (V) (2013)">Beneath (V) (2013)</a>
        
            <li><a class="mainLink" href="/watch-blended-2014.html"
            title="Blended (2014)">Blended (2014)</a>
        
            <li><a class="mainLink" href="/watch-heatstroke-2013.html"
            title="Heatstroke (2013)">Heatstroke (2013)</a>
		</ul>
		<ul style="margin: 0px 30px 0px 30px;">
        <li><a class="mainLink" href="/watch-maleficent-2014-1.html"
            title="Maleficent (2014)">Maleficent (2014)</a>
        
            <li><a class="mainLink" href="/watch-rooster-doodle-doo-2014.html"
            title="Rooster Doodle-doo (2014)">Rooster Doodle-doo (2014)</a>
        
            <li><a class="mainLink" href="/watch-summer-s-shadow-2014.html"
            title="Summer's Shadow (2014)">Summer's Shadow (2014)</a>
        
            <li><a class="mainLink" href="/watch-a-long-way-down-2014.html"
            title="A Long Way Down (2014)">A Long Way Down (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-angriest-man-in-brooklyn-2014.html"
            title="The Angriest Man in Brooklyn (2014)">The Angriest Man in Brooklyn (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-red-house-2014.html"
            title="The Red House (2014)">The Red House (2014)</a>
        
            <li><a class="mainLink" href="/watch-one-small-hitch-2013.html"
            title="One Small Hitch (2013)">One Small Hitch (2013)</a>
        
            <li><a class="mainLink" href="/watch-blue-ruin-2013.html"
            title="Blue Ruin (2013)">Blue Ruin (2013)</a>
        
            <li><a class="mainLink" href="/watch-anna-2013.html"
            title="Anna (2013)">Anna (2013)</a>
        
            <li><a class="mainLink" href="/watch-dawn-of-the-planet-of-the-apes-2014.html"
            title="Dawn of the Planet of the Apes (2014)">Dawn of the Planet of the Apes (2014)</a>
        
		</ul>
		<ul>
        <li><a class="mainLink" href="/watch-the-art-of-the-steal-2013.html"
            title="The Art of the Steal (2013)">The Art of the Steal (2013)</a>
        
            <li><a class="mainLink" href="/watch-the-fault-in-our-stars-2014.html"
            title="The Fault in Our Stars (2014)">The Fault in Our Stars (2014)</a>
        
            <li><a class="mainLink" href="/watch-think-like-a-man-too-2014.html"
            title="Think Like a Man Too (2014)">Think Like a Man Too (2014)</a>
        
            <li><a class="mainLink" href="/watch-wings-sky-force-heroes-2014.html"
            title="Wings: Sky Force Heroes (2014)">Wings: Sky Force Heroes (2014)</a>
        
            <li><a class="mainLink" href="/watch-premature-2014.html"
            title="Premature (2014)">Premature (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-immigrant-2013.html"
            title="The Immigrant (2013)">The Immigrant (2013)</a>
        
            <li><a class="mainLink" href="/watch-five-thirteen-2013.html"
            title="Five Thirteen (2013)">Five Thirteen (2013)</a>
        
            <li><a class="mainLink" href="/watch-i-ll-follow-you-down-2013.html"
            title="I'll Follow You Down (2013)">I'll Follow You Down (2013)</a>
        
            <li><a class="mainLink" href="/watch-war-of-the-worlds-goliath-2012.html"
            title="War of the Worlds: Goliath (2012)">War of the Worlds: Goliath (2012)</a>
        
            <li><a class="mainLink" href="/watch-killing-daddy-2014.html"
            title="Killing Daddy (2014)">Killing Daddy (2014)</a>

        </ul>
    <a class="showMore" href="/drama-movies.html">more »</a>
	</div>
		</section>	
		<section class="sec2 fade">
			<ul class="genre-display" id="comedy-pop">
								<div>
					<a href="" title="The Amazing Spider-Man 2 (2014)">
					<img class="hoverable" id="js-img-lazy" alt="The Amazing Spider-Man 2 (2014)"
						src="spiderman.jpg"/></a>
				</div>
				<div style="margin-left: 0px;"><a href="" title="300: Rise of an Empire (2014)">
					<img class="hoverable" id="js-img-lazy" alt="300: Rise of an Empire (2014)"
						src="300.jpg"/></a>

				</div>
				<div><a href="" title="Captain America (2014)">
					<img class="hoverable" id="js-img-lazy" alt="Captain America: The Winter Soldier (2014)"
						src="captain.jpg"/></a>
				</div>
				<div><a href="" title="Divergent (2014)">
					<img class="hoverable" id="js-img-lazy" alt="Divergent (2014)"
						src="divergent.jpg"/></a>
				</div>
				<div><a href="" title="1">
					<img class="hoverable" id="js-img-lazy"
						src="captain.jpg"/></a>
				</div>
				<div><a href="" title="1">
					<img class="hoverable" id="js-img-lazy"
						src="2.jpg"/></a>
				</div>
			</ul>
		<div class="threeColList">
		<ul>
            <li><a class="mainLink" href="/watch-the-hooligan-factory-2014.html"
            title="The Hooligan Factory (2014)">The Hooligan Factory (2014)</a>

            <li><a class="mainLink" href="/watch-tammy-2014.html"
            title="Tammy (2014)">Tammy (2014)</a>
        
            <li><a class="mainLink" href="/watch-appleseed-alpha-2014.html"
            title="Appleseed Alpha (2014)">Appleseed Alpha (2014)</a>
        
            <li><a class="mainLink" href="/watch-godzilla-2014.html"
            title="Godzilla (2014)">Godzilla (2014)</a>
        
            <li><a class="mainLink" href="/watch-road-to-paloma-2014.html"
            title="Road to Paloma (2014)">Road to Paloma (2014)</a>
        
            <li><a class="mainLink" href="/watch-a-million-ways-to-die-in-the-west-2014.html"
            title="A Million Ways to Die in the West (2014)">A Million Ways to Die in the West (2014)</a>
        
            <li><a class="mainLink" href="/watch-x-men-days-of-future-past-2014.html"
            title="X-Men: Days of Future Past (2014)">X-Men: Days of Future Past (2014)</a>
        
            <li><a class="mainLink" href="/watch-beneath-v-2013.html"
            title="Beneath (V) (2013)">Beneath (V) (2013)</a>
        
            <li><a class="mainLink" href="/watch-blended-2014.html"
            title="Blended (2014)">Blended (2014)</a>
        
            <li><a class="mainLink" href="/watch-heatstroke-2013.html"
            title="Heatstroke (2013)">Heatstroke (2013)</a>
		</ul>
		<ul style="margin: 0px 30px 0px 30px;">
        <li><a class="mainLink" href="/watch-maleficent-2014-1.html"
            title="Maleficent (2014)">Maleficent (2014)</a>
        
            <li><a class="mainLink" href="/watch-rooster-doodle-doo-2014.html"
            title="Rooster Doodle-doo (2014)">Rooster Doodle-doo (2014)</a>
        
            <li><a class="mainLink" href="/watch-summer-s-shadow-2014.html"
            title="Summer's Shadow (2014)">Summer's Shadow (2014)</a>
        
            <li><a class="mainLink" href="/watch-a-long-way-down-2014.html"
            title="A Long Way Down (2014)">A Long Way Down (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-angriest-man-in-brooklyn-2014.html"
            title="The Angriest Man in Brooklyn (2014)">The Angriest Man in Brooklyn (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-red-house-2014.html"
            title="The Red House (2014)">The Red House (2014)</a>
        
            <li><a class="mainLink" href="/watch-one-small-hitch-2013.html"
            title="One Small Hitch (2013)">One Small Hitch (2013)</a>
        
            <li><a class="mainLink" href="/watch-blue-ruin-2013.html"
            title="Blue Ruin (2013)">Blue Ruin (2013)</a>
        
            <li><a class="mainLink" href="/watch-anna-2013.html"
            title="Anna (2013)">Anna (2013)</a>
        
            <li><a class="mainLink" href="/watch-dawn-of-the-planet-of-the-apes-2014.html"
            title="Dawn of the Planet of the Apes (2014)">Dawn of the Planet of the Apes (2014)</a>
        
		</ul>
		<ul>
        <li><a class="mainLink" href="/watch-the-art-of-the-steal-2013.html"
            title="The Art of the Steal (2013)">The Art of the Steal (2013)</a>
        
            <li><a class="mainLink" href="/watch-the-fault-in-our-stars-2014.html"
            title="The Fault in Our Stars (2014)">The Fault in Our Stars (2014)</a>
        
            <li><a class="mainLink" href="/watch-think-like-a-man-too-2014.html"
            title="Think Like a Man Too (2014)">Think Like a Man Too (2014)</a>
        
            <li><a class="mainLink" href="/watch-wings-sky-force-heroes-2014.html"
            title="Wings: Sky Force Heroes (2014)">Wings: Sky Force Heroes (2014)</a>
        
            <li><a class="mainLink" href="/watch-premature-2014.html"
            title="Premature (2014)">Premature (2014)</a>
        
            <li><a class="mainLink" href="/watch-the-immigrant-2013.html"
            title="The Immigrant (2013)">The Immigrant (2013)</a>
        
            <li><a class="mainLink" href="/watch-five-thirteen-2013.html"
            title="Five Thirteen (2013)">Five Thirteen (2013)</a>
        
            <li><a class="mainLink" href="/watch-i-ll-follow-you-down-2013.html"
            title="I'll Follow You Down (2013)">I'll Follow You Down (2013)</a>
        
            <li><a class="mainLink" href="/watch-war-of-the-worlds-goliath-2012.html"
            title="War of the Worlds: Goliath (2012)">War of the Worlds: Goliath (2012)</a>
        
            <li><a class="mainLink" href="/watch-killing-daddy-2014.html"
            title="Killing Daddy (2014)">Killing Daddy (2014)</a>

        </ul>
		<a class="showMore" href="/comedy-movies.html">more »</a>
		</section>
	</div>	
	</div>
</div>
</div>
<script type='text/javascript'> // Javascript for on.click button effects
	jQuery(function() {		
	$('ul#category-list li').click(function(){
		var number = $(this).index();
    	$('.sec').hide().eq(number).show();
    	$(this).toggleClass('active inactive');
    	$('ul#category-list li').not(this).removeClass('active').addClass('inactive');
	});
	$('ul#genre-list li').click(function(){
		var number = $(this).index();
    	$('.sec2').hide().eq(number).show();
    	$(this).toggleClass('active inactive');
    	$('ul#genre-list li').not(this).removeClass('active').addClass('inactive');
	});	
		$('.sec').not(':first').hide();
		$('.sec2').not(':first').hide();
	});
	
</script>
<script type='text/javascript'> // Javascript for movie image pop-up
	jQuery(function(){
	$('.hoverable').hover(function(){
		$(this).animate();
		$(this).toggleClass('transition');
		});
	});		
</script>
<script>
	jQuery(function($){
		var options = { $AutoPlay: true};
		var jssor_slider1 = new $JssorSlider$('gallery', options);
	});
</script>
</body>
</html>