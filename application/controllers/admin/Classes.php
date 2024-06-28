<?php

class Classes extends Admin_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('classes_model');
    }
    public function index(){
        $table = '';
        $data = $this->classes_model->get_all();
        
        if (!empty($data)){
            $no = 1;
            foreach ($data as $val){
                $table .= '<tr>';
                $table .= '<td>'.$no.'</td>';
                $table .= '<td>'.$val['name'].'</td>';
                $table .= '<td style="width:100px; text-align: center;">';
                $table .= '<button data-id="'.$val['id'].'" data-name="'.$val['name'].'" class="btn btn-sm btn-edit btn-success"><i class="fa fa-edit"></i></button>&nbsp;&nbsp;';
                $table .= '<button data-id="'.$val['id'].'" data-url="'.site_url('admin/classes/delete').'" data-redirect="'.site_url('admin/classes').'" class="btn btn-sm btn-delete btn-danger"><i class="fa fa-trash"></i></button>';
                $table .= '</td>';
                $table .= '</tr>';
                $no++;
            }
        }
        
        
        $this->view('classes/tabel', [
           'table' => $table,
           'username' => $this->session->userdata('name')
        ]);
    }
        
    public function add(){
        $this->view('classes/add', [
            'username' => $this->session->userdata('name')
        ]);
    }
    
    public function delete(){
        if ($this->classes_model->delete(intval($this->post('id')))){
            $this->output([
               'error'  => false
            ]);
        }else {
            $this->output([
                'error' => true,
                'pesan' => 'Kelas tidak bisa dihapus'
            ]);
        }
    }
    
    public function edit($id){
        $data = $this->classes_model->get_data($id);
        $this->view('classes/edit', [
           'field'  => $data,
           'username' => $this->session->userdata('name')
        ]);
    }
    
    public function save(){
        if (empty($this->post('name'))){
            $output = [
                'error' => true,
                'pesan' => 'Nama Kelas Tidak Boleh Kosong'
            ];
        }else{
            $data['name'] = $this->post('name');
            if ($this->classes_model->save($data)){
                $output = [
                    'url' => site_url('admin/classes'),
                    'error' => false,
                ];
            }else{
                $output = [
                    'error' => true,
                    'pesan' => 'Kelas Gagal Disimpan'
                    ];
                }
            }
            
            $this->output($output);
    }
    
    public function update() {
        $id = empty($this->post('id'))?0: $this->post('id');
        $data = [
            'name' => $this->post('name')
        ];
        if (empty($this->post('name'))){
            $output = [
                'error' => true,
                'pesan' => 'Nama Kelas Wajib Diisi'
            ];
        }else{
            if ($this->classes_model->save($data, $id)){
                $output = [
                    'url' => site_url('admin/classes'),
                    'pesan' => "Kelas Gagal Disimpan"
                ];
            }
        }
        $this->output($output);
    }
}