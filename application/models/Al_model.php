<?php
	class Al_model extends CI_Model {
		public function __construct()
		{
			$this->load->database();
			$this->load->library('upload');
			$this->load->helper('url');
			date_default_timezone_set('Asia/Kolkata');
		}
		public function enter_detail_db()
		{
			$photo = $this->input->post('photo');
			$name = ucwords($this->input->post('name'));
			$passout_year = $this->input->post('passout_year');
			$all_qualifications = $this->input->post('all_qualifications');
			$department = $this->input->post('department');
			$work_history = ucwords($this->input->post('work_history'));
			$blog = $this->input->post('blog');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$photo_flag = $this->input->post('photo_flag');

			if(!$this->check_email($email))
			{
				$time = time();
				$created_date = date('Y-m-d H:i:s');

				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '4000';
				$config['max_width']  = '1920';
				$config['max_height']  = '1920';
				$config['file_name'] = str_replace(' ','_', url_title($name)."_".$time);
				$this->upload->initialize($config);

				if($photo_flag == "true")
				{
					$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
					$filename = str_replace(' ', '_', url_title($name)."_".$time.".".$ext);
					$data = array(
					'name' => $name,
					'passout_year' => $passout_year,
					'all_qualifications' => $all_qualifications,
					'department' => $department,
					'work_history' => $work_history,
					'blog' => $blog,
					'email' => $email,
					'phone' => $phone,
					'photo' => $filename,
					'created_date' => $created_date
					);
					$this->upload->do_upload('photo');
					return $this->db->insert('alumni', $data);
				}
				else
				{
					$data = array(
					'name' => $name,
					'passout_year' => $passout_year,
					'all_qualifications' => $all_qualifications,
					'department' => $department,
					'work_history' => $work_history,
					'blog' => $blog,
					'email' => $email,
					'phone' => $phone,
					'created_date' => $created_date
					);
					return $this->db->insert('alumni', $data);
				}
			}
			else
			{
				return false;
			}
		}
		public function check_email($email)
		{
			$query = $this->db->get_where('alumni', array('email' => $email));
			if($query->num_rows() == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function get_modal_details($email)
		{
			$query = $this->db->get_where('alumni', array('email' => $email));
			return $query->row_array();
			
		}
		public function update_modal_al_db()
		{
			$photo = $this->input->post('photo');
			$name = ucwords($this->input->post('name'));
			$passout_year = $this->input->post('passout_year');
			$all_qualifications = $this->input->post('all_qualifications');
			$department = $this->input->post('department');
			$work_history = ucwords($this->input->post('work_history'));
			$blog = $this->input->post('blog');
			$email_old = $this->input->post('email_old');
			$phone = $this->input->post('phone');
			$photo_flag = $this->input->post('photo_flag');
			$email = $this->input->post('email');

			$this->db->select('photo');
			$query = $this->db->get_where('alumni', array('email' => $email));
			$old_photo = $query->row_array();
			$old_photo = $old_photo['photo'];

			$time = time();
			$edited_date = date('Y-m-d H:i:s');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '4000';
			$config['max_width']  = '1920';
			$config['max_height']  = '1920';
			$config['file_name'] = str_replace(' ','_', url_title($name)."_".$time);
			$this->upload->initialize($config);

			if($photo_flag == "true")
			{
				$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
				$filename = str_replace(' ', '_', url_title($name)."_".$time.".".$ext);
				//$this->upload->do_upload('photo');
				if($old_photo != '')
				{
					unlink('./uploads/'.$old_photo);
				}
				$data = array(
					'name' => $name,
					'passout_year' => $passout_year,
					'all_qualifications' => $all_qualifications,
					'department' => $department,
					'work_history' => $work_history,
					'blog' => $blog,
					'email' => $email_old,
					'phone' => $phone,
					'photo' => $filename,
					'edited_date' => $edited_date
					);
				$this->upload->do_upload('photo');
				$this->db->where('email', $email);
				return $this->db->update('alumni', $data);
			}
			else
			{
				$data = array(
					'name' => $name,
					'passout_year' => $passout_year,
					'all_qualifications' => $all_qualifications,
					'department' => $department,
					'work_history' => $work_history,
					'blog' => $blog,
					'email' => $email_old,
					'phone' => $phone,
					'edited_date' => $edited_date
					);
				$this->db->where('email', $email);
				return $this->db->update('alumni', $data);
			}
		}
		public function get_list()
		{
			$query = $this->db->get('alumni');
			return $query->result_array();
		}
		public function delete_alumni()
		{
			$email = $this->input->post('email');
			$query = $this->db->get_where('alumni', array('email' => $email));
			$photo = $query->row_array();
			$photo = $photo['photo'];
			if($photo != '')
			{
				unlink('./uploads/'.$photo);
			}
			return $this->db->delete('alumni', array('email' => $email));
		}
	}