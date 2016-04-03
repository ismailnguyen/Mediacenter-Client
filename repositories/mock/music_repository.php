<?php
	class MockMusicRepository {
		
		public function getAlbums() {
			$m = new Music();
			$m->title = "Diamond";
			$m->author = "Rihanna";
			$m->album = "Disturbia";
			$m->publication = date("Y-m-d H:i:s");
			$m->image = "http://mariahcareycollection.com/blog/HQ/R/Rihanna/rihanna-disturbia1.png";
			$m->genre = "Rap";
			$m->path = "http://songpk.mobi/dgmob/downloadfile/68029/They_Dont_Care_About_Us_(Michael_Jackson)(www.SongPK.mobi).mp3";

			$n = new Music();
			$n->title = "Bad";
			$n->author = "Michael Jackson";
			$n->album = "Thriller";
			$n->publication = date("Y-m-d H:i:s");
			$n->image = "https://upload.wikimedia.org/wikipedia/en/5/55/Michael_Jackson_-_Thriller.png";
			$n->genre = "Pop";
			$n->path = "http://songpk.mobi/dgmob/downloadfile/68029/They_Dont_Care_About_Us_(Michael_Jackson)(www.SongPK.mobi).mp3";

			
			return array(array($m, $m, $m, $m, $m, $m, $m),
							array($n, $n, $n, $n, $n, $n, $n)
						);
		}
	}
?>