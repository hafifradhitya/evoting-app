$(document).ready(function(){
    if($('.table-data').length>0){
        
        $('.table-data').DataTable();
    }
    $('form').each(function(){
        $(this).bind('submit',function(e){
            e.preventDefault();
            let form = $(this);
            //console.log(form);
            $.ajax({
                url:form.data('url'),
                data:new FormData(this),
                cache:false,
                async:false,
                type:'post',
                contentType:false,
                processData:false,
                success:function(data){
                    if(data.error){
                        Swal.fire({
                            icon:'error',
                            title:data.pesan,
                            timer:1500,
                            showConfirmButton:false
                        });
                    }else{
                        
                        document.location = data.url;
                    }
                }
            });
        });
    });
    
    if ($('.btn-delete').length>0){
        $('.btn-delete').on('click',function(){
            let btn = $(this);
            Swal.fire({
               icon:'warning',
               text:'Data yang sudah di hapus tidak dapat dikembalikan!',
               title:'Apakah Anda yakin ingin menghapus data ini?',
               showCancelButton: true,
               confirmButtonColor:'#D33',
               confirmButtonText:'Yakin hapus?',
               cancelButtonText:'Batal'     
            }).then((result)=>{
                if (result.isConfirmed){
                    $.ajax({
                       url:btn.data('url') ,
                       data:'id='+btn.data('id'),
                       type:'post',
                       datatype:'text',
                       success:function(data){
                           if(data.error){
                               Swal.fire({
                                   icon:'error',
                                   title:data.pesan,
                                   timer:1500,
                                   showConfirmButton:false
                               });
                           }else{
                               document.location = btn.data('redirect');
                           }
                       }
                    });
                }

            });
        });
    }
});

