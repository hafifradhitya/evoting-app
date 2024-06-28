<?php
if (!function_exists('menu_candidate')){
    function menu_candidate($items){
        $html = '';
        if(!empty($items)){
            $no = 1;
            foreach ($items as $val){
                $html .= '<div class="col-md-6">
                                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="col p-4 d-flex flex-column position-static">
                                    <label>
                                        <strong class="d-inline-block mb-2 text-success">Kandidat '.$no.'</strong>
                                        <h3 class="mb-0">'.$val['name'].'</h3>
                                        <p class="mb-auto">'.$val['visimisi'].'</p>
                                        
                                        Pilih
                                                <input type="radio" name="candidate" value="'.$val['id'].'">
                                        </label>
                                    </div>
                                    <div class="col-auto d-none d-lg-block">
                                        <img src="'.image_url($val['foto']).'" class="" width="200" height="250" alt="singleminded">
                                    </div>
                                </div>
                            </div>';
                $no++;
                
            }
        }
        return $html;
    }
}

if (!function_exists('result_candidate')){
    function result_candidate($items){
        $html = '';
        if(!empty($items)){
            foreach ($items as $val){
                $html .= '<div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon">
            <img src="'.image_url($val['foto']).'" height="72"
                            alt="singleminded">
            </span>

            <div class="info-box-content">
              <span class="info-box-text">'.$val['name'].'</span>
              <span class="info-box-number">'.ci()->dash_model->votes($val['id']).' Pemilih</span>
            </div>
          </div>
    </div>';
            }
        }
        return $html;
    }
}

if (!function_exists('result_winner')){
    function result_winner($items){
        $html = '';
        if(!empty($items)){
            $no = 0;
            $one = '';
            $two = '';
            $three = '';
            foreach ($items as $item){
                
                $data = ci()->home_model->get_candidate($item['candidate_id']);
                if (!empty($data)){
                    if($no==0){
                        $one .= '<figure class="figure"><img src="'. base_url('uploads/'.$data['foto']).'" class="figure-img img-fluid rounded-circle utama" alt="Testi 2">
                                    <figcaption class="figure-caption">
                                    <h5>'.$data['name'].'</h5>
                                    <p>'.$item['total'].' Suara</p>
                                    </figcaption>
                                </figure>';
                    }elseif ($no==1) {
                        $two .= '<figure class="figure">
                            <img src="'. base_url('uploads/'.$data['foto']).'" class="figure-img img-fluid rounded-circle" alt="Testi 1">
                                <figcaption class="figure-caption">
                                    <h5>'.$data['name'].'</h5>
                                    <p>'.$item['total'].' Suara</p>
                                    </figcaption>
                            </figure>';
                    }elseif ($no==2){
                        $three .= '<figure class="figure">
                            <img src="'. base_url('uploads/'.$data['foto']).'" class="figure-img img-fluid rounded-circle" alt="Testi 3">
                                <figcaption class="figure-caption">
                                    <h5>'.$data['name'].'</h5>
                                    <p>'.$item['total'].' Suara</p>
                                    </figcaption>
                        </figure>';
                    }
                }
                $no++;
            }
            
            $html .= $two;
            $html .= $one;
            $html .= $three;
        }
        return $html;
    }
}