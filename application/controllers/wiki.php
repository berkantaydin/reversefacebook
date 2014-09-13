<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Wiki extends CI_Controller {

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


        $person = $this->db->from('wiki')->where('id', $id)->limit('1')->get()->row();

        if (!isset($person->id) || ($person->id < 1))
		show_error("Information Removed or Not Exists", "410", "Sorry for inconvenience");

        $data['person'] = $person;

        $data['same_last'] = $this->db->select('id,name')->from('liste')->where('last_name', $person->last_name)->where('id !=', $person->id)->limit('28')->get()->result();
        $data['same_first'] = $this->db->select('id,name')->from('liste')->where('first_name', $person->first_name)->where('id !=', $person->id)->limit('28')->get()->result();
        $data['same_wiki'] = $this->db->select('id,name,short_desc')->from('wiki')->or_where_in('last_name', array($person->first_name, $person->last_name))->where('id !=', $person->id)->order_by('name','asc')->limit('28')->get()->result();

        //Stats Ekle -> Viewed
        #stats_add($person->id,"viewed");
        
        //$this->template->set_master_template('template_get');
        $this->template->write('title', convert_accented_characters($person->name));
        $this->template->write('description', 'about ' . convert_accented_characters($person->name));
        $this->template->write('name', convert_accented_characters($person->name));
        $this->template->write('image', "");
        $this->template->write('picture', "");
        $this->template->write_view('page', 'wiki/get', $data);
        $this->template->render();
    }

}

/* End of file wiki.php */
/* Location: ./application/controllers/wiki.php */
