<?php

class iklan extends app_crud_controller{

	function _config_grid() {
        $config = parent::_config_grid();
        $config['fields'] = array('type_iklan', 'kategori', 'title','description', 'harga', 'kondisi', 'nego', 'call');
        $config['names'] = array('', '', '', '', '', '', '', '');
        $config['formats'] = array('param_short', 'param_short', '','plain_limit(50)');
        return $config;
    }

	function _save($id = null) {
        $this->_view = $this->_name . '/show';



        if ($_POST || $_FILES) {

            $_POST['id'] = $id;

                try {

                    if (!empty($_FILES['image']['name'][0])){
                        $i = 0;
                        foreach ($_FILES['image']['name'] as $key=>$file1) {
                            $config['allowed_types'] = 'gif|jpg|png|jpeg';
                            $config['upload_path'] = 'data/gallery/image';
                            $config['encrypt_name'] = true;
                            $config['field'] = 'image';
                            $this->load->library('upload', $config);
                            $this->upload->do_upload($config['field']);
                            $file1 = $this->upload->data();

                            $_POST['image'][$i] = @$file1[$key]['file_name'];
                            $i++;
                        }
					
                    }

                    $image = @$_POST['image'];

                    unset($_POST['image']);

                    $data = $_POST;


                    $new_id = $this->_model()->save($data, $id);;


                    if (!empty($id)) {
                        $new_id = $id;
                    }

                    if(!empty($image[0])){
                        foreach ($image as $key => $value) {
                            $this->_model()->add_image($new_id, $image[$key]);
                        }
                    }


                    $referrer = $this->session->userdata('referrer');
                    if (empty($referrer)) {
                        $referrer = $this->_get_uri('listing');
                    }

                    add_info( ($id) ? l('Record updated') : l('Record added') );

                    if (!$this->input->is_ajax_request()) {
                        redirect($referrer);
                    }
                } catch (Exception $e) {
                    add_error(l($e->getMessage()));
                }
            }
         else {
            if ($id !== null) {
                $this->_data['id'] = $id;
                

                $_POST = $this->_model()->get($id);

                $this->_data['file_image'] = $file_image = $this->db->query('SELECT * FROM image WHERE iklan_id = ? ORDER BY id ASC', $_POST['id'])->result_array();
                
                $config = array(
                    'fields' => array('image'),
                    'names' => array(''),
                    'formats' => array('callback__image'),
                    'actions' => array(
                        'delete' => 'gallery/delete_image/' . $id,
                    ),
                );

                $this->load->library('xgrid', $config, 'grid_image_attachment');
            }
            $this->load->library('user_agent');
            $this->session->set_userdata('referrer', $this->agent->referrer());
        }
        $this->_data['fields'] = $this->_model()->list_fields(true);
    }

    function delete_image($id, $image_id) {
        $this->db->where('id', $image_id)->delete('image');
        redirect('gallery/edit/' . $id);
    }

    function _image($value, $field_name, $row) {
        if (empty($value)) {
            $uri = "";
        } else {
            $uri = base_url('data/gallery/image/' . $value);
        }
        return '<a href ="' . $uri . '" class = "msgbox" target="blank"><img style="margin: 0; padding: 0;" src="' . $uri . '" width="40"/></a>';
    }

}