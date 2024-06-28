<div class="container">
        <h1 class="display-4">Silahkan Gunakan <span>Hak Suara Kamu</span><br> Untuk <span>Menentukan</span> Ketua dan Wakil Ketua OSIS</h1>
        <button class="btn btn-primary tombol" data-toggle="modal" data-target="#mdlSignIn">Tentukan Pilihanmu</button>
    </div>
<div class="container">
    <!-- info panel -->
    <div class="row justify-content-center">
        <div class="col-10 info-panel">
            <div class="row">
                <div class="col-lg">
                    <img src="<?php echo img_url('employee.png');?>" alt="employee" class="float-left">
                    <h4>Kandidat</h4>
                    <p><?php echo $total_candidate;?> Calon Terdaftar</p>
                </div>
                <div class="col-lg">
                    <img src="<?php echo img_url('hires.png');?>" alt="High Res" class="float-left">
                    <h4>Jumlah Pemilih</h4>
                    <p><?php echo $total_user;?> Pemilih</p>
                <</div>
                <div class="col-lg">
                    <img src="<?php echo img_url('security.png');?>" alt="employee" class="float-left">
                    <h4>Jumlah Voting</h4>
                    <p><?php echo $total_vote;?> Sudah Memilih</p>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir info panel -->
    
    <!-- Working space -->
    <div class="row workingspace">
        <div class="col-lg-6">
            <img src="<?php echo img_url('hero2.png');?>" alt="Workingspace" class="img-fluid">
        </div>
        <div class="col-lg-5">
            <h3>Kamu bisa <span>Vote</span> OSIS di <span>Sini!</span></h3>
            <p>Layanan website E-VOTING OSIS bertujuan untuk mendatangkan calon calon baru OSIS setiap tahunnya.</p>
        </div>
    </div>
    <!-- akhir working space -->
    
    <!-- Testimonial -->
    <section class="testimonial">
        <div class="row justify-content-center quote">
            <div class="col-lg-8">
                <h5>Hasil Pemilihan 3 Besar Suara Sementara :</h5>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-6 justify-content-center d-flex">
                <?php echo $hasil ;?>
                
                
            </div>
        </div>
    </section>
    <!-- akhir testimonial -->
    
    <!-- footer -->
    <div class="row footer">
        <div class="col text-center">
            <p>2022 All Rights Reserved by Radhitya</p>
        </div>
    </div>
    <!-- akhir footer -->
</div>
    <div class="modal fade" id="mdlSignIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Tentukan Pilihan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" data-url="<?php echo site_url('home/vote');?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email" class="text-secondary">Alamat Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Alamat Email">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password" class="text-secondary">Kata Sandi</label> 
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <p>Daftar Kandidat Ketua OSIS</p>
                        <div class="row">
                            <?php echo $candidates;?>
                            
                        </div>
                        
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="mdlSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Daftar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" data-url="<?php echo site_url('home/register');?>">
                    <div class="form-group">
                        <label for="name" class="text-secondary">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="class" class="text-secondary">Kelas</label>
                        <select id="class" name="class" class="form-control">
                            <option value="">--Pilih Kelas--</option>
                            <?php foreach ($classes as $val):?>
                            <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-secondary">Alamat Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Alamat Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-secondary">Kata Sandi</label> 
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div>