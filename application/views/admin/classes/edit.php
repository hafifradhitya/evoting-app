<form class="form-horizontal" data-url="<?php echo site_url('candidate/update');?>" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama Kandidat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="name" class="form-control" name="name" value="<?php echo $field['name'];?>" placeholder="Nama Kandidat">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Visi dan Misi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea class="form-control" name="visimisi"><?php echo $field['visimisi'];?></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Periode</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" class="form-control" name="period" value="<?php echo $field['period'];?>" placeholder="Period">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Foto Kandidat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="file" class="form-control" name="foto">
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <input type="hidden" name="id" value="<?php echo $field['id'];?>">
                                            <input type="hidden" name="old-img" value="<?php echo $field['foto'];?>">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <a href="<?php echo site_url('candidate');?>" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                                        </div>
                                    </div>
                                </div>
                            </form>