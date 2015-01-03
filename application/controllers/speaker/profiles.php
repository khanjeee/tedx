<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profiles extends CI_Controller {

    function __construct()
    {

    	parent::__construct();
    	
    	$this->load->database();
    	$this->load->helper('url');
    	$this->load->helper('form');
   		$this->load->model('Speakers_Model','speakers');

    }

    function index()
    {
     // echo'<pre>'; print_r($this->speakers->get_all_speakers()); echo'</pre>'; die;
     $aSpeakers = $this->speakers->get_all_speakers();
     $this->load->view('speaker/profile', array('aSpeakers' => $aSpeakers));
     
    }
    
    function view()
    {
    	 //echo'<pre>'; echo ; echo'</pre>'; die;
    	$speakerId=$this->uri->segment(4);
    	$aSpeaker = $this->speakers->get_speaker_by_id($speakerId);
    	//echo'<pre>'; print_r($aSpeaker) ; echo'</pre>'; die;
    	$this->load->view('speaker/single_profile', array('aSpeakers' => $aSpeaker));
    	 
    }
    
    function live()
    {
    	//echo'<pre>'; echo ; echo'</pre>'; die;
    	
    	$aSpeaker = $this->speakers->get_live_speakers();
    	//echo'<pre>'; print_r($aSpeaker) ; echo'</pre>'; die;
    	$this->load->view('speaker/live_speakers', array('aSpeakers' => $aSpeaker));
    
    }
    
    function poll()
    {
    	if($this->input->post())
    	{
    		$data = $this->input->post();
    		//echo'<pre>'; print_r($this->input->post()) ; echo'</pre>'; die;
    		$insertData = array(
    				'speaker_id' => $data['speaker_id'],
    				'answer' => $data['answer'],
    				'comment' => $data['comment'],
    				'created' => date('Y-m-d H:i:sP')
    		);
    		
    		if($this->db->insert('polls', $insertData))
    		{
    			echo 'insertion successfull';
    			//$this->load->view('speaker/poll', array('aSpeakers' => $aSpeaker));
    			ci_redirect('polls/view/'.$data['speaker_id']);
    		}
    		else
    		{
    			echo 'insertion failed';
    		}
    	}
    	else
    	{
    		//echo'<pre>'; echo ; echo'</pre>'; die;
    		$speakerId=$this->uri->segment(4);
    		$aSpeaker = $this->speakers->get_speaker_by_id($speakerId);
    		//echo'<pre>'; print_r($aSpeaker) ; echo'</pre>'; die;
    		$this->load->view('speaker/poll', array('aSpeakers' => $aSpeaker));
    	}
    	
    
    }

    
   

 

}

?>