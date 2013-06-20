<?php

class iklan_model extends app_base_model{

    function add_image($id, $image) {
        $data = array(
            'iklan_id' => $id,
            'image' => $image,
        );

        // xlog($data); exit;

        parent::before_save($data);
        $this->_db()->insert('image', $data);
    }

	
}