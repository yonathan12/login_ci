<?php
class Welcome extends CI_Model{
  public function Coba()
  {
      $data = array (
        "nama" => $this->input->post('nama', true), 
      );
  }  
}
?>