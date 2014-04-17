<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * API to return information about music pieces
 */

 //remove this only if you autoload REST_Controller in the autoload config
require APPPATH.'libraries/REST_Controller.php';

class Music extends REST_Controller{
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Music_model');
    }
    
    /**
     * Summary
     * @param Numeric $id
     */
    public function song_get($id)
    {
        $this->response($this->Music_model->get($id));
    }
    
    /**
     * Summary
     * @param Numeric $page Description
     * @param Numeric $limit Description
     */
    public function music_get($page, $limit = 10)
    {
        if($page <= 1 || $page == NULL)
        {
            $offset = 0;
        }
        else
        {
            $offset = ($page-1)*$limit;
        }
        $this->response($this->Music_model->get_batch($limit, $offset));
    }
}


/* End of file Music.php */
/* Location: ./application/controllers/api/Music.php */