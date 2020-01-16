<?php
class user_model extends CI_Model
{
	function can_login($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$query = $this->db->get('user');
		//SELECT * FROM users WHERE username = '$username' AND password = '$password'
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function userdetails(){
		$query = $this->db->get('user');
		return $query;
	}
	function fileupload_count(){
		$query = $this->db->get('fileupload');
		return $query;
	}
	function getfileupload(){
		$this->db->select("*");
		$this->db->from("fileupload");
		$this->db->join('user', 'fileupload.lecturer = user.username');
		$query = $this->db->get();
		return $query;
	}
	function getexternal(){
		$query = $this->db->get('external');
		return $query;
	}

	function update_user_account_data($data,$username){
			$this->db->where('username', $username);
			$this->db->update('user',$data);
    }

    function delete_user_account_data($username){
        $this->db->where("username",$username);
        $this->db->delete('user');
    }
    function fetch_single_data($username){
        $this->db->where('username', $username);
        $query = $this->db->get("user");
        return $query;
    }

	function fetch_single_file($file_name){
		$this->db->where('file_name', $file_name);
		$query = $this->db->get("fileupload");
		return $query;
	}

	function deleteFiles($name){
		$this->db->where("file_name",$name);
		$this->db->delete('fileupload');
	}

    function update_data($data,$username){
        $this->db->where('username', $username);
        $this->db->update("user",$data);
    }

	function fetch_data($query){
        $this->db->select("*");
        $this->db->from("user");
        if ($query != '') {
            $this->db->like('username', $query);
            $this->db->or_like('email', $query);
			$this->db->or_like('post', $query);
			$this->db->or_like('type', str_replace(' ', '_',$query));
        }
        $this->db->order_by('username', 'ASC');
        return $this->db->get();
	}

	function fetch_data_for_report($query){
		$this->db->select("*");
		$this->db->from("user");
		if ($query != '') {
			$this->db->like('username', $query);
			$this->db->or_like('post', str_replace(' ', '_',$query));
			$this->db->or_like('course_name', $query);
		}

		$this->db->order_by('type', 'ASC');
		return $this->db->get();
	}

	function insert_data($data,$username){
		$this->db->select("username");
		$this->db->from("user");
		$this->db->where('username', $username);
		$query = $this->db->get();
		if($query->num_rows()==0){
			$this->db->insert("user",$data);
			$this->session->set_flashdata('msg1', 'User account is created.');
			$this->session->set_flashdata('check', 'check');

		}else{
			$this->session->set_flashdata('msg', 'This user name is already exists.');
		}
	}

	function insert_messages($data){
		$this->db->insert("messages",$data);
	}

	function buckup_insert($data,$date){

		$this->db->select("*");
		$this->db->from("backup");
		$this->db->where('date', $date);
		$query = $this->db->get();
		if($query->num_rows()==0){
			$this->db->insert("backup",$data);
		}else{
			$this->session->set_flashdata('msgx', 'Already up to date..');
		}
	}

	function backup_fetch($query){
		$this->db->select("*");
		$this->db->from("backup");
		if ($query != '') {
			$this->db->like('date', $query);
		}
		$this->db->order_by('date', 'DESC');
		return $this->db->get();
	}
	function backup_fetch1(){
		$this->db->select_max('date');
		return $this->db->get('backup');
	}

	function autobackupdata(){
		$this->db->select('action');
		return $this->db->get('autobackup');
	}


    function insert_file($data,$filename){
		$this->db->select("file_name");
		$this->db->from("fileupload");
		$this->db->where('file_name', $filename);
		$query = $this->db->get();
		if($query->num_rows()==0){
			$this->db->insert("fileupload",$data);
			$this->session->set_flashdata('msg1', 'file successfully uploaded.');
			$this->session->set_flashdata('check', 'check');
		}else{
			$this->session->set_flashdata('msg', 'This file is already exists.');
		}
    }

    function insert_cat($data,$cat){
		$this->db->select("category");
		$this->db->from("category_data");
		$this->db->where('category', $cat);
		$query = $this->db->get();
		if($query->num_rows()==0){
			$this->db->insert("category_data",$data);
			$this->session->set_flashdata('msg1', 'Undergraduate course inserted..');
		}else{
			$this->session->set_flashdata('msg', '<b>'.str_replace('_','',strtoupper($cat)).'</b> is already exists.');
		}

    }

    function fetch_cat(){
        $query = $this->db->get("category_data");
        return $query;
    }
	function fetch_cat_postgraduate(){
		$query = $this->db->get("postgraduate");
		return $query;
	}
	function fetch_messages_for_announcement(){
		date_default_timezone_set("Asia/Colombo");
		$date= date("Y-m-d");
		$fromDate = date("Y-m-d", strtotime("-2 days"));
		$this->db->where('date >=', $fromDate);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get("messages");
		return $query;
	}

	function fetch_cat_External(){
		$query = $this->db->get("external");
		return $query;
	}
	function fetch_accounts(){
		$query = $this->db->get("user");
		return $query;
	}

    function delete_cat($category){
        $this->db->where("category",$category);
        $this->db->delete('category_data');
    }

	function delete_cat_postgraduate($category){
		$this->db->where("category",$category);
		$this->db->delete('postgraduate');
	}

	function delete_cat_external($category){
		$this->db->where("category",$category);
		$this->db->delete('external');
	}

    public function create_tables($name){

        $this->load->dbforge();
        $fields = array(
            'subject_code' => array(
                'type' => 'VARCHAR',
                'constraint' => 10,
            ),
            'subject_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
            ),
            'year' => array(
                'type' => 'VARCHAR',
                'constraint' => 10,
            ),
            'semester' => array(
                'type' => 'VARCHAR',
                'constraint' => 10,
            )
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('subject_code',true);
        $this->dbforge->create_table($name);
    }

    public function delete_tables($category){
        $this->load->dbforge();
        $this->dbforge->drop_table($category,true);
    }

    function insertdata($tname,$data,$subject_code){

		$this->db->select("subject_code");
		$this->db->from("$tname");
		$this->db->where('subject_code', $subject_code);
		$query = $this->db->get();
		if($query->num_rows()==0){
			$this->db->insert($tname,$data);
			$this->session->set_flashdata('msg1', 'New subject is successfully inserted');
		}else{
			$this->session->set_flashdata('msg', 'Subject code <b>'.str_replace('_','',strtoupper($subject_code)).'</b> is already exists.');
		}

    }

    function fetch_subject($category_name){
        $this->db->order_by('subject_code', 'ASC');
        $query = $this->db->get($category_name);
        $output = '<option value=""></option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->subject_code.'">'.$row->subject_code.'</option>';

        }
        return $output;
    }

