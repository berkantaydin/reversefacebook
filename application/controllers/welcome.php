<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        #if ($_SERVER['HTTP_HOST'] != "dev.face-finder.com")
        #    $this->output->cache(1440);

        $toplam = $this->db->count_all_results('liste');
        $random = rand(0, ($toplam - 40));


        $data['random_faces'] = $this->db->select('id,name')->from('liste')->limit('49', $random)->get()->result();
        $this->template->write_view('page', 'welcome', $data);
        $this->template->render();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
