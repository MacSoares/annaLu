<?php

class Template extends CI_Loader{

    public function load_template($view_file_name,$data_array=array()) {

        $ci =& get_instance();
        $ci->load->view("header");
        $ci->load->view($view_file_name,$data_array);
        $ci->load->view("footer");

    }

}
