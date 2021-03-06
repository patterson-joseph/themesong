<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Api extends CI_Controller {

		public function queue_song() {
			$this->load->model('Themesong_model', 'themesong');
			$this->themesong->save_song($this->input->post());
			header('Content-Type: application/json');
			
			echo json_encode($this->input->post());
		}
	
		public function play_next_song() {
			$this->load->model('Themesong_model', 'themesong');
			$song = $this->themesong->get_next_song();
			
			if($song) {
				echo json_encode($song);
			}
		}
	
	}