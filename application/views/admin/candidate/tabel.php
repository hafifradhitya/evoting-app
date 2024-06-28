<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Kandidat</h3>
                <div class="pull-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Tambah Kandidat</button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-data table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Lengkap</th>
                            <th>Visi dan Misi</th>
                            <th>Periode</th>
                            <th>Pemilih</th>
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
                <h4 class="modal-title">Tambah Kelas</h4>
            </div>
            <form class="form-file form-horizontal" data-url="<?php echo site_url('admin/candidate/save');?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Nama Kandidat</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="name" placeholder="Nama Kandidat">
                        </div>
                        <div class="col-md-4">
                            <label>Visi dan Misi</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <textarea class="form-control" name="visimisi"></textarea>
                        </div>
                        <div class="col-md-4">
                            <label>Periode</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="period" placeholder="Period">
                        </div>
                        <div class="col-md-4">
                            <label>Foto Kandidat</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="file" class="form-control" name="foto">
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
            <form class="form-horizontal" data-url="<?php echo site_url('admin/candidate/update');?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Nama Kandidat</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" id="name" class="form-control" name="name" placeholder="Nama Kandidat">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Visi dan Misi</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <textarea class="form-control" id="visimisi" name="visimisi"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Periode</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" id="period" name="period" placeholder="Period">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Foto Kandidat</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="file" class="form-control" name="foto">
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
        $('#visimisi').val(btn.data('visimisi'));
        $('#period').val(btn.data('period'));
        $('#avatar').val(btn.data('avatar'));
        $('#modal-edit').modal();
    });
</script>