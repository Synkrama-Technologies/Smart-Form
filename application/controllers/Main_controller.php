<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
		$this->load->model('Form_Model');
		$this->load->model('Login_model');
	}

	public function index()
	{
		$this->load->view('user_login');
	}

	// LOGIN
	public function login()
	{
		// $this->load->view('user_login');
		$this->index();
	}

	// CHECK LOGIN
	public function verify_login()
	{
		$username1 = $this->input->POST('user_login_id');
		$password2 = md5($this->input->POST('user_password'));

		$data = array(
			'username' => $username1,
			'password' => $password2
		);
		// print_r($data);
		// echo "<br>";

		$check = $this->Login_model->auth_check($data);
		// print_r($check);
		// echo "<br>";

		if ($check != false) {

			$user = array(
				'id' => $check->id,
				'username' => $check->username
			);
			// print_r($user);
			$this->session->set_userdata($user);

			echo "
			    <script>
			        location.href = 'home';
			    </script>
			";
		} else {

			echo "
                    <script>
                        alert('Incorrect Email or Password');
                        location.href = 'login';
                    </script>
			";
		}
	}

	// LOGOUT
	public function logout()
	{
		$this->session->unset_userdata(array("id" => "", "username" => ""));
		$this->session->sess_destroy();
		redirect(base_url('index'));
	}



	// HOME PAGE
	public function home()
	{
		if (!$this->session->userdata('username')) {
			redirect(base_url('index'));
		}

		$data['client'] = $this->Form_Model->fetch_client();
		$this->load->view('home', $data);
	}

	public function manage_client()
	{
		if (!$this->session->userdata('username')) {
			redirect(base_url('index'));
		}

		$data['client'] = $this->Form_Model->fetch_client();
		$this->load->view('manage_client', $data);
	}

	public function client_registeration()
	{
		if (!$this->session->userdata('username')) {
			redirect(base_url('index'));
		}

		$this->load->view('client_registeration');
	}

	public function add_client()
	{
		$client_name = $this->input->POST('client_name');
		$client_url = $this->input->POST('client_url');
		$client_primary_email = $this->input->POST('client_primary_email');

		$data = array(
			'client_name' => $client_name,
			'client_url' => $client_url,
			'client_primary_email' => $client_primary_email
		);
		// print_r($data);
		// echo "<br><br>";

		$insert_data = $this->db->insert('client', $data);

		if ($insert_data) {
			echo "
                <script>
                    location.href = 'home';
                </script>
            ";
		} else {
			echo "
                <script>
                    alert('Client could not be added');
                    location.href = 'home';
                </script>
            ";
		}
	}

	public function contact_form()
	{
		if (!$this->session->userdata('username')) {
			redirect(base_url('index'));
		}

		$data['client'] = $this->Form_Model->fetch_client();
		$this->load->view('contact_form', $data);
	}





	// MANAGE CLIENTS
	public function delete_client()
	{
		if (isset($_POST['delete_confirm'])) {
			$client_id = $this->input->POST('client_id');
			// echo $client_id;

			$query_delete_client = "UPDATE client SET client_status=0 WHERE client_id='$client_id'";
			$result_delete_client = $this->db->query($query_delete_client);
			if ($result_delete_client) {
				// echo "Successfully deleted <br>";
				redirect(base_url('manage_client'));
			} else {
				redirect(base_url('manage_client'));
			}
		} else {
			redirect(base_url('manage_client'));
		}
	}

	public function update_client()
	{
		if (isset($_POST['update_confirm'])) {
			$client_id = $this->input->POST('client_id');
			$client_primary_email = $this->input->POST('client_primary_email');

			// echo $client_primary_email;

			$query_update_client = "UPDATE client SET client_primary_email='$client_primary_email' WHERE client_id='$client_id'";
			$result_update_client = $this->db->query($query_update_client);
			if ($result_update_client) {
				// echo "Successfully updated <br>";
				redirect(base_url('manage_client'));
			} else {
				redirect(base_url('manage_client'));
			}
		} else {
			redirect(base_url('manage_client'));
		}
	}

	public function edit_form()
	{
		if (isset($_POST['edit_button'])) {
			$client_id = $this->input->POST('client_id');
			// echo $client_id;
			$_SESSION['client_id'] = $client_id;

			$data['client_details'] = $this->Form_Model->fetch_client_details($client_id);
			$data['form'] = $this->Form_Model->fetch_edit_form($client_id);
			if ($data['form']) {
				$this->load->view('edit_form', $data);
			} else {
				$this->load->view('error_404');
			}
		} elseif (isset($_POST['edit_button']) && $_SESSION['client_id']) {
			$client_id = $this->input->POST('client_id');
			// echo $client_id;
			$_SESSION['client_id'] = $client_id;

			$data['client_details'] = $this->Form_Model->fetch_client_details($client_id);
			$data['form'] = $this->Form_Model->fetch_edit_form($client_id);
			if ($data['form']) {
				$this->load->view('edit_form', $data);
			} else {
				$this->load->view('error_404');
			}
		} elseif (!isset($_POST['edit_button']) && $_SESSION['client_id']) {
			$client_id = $_SESSION['client_id'];

			$data['client_details'] = $this->Form_Model->fetch_client_details($client_id);
			$data['form'] = $this->Form_Model->fetch_edit_form($client_id);
			if ($data['form']) {
				$this->load->view('edit_form', $data);
			} else {
				$this->load->view('error_404');
			}
		} else {
			redirect(base_url('manage_client'));
		}
	}

	public function view_form()
	{
		if (!$this->session->userdata('username')) {
			redirect(base_url('index'));
		}

		if (isset($_POST['view_button'])) {
			$form_id = $this->input->post('form_id');
			$_SESSION['form_id'] = $form_id;

			$data['form_data'] = $this->Form_Model->fetch_form_data($form_id);
			if ($data['form_data']) {
				$this->load->view('view_form', $data);
			} else {
				echo "
					<script>
						alert('No data found');
						window.location.href = 'edit_form';
					</script>
				";
			}
		} else {
			if ($_SESSION['form_id']) {
				$form_id = $_SESSION['form_id'];

				$data['form_data'] = $this->Form_Model->fetch_form_data($form_id);
				if ($data['form_data']) {
					$this->load->view('view_form', $data);
				} else {
					echo "
						<script>
							alert('No data found');
							window.location.href = 'edit_form';
						</script>
					";
				}
			} else {
				redirect(base_url('manage_client'));
			}
		}
	}

	public function submission_details()
	{
		if (!$this->session->userdata('username')) {
			redirect(base_url('index'));
		}

		if (isset($_POST['view_submission_button'])) {
			$form_id = $this->input->post('form_id');
			$_SESSION['form_id'] = $form_id;
			$data['form_detail'] = $this->Form_Model->fetch_submission_details($form_id);

			if ($data['form_detail']) {
				$this->load->view('submission_details', $data);
			} else {
				$this->load->view('error_404');
			}
		} else {
			if ($_SESSION['form_id']) {
				$form_id = $_SESSION['form_id'];
				$data['form_detail'] = $this->Form_Model->fetch_submission_details($form_id);

				if ($data['form_detail']) {
					$this->load->view('submission_details', $data);
				} else {
					$this->load->view('error_404');
				}
			} else {
				redirect(base_url('manage_client'));
			}
		}
	}

	public function view_submission()
	{
		if (!$this->session->userdata('username')) {
			redirect(base_url('index'));
		}

		$form_id = $this->input->post('form_id');
		// echo $form_id;
		$data['submission_with_group'] = $this->Form_Model->fetch_submission_with_group($form_id);
		$data['submission'] = $this->Form_Model->fetch_submission($form_id);
		if ($data['submission']) {
			$this->load->view('view_submission', $data);
		} else {
			echo "
				<script>
				alert('Data not found');
				window.location.href = 'edit_form';
				</script>
			";
		}
	}

	// UPDATE FORM
	public function update_form()
	{
		if (isset($_POST['update_data'])) {
			$form_id = $this->input->POST('form_id');
			$client_id = $this->input->POST('client_id');
			$form_title = $this->input->POST('form_title');
			$textarea_tags = $this->input->POST('textarea_tags');
			$textarea_tags = trim($textarea_tags);
			$textarea_html_tags = $this->input->POST('textarea_html_tags');
			$textarea_html_tags = trim($textarea_html_tags);


			$form_thank_you_message = $this->input->POST('form_thank_you_message');
			$form_error_message = $this->input->POST('form_error_message');
			$form_redirect_path = $this->input->POST('form_redirect_path');

			$form_lead_page = $this->input->POST('form_lead_page');
			$form_landing_page = $this->input->POST('form_landing_page');

			// $form_title = $_SESSION['form_name'];

			$query_form = "SELECT * FROM form WHERE client_id='$client_id' AND form_name='$form_title' ";
			$query_form = $this->db->query($query_form);
			if ($query_form->result()) {
				echo "
					<script>
					alert('Form Name alredy exists. Please enter a different name');
					window.location.href = 'view_form';
					</script>
				";
			} else {


				$query_form_1 = "SELECT * FROM form WHERE client_id='$client_id' AND form_id='$form_id' ";
				$query_form_1 = $this->db->query($query_form_1);
				$result_form_1 = $query_form_1->num_rows();
				if ($result_form_1 > 0) {
					foreach ($query_form_1->result() as $row) {
						$parent_id   = $row->parent_id;
						// echo $form_id ;
						// echo "<br><br>";
					}
				}

				$query_update_old = "UPDATE form SET form_status=1 WHERE form_id='$form_id' ";
				$query_update_old = $this->db->query($query_update_old);
				if ($query_update_old) {
					// echo "Successfully inserted <br>";
				}

				$query_insert_into_form = "INSERT INTO form(client_id,form_name,form_data,form_html,parent_id,form_thank_you_message,form_error_message,form_redirect_path,lead_page,landing_page) 
										VALUES('$client_id','$form_title','$textarea_tags','$textarea_html_tags','$parent_id','$form_thank_you_message','$form_error_message','$form_redirect_path','$form_lead_page','$form_landing_page')";
				$query_insert_into_form = $this->db->query($query_insert_into_form);
				if ($query_insert_into_form) {
					// echo "Successfully inserted <br>";

					$query_form = "SELECT * FROM form WHERE client_id='$client_id' AND form_name='$form_title' ";
					$query_form = $this->db->query($query_form);
					$result_form = $query_form->num_rows();
					if ($result_form > 0) {
						foreach ($query_form->result() as $row) {
							$form_id   = $row->form_id;

							$_SESSION['form_id'] = $form_id;

							// echo $form_id ;
							// echo "<br><br>";
						}
					}

					// echo $textarea_tags;
					// echo "<br><br>";


					$pattern = '/]/i';
					$textarea_tags = preg_replace($pattern, "", $textarea_tags);

					$pattern = '/" "/i';
					$textarea_tags = preg_replace($pattern, '""', $textarea_tags);
					// echo $textarea_tags;
					// echo "<br><br>";

					$textarea_tags = explode("\n", $textarea_tags);
					// print_r($textarea_tags);
					// echo "<br><br>";


					foreach ($textarea_tags as $tags) {
						if (empty($tags)) {
							continue;
						} else {

							$tags = trim($tags);
							$formItems = explode('"', $tags);

							$counter = 0;

							// var_dump($formItems);
							// echo "<br><br>";

							// echo "<hr> Tags : $tags <br><br>";
							$chunk_id = "";

							foreach ($formItems as $keys) {
								if (empty($keys)) {
									continue;
								} else {

									// echo "Keys : $keys <br><br>";

									if ($counter == 0) {
										$inputType = explode("[", $keys)[1];
										$inputType = trim($inputType);
										// echo "<br> Input Type: $inputType <br><br>";

										$query_elements = "SELECT * FROM form_elements WHERE form_element_name='$inputType' ";
										$query_elements = $this->db->query($query_elements);
										$result_elements = $query_elements->num_rows();
										if ($result_elements > 0) {
											foreach ($query_elements->result() as $row) {
												$form_element_id  = $row->form_element_id;

												$_SESSION['form_element_id'] = $form_element_id;

												// echo $form_element_id;
												// echo "<br><br>";
											}
										}

										$query_max_chunk_id = "SELECT max(chunk_id) AS chunk_id FROM form_structure ";
										$query_max_chunk_id = $this->db->query($query_max_chunk_id);
										$result_max_chunk_id = $query_max_chunk_id->num_rows();
										if ($result_max_chunk_id > 0) {
											foreach ($query_max_chunk_id->result() as $row) {
												$chunk_id   = $row->chunk_id;
												$chunk_id = $chunk_id + 1;

												$_SESSION['chunk_id'] = $chunk_id;
											}
										} else {
											$chunk_id = 1;
										}
									} else {
										$keyValue = explode(":", "$keys");
										$key = $keyValue[0];
										$value = $keyValue[1];

										// $key = trim($key);
										// $value = trim($value);

										// echo "Key: $key  <br>";
										// echo "Value: $value <br><br>";

										$form_element_id = $_SESSION['form_element_id'];


										$query_attributes = "SELECT * FROM form_elements_attribute WHERE form_element_id='$form_element_id' 
														AND attribute_value='$key' ";
										$query_attributes = $this->db->query($query_attributes);
										$result_attributes = $query_attributes->num_rows();
										if ($result_attributes > 0) {
											foreach ($query_attributes->result() as $row) {
												$form_elements_attribute_id   = $row->form_elements_attribute_id;

												$_SESSION['form_elements_attribute_id'] = $form_elements_attribute_id;

												// echo $form_elements_attribute_id;
												// echo "<br><br>";
											}
										}


										$query_max_structure_id = "SELECT max(form_structure_id) AS form_structure_id FROM form_structure ";
										$query_max_structure_id = $this->db->query($query_max_structure_id);
										$result_max_structure_id = $query_max_structure_id->num_rows();
										if ($result_max_structure_id > 0) {
											foreach ($query_max_structure_id->result() as $row) {
												$form_structure_id   = $row->form_structure_id;
												$form_structure_id = $form_structure_id + 1;

												$_SESSION['form_structure_id'] = $form_structure_id;
											}
										} else {
											$form_structure_id = 1;
										}


										$query_insert_into_structure = "INSERT INTO form_structure(form_structure_id ,form_id ,form_element_id ,form_elements_attribute_id ,element_value,chunk_id) 
									VALUES('$form_structure_id','$form_id','$form_element_id','$form_elements_attribute_id','$value','$chunk_id')";
										$query_insert_into_structure = $this->db->query($query_insert_into_structure);
										if ($query_insert_into_structure) {
											// echo "Successfully inserted <br>";
											// redirect(base_url('contact_form'));
											echo "
											<script>
											alert('Data updated successfully!');
											window.location.href = 'manage_client';
											</script>
										";
										} else {
											echo "
											<script>
											alert('Data not inserted in form_structure');
											window.location.href = 'manage_client';
											</script>
										";
										}
									}
									$counter++;
								}
							}
						}
					}
				} else {
					echo "
					<script>
					alert('Data not inserted in form');
					window.location.href = 'manage_client';
					</script>
				";
				}
			}
		}
	}






	// NEW CONTACT FORM
	public function regular_expression()
	{
		if (isset($_POST['save_data'])) {
			$client_id = $this->input->POST('client_id');
			$form_title = $this->input->POST('form_title');
			$textarea_tags = $this->input->POST('textarea_tags');
			$textarea_tags = trim($textarea_tags);
			$textarea_html_tags = $this->input->POST('textarea_html_tags');
			$textarea_html_tags = trim($textarea_html_tags);

			$form_thank_you_message = $this->input->POST('form_thank_you_message');
			$form_error_message = $this->input->POST('form_error_message');
			$form_redirect_path = $this->input->POST('form_redirect_path');

			$form_lead_page = $this->input->POST('form_lead_page');
			$form_landing_page = $this->input->POST('form_landing_page');

			$query_form = "SELECT * FROM form WHERE client_id='$client_id' AND form_name='$form_title' ";
			$query_form = $this->db->query($query_form);
			if ($query_form->result()) {
				echo "
					<script>
					alert('Form Name alredy exists. Please enter a different name');
					window.location.href = 'contact_form';
					</script>
				";
			} else {


				$query_insert_into_form = "INSERT INTO form(client_id ,form_name,form_data,form_html,form_thank_you_message,form_error_message,form_redirect_path,lead_page,landing_page) 
				VALUES('$client_id','$form_title','$textarea_tags','$textarea_html_tags','$form_thank_you_message','$form_error_message','$form_redirect_path','$form_lead_page','$form_landing_page')";
				$query_insert_into_form = $this->db->query($query_insert_into_form);
				if ($query_insert_into_form) {
					// echo "Successfully inserted <br>";

					$query_form = "SELECT * FROM form WHERE client_id='$client_id' AND form_name='$form_title' ";
					$query_form = $this->db->query($query_form);
					$result_form = $query_form->num_rows();
					if ($result_form > 0) {
						foreach ($query_form->result() as $row) {
							$form_id   = $row->form_id;

							$query_update_form = "UPDATE form SET parent_id='$form_id' WHERE form_id='$form_id' ";
							$query_update_form = $this->db->query($query_update_form);


							$_SESSION['form_id'] = $form_id;

							// echo $form_id ;
							// echo "<br><br>";
						}
					}

					// echo $textarea_tags;
					// echo "<br><br>";

					$pattern = '/]/i';
					$textarea_tags = preg_replace($pattern, "", $textarea_tags);

					$pattern = '/" "/i';
					$textarea_tags = preg_replace($pattern, '""', $textarea_tags);
					// echo $textarea_tags;
					// echo "<br><br>";

					$textarea_tags = explode("\n", $textarea_tags);
					// print_r($textarea_tags);
					// echo "<br><br>";


					foreach ($textarea_tags as $tags) {
						if (empty($tags)) {
							continue;
						} else {

							$tags = trim($tags);
							$formItems = explode('"', $tags);

							$counter = 0;

							// var_dump($formItems);
							// echo "<br><br>";

							// echo "<hr> Tags : $tags <br><br>";
							$chunk_id = "";

							foreach ($formItems as $keys) {
								if (empty($keys)) {
									continue;
								} else {

									// echo "Keys : $keys <br><br>";

									if ($counter == 0) {
										$inputType = explode("[", $keys)[1];
										$inputType = trim($inputType);
										// echo "<br> Input Type: $inputType <br><br>";

										$query_elements = "SELECT * FROM form_elements WHERE form_element_name='$inputType' ";
										$query_elements = $this->db->query($query_elements);
										$result_elements = $query_elements->num_rows();
										if ($result_elements > 0) {
											foreach ($query_elements->result() as $row) {
												$form_element_id  = $row->form_element_id;

												$_SESSION['form_element_id'] = $form_element_id;

												// echo $form_element_id;
												// echo "<br><br>";
											}
										}

										$query_max_chunk_id = "SELECT max(chunk_id) AS chunk_id FROM form_structure ";
										$query_max_chunk_id = $this->db->query($query_max_chunk_id);
										$result_max_chunk_id = $query_max_chunk_id->num_rows();
										if ($result_max_chunk_id > 0) {
											foreach ($query_max_chunk_id->result() as $row) {
												$chunk_id   = $row->chunk_id;
												$chunk_id = $chunk_id + 1;

												$_SESSION['chunk_id'] = $chunk_id;
											}
										} else {
											$chunk_id = 1;
										}
									} else {
										$keyValue = explode(":", "$keys");
										$key = $keyValue[0];
										$value = $keyValue[1];

										// $key = trim($key);
										// $value = trim($value);

										// echo "Key: $key  <br>";
										// echo "Value: $value <br><br>";

										$form_element_id = $_SESSION['form_element_id'];


										$query_attributes = "SELECT * FROM form_elements_attribute WHERE form_element_id='$form_element_id' 
														AND attribute_value='$key' ";
										$query_attributes = $this->db->query($query_attributes);
										$result_attributes = $query_attributes->num_rows();
										if ($result_attributes > 0) {
											foreach ($query_attributes->result() as $row) {
												$form_elements_attribute_id   = $row->form_elements_attribute_id;

												$_SESSION['form_elements_attribute_id'] = $form_elements_attribute_id;

												// echo $form_elements_attribute_id;
												// echo "<br><br>";
											}
										}


										$query_max_structure_id = "SELECT max(form_structure_id) AS form_structure_id FROM form_structure ";
										$query_max_structure_id = $this->db->query($query_max_structure_id);
										$result_max_structure_id = $query_max_structure_id->num_rows();
										if ($result_max_structure_id > 0) {
											foreach ($query_max_structure_id->result() as $row) {
												$form_structure_id   = $row->form_structure_id;
												$form_structure_id = $form_structure_id + 1;

												$_SESSION['form_structure_id'] = $form_structure_id;
											}
										} else {
											$form_structure_id = 1;
										}


										$query_insert_into_structure = "INSERT INTO form_structure(form_structure_id ,form_id ,form_element_id ,form_elements_attribute_id ,element_value,chunk_id) 
									VALUES('$form_structure_id','$form_id','$form_element_id','$form_elements_attribute_id','$value','$chunk_id')";
										$query_insert_into_structure = $this->db->query($query_insert_into_structure);
										if ($query_insert_into_structure) {
											// echo "Successfully inserted <br>";
											echo "
												<script>
												alert('Record inserted successfully!');
												window.location.href = 'contact_form';
												</script>
											";
										} else {
											echo "
												<script>
												alert('Record not inserted in form_structure');
												window.location.href = 'contact_form';
												</script>
											";
										}
									}
									$counter++;
								}
							}
						}
					}
				} else {
					echo "
					<script>
					alert('Record not inserted in form');
					window.location.href = 'contact_form';
					</script>
				";
				}
			}
		}
	}





	// SUBMIT THE FORM with JS
	public function test()
	{
		$this->load->view('test');
	}

	public function request_api()
	{
		// echo $this->input->post('form_id');
		if ($this->input->post('form_id')) {
			echo $this->Form_Model->fetch_api($this->input->post('form_id'));
		}
	}



	public function form_submission()
	{
		$form_id = $this->input->post('form_id_pass');
		$form_ip_address = $this->input->post('form_ip_address');
		$utm_source = $this->input->post('utm_source');

		if ($utm_source) {
		} else {
			$utm_source = "Direct";
		}
		// echo $utm_source;
		// echo "<br>";

		$query_form = $this->db->query(" SELECT * FROM `form` WHERE form_id= '$form_id' AND form_status=2 ");
		foreach ($query_form->result() as $row) {
			$form_id = $row->form_id;
			$parent_id = $row->parent_id;
			$client_id = $row->client_id;
			// echo $form_name;
			// echo "<br>";
		}

		$query_max_submission_id = $this->db->query(" SELECT max(form_submission_count) as form_submission_count FROM `form_submission`");
		foreach ($query_max_submission_id->result() as $row) {
			$form_submission_count = $row->form_submission_count;
			$form_submission_count = $form_submission_count + 1;

			$form_submission_count_temp = $form_submission_count;

			$data = array(
				'form_id' => $form_id,
				'form_submission_ip_address' => $form_ip_address,
				'utm_source' => $utm_source,
				'form_submission_count' => $form_submission_count
			);
			$query_insert_form_submission = $this->db->insert('form_submission', $data);
			if ($query_insert_form_submission) {
				// echo "<br>";
				// echo "Successfully inserted query_insert_form_submission";
				// echo "<br>";

				$data = array(
					'form_id' => $form_id,
					'client_id' => $client_id
				);
				$query_insert_form_client_relation = $this->db->insert('form_client_relation', $data);
				if ($query_insert_form_client_relation) {
					// echo "Successfully inserted query_insert_form_client_relation";
					// echo "<br>";
				}
			}
		}

		$query_structure = $this->db->query(" SELECT DISTINCT form_element_id FROM `form_structure` WHERE form_id= '$form_id' ");
		foreach ($query_structure->result() as $row) {
			$form_element_id = $row->form_element_id;
			// $form_elements_attribute_id  = $row->form_elements_attribute_id;
			// $element_value = $row->element_value;

			// echo "<br>NEW ELEMENT : ";
			// echo $form_element_id;
			// echo "<br>";

			$query_elements_attribute = $this->db->query(" SELECT * FROM `form_elements_attribute` WHERE form_element_id= '$form_element_id' AND attribute_value='name' ");
			foreach ($query_elements_attribute->result() as $row) {
				$form_elements_attribute_id = $row->form_elements_attribute_id;

				// echo "<br>form_elements_attribute_id : ";
				// echo $form_elements_attribute_id;
				// echo "<br>";

				$query_1 = $this->db->query(" SELECT * FROM `form_structure` WHERE form_id= '$form_id' AND form_elements_attribute_id=$form_elements_attribute_id ");
				foreach ($query_1->result() as $row) {
					$element_value = $row->element_value;
					$form_structure_id = $row->form_structure_id;

					// echo "Name : ";
					// echo $element_value;
					// echo "<br>";

					$form_element_submission_value = $this->input->post($element_value);
					// echo $form_element_submission_value;
					// echo "<br><br>";

					$data = array(
						'form_submission_count' => $form_submission_count,
						'form_id' => $form_id,
						'form_structure_id' => $form_structure_id,
						'form_element_id' => $form_element_id,
						'value' => $form_element_submission_value
					);
					// print_r($data);
					// echo "<br>";
					$query_insert_form_entry = $this->db->insert('form_entry', $data);
					if ($query_insert_form_entry) {
						// echo "Successfully inserted query_insert_form_entry";
						// echo "<br>";
					}
				}
			}

			// UPDATE form_label using chunk_id
			$query_form = $this->db->query(" SELECT * FROM `form_entry` WHERE form_id= '$form_id' ");
			foreach ($query_form->result() as $row) {
				$form_structure_id = $row->form_structure_id;
				$form_entry_id = $row->form_entry_id;

				$element_value = "";
				$query_form2 = $this->db->query(" SELECT * FROM `form_structure` WHERE form_id= '$form_id' AND form_structure_id='$form_structure_id' ");
				foreach ($query_form2->result() as $row) {
					$chunk_id = $row->chunk_id;

					$query_form3 = $this->db->query(" SELECT * FROM `form_structure` WHERE form_id= '$form_id' AND chunk_id='$chunk_id' AND form_elements_attribute_id BETWEEN 62 AND 72 ");
					foreach ($query_form3->result() as $row) {
						$element_value = $row->element_value;
					}
				}

				$query_update = $this->db->query(" UPDATE `form_entry` SET form_label='$element_value' WHERE form_id= '$form_id' AND form_entry_id= '$form_entry_id' ");
				if ($query_update) {
					//echo "Success";
				}
			}
		}


		$this->load->library('email');

		$query_client = $this->db->query(" SELECT * FROM `client` WHERE client_id= '$client_id' ");
		foreach ($query_client->result() as $row) {
			$client_primary_email = $row->client_primary_email;
			$client_name = $row->client_name;
		}


		$query_form = $this->db->query(" SELECT * FROM `form` WHERE form_id= '$form_id' ");
		foreach ($query_form->result() as $row) {
			$form_name = $row->form_name;
			$lead_page = $row->lead_page;
			$landing_page = $row->landing_page;
		}

		$query_timestamp = $this->db->query(" SELECT * FROM `form_submission` WHERE form_id= '$form_id' AND form_submission_count= '$form_submission_count_temp' ");
		foreach ($query_timestamp->result() as $row) {
			$added_datetime = $row->added_datetime;
			$form_submission_ip_address = $row->form_submission_ip_address;
			$utm_source = $row->utm_source;
		}

		$message_html = '
			<html>
				<head>
					<link rel="stylesheet" href="https://smartform.synkrama.dev/css/bootstrap.css">
					<link rel="stylesheet" href="https://smartform.synkrama.dev/css/registeration_form.css">
					<style>
						table {
							border-collapse: collapse;
					  	}
						
						tr{
							border-bottom: 1px solid grey !important;
						}

						@font-face {
							font-family: ProximaSoft-Regular;
							src: url("https://smartform.synkrama.dev/font/ProximaSoft-Regular.ttf");
						}

						body {
							font-family: ProximaSoft-Regular;
							font-weight: normal;
							font-style: normal;
							background-color: #fafafa;
						}

						.btn_style {
							display: inline-block;
							font-weight: 400;
							line-height: 1.5;
							color: #212529;
							background-color: #ff4321;
							color: white;
							width: 120px;
							margin: 0px 5px;
							border-radius: .25rem;
							text-align: center;
							text-decoration: none;
							vertical-align: middle;
							cursor: pointer;
							border: 1px solid transparent;
							padding: .375rem .75rem;
							font-size: 1rem;
						}
				
						.btn_style:hover {
							border-color: #e23010;
							background-color: #e23010;
							color: #fff;
						}
				
						.btn_style:focus {
							box-shadow: 0 0 0 0.25rem rgba(248, 78, 11, 0.5);
						}
					</style>
				<head>
				<body>
				
					<div style="background-color: grey; padding:50px;" align="center">
						<section style="background-color: white; width: 500px;">
							<br>
							<img src="https://smartform.synkrama.dev/images/logo3.png" alt="logo_image" width="240px">
							<br>
							<div align="center">
								<h1> Contact-Form-7 </h1>
							</div>
							<br>
							<div align="center">
								<table style="width: 400px;" class="table table-responsive">
									<tr>
										<td style="font-weight: 600;">Date & Time</td>
										<td>' . $added_datetime . '</td>
									</tr>
									<tr>
										<td style="font-weight: 600;">IP Address</td>
										<td>' . $form_submission_ip_address . '</td>
									</tr>
									<tr>
										<td style="font-weight: 600;">UTM Source</td>
										<td>' . $utm_source . '</td>
									</tr>
									<tr>
										<td style="font-weight: 600;">Client Name</td>
										<td>' . $client_name . '</td>
									</tr>
									<tr>
										<td style="font-weight: 600;">Lead Page</td>
										<td>' . $lead_page . '</td>
									</tr>
									<tr>
										<td style="font-weight: 600;">Landing Page</td>
										<td>' . $landing_page . '</td>
									</tr>
									<tr>
										<td style="font-weight: 600;">Form Name</td>
										<td>' . $form_name . '</td>
									</tr>
								
		';

		$query_mail = $this->db->query(" SELECT * FROM form_entry WHERE form_id='$form_id' AND form_submission_count='$form_submission_count_temp' ");
		foreach ($query_mail->result() as $row) {
			$form_label = $row->form_label;
			$value = $row->value;

			$message_html .= '
				<tr>
					<td style="font-weight: 600;">' . $form_label . '</td>
					<td>' . $value . '</td>
				</tr>
			';
		}


		$message_html .= '
								</table>
								<br>
								<form action="https://smartform.synkrama.dev/lead" method="POST">
									<input type="text" name="form_submission_count" value="' . $form_submission_count_temp . '" style="display:none;" hidden>
									<div align="center"><h3>Is this a quotable lead?</h3></div>
									<br>
									<div align="center">
										<button class="btn btn_style" type="submit" name="Yes">Yes</button>
										<button class="btn btn_style" type="submit" name="No">No</button>
									</div>
								</form>
								<br>
							</div>
						</section>
					</div>
				</body>
			</html>
		';


		$this->email->set_mailtype("html");

		$this->email->from('sourabh@synkrama.com', 'Sourabh');
		$this->email->to($client_primary_email, $client_name);

		$this->email->subject('Contact Form Submission "Synkrama Technologies"');
		$this->email->message($message_html);

		//Send mail 
		$send_mail = $this->email->send();

		if ($send_mail) {
			//$this->session->set_flashdata("email_sent", "Email sent successfully.");
			echo "
				<script>
				window.location.href = '../test';
				</script>
			";
		} else {
			//$this->session->set_flashdata("email_sent", "Error in sending Email.");
			echo "
				<script>
				alert('Email could not be sent');
				window.location.href = '../test';
				</script>
			";
		}
	}





	// MAIL CHECK
	public function hello()
	{
		$this->load->library('email');

		$client_id = 1;
		$form_id = 23;
		$form_submission_count_temp = 2;

		$query_client = $this->db->query(" SELECT * FROM `client` WHERE client_id= '$client_id' ");
		foreach ($query_client->result() as $row) {
			$client_primary_email = $row->client_primary_email;
			$client_name = $row->client_name;
		}

		$query_form = $this->db->query(" SELECT * FROM `form` WHERE form_id= '$form_id' ");
		foreach ($query_form->result() as $row) {
			$form_name = $row->form_name;
		}

		$message_html = '
		<html>
		
		<body>
		
			<div style="background-color: grey; padding:50px;" align="center">
				<section style="background-color: white; width: 500px;">
					<br>
					<div align="center">
						<h1>Contact-Form-7 </h1>
					</div>
					<br>
					<div align="center">
						<table style="width: 400px;" >
							<tr>
								<td>Time</td>
								<td>Date</td>
							</tr>
							<tr>
								<td>Lead Page</td>
								<td>abc.com</td>
							</tr>
							<tr>
								<td>Landing Page</td>
								<td>abc.com</td>
							</tr>
							<tr>
								<td>Form Name</td>
								<td>' . $form_name . '</td>
							</tr>
							
						';

		$query_mail = $this->db->query(" SELECT * FROM form_entry WHERE form_id='$form_id' AND form_submission_count='$form_submission_count_temp' ");
		foreach ($query_mail->result() as $row) {
			$form_label = $row->form_label;
			$value = $row->value;

			$message_html .= '
			<tr>
				<td>' . $form_label . '</td>
				<td>' . $value . '</td>
			</tr>
			';
		}


		$message_html .= '
				</table>
				<br><br>
				<form action="https://smartform.synkrama.dev/lead" method="POST">
					<input type="text" name="form_submission_count" value="' . $form_submission_count_temp . '" style="display:none;" hidden>
					<div align="center"><h3>Is this a quotable lead?</h3></div>
					<br>
					<div align="center">
						<button style="background-color: #096692; color:white; width:200px; height:40px;" type="submit" name="yes">Yes</button>
						<button style="background-color: #096692; color:white; width:200px; height:40px;" type="submit" name="no">No</button>
					</div>
				</form>
				<br>
		</section>
		</div>

		</body>

		</html>';


		$this->email->set_mailtype("html");

		$this->email->from('sourabh@synkrama.com', 'Sourabh');
		$this->email->to($client_primary_email, $client_name);

		$this->email->subject('Contact Form Submission "Synkrama Technologies"');
		$this->email->message($message_html);


		//Send mail 
		$send_mail = $this->email->send();

		if ($send_mail) {
			$this->session->set_flashdata("email_sent", "Email sent successfully.");
		} else {
			$this->session->set_flashdata("email_sent", "Error in sending Email.");
		}
	}

	public function lead()
	{

		if (isset($_POST['Yes'])) {
			$form_submission_count = $this->input->POST('form_submission_count');
			// echo $form_submission_count;
			// echo "<br>";
			// echo "yes";
			$client_response = "Qualified";

			$query_update = $this->db->query(" UPDATE `form_submission` SET client_response='$client_response' WHERE form_submission_count= '$form_submission_count' ");
			if ($query_update) {
				// echo "Success";
				echo "<br><br><br><div align='center'><h1>Thank You for the valuable feedback!!!</h1></div><br>";
			}
		}

		if (isset($_POST['No'])) {
			$form_submission_count = $this->input->POST('form_submission_count');
			// echo $form_submission_count;
			// echo "<br>";
			// echo "no";
			$client_response = "Unqualified";

			$query_update = $this->db->query(" UPDATE `form_submission` SET client_response='$client_response' WHERE form_submission_count= '$form_submission_count' ");
			if ($query_update) {
				// echo "Success";
				echo "<br><br><br><div align='center'><h1>Ohh no... We will get the lead the next time</h1></div><br>";
			}
		}
	}

	// UPDATE 
	public function update_query()
	{
		$form_id = 23;
		$query_form = $this->db->query(" SELECT * FROM `form_entry` WHERE form_id= '$form_id' ");
		foreach ($query_form->result() as $row) {
			$form_structure_id = $row->form_structure_id;
			$form_entry_id = $row->form_entry_id;

			$element_value = "";
			$query_form2 = $this->db->query(" SELECT * FROM `form_structure` WHERE form_id= '$form_id' AND form_structure_id='$form_structure_id' ");
			foreach ($query_form2->result() as $row) {
				$chunk_id = $row->chunk_id;

				$query_form3 = $this->db->query(" SELECT * FROM `form_structure` WHERE form_id= '$form_id' AND chunk_id='$chunk_id' AND form_elements_attribute_id BETWEEN 62 AND 72 ");
				foreach ($query_form3->result() as $row) {
					$element_value = $row->element_value;
				}
			}



			$query_update = $this->db->query(" UPDATE `form_entry` SET form_label='$element_value' WHERE form_id= '$form_id' AND form_entry_id= '$form_entry_id' ");
			if ($query_update) {
				//echo "Success";
			}
		}
	}
}
