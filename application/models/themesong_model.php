<?php
    class Themesong_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        
        public function get_next_song() {
            $query = $this->db->get_where('playlist', array('played' => 0), 1);
            return $query->row();
        }
        
        public function save_song($song) {
            
            $data = array(
                'email' => $song['email'],
                'songId' => $song['id']
            );
            
            $this->db->insert('playlist', $data);
        }
    }