<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Api extends CI_Controller {

		public function queue_song() {
			$this->load->model('Themesong_model', 'themesong');
			$this->themesong->save_song($this->input->post());
			header('HTTP/1.0 200 Song added to queue');
		}
	
		public function play_next_song() {
			$this->load->model('Themesong_model', 'themesong');
			$song = $this->themesong->get_next_song();
			
			if($song) {
				echo json_encode($song);
			} else {
				header('HTTP/1.0 400 No songs in queue');
			}
		}
	
	}