    function fetch_subject_year($year,$category_name){
        $this->db->where('year', $year);
        $this->db->order_by('subject_code', 'ASC');
        $query = $this->db->get($category_name);
        $output = '<option value=""></option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->subject_code.'">'.$row->subject_code.'</option>';
        }
        return $output;
    }

    function fetch_subject_year_semester($year,$category_name,$semester){
        $this->db->where('year', $year);
        $this->db->where('semester', $semester);
        $this->db->order_by('subject_code', 'ASC');
        $query = $this->db->get($category_name);
        $output = '<option value="">select subject code</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->subject_code.'">'.$row->subject_code.'</option>';
        }
        return $output;
    }


    function fetch_category($query)
    {
        $this->db->select("*");
        $this->db->from("category_data");
        if ($query != '') {
            $this->db->like('category', $query);
        }
        $this->db->order_by('category', 'ASC');
        return $this->db->get();
    }

    function count_category()
    {
        $this->db->select("*");
        $this->db->from("category_data");
        return $this->db->get();
    }

    function count_category_p()
    {
        $this->db->select("*");
        $this->db->from("postgraduate");
        return $this->db->get();
    }

    function count_category_e()
    {
        $this->db->select("*");
        $this->db->from("external");
        return $this->db->get();
    }

	function fetch_post_graduate($query)
	{
		$this->db->select("*");
		$this->db->from("postgraduate");
		if ($query != '') {
			$this->db->like('category', $query);
		}
		$this->db->order_by('category', 'ASC');
		return $this->db->get();
	}

	function fetch_external($query)
	{
		$this->db->select("*");
		$this->db->from("external");
		if ($query != '') {
			$this->db->like('category', $query);
		}
		$this->db->order_by('category', 'ASC');
		return $this->db->get();
	}

    function fetch_doc($query,$currant_type,$currant_post,$document_type,$course_name)
    {
        $this->db->select("*");
        $this->db->from("fileupload");
		$this->db->join('user', 'fileupload.lecturer = user.username');
		if(($currant_type=='qac')||($currant_type=='head_of_institute')){

		}
		elseif(($currant_type=='under_graduate')&&($currant_post=='head_of_course')){
			$this->db->where('doc_type',$document_type);

		}
		elseif(($currant_type=='external')&&($currant_post=='head_of_course')){
			$this->db->where('doc_type',$document_type);

		}
		elseif(($currant_type=='post_graduate')&&($currant_post=='head_of_course')){
			$this->db->where('doc_type',$document_type);

		}
		elseif(($currant_type=='under_graduate')&&($currant_post=='course_coordinator')){
			$this->db->where('doc_type',$document_type);
			$this->db->where('category',$course_name);

		}
		elseif(($currant_type=='external')&&($currant_post=='course_coordinator')){
			$this->db->where('doc_type',$document_type);
			$this->db->where('category',$course_name);

		}
		elseif(($currant_type=='post_graduate')&&($currant_post=='course_coordinator')){
			$this->db->where('doc_type',$document_type);
			$this->db->where('category',$course_name);

		}
		elseif(($currant_type=='under_graduate')&&($currant_post=='lecturer')){
			$this->db->where('type','under_graduate');
			$this->db->where('username',$this->session->userdata('username'));

		}
		elseif(($currant_type=='post_graduate')&&($currant_post=='lecturer')){
			$this->db->where('type','post_graduate');
			$this->db->where('username',$this->session->userdata('username'));

		}
		elseif(($currant_type=='external')&&($currant_post=='lecturer')){
			$this->db->where('type','external');
			$this->db->where('username',$this->session->userdata('username'));

		}
		$this->db->like('file_name', $query);
        $this->db->order_by('file_name', 'ASC');
        return $this->db->get();
    }

    function fetch_data_cat_table($cat){
        $this->db->order_by('year', 'ASC');
        $this->db->order_by('semester', 'ASC');
        $this->db->order_by('subject_code', 'ASC');
        $query = $this->db->get($cat);
        return $query;
    }

    function rename_category($Oldname,$Newname){
        $this->load->dbforge();
        $this->dbforge->rename_table($Oldname, $Newname);
    }

    function update_data_category($Oldname,$Newname){
        $this->db->where('category', $Oldname);
        $this->db->update("category_data",$Newname);
    }
	function update_data_fileupload($Oldname,$Newname){
		$this->db->where('category', $Oldname);
		$this->db->update("fileupload",$Newname);
	}
	function update_data_user($Oldname,$Newname){
		$this->db->where('course_name', $Oldname);
		$this->db->update("user",$Newname);
	}

	function update_data_category_postgraduate($Oldname,$Newname){
		$this->db->where('category', $Oldname);
		$this->db->update("postgraduate",$Newname);
	}

	function update_data_category_external($Oldname,$Newname){
		$this->db->where('category', $Oldname);
		$this->db->update("external",$Newname);
	}

    function delete_cat_data($subject,$category){
        $this->db->where("subject_code",$subject);
        $this->db->delete($category);
    }

    function fetch_subject_cat($query){
        $this->db->select("*");
        $this->db->from($_SESSION['x']);
        if($query != ''){
            $this->db->like('subject_code', $query);
            $this->db->or_like('subject_name', $query);
        }
        $this->db->order_by('year', 'ASC');
        $this->db->order_by('semester', 'ASC');
        $this->db->order_by('subject_code', 'ASC');

        return $this->db->get();
    }

	function fetch_subject_cat_post_graduate($query){
		$this->db->select("*");
		$this->db->from($_SESSION['pg']);
		if ($query != '') {
			$this->db->like('subject_code', $query);
			$this->db->or_like('subject_name', $query);
		}
		$this->db->order_by('year', 'ASC');
		$this->db->order_by('semester', 'ASC');
		$this->db->order_by('subject_code', 'ASC');

		return $this->db->get();
	}

	function fetch_subject_cat_external($query){
		$this->db->select("*");
		$this->db->from($_SESSION['ext']);
		if ($query != '') {
			$this->db->like('subject_code', $query);
			$this->db->or_like('subject_name', $query);
		}
		$this->db->order_by('year', 'ASC');
		$this->db->order_by('semester', 'ASC');
		$this->db->order_by('subject_code', 'ASC');

		return $this->db->get();
	}

    function update_category_date($tname,$data,$old_subject_code){
        $this->db->where('subject_code', $old_subject_code);
        $this->db->update($tname,$data);
    }
	function update_category_fileupload($data,$old_subject_code){
		$this->db->where('subject_code', $old_subject_code);
		$this->db->update('fileupload',$data);
	}

    function verify_delete($username,$password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('type', 'admin');

        $query = $this->db->get('user');

        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    //------------------------------------------------------------------------------------------------------------------

	function fetch_subject_update($category_name){
		$this->db->order_by('subject_code', 'ASC');
		$query = $this->db->get($category_name);
		$output = '<option value=""></option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->subject_code.'">'.$row->subject_code.'</option>';

		}
		return $output;
	}

	function fetch_subject_year_update($year,$category_name){
		$this->db->where('year', $year);
		$this->db->order_by('subject_code', 'ASC');
		$query = $this->db->get($category_name);
		$output = '<option value=""></option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->subject_code.'">'.$row->subject_code.'</option>';
		}
		return $output;
	}

	function fetch_subject_year_semester_update($year,$category_name,$semester){
		$this->db->where('year', $year);
		$this->db->where('semester', $semester);
		$this->db->order_by('subject_code', 'ASC');
		$query = $this->db->get($category_name);
		$output = '<option value="">select subject code</option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->subject_code.'">'.$row->subject_code.'</option>';
		}
		return $output;
	}

	//------------------------------------------------------------------------------------------------------------------
	function fetch_single_data_users($username,$password){
		$this->db->where('username', $password);
		$this->db->where('username', $username);
		$query = $this->db->get("user");
		return $query;
	}

	function insert_External($data,$cat){


		$this->db->select("category");
		$this->db->from("external");
		$this->db->where('category', $cat);
		$query = $this->db->get();
		if($query->num_rows()==0){
			$this->db->insert("external",$data);
			$this->session->set_flashdata('msg1', 'External course successfully inserted.');
		}else{
			$this->session->set_flashdata('msg', '<b>'.str_replace('_','',strtoupper($cat)).'</b> is already exists.');
		}

	}
	function insert_Postgraduate($data,$cat){
		$this->db->select("category");
		$this->db->from("postgraduate");
		$this->db->where('category', $cat);
		$query = $this->db->get();
		if($query->num_rows()==0){
			$this->db->insert("postgraduate",$data);
			$this->session->set_flashdata('msg1', 'Undergraduate course inserted..');
		}else{
			$this->session->set_flashdata('msg', '<b>'.str_replace('_','',strtoupper($cat)).'</b> is already exists.');
		}

	}

	function fetch_category_type($account_type){

    	$type=str_replace("_",'',$account_type);
		$this->db->order_by('category', 'ASC');
		if($account_type=='under_graduate'){
			$query = $this->db->get('category_data');
			$output = '<option value=""></option>';
			foreach($query->result() as $row)
			{
				$output .= '<option value="'.$row->category.'">'.$row->category.'</option>';
			}
			return $output;
		}
		$query = $this->db->get($type);
		$output = '<option value=""></option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->category.'">'.$row->category.'</option>';
		}
		return $output;
	}

	function update_TYPE($data,$username){
		$this->db->where('username', $username);
		$this->db->update('user',$data);
	}

	function upload_details(){
		$query = $this->db->get('fileupload');
		return $query;
	}

	function update_action($data){
		$this->db->where('id',1);
		$this->db->update("autobackup",$data);
	}

	function insert_pin($data){
		$this->db->insert("pin",$data);
	}

	function get_pin(){
		return $this->db->get('pin');
	}














}
