<?php

	class Staff extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->model('Staff_model');
			$this->load->helper('url_helper');
			$login = array(
				'state' => false
				);
			$this->session->set_userdata($login);
		}

		// function to enter the details
		public function enter()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('all_qualifications', 'Qualification', 'required');
			$this->form_validation->set_rules('teaching_experience', 'Teaching Experience', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('phone', 'Phone', 'required');
			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('staff/staff');	//Login form
				$this->load->view('templates/footer');
				//$this->load->view('staff/views', $data);
			}
			else
			{
				if($this->Staff_model->set_details())
				{
					$data['details'] = $this->session->all_userdata(); //retrieves session details
					$this->load->view("templates/header");
					$this->load->view("staff/success", $data);
					$this->load->view("templates/footer");
				}
				else
				{
					$this->load->view("templates/header");
					$this->load->view("staff/email_err");
					$this->load->view("templates/footer");
				}
			}
		}

		public function get()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('email', 'Email', 'required');
			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('staff/staff');
				$this->load->view('templates/footer');
			}
			else
			{
				if($data['staff'] = $this->Staff_model->get_details())
				{
					$this->load->view('templates/header');
					$this->load->view('staff/edit', $data);
					$this->load->view('templates/footer');
				}
				else
				{
					$this->load->view('templates/header');
					$this->load->view('staff/not_registered');
					$this->load->view('templates/footer');
				}
			}
		}

		public function get_det()
		{
			$enc_email = $this->input->post('enc_email');
			$email = base64_decode($enc_email);
			if(($this->Staff_model->check_email($email)))
			{
				$data['staff'] = $this->Staff_model->get_modal_details($email);
				$name = $data['staff']['name'];
				$all_qualifications = $data['staff']['qualifications'];
				$address = $data['staff']['address'];
				$teaching_experience = $data['staff']['teaching_experience'];
				$industrial_experience = $data['staff']['industrial_experience'];
				$other_experience = $data['staff']['other_experience'];
				$papers_published = $data['staff']['papers_published'];
				$patents = $data['staff']['patents'];
				$blog = $data['staff']['blog'];
				$email = $data['staff']['email'];
				$phone = $data['staff']['phone'];
				$photo = $data['staff']['photo'];
				$enc = rtrim(base64_encode($email),"=");
				echo '<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-6">
									<form id="update_form">
									<input type="hidden" id="encoded_email" value="'.$enc.'"/>
					<table class="table">
					<tr><td>Name: </td><td><input class="form-control" type="text" id="name" name="name" value="'.$name.'"/></td></tr>
					<tr><td>Qualification: </td><td>Basic<select class="form-control" type="text" id="basic_qualification" name="basic_qualification">
														<option value="BTech">BTech</option>
													    <option value="BE">BE</option>
													    <option value="Bsc">Bsc</option>
													    <option value="Msc">Msc</option>
													    <option value="MPhil">MPhil</option>
													    <option value="MTech">MTech</option>
													    <option value="ME">ME</option>
													    <option value="Phd">Phd</option>
													</select>Specialisation<input class="form-control" type="text" id="specialisation" name="specialisation"/>
												<a id="add_qualifications_link" href="#">Add</a></td></tr>
					<tr><td></td><td><textarea readonly placeholder="" class="form-control" type="text" id="all_qualifications" name="all_qualifications">'.$all_qualifications.'</textarea><a id="clear_qualifications" href="#">Clear</a></td></tr>
					<tr><td>Department: </td><td><select class="form-control" type="text" id="department" name="department">
													<option value="Computer Science">Computer Science</option>
												    <option value="Electronics and Communications">Electronics and Communications</option>
												    <option value="Electrical and Electronics">Electrical and Electronics</option>
												    <option value="General Engineering">General Engineering</option>
												</select></td></tr>
					<tr><td>Designation: </td><td><select class="form-control" type="text" id="designation" name="designation">
													<option value="Assistant Professor">Assistant Professor</option>
												    <option value="Associate Professor">Associate Professor</option>
												    <option value="Professor">Professor</option>
												</select></td></tr>
					<tr><td>Home Address: </td><td><input placeholder="Optional" value="'.$address.'"class="form-control" type="text" id="address" name="address"/></td></tr>
					<tr><td>Teaching Experience: </td><td><input value="'.$teaching_experience.'"class="form-control" type="text" id="teaching_experience" name="teaching_experience"/></td></tr>
					<tr><td>Industrial Experience: </td><td><textarea placeholder="Optional" class="form-control" type="text" id="industrial_experience" name="industrial_experience">'.$industrial_experience.'</textarea></td></tr>
					<tr><td>Other Experience: </td><td><textarea placeholder="Optional" class="form-control" type="text" id="other_experience" name="other_experience">'.$other_experience.'</textarea></td></tr>
					<tr><td>Papers Published: </td><td><textarea placeholder="Optional" class="form-control" type="text" id="papers_published" name="papers_published">'.$papers_published.'</textarea></td></tr>
					<tr><td>Patents: </td><td><textarea placeholder="Optional" class="form-control" type="text" id="patents" name="patents">'.$patents.'</textarea></td></tr>
					<tr><td>Website/Blog: </td><td><input value="'.$blog.'"placeholder="Optional" type="text" id="blog" name="blog" class="form-control"/></td></tr>
					<tr><td>Email: </td><td><input value="'.$email.'"autocomplete="off" class="form-control" type="text" id="email" name="email"/></td><td><div id="email_err"></div></td></tr>
					<tr><td>Phone: </td><td><input value="'.$phone.'"class="form-control" type="text" id="phone" name="phone"/></td></tr>
					<tr><td>Photo: </td><td><input type="file" id="photo" name="photo"/></td></tr>
					<tr><td></td><td><img id="photo_preview" class="img img-responsive" src="'.base_url("uploads/".$photo).'" width="200px"/></td></tr>
					<tr><td></td><td><input class="btn btn-success" id="update_modal_submit" name="submit" value="Update Details"/></td></tr>
					</table>
				</form></div></div>
								</div>
							</div>';
				//$this->load->view('templates/header', $data);
				//$this->load->view('staff/edit', $data);
				//$this->load->view('templates/footer');
			}
			else
			{
				echo "Email not present";
			}
		}

		public function get_email()
		{
			$search_item = $this->input->post('search_item');
			if($this->Staff_model->check_email($search_item))
			{
				echo "Email already registered! Use another one or click <a href='email_err'>here</a>";
			}
		}

		public function update($enc)
		{
			$email = base64_decode($enc);
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('all_qualifications', 'Qualification', 'required');
			$this->form_validation->set_rules('teaching_experience', 'Teaching Experience', 'required');
			$this->form_validation->set_rules('department', 'Department', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('phone', 'Email', 'required');
			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('staff/staff');
				$this->load->view('templates/footer');
				//$this->load->view('staff/views', $data);
			}
			else
			{
				if($this->Staff_model->update_details($email))
				{
					$data['details'] = $this->session->all_userdata();
					$this->load->view("templates/header");
					$this->load->view('staff/test');
					$this->load->view("templates/footer");
				}
				else
				{
					$this->load->view("templates/header");
					$this->load->view("staff/email_err");
					$this->load->view("templates/login_footer");
				}
			}
		}

		public function email_err()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->load->view("templates/header");
			$this->load->view("staff/email_err");
			$this->load->view("templates/login_footer");
		}
		public function logout()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			//$this->session->sess_destroy();
			$this->load->view('templates/login_header');
			$this->load->view('staff/login');
			$this->load->view('templates/login_footer');
			$login = array(
				'state' => false
				);
			//$this->session->set_userdata($login);
			//session_destroy();
		}
		public function delete($enc_email)
		{
			$email = base64_decode($enc_email);
			$this->Staff_model->delete_staff($email);
		}
		public function check($email)
		{
			$this->Staff_model->check_email($email);
		}
		public function login()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			//$data['staffs'] = $this->staff_model->get_details();

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() === FALSE)
			{
				//$this->load->view("templates/header");
				$this->load->view('templates/login_header');
				$this->load->view('staff/login');
				$this->load->view("templates/login_footer");
				//$this->load->view('staff/views', $data);
			}
			else
			{
				if($this->Staff_model->validate_login())
				{
					$login = array(
						'state' => true);
					//$this->session->set_userdata($login);
					$this->load->view('templates/header');
					$this->load->view('staff/staff');
					$this->load->view('templates/footer');
				}
				else
				{
					echo "Login unsuccessful";
				}
				//$this->load->view('staff/success');
			}
		}
		public function edit()
		{
			$data['staff'] = $this->Staff_model->get_details();
			$this->load->view('templates/header');
			$this->load->view('staff/edit', $data);
			$this->load->view('templates/footer');
		}
		
		public function listing()
		{
			$this->load->helper('form');
			$data['staff_list'] = $this->Staff_model->get_list();
			$this->load->view('templates/header');
			$this->load->view('staff/list', $data);
			$this->load->view('templates/footer');
		}
		public function test()
		{
			$this->load->helper('form');
			//$this->load->view('templates/header');
			$this->load->view('staff/test_app_page');
			$this->load->view('templates/footer');
		}
		public function update_modal($enc_email)
		{
			$email = base64_decode($enc_email);
			$this->Staff_model->update_details($email);
		}
		public function admin()
		{
			$this->load->helper('form');
			$this->load->view('templates/modern_admin_header');
			$this->load->view('staff/modern_admin');
			$this->load->view('templates/modern_admin_footer');
		}
		public function modern_list()
		{
			$this->load->helper('form');
			$data['staff_list'] = $this->Staff_model->get_list();
			$this->load->view('templates/modern_admin_header');
			$this->load->view('staff/modern_list', $data);
			$this->load->view('templates/modern_admin_footer');
		}
		public function modern_add()
		{
			$this->load->helper('form');
			$this->load->view('templates/modern_admin_header');
			$this->load->view('staff/modern_admin');
			$this->load->view('templates/modern_admin_footer');
		}
	}