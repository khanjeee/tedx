<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Polls extends CI_Controller {

    function __construct()
    {

    	parent::__construct();
    	
    	$this->load->database();
    	$this->load->helper('url');
    	$this->load->helper('form');
   		$this->load->model('Speakers_Model','speakers');

    }

    function view()
    {
     // echo'<pre>'; print_r($this->speakers->get_all_speakers()); echo'</pre>'; die;
     //echo'<pre>'; echo ; echo'</pre>'; die;
    	$arrPoll = array();
    		$speakerId=$this->uri->segment(3);
    		$aSpeaker = $this->speakers->get_speaker_by_id($speakerId);
    		//echo'<pre>'; print_r($aSpeaker) ; echo'</pre>'; die;
    		
    		//creating polls data 
    		
    		$query = $this->db->query("SELECT COUNT(id) AS 'votes' , answer 
    									FROM polls WHERE speaker_id = {$speakerId}
    									GROUP BY answer");
   			 if ($query->num_rows() > 0)
    		{
		    	foreach ($query->result() as $key=>$data )
		    	{
		    		
		    		
		    		 if($data->answer == 'mohc')
		    		 {
		    		 	$arrPoll[$key]->answer ='MY OPINIONS HAVE BEEN CHANGED';
		    		 	$arrPoll[$key]->votes  = $data->votes;
		    		 	
		    		 }
		    		 elseif ($data->answer == 'iwlm')
		    		 {
		    		 	$arrPoll[$key]->answer ='I WANT TO LEARN MORE';
		    		 	$arrPoll[$key]->votes  = $data->votes;
		    		 }
		    		 elseif ($data->answer == 'intt')
		    		 {
		    		 	$arrPoll[$key]->answer ='I NEED TO THINK ABOUT IT';
		    		 	$arrPoll[$key]->votes  = $data->votes;
		    		 }
		    		 elseif ($data->answer == 'iwta')
		    		 {
		    		 	$arrPoll[$key]->answer ='I WILL TAKE ACTION';
		    		 	$arrPoll[$key]->votes  = $data->votes;
		    		 }
		    	}
    		}
    		
    		//echo'<pre>'; print_r($arrPoll) ; echo'</pre>'; die;
    
    		
    		$this->load->view('polls', array('aSpeakers' => $aSpeaker , 'aPolls'=> json_encode($arrPoll)));
     
    }
    

 

}

?>