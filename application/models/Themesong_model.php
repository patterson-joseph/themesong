<?php
    class Themesong_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        
        public function get_next_song() {
            $query = $this->db->get('playlist', 1);
            $song = $query->row();
            
            $this->db->where('id', $song->id);
            $this->db->delete('playlist');
            
            return $song;
        }
        
        public function save_song($song) {
            $data = array(
                'artist' => $song['artist'],
                'song_name' => $song['song_name']
            );
            
            $this->db->insert('playlist', $data);
        }
    }