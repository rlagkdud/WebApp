<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<?php $song_count = 5678; ?>
			<p>
				I love music.
				I have <?=$song_count ?> total songs,
				which is over <?=(int) ($song_count/10) ?> hours of music!
			</p>
		

		<!-- Ex 2: Top Music News (Loops) -->
		<?php 
			$new_pages = 5;
		?>
		<!-- Ex 3: Query Variable -->
		<?php 			
			if(isset($_GET["newspages"])) $new_pages = (int) $_GET["newspages"];
 		?>
		<div class="section">
			<h2>Billboard News</h2>
		
			<ol>
				<?php
					for($i=0; $i<$new_pages; $i++){
						$year = 2019;
						$month = 11-$i;
						if(($month<=0)){
							$year--;
							$month = $month+12;
						}
						if($month<10){
							$month = "0".$month;
						} 
						?>
			    		<li><a href="https://www.billboard.com/archive/article/<?=$year.$month ?>"><?="$year-$month"?></a></li>
			    	<?php }?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<?php
			$favartists=array(
				"Guns N'Roses",
				"Green Day",
				"Blink182",
				"Queen"
			);
		?>	
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
		
			<ol>
				<!-- <?php foreach($favartists as $favartist){ ?> -->
						<!--<?php print "<li>$favartist</li>\n"; ?> -->
					<!-- <?php } ?> -->
					<?php 
					$lines = file("favorite.txt");
					foreach ($lines as $line) {
						$a = explode(" ", $line);
						$s = implode("_", $a);
					?>
					<li><a href="http:/\/en.wikipedia.org/wiki/<?=$s?>"><?=$line?></a></li>
					<?php } ?>
			</ol>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php
				$songs = glob("lab5/musicPHP/songs/*.mp3");
				$songsizes = array();
				foreach ($songs as $song) {
					$songsizes[$song] = filesize($song);
				}
				arsort($songsizes);
				foreach ($songsizes as $song => $songsize) {
					?>
					<li class="mp3item">
						<a href="<?=$song?>">
							<?=basename($song)?>
						</a>
						(<?=(int)($songsize/1024).' KB'?>)
					</li>					
				<?php } ?>

				<!-- Exercise 8: Playlists (Files) -->
				<?php
				$pls= glob("lab5/musicPHP/songs/*.m3u");
				rsort($pls);
				foreach ($pls as $pl) {?>				
					<li class="playlistitem">
					<?=basename($pl)?>
					</li>
					<?php 
					$no_cmmnts = array();
					$contents = file($pl);
					foreach ($contents as $content) {
						if(strpos($content, '#') === false){
							array_push($no_cmmnts, $content);
						}
					}?>
					<ul>
						<?php
						shuffle($no_cmmnts); 
						foreach ($no_cmmnts as $no_cmmnt) {?>
							<li><?= $no_cmmnt ?></li>
						<?php } ?>
					</ul>
				<?php } ?>

					
					
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
