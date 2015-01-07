<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Polls extends CI_Controller {

	var $polled;
    function __construct()
    {

    	parent::__construct();
    	
    	$this->load->database();
    	$this->load->helper('url');
    	$this->load->helper('form');
    	$this->load->helper('cookie');
   		$this->load->model('Speakers_Model','speakers');
   		
   		$this->polled =  get_cookie('already_polled');
   		

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
    		
    		$arrPoll[0][0] ='<span>I WILL</span><br><strong>TAKE</strong><br><strong>ACTION</strong>';
    		$arrPoll[0][1] = 0;
    		 
    		$arrPoll[1][0] ='<span>MY OPINIONS</span><br><strong>HAVE BEEN</strong><br><strong>CHANGED</strong>';
    		$arrPoll[1][1] = 0;
    		 
    		$arrPoll[2][0] ='<span>I NEED TO</span><br><strong>THINK</strong><br><strong>ABOUT IT</strong>';
    		$arrPoll[2][1] = 0;
    		 
    		$arrPoll[3][0] = '<span>I WANT TO</span><br><strong>LEARN</strong><br><strong>MORE</strong>';
    		$arrPoll[3][1]  = 0;
    		
   			 if ($query->num_rows() > 0)
    		{
    			
    			
		    	foreach ($query->result() as $key=>$data )
		    	{
		    		
		    		
		    		 if($data->answer == 'mohc')
		    		 {
		    		 	$arrPoll[0][0] ='<span>I WILL</span><br><strong>TAKE</strong><br><strong>ACTION</strong>';
		    		 	$arrPoll[0][1]  = intval($data->votes);
		    		 	
		    		 }
		    		 elseif ($data->answer == 'iwlm')
		    		 {
		    		 	$arrPoll[1][0] ='<span>MY OPINIONS</span><br><strong>HAVE BEEN</strong><br><strong>CHANGED</strong>';
		    		 	$arrPoll[1][1] = intval($data->votes);
		    		 }
		    		 elseif ($data->answer == 'intt')
		    		 {
		    		 	$arrPoll[2][0] ='<span>I NEED TO</span><br><strong>THINK</strong><br><strong>ABOUT IT</strong>';
		    		 	$arrPoll[2][1] = intval($data->votes);
		    		 }
		    		 elseif ($data->answer == 'iwta')
		    		 {
		    		 	$arrPoll[3][0] ='<span>I WANT TO</span><br><strong>LEARN</strong><br><strong>MORE</strong>';
		    		 	$arrPoll[3][1]  = intval($data->votes);
		    		 }
		    	}
    		}
    		
    		//echo'<pre>'. json_encode($arrPoll,true); echo'</pre>'; die;
    
    		/* data: [
    		['Shanghai', 23.7],
    		['Lagos', 16.1],
    		['Instanbul', 14.2],
    		['Karachi', 14.0],
    		['Lima', 8.9]
    		] */
    		$this->load->view('polls', array('polled' => $this->polled,'aSpeakers' => $aSpeaker , 'aPolls'=> json_encode($arrPoll)));
     
    }
    
    function results()
    {
    	 $comments = array();
    	// echo'<pre>'; print_r($this->speakers->get_all_speakers()); echo'</pre>'; die;
    	//echo'<pre>'; echo ; echo'</pre>'; die;
    	$arrPoll = array();
    	
    	
    	
    	//getting comments 
    	$commentsQuery = $this->db->query("SELECT `comment` FROM polls
											WHERE TRIM(`comment`) <>''
											ORDER BY `created` DESC 
											LIMIT 3");
	    	if ($commentsQuery->num_rows() > 0)
	    	{
	    		foreach ($commentsQuery->result() as  $key=>$data)
	    		{
	    			$comments[$key] = $data->comment;
	    		}
	    	}
	    	
	    $aSpeaker = $this->speakers->get_live_speakers();
	    $speakerId =  $aSpeaker[0]->id;
    
    	$query = $this->db->query("SELECT COUNT(id) AS 'votes' , answer
    			FROM polls WHERE speaker_id = {$speakerId}
    			GROUP BY answer");
    
    			$arrPoll[0][0] ='<span>I WILL</span><br><strong>TAKE</strong><br><strong>ACTION</strong>';
    			$arrPoll[0][1] = 0;
    			 
    			$arrPoll[1][0] ='<span>MY OPINIONS</span><br><strong>HAVE BEEN</strong><br><strong>CHANGED</strong>';
    			$arrPoll[1][1] = 0;
    			 
    			$arrPoll[2][0] ='<span>I NEED TO</span><br><strong>THINK</strong><br><strong>ABOUT IT</strong>';
    			$arrPoll[2][1] = 0;
    			 
    			$arrPoll[3][0] = '<span>I WANT TO</span><br><strong>LEARN</strong><br><strong>MORE</strong>';
    			$arrPoll[3][1]  = 0;
    
    			if ($query->num_rows() > 0)
    			{
    			 
    			 
    			foreach ($query->result() as $key=>$data )
    			{
    
    
    			if($data->answer == 'mohc')
    			{
    			$arrPoll[0][0] ='<span>I WILL</span><br><strong>TAKE</strong><br><strong>ACTION</strong>';
    			$arrPoll[0][1]  = intval($data->votes);
    
    			}
    			elseif ($data->answer == 'iwlm')
    			{
    			$arrPoll[1][0] ='<span>MY OPINIONS</span><br><strong>HAVE BEEN</strong><br><strong>CHANGED</strong>';
    			$arrPoll[1][1] = intval($data->votes);
    			}
    				elseif ($data->answer == 'intt')
    				{
    						$arrPoll[2][0] ='<span>I NEED TO</span><br><strong>THINK</strong><br><strong>ABOUT IT</strong>';
    						$arrPoll[2][1] = intval($data->votes);
    			}
    			elseif ($data->answer == 'iwta')
    					{
    					$arrPoll[3][0] ='<span>I WANT TO</span><br><strong>LEARN</strong><br><strong>MORE</strong>';
    					$arrPoll[3][1]  = intval($data->votes);
    				}
    			}
    			}
    
    			//echo'<pre>'. json_encode($arrPoll,true); echo'</pre>'; die;
    
    			/* data: [
    			['Shanghai', 23.7],
    			['Lagos', 16.1],
    			['Instanbul', 14.2],
    			['Karachi', 14.0],
    			['Lima', 8.9]
    			] */
    			$this->load->view('results', array('comments' => $comments ,'polled' => $this->polled,'aSpeakers' => $aSpeaker , 'aPolls'=> json_encode($arrPoll)));
    			 
    			}
 

}

?>