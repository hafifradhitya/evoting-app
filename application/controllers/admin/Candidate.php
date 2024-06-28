<?php

class Candidate extends Admin_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('candidate_model');
    }
    public function index(){
        $table = '';
        $data = $this->candidate_model->get_all();
        
        if (!empty($data)){
            $no = 1;
            foreach ($data as $val){
                $vote = $this->candidate_model->total_vote($val['id']);
                $table .= '<tr>';
                $table .= '<td>'.$no.'</td>';
                $table .= '<td style="width:100px; text-align: center;"><div class="avatar avatar-sm"><img src="'. base_url('uploads/'.$val['foto']).'" alt="" width="100"></div></td>';
                $table .= '<td>'.$val['name'].'</td>';
                $table .= '<td>'.$val['visimisi'].'</td>';
                $table .= '<td>'.$val['period'].'</td>';
                $table .= '<td>'.$vote.'</td>';
                $table .= '<td style="width:100px; text-align: center;">';
                $table .= '<button data-id="'.$val['id'].'" data-name="'.$val['name'].'" data-visimisi="'.$val['visimisi'].'" data-period="'.$val['period'].'" data-avatar="'.$val['foto'].'" class="btn btn-sm btn-edit btn-success"><i class="fa fa-edit"></i></button>&nbsp;&nbsp;';
                $table .= '<button data-id="'.$val['id'].'" data-url="'.site_url('admin/candidate/delete').'" data-redirect="'.site_url('admin/candidate').'" class="btn btn-sm btn-delete btn-danger"><i class="fa fa-trash"></i></button>';
                $table .= '</td>';
                $table .= '</tr>';
                $no++;
            }
        }
        
        $this->view('candidate/tabel',[
           'table'  => $table,
           'username' => $this->session->userdata('name')
        ]);
    }
    
    public function add(){
        $this->view('candidate/add', [
           'username'  => $this->session->userdata('name')
        ]);
    }
    
    public function delete(){
        if ($this->candidate_model->delete(intval($this->post('id')))){
            $this->output ([
               'error'  => false
            ]);
        }else{
            $this->output([
               'error'  => true,
               'pesan' => 'Kandidat tidak bisa dihapus'
            ]);
        }
    }
    
    public function edit($id) {
        $data = $this->candidate_model->get_data($id);
        $this->view('candidate/edit',[
           'field' => $data,
           'username' => $this->session->userdata('name')
        ]);
    }
    
    public function save(){
        if (empty($this->post('name'))){
            $output = [
              'error' => true,
              'pesan' => 'Nama Kandidat Tidak Boleh Kosong'
            ];
        }elseif(empty ($this->post('visimisi'))) {
            $output = [
              'error' => true,
              'pesan' => 'Visi dan Misi Tidak Boleh Kosong'
            ];
        }elseif (empty ($this->post('period'))) {
            $output = [
              'error' => true,
              'pesan' => 'Visi dan Misi Tidak Boleh Kosong'
            ];
        }else{
            $data['name'] = $this->post('name');
            $data['visimisi'] = $this->post('visimisi');
            $data['period'] = $this->post('period');
            $file = $this->_upload();
            
            if(is_string($file)){
                $output = [
                  'error' => true,
                  'pesan' => $file
                ];
            }else{
                $data['foto'] = $file['file_name'];
                if ($this->candidate_model->save($data)){
                    $output = [
                        'url' => site_url('admin/candidate'),
                        'error' => false,
                    ];
                }else{
                    $output = [
                        'error' => true,
                        'pesan' => 'Kandidat Gagal Disimpan'
                    ];
                }
            }
        }
        
        $this->output($output);
    }
    
    public function update(){
        $id = $this->post('id');
        $data['name'] = $this->post('name');
        $data['visimisi'] = $this->post('visimisi');
        $data['period'] = $this->post('period');
        
        if (empty($this->post('name'))){
            $output = [
                'error' => true,
                'pesan' => 'Nama Kelas Wajib Diisi'
            ];
        }elseif(empty ($this->post('visimisi'))){
            $output = [
                'error' => true,
                'pesan' => 'Visi dan Misi Tidak Boleh Kosong'
            ];
        }elseif(empty ($this->post('period'))){
            $output = [
                'error' => true,
                'pesan' => 'Periode Tidak Boleh Kosong'
            ];
        }else{
            if($_FILES['foto']['size']!=0){
                $file = $this->_upload();
                $data['foto'] = $file['file_name'];
                @unlink(FCPATH. 'uploads/'.$this->post('old-img'));
            }
            
            if ($this->candidate_model->save($data, $id)){
                $output = [
                    'url' => site_url('admin/candidate'),
                    'error' => false,
                ];
            }else{
                $output = [
                    'error' => true,
                    'pesan' => 'Kandidat Gagal Disimpan'
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
        
        if($this->upload->do_upload('foto')){
            return $this->upload->data();
        }else{
            return $this->upload->display_errors();
        }
    }
}