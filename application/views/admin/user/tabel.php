<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pengguna</h3>
                <div class="pull-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Tambah Pengguna</button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-data table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Avatar</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat Email</th>
                            <th>Status</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody><?php echo $table;?></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Pengguna</h4>
            </div>
            <form class="form-file form-horizontal" data-url="<?php echo site_url('admin/user/save');?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Nama Lengkap</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="name" placeholder="Nama Kelas">
                        </div>
                        <div class="col-md-4">
                            <label>Kelas</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <select name="class" class="form-control">
                                <option value="0">--Pilih Kelas--</option>
                                <?php foreach ($classes as $val) :?>
                                <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Alamat Email</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="email" class="form-control" name="email" placeholder="Alamat Email">
                        </div>
                        <div class="col-md-4">
                            <label>Kata Sandi</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="password" class="form-control" name="password" placeholder="Kata Sandi">
                        </div>
                        <div class="col-md-4">
                            <label>Avatar</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="file" class="form-control" name="file" placeholder="Avatar">
                        </div>
                        <div class="col-md-4">
                            <label>Status</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <select name="status" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edit User</h4>
            </div>
            <form class="form-file form-horizontal" data-url="<?php echo site_url('admin/user/update');?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Nama Lengkap</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" id="name" class="form-control" name="name" placeholder="Nama Kelas">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Kelas</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <select id="class" name="class" class="form-control">
                                <option value="0">--Pilih Kelas--</option>
                                <?php foreach ($classes as $val) :?>
                                <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Alamat Email</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="email" id="email" class="form-control" name="email" placeholder="Alamat Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Kata Sandi</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="password" id="password" class="form-control" name="password" placeholder="Kata Sandi">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Avatar</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="file" id="file" class="form-control" name="file" placeholder="Avatar">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Status</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <select id="inputStatus" name="status" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="avatar" name="old-img">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.btn-edit').on('click',function(){
        let btn = $(this);
        $('#id').val(btn.data('id'));
        $('#name').val(btn.data('name'));
        $('#class').val(btn.data('class'));
        $('#email').val(btn.data('email'));
        $('#inputStatus').val(btn.data('status'));
        $('#modal-edit').modal();
    });
</script>