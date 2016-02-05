<?php

/**
 * 
 */
class Address extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->time = date('Y-m-d H:i:s');
        $this->user_id = $this->session->userdata('user_id');
        $this->load->model('address_model');
        $this->load->model('region_model');
    }

    public function index() {
        $user_id = $this->user_id;
        if ($user_id){
            $data['address'] = $this->address_model->address_list($user_id);    //收货地址列表
            $this->load->view('user/address',$data);
        } else {
            redirect('/user/login');
        }
    }

    public function address_add() {
        $data['province'] = $this->region_model->all_region(array('region_type'=>1, 'parent_id' => 1));
        $this->load->view('mobile/cart/address_add',$data);
    }

    public function ajax_region(){
        $type = intval($this->input->get('type'))+1;
        $parent_id = intval($this->input->get('parent_id'));
        $arr = $this->region_model->all_region(array('region_type'=> $type , 'parent_id' => $parent_id));
        echo json_encode(array('list'=>$arr,'type'=>$type));
    }

    public function address_check() {
        $formdata = json_decode($this->input->get('formdata'));
        $address_id = intval($this->input->get('address_id'));
        if(isset($formdata)){
            if ($formdata->consignee == '')
            {
                $err_msg = "收件人姓名不能为空！";
            }
            elseif ($formdata->province == '') 
            {
                $err_msg = '请选择省市!';
            }
            elseif ($formdata->city == '') 
            {
                $err_msg = '请选择市区!';
            }
            elseif ($formdata->district == '') 
            {
                $err_msg = '请选择县区!';
            }
            elseif ($formdata->address == '') 
            {
                $err_msg = '详细地址不能为空！';
            }
            elseif ($formdata->mobile == '') 
            {
                $err_msg = '手机号码不能为空！';
            }
            elseif (!preg_match('/^1[0-9]{10}$/', $formdata->mobile)) 
            {
                $err_msg = '手机号不正确或格式错误！';
            }

            if (isset($err_msg)){
                echo json_encode(array('mobile_check_err' => $err_msg));
                exit();
            }
            $formdata->user_id = $this->user_id;
            $formdata->create_admin = $this->user_id;
            $formdata->create_date = $this->time;
            //判断是否是默认地址 
            if(!empty($formdata->is_used)){
                $formdata->is_used = 1;
            }

            //写入数据db
            if(empty($address_id)){
                //如果为空，则插入新纪录
                $address_id = $this->address_model->address_insert($formdata);
                if(!empty($address_id)){
                    echo json_encode(array('mobile_check_err' => 1));
                }else{
                    echo json_encode(array('mobile_check_err' => '收货地址添加失败！'));
                }
            }else{
                // 否则，更新一条记录
                $update_num = $this->address_model->address_update($formdata, $address_id);
                if(!empty($update_num)){
                    echo json_encode(array('mobile_check_err' => 1));
                }else{
                    echo json_encode(array('mobile_check_err' => '收货地址更新失败！'));
                }
            }
        }        
    }


    public function address_editor($address_id) {

        $data['address'] = $this->address_model->all_address(array('user_id'=>$this->user_id, 'address_id' => $address_id));

        $data['province'] = $this->region_model->all_region(array('region_type'=>1, 'parent_id' => 1));

        $data['city'] = $this->region_model->all_region(array('region_type'=>2, 'parent_id' => $data['address']->province));
        $data['district'] = $this->region_model->all_region(array('region_type'=>3, 'parent_id' => $data['address']->city));

        $this->load->view('mobile/cart/address_editor',$data);
    }
    
    public function address_delete() {

        $address_id = intval($this->input->get('address_id'));

        $delete_num= $this->address_model->delete_address($address_id);

        if(!empty($delete_num)){
            echo json_encode(array('mobile_check_err' => 2));
        }
    }
    
    public function address_default(){
        $this->load->model('user_model');
        $address_id = intval($this->input->get('address_id'));
        $user_id = $this->session->userdata('user_id');
        $this->user_model->update_address_used($address_id,$user_id);
	$this->user_model->update(array('address_id'=>$address_id),$user_id);
        echo json_encode(array('error' => 0, 'msg' => '设置成功'));
    }

}