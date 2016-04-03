<?php
	class MockFilmRepository {
		
		public function getFilms() {
			$m = new Film();
			$m->title = "Titanic";
			$m->director = "Rihanna";
			$m->description = "Disturbia";
			$m->publication = date("Y-m-d H:i:s");
			$m->image = "http://mariahcareycollection.com/blog/HQ/R/Rihanna/rihanna-disturbia1.png";
			$m->path = "http://songpk.mobi/dgmob/downloadfile/68029/They_Dont_Care_About_Us_(Michael_Jackson)(www.SongPK.mobi).mp3";

			$n = new Film();
			$n->title = "Star Wars 7";
			$n->director = "Michael Jackson";
			$n->description = "Thriller";
			$n->publication = date("Y-m-d H:i:s");
			$n->image = "https://upload.wikimedia.org/wikipedia/en/5/55/Michael_Jackson_-_Thriller.png";
			$n->path = "http://songpk.mobi/dgmob/downloadfile/68029/They_Dont_Care_About_Us_(Michael_Jackson)(www.SongPK.mobi).mp3";

			
			return array(
							$m,
							$n
						);
		}
	}
?>