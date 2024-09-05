<script type="text/javascript">

  $(document).ready(function(){

   $('#pagination').on('click','a',function(e){
     e.preventDefault(); 
     var pageno = $(this).attr('data-ci-pagination-page');
     cari(pageno);
   });
 });

  cari(0);

  function cari(pagno)
  {
    let cari = $('[name="cari"]').val();
    let row = $('[name="rowper"]').val();
    let tahun = $('[name="tahun"]').val();
    $.ajax({
     url: '<?php echo base_url()?>prosespenerimaan/cari/'+pagno,
     type: 'POST',
     data: 'cari='+cari+'&rowper='+row+'&tahun='+tahun,
     dataType: 'JSON',
     async: false,
     success: function(response){
      $('#pagination').html(response.pagination);
      buatTabelnya(response.result,response.row);
    }
  });
  }

  function buatTabelnya(result,sno)
  {
   sno = Number(sno);
   $('#tList tbody').empty();
   for(index in result){
    var replid = result[index].replid;
    var nama = result[index].nama;
    var tahun = result[index].tahun;
    var kuota = result[index].kuota;
    var aktif = result[index].aktif;
    // var sisanya = sisa(result[index].replid);
    let status ='';
    if(result[index].aktif == 0)
      status = '<a title="Aktifkan Proses Penerimaan" href="javascript:status(`'+replid+'`,`'+aktif+'`)"><i class="ph-x-circle text-muted"></i></a>';
    if(result[index].aktif == 1)
      status = '<a title="Non Aktifkan Proses Penerimaan" href="javascript:status(`'+replid+'`,`'+aktif+'`)"><i class="ph-check-circle text-success"></i></a>';
    var keterangan = result[index].keterangan;
    var aksi = '<div class="d-inline-flex"><div class="dropdown">'+
    '<a href="#" class="text-body" data-bs-toggle="dropdown"><i class="ph-list"></i></a>'+
    '<div class="dropdown-menu dropdown-menu-end">'+
    '<a href="javascript:ubah(`'+replid+'`)" class="dropdown-item"><i class="ph-pencil me-2"></i>Ubah</a>'+
    '<a href="javascript:hapus(`'+replid+'`)" class="dropdown-item"><i class="ph-trash me-2"></i>Hapus</a>'+
    '</div></div></div>';
          // var content = result[index].slug;
          // content = content.substr(0, 60) + " ...";
          // var link = result[index].slug;
          // sno+=1;

          var tr = "<tr class='text-center'>";
          // tr += "<td class='text-center'>"+ sno +"</td>";
          tr += "<td class='fw-bold text-uppercase text-muted text-start'>"+ nama +"</td>";
          tr += "<td>"+ kuota +"</td>";
          // tr += "<td>"+sisanya+"</td>";
          tr += "<td>"+ status +"</td>";
          tr += "<td>"+ keterangan +"</td>";
          tr += "<td>"+ aksi +"</td>"
          tr += "</tr>";
          $('#tList tbody').append(tr);


        }
      }

      function status(replid,aktif)
      {
        if(confirm('Yakin akan merubah status?'))
        {
          $.get('<?= base_url("prosespenerimaan/status/")?>'+replid+'/'+aktif,function(data,status) {
            if(data > 0)
              cari(0);
          });
        } else {

        }
      }

      function hapus(replid)
      {
        if(confirm('Yakin akan menghapus data?'))
        {
          $.get('<?= base_url("prosespenerimaan/hapus/")?>'+replid,function(data,status) {
            if(data > 0)
              cari(0);
          });
        } else {

        }
      }


      function tambah()
      {
        NewWin('<?= base_url('prosespenerimaan/tampil')?>','Tambah Proses',600,420);
      }
      function ubah(replid)
      {
        NewWin('<?= base_url('prosespenerimaan/tampil/')?>'+replid,'Ubah Proses',600,420);
      }

    </script>