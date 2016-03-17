<?php
	class Staff_model extends CI_Model {
		public function __construct()
		{
			$this->load->database();
		}

		public function get_details()
		{
			$this->load->helper('url');
			$email = $this->input->post('email');
			if($this->check_email($email))
			{
				$query = $this->db->get_where('staff', array('email' => $email));
				return $query->row_array();
			}
			else
			{
				return false;
			}
			
		}

		public function get_list()
		{
			$query = $this->db->get('staff');
			return $query->result_array();
		}

		public function get_modal_details($email)
		{
			$this->load->helper('url');
			$query = $this->db->get_where('staff', array('email' => $email));
			return $query->row_array();
			
		}

		//function to enter details into database
		public function set_details()
		{
			$this->load->helper('url');
			$this->load->library('upload');
			$time = time();

			//configurations for photo upload
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '8000';
			$config['max_width']  = '5920';
			$config['max_height']  = '4920';
			$config['file_name'] = str_replace(' ', '_',url_title($this->input->post('name'))."_".$time."_".$_FILES['photo']['name']);
			$this->upload->initialize($config);
			
			$filename = '';
			$email = $this->input->post('email');

			if(!($this->check_email($email)))
			{
				//if photo field is not empty upload the photo
				if($_FILES['photo']['name']!='')
				{
					$filename = str_replace(' ', '_',url_title($this->input->post('name'))."_".$time."_".$_FILES['photo']['name']);
					$this->upload->do_upload('photo');
					//echo "Uploaded successfully";
				}

				//Form details are stored in an array
				$data = array(
					'name' => ucwords($this->input->post('name')),
					'qualifications' => $this->input->post('all_qualifications'),
					'department' => $this->input->post('department'),
					'designation' => $this->input->post('designation'),
					'teaching_experience' => $this->input->post('teaching_experience'),
					'industrial_experience' => $this->input->post('industrial_experience'),
					'other_experience' => $this->input->post('other_experience'),
					'papers_published' => $this->input->post('papers_published'),
					'patents' => $this->input->post('patents'),
					'blog' => $this->input->post('blog'),
					'email' => $email,
					'address' => $this->input->post('address'),
					'phone' => $this->input->post('phone'),
					'photo' => $filename
					);
				$this->session->set_userdata($data);	// form details are stored in the session userdata
				return $this->db->insert('staff', $data);
			}
			else
			{
				return false; //Duplicate email condition
			}
		}

		//function to update the details in the database
		public function update_details($email)
		{
			$this->db->select('photo');
			$query = $this->db->get_where('staff', array('email' => $email));
			$old_photo = $query->row_array();
			$old_photo = $old_photo['photo'];
			$this->load->helper('url');
			$this->load->library('upload');
			$time = time();
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '4000';
			$config['max_width']  = '1920';
			$config['max_height']  = '1920';
			$config['file_name'] = str_replace(' ','_', url_title($this->input->post('name'))."_".$time."_".$_FILES['photo']['name']);
			$this->upload->initialize($config);
			$filename = '';
			$email = $this->input->post('email');
			if($_FILES['photo']['name']!='')
			{
				$filename = str_replace(' ', '_', url_title($this->input->post('name'))."_".$time."_".$_FILES['photo']['name']);
				$this->upload->do_upload('photo');
				//echo "Uploaded successfully";
				//unlink(base_url("uploads/".$old_photo));
				unlink('./uploads/'.$old_photo);
				$data = array(
					'name' => ucwords($this->input->post('name')),
					'qualifications' => $this->input->post('all_qualifications'),
					'department' => $this->input->post('department'),
					'designation' => $this->input->post('designation'),
					'teaching_experience' => $this->input->post('teaching_experience'),
					'industrial_experience' => $this->input->post('industrial_experience'),
					'other_experience' => $this->input->post('other_experience'),
					'papers_published' => $this->input->post('papers_published'),
					'patents' => $this->input->post('patents'),
					'blog' => $this->input->post('blog'),
					'email' => $email,
					'address' => $this->input->post('address'),
					'phone' => $this->input->post('phone'),
					'photo' => $filename
					);
			}
			else
			{
				$data = array(
					'name' => ucwords($this->input->post('name')),
					'qualifications' => $this->input->post('all_qualifications'),
					'department' => $this->input->post('department'),
					'designation' => $this->input->post('designation'),
					'teaching_experience' => $this->input->post('teaching_experience'),
					'industrial_experience' => $this->input->post('industrial_experience'),
					'other_experience' => $this->input->post('other_experience'),
					'papers_published' => $this->input->post('papers_published'),
					'patents' => $this->input->post('patents'),
					'blog' => $this->input->post('blog'),
					'email' => $email,
					'address' => $this->input->post('address'),
					'phone' => $this->input->post('phone'),
					);
			}
			$this->session->set_userdata($data);
			$this->db->where('email', $email);
			return $this->db->update('staff', $data);
		}
		public function delete_staff($email)
		{
			$this->load->helper('url');
			$query = $this->db->get_where('staff', array('email' => $email));
			$photo = $query->row_array();
			$photo = $photo['photo'];
			unlink('./uploads/'.$photo);
			return $this->db->delete('staff', array('email' => $email));
		}

		public function get_staff_names($search_item)
		{
			//echo $search_item;
			$this->db->select('name');
			$this->db->like('name', $search_item);
			$query = $this->db->get('staff');
			return $query->result_array();
		}

		//This function return true if email already exists
		public function check_email($email)
		{
			//$email = "checking@gmail.com";
			$query = $this->db->get_where('staff', array('email' => $email));
			if($query->num_rows() == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function validate_login()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$flag = true;
			/*$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);*/
			$check_user = "cea_staff";
			$check_pass = "attingalcea";

			if(($username == $check_user) && ($password == $check_pass))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}