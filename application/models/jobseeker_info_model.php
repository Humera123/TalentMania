<?php
	class jobseeker_info_model extends CI_Model{

		/**
		 * connstructer to get database
		*/
		public function __construct(){
			$this->load->database();
		}

		/**
		 * query to  get jobseeker info
		*/

		public function get_jobseeker_info($cnic = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}

			if($cnic === FALSE){
				$this->db->order_by('jobseeker_info.created_at', 'DESC');
				//$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('jobseeker_info');
				return $query->result_array();
			}
			
			$query = $this->db->get_where('jobseeker_info', array('cnic' => $cnic));
			return $query->row_array();
		}

		/**
		 * query to  create jobseeker info
		*/

		public function create_post($post_image){
			//$slug = url_title($this->input->post('title'));
			$data = array(
				'cnic' => $this->input->jobseeker_info('cnic'),
				'first_name' =>$this->input->jobseeker_info('first_name'),
				'last_name' => $this->input->jobseeker_info('last_name'),
				'father_name' => $this->input->jobseeker_info('father_name'),
				'date_of_biirth' => $this->input->jobseeker_info('date_of_biirth'),
				'nationality' => $this->input->jobseeker_info('nationality'),
				'mobileno' => $this->input->jobseeker_info('mobileno'),
				'email' => $this->input->jobseeker_info('email'),
				'address' =>$this->input->jobseeker_info('address'),
				'city' => $this->input->jobseeker_info('city'),
				'country' =>$this->input->jobseeker_info('country'),
				'skype_id' => $this->input->jobseeker_info('skype_id'),
				'linkdin_profile' => $this->input->jobseeker_info('linkdin_profile'),
				'cnic_front' => $this->input->jobseeker_info('cnic_front'),
				'cnic_back' => $this->input->jobseeker_info('cnic_back'),
				'last_degree' => $this->input->jobseeker_info('last_degree')
			);
			return $this->db->insert('jobseeker_info', $data);
		}

		/**
		 * query to  delete jobseeker info
		*/

		public function delete_jobseeker_info($cnic){
			//$cnic_front_file_name = $this->db->select('cnic_front')->get_where('posts', array('cnic' => $cnic_front))->row()->cnic_front;
			//$cwd = getcwd(); // save the current working directory
			//$image_file_path = $cwd."\\assets\\images\\posts\\";
			//chdir($image_file_path);
			//unlink($image_file_name);
			//chdir($cwd); // Restore the previous working directory
			$this->db->where('cnic', $cnic);
			$this->db->delete('posts');
			return true;
		}

		/**
		 * query to  update jobseeker info
		*/

		public function update_jobseeker_info($cnic){
			
			$data = array(
				'cnic' => $this->input->jobseeker_info('cnic'),
				'first_name' =>$this->input->jobseeker_info('first_name'),
				'last_name' => $this->input->jobseeker_info('last_name'),
				'father_name' => $this->input->jobseeker_info('father_name'),
				'date_of_biirth' => $this->input->jobseeker_info('date_of_biirth'),
				'nationality' => $this->input->jobseeker_info('nationality'),
				'mobileno' => $this->input->jobseeker_info('mobileno'),
				'email' => $this->input->jobseeker_info('email'),
				'address' =>$this->input->jobseeker_info('address'),
				'city' => $this->input->jobseeker_info('city'),
				'country' =>$this->input->jobseeker_info('country'),
				'skype_id' => $this->input->jobseeker_info('skype_id'),
				'linkdin_profile' => $this->input->jobseeker_info('linkdin_profile'),
				'cnic_front' => $this->input->jobseeker_info('cnic_front'),
				'cnic_back' => $this->input->jobseeker_info('cnic_back'),
				'last_degree' => $this->input->jobseeker_info('last_degree')
			);
			$this->db->where('cnic', $this->input->jobseeker_info('cnic'));
			return $this->db->update('jobseeker_info', $data);
		}
		
	}