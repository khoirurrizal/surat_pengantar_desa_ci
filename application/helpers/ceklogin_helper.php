<?php 

	function is_logged_in()
	{
		$CI = get_instance();
		if(!$CI->session->userdata('nama_pengguna')) {
			redirect('auth');
		}
		// } else {			
		// 	$role_id = $CI->session->userdata('role_id');
		// 	$user_id = $CI->session->userdata('user_id');
			
		// 	$menu = $CI->uri->segment(1);

		// 	$queryMenu = $CI->db->get_where('user_menu', ['menu' => $menu])->row_array();

		// 	$menu_id = $queryMenu['id'];

		// 	$userAccess = $CI->db->get_where('user_acces_menu', [ 'user_id' => $user_id, 
		// 														'role_id' => $role_id,
		// 														'menu_id' => $menu_id
		// 														]); 

		// 	if($userAccess->num_rows() != $role_id )
		// 	{
		// 		if($userAccess->num_rows() != $user_id){
		// 		redirect('auth/blocked');
		// 		}
		// 	}
		// }
	}

	// function check_access($id, $user_id)
	// {
		
	// 	if($user_id == $id){
	// 		return "checked='checked'";
	// 	} 
	// }

	// function check_access_menu($user_id, $menu_id, $role_id)
	// {
		
		
	// 	$CI = get_instance();

	// 	$CI->db->where('user_id', $user_id);
	// 	$CI->db->where('role_id', $role_id);
	//  	$CI->db->where('menu_id', $menu_id);
	//  	$result = $CI->db->get('user_acces_menu');
		

	//  	if($result->num_rows() > 0)
	// 		{
	// 			 	return "checked='checked'";
				 
	// 		}

	// }