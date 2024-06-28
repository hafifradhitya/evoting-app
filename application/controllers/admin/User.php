<?php

class User extends Admin_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }
    public function index(){
        $table = '';
        $data = $this->user_model->get_all();
        
        if (!empty($data)){
            $no = 1;
            foreach ($data as $val){
                $table .= '<tr>';
                $table .= '<td>'.$no.'</td>';
                $table .= '<td style="width:100px; text-align: center;"><div class="avatar avatar-sm"><img src="'. base_url('uploads/'.$val['avatar']).'" alt="" width="100"></div></td>';
                $table .= '<td>'.$val['name'].'</td>';
                $table .= '<td>'.$val['email'].'</td>';
                $table .= '<td>'.($val['status'] > 0? 'Aktif': 'Tidak Aktif').'</td>';
                $table .= '<td style="width:80px; text-align: center;">';
                $table .= '<button data-id="'.$val['id'].'" data-name="'.$val['name'].'" data-email="'.$val['email'].'" data-class="'.$val['class_id'].'" data-status="'.$val['status'].'" class="btn btn-sm btn-edit btn-success"><i class="fa fa-edit"></i></button>&nbsp;&nbsp;';
                $table .= '<button data-id="'.$val['id'].'" data-url="'.site_url('admin/user/delete').'" data-redirect="'. site_url('admin/user').'" class="btn btn-sm btn-delete btn-danger"><i class="fa fa-trash"></i></button>';
                $table .= '</td>';
                $table .= '</tr>';
                $no++;
            }
        }
        
        $this->view('user/tabel',[
           'table'  => $table,
           'nama_user' => $this->session->userdata('nama'),
           'classes' => $this->user_model->get_class()
        ]);
    }
    
    public function add(){
        $this->view('user/add', [
            'username' => $this->session->userdata('name')
        ]);
    }
    
    public function delete(){
        if ($this->user_model->delete(intval($this->post('id')))){
            $this->output([
                'error' => false
            ]);
        }else{
            $this->output([
                'error' => true,
                'pesan' => 'User tidak bisa dihapus'
            ]);
        }
    }
    
    public function edit($id) {
        $data = $this->user_model->get_data($id);
        $this->view('user/edit',[
            'field' => $data,
            'classes' => $this->user_model->get_class(),
            'username' => $this->session->userdata('name')
        ]);
    }
    
    public function save(){
        if (empty($this->post('name'))){
            $output = [
                'error' => true,
                'pesan' => 'Nama Lengkap Tidak Boleh Kosong'
            ];
        }elseif(empty ($this->post('email'))){
            $output = [
                'error' => true,
                'pesan' => 'Alamat Email Tidak Boleh Kosong'
            ];
        }elseif (!filter_var($this->post('email'), FILTER_VALIDATE_EMAIL)){
            $output = [
                'error' => true,
                'pesan' => 'Ini Bukan Alamat Email'
            ];
        }elseif (!$this->user_model->check_email($this->post('email'))){
            $output = [
                'error' => true,
                'pesan' => 'Alamat Email Sudah Terdaftar'
            ];
        }elseif (empty ($this->post('password'))){
            $output = [
                'error' => true,
                'pesan' => 'Password Wajib Diisi'
            ];
        }else{
            $data['name'] = $this->post('name');
            $data['email'] = $this->post('email');
            $data['password'] = password_hash($this->post('password'), PASSWORD_DEFAULT);
            $data['status'] = $this->post('status');
            $data['class_id'] = $this->post('class');
            $file = $this->_upload();
            
            if(is_string($file)){
                $output = [
                    'error' => true,
                    'pesan' => $file
                ];
            }else{
                $data['avatar'] = $file['file_name'];
                if ($this->user_model->save($data)){
                    $output = [
                        'url' => site_url('admin/user'),
                        'error' => false,
                    ];
                }else{
                    $output = [
                        'error' => true,
                        'pesan' => 'User Gagal Disimpan'
                    ];
                }
            }
            
        }
        $this->output($output);
    }
    
    public function update() {
        $id = empty($this->post('id'))?0: $this->post('id');
        $data['name'] = $this->post('name');
        $data['email'] = $this->post('email');
        $data['status'] = $this->post('status');
        $data['class_id'] = $this->post('class');
        
        if (empty($this->post('name'))){
            $output = [
                'error' => true,
                'pesan' => 'Nama Kelas Wajib Diisi'
            ];
        }else{
            if (!empty($this->post('password'))){
                $data['password'] = password_hash($this->post('password'), PASSWORD_DEFAULT);
            }
            
            if($_FILES['file']['size']!=0){
                $file = $this->_upload();
                $data['avatar'] = $file['file_name'];
                @unlink(FCPATH.'uploads/'.$this->post('old-img'));
            }
            
            if ($this->user_model->save($data, $id)){
                $output = [
                    'url' => site_url('admin/user'),
                    'error' => false,
                ];
            }else{
                $output = [
                    'error' => true,
                    'pesan' => 'Users Gagal Disimpan'
                ];
            }
        }
        $this->output($output);
    }
    
    protected function _upload(){
        $this->load->library('upload', [
            'upload_path' => FCPATH.'uploads/',
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size' => '2048000',
            'encrypt_name' => true
        ]);
        
        if($this->upload->do_upload('file')){
            return $this->upload->data();
        }else{
            return $this->upload->display_errors();
        }
    }
}