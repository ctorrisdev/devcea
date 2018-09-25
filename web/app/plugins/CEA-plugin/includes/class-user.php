<?php

/* file created by charles.torris@gmail.com */

class cea_user {

    public $id;
    public $userid;
    public $groupes = array();
    public $profil;

    function __construct($id) { //accept int OR login
        if(!is_int($id)){
            $profil = get_user_by('login', $id);
            $id = $profil->ID;
        } else {
            $profil = get_user_by('id',$id);
        }
        
        $this->id = $id;
        $this->userid = 'user_' . $id;
        $this->profil = $profil;
        $json = get_field('mes_groupes', $this->userid);
        if ($json) {
            $this->groupes = json_decode($json);
        }
        foreach ($this->groupes as $key => $id_groupe) {
            $this->groupes[$key] = intval($id_groupe);
        }
    }

    function add_groupe($id) {
        if (!in_array($id, $this->groupes)) {
            $this->groupes[] = $id;
        }
        $this->save();
    }

    function remove_groupe($id) {
        foreach ($this->groupes as $key => $id_groupe) {
            if (intval($id_groupe) == intval($id)) {
                unset($this->groupes[$key]);
            }
        }
        $this->save();
    }

    function is_in_group($id) {
        foreach ($this->groupes as $id_groupe) {
            if (intval($id_groupe) == intval($id)) {
                return(true);
            }
        }
        return(false);
    }

    function save() {
        $json = json_encode($this->groupes);
        update_field('mes_groupes', $json, $this->userid);
    }
    
    
    function get_all_posts($limit = 10) {    

        $args = array(
            'author' => $this->id,
            'post_status' => 'publish',
            'orderby' => 'post_date',
            'order' => 'DESC',
            'posts_per_page' => $limit
        );
        $current_user_posts = get_posts($args);
        return($current_user_posts);
    }
    
    function display_user_profile_form() {
        acf_form(array(
            'post_id' => 'user_' . $this->id,
            'post_title' => false,
            'fields' => array("titre", "biographie", "contact", "titre_de_la_timeline", "timeline"),
            'submit_value' => __('Sauvegarder', 'cea'),
            'return' => '/members/' . $this->profil->user_login
        ));
    }

}
