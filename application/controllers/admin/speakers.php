<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Speakers extends CI_Controller {

	function __construct()
	{   
		
		
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('grocery_CRUD');
		$this->load->library('ion_auth');
				
		
		if (!$this->ion_auth->logged_in())
		{
			ci_redirect('authenticate/login');
		}
		
		if (!$this->ion_auth->is_admin())
		{
			$this->session->set_flashdata('message', 'You must be an admin to view this page');
			ci_redirect('');
		}
		
	}




	function index()
	{
		
		$data['year_id']= 1;
		$data['section_id']=1;
		$data['batch_year']=2013;
		$query = $this->db->get_where('assign_course',$data);
		
		$result=$query->result();
		if(!empty($result)){
			$this->pr($result);
			
		
		}
		foreach ($result as $key=>$data){
			
			echo $data->id."<br>";
		}
		//$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}



	function view()
	{		
		

		try{
			$crud = new grocery_CRUD();

			
			$crud->set_theme('datatables');
			$crud->set_table('speaker_profiles');
			$crud->set_subject('Speaker Profiles');
			$crud->required_fields('name','title','description','gender','is_live','poll_is_active');
			
			$crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_export();
			$crud->unset_print();
			
			
			$crud->columns('name','title','description','gender','is_live','poll_is_active');
			
			/*used to display fields when adding items*/
			$crud->fields('name','title','description','gender','is_live','poll_is_active');
			$crud->edit_fields('is_live','poll_is_active');
			
			
			
			
			/*used to change names of the fields*/
			
			$crud->display_as('name','Name');
		
			
			
			/*call back for edit form->passes value attribute with items value to the function*/
			/* /* $crud->callback_edit_field('section_id',array($this->sections,'get_sections_dropdown'));
			$crud->callback_edit_field('year_id',array($this->years,'get_years_dropdown'));
			$crud->callback_edit_field('batch_year',array($this->common,'get_batch_years_dropdown')); */ 
			
			
			/*callback for table view */
			/* $crud->callback_column('section_id',array($this->sections,'get_section_by_id'));
			$crud->callback_column('year_id',array($this->years,'get_year_by_id'));
			//$crud->callback_column('group_id',array($this->groups,'get_group_by_id'));
			
			//creating a user before creation of student
			$crud->callback_before_insert(array($this,'call_before_insert'));
			//deleting user from forum_users and users table
			$crud->callback_before_delete(array($this,'call_before_delete'));
			
			
			//after insert insertion to course_student
			$crud->callback_after_insert(array($this,'call_after_insert')); */
			
			$output = $crud->render();
			//$this->pr($output);

            $content = $this->load->view('admin/students.php',$output,true);
            // Pass to the master view
            $this->load->view('admin/master', array('content' => $content));


        }catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
    
	

	function call_before_insert($post_array){
		
		
			
		$username = $post_array['email'];
		$password = 'password';
		$email = $post_array['email'];
		$additional_data = array(
				'first_name' => $post_array['name'],
				'last_name' => $post_array['name'],
				'phone' => $post_array['phone']
		);
		
		/* * using transactions   * * */
		
		$this->db->trans_begin();
		
		/****Adding a user to PhpBB forum *****/
		//inserts user to forum_users table in PhpBB
		$forum_user_id=$this->phpbb_bridge->user_add($email,$username,$password);
		
		$group = array('2'); 
		//inserts user to users table 
		$user_id=$this->ion_auth->register($username, $password, $email, $additional_data, $group);

		if( (!empty($user_id) && (!empty($forum_user_id)) ) ){
		$post_array['user_id']=$user_id;
		$post_array['forum_id']=$forum_user_id;
		
		//commit if both transactions above were successfull
		$this->db->trans_commit();
		}
		
		else{
			/*ROlling back transaction*/
			$this->db->trans_rollback();
			
		}
		
		
		return $post_array;
		
	}
	
	function call_after_insert($post_array,$primary_key){
		
		//students info
		//$user_student_row=$this->students->get_student_row($primary_key);
		//$this->pr($user_student_id);
		$data=array();		
		$data['year_id']= $post_array['year_id'];
		$data['section_id']=$post_array['section_id'];
		$data['batch_year']=$post_array['batch_year'];
		
		//if items above in array are peresent in assign_course insert student and assign_course id to student_course
		$this->assign->is_assigned($data,$primary_key);
	}
	
function call_before_delete($user_student_id){
		
		//getting forums users id 
		$user_student_row=$this->students->get_student_row($user_student_id);
		$forum_id=$user_student_row->forum_id;
		$user_id=$user_student_row->user_id;
		
		
		if(		(!empty($forum_id)) && (!empty($user_id))		){  //default value of forum id in db is 0
			
			/*deletes the user from phpbb forum*/
			$this->phpbb_bridge->user_delete($forum_id);
			/*deletes user from users table Ion_auth*/
			$this->ion_auth->delete_user($user_id);
			/*deletes student from student_course*/
			$this->db->delete('student_course', array('student_id' => $user_student_id)); 
		
		}
}



}