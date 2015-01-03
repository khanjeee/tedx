<?php

class Speakers_Model  extends CI_Model  {
    
	
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('form');
    }
  
    
    function get_all_speakers()
    {
    	$arrSpeakers = array();
   		$this->db->select('*');
    	$query = $this->db->get('speaker_profiles');

    	if ($query->num_rows() > 0)
    	{
	    	foreach ($query->result() as $data )
	    	{
	    			
	    		 $arrSpeakers[] = $data;
	    	}
    	}
    	
    	return $arrSpeakers;
    	
    }
    
    
    function get_speaker_by_id($sSpeakerId='0')
    {
    	//echo $sSpeakerId; die;
    	$result = null;
    	$arrSpeakers = array();
    	$this->db->select('*');
    	
    	$query = $this->db->get_where('speaker_profiles', array('id' => $sSpeakerId));
    	
    
    	if ($query->num_rows() > 0)
    	{
    		$result=$query->result();
       	}
    	 
    	return $result;
    	 
    }
    
    
    function get_live_speakers()
    {
    	$arrSpeakers = array();
    	$this->db->select('*');
    	$query = $this->db->get_where('speaker_profiles', array('is_live' => 'yes'));
    	
    
    	if ($query->num_rows() > 0)
    	{
    		foreach ($query->result() as $data )
    		{
    
    			$arrSpeakers[] = $data;
    		}
    	}
    	 
    	return $arrSpeakers;
    	 
    }
    
    
    
		
}


