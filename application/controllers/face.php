<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Face extends CI_Controller {

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
    public function get($genid = '') {

        $id = id_from_genid($genid);

        //Kullanıcı izni var mı?
        check_perm($id);


        $person = $this->db->select('id,name,first_name,last_name,gender,locale')->from('liste')->where('id', $id)->limit('1')->get()->row();

        if (!isset($person->id) || ($person->id < 1))
		show_error("Information Removed or Not Exists", "410", "Sorry for inconvenience");

        $person->picture = site_url('picture/large/' . genid_from_id($person->id));
        //$person->picture = "http://graph.facebook.com/".$person->id."/picture?type=large";

        $data['person'] = $person;

        $data['same_last'] = $this->db->select('id,name')->from('liste')->where('last_name', $person->last_name)->where('id !=', $person->id)->limit('28')->get()->result();
        $data['same_first'] = $this->db->select('id,name')->from('liste')->where('first_name', $person->first_name)->where('id !=', $person->id)->limit('28')->get()->result();
        $data['same_wiki'] = $this->db->select('id,name,short_desc')->from('wiki')->or_where_in('last_name', array($person->first_name, $person->last_name))->limit('28')->get()->result();

        //Stats Ekle -> Viewed
        stats_add($person->id,"viewed");
        
        //$this->template->set_master_template('template_get');
        $this->template->write('title', convert_accented_characters($person->name));
        $this->template->write('description', 'about ' . convert_accented_characters($person->name));
        $this->template->write('name', convert_accented_characters($person->name));
        $this->template->write('image', site_url('picture/square/' . genid_from_id($person->id)));
        $this->template->write('picture', $person->picture);
        $this->template->write_view('page', 'face/get', $data);
        $this->template->render();
    }

    public function getfrom404() {
        $istem = parse_url($_SERVER['REQUEST_URI']);

            $this->output->set_header("HTTP/1.0 200 OK");
            $this->output->set_header("HTTP/1.1 200 OK");
            $istem = parse_url($_SERVER['REQUEST_URI']);
            $i = $istem['path'];
            $flag404 = TRUE;
            $d = explode("/", $i, -1);
            $id = '';

            foreach ($d as $k) {
                if (strlen($k) > 2)
                    redirect();
                //Direkt ID ile içerik çekilmesi engelleniyor. Parçalar 2 şer harften büyük olamaz.

                if ($k == '')
                    continue;

                $k = (is_numeric($k) ? $k : '00');
                $id .= $k;
            }

            if ($id < 1)
		show_error("Information Removed or Not Exists", "410", "Sorry for inconvenience");

        $person = $this->db->select('id,name')->from('liste')->where('id', $id)->limit('1')->get()->row();

        if (!isset($person->id) || ($person->id < 1))
		show_error("Information Removed or Not Exists", "410", "Sorry for inconvenience");

        redirect(base_url() . 'face/get/'.genid_from_id($person->id) . '/' . url_title($person->name), 'location', 301);
    }

}

/* End of file face.php */
/* Location: ./application/controllers/face.php */
