<?php 
function is_logged_in()
{
    $lib = get_instance(); //memanggil library CI
    if (!$lib->session->userdata('email')) {
        redirect('auth');
    } else {
        # code...
        $role_id = $lib->session->userdata('role_id');
        $menu = $lib->uri->segment(1);

        $queryMenu = $lib->db->get_where('user_menu',['menu' => $menu])->row_array();
        $menuId = $queryMenu['Id'];

        $userAccess = $lib->db->get_where('user_access_menu', [
            'role_id' => $role_id, 
            'menu_id' => $menuId
            ]);
        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
?>