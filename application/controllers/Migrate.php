<?php

class Migrate extends CI_Controller {

    public function index() {
        $this->load->library('migration');
        if ($this->migration->current()) {
            echo "Migrado com sucesso";
        } else {
            show_error($this->migration->error_string());
        }
    }

}