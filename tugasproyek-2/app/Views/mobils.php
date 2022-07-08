<?= $this->extend("layout/master") ?>

<?= $this->section("content") ?>

<!-- Main content -->
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-10 mt-2">
        <h3 class="card-title">Manage <?=$title?></h3>
      </div>
      <div class="col-2">
        <button type="button" class="btn float-right btn-success" onclick="save()" title="New"> <i
            class="fa fa-plus"></i> New</button>
      </div>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="data_table" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nopol</th>
          <th>Warna</th>
          <th>Biaya sewa</th>
          <th>Deskripsi</th>
          <th>Cc</th>
          <th>Tahun</th>
          <th>Merk</th>
          <th style="width:100px !important;">Foto</th>

          <th></th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- /Main content -->

<!-- ADD modal content -->

<div id="data-modal" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="text-center bg-info p-3" id="model-header">
        <h4 class="modal-title text-white" id="info-header-modalLabel"></h4>
      </div>
      <div class="modal-body">
        <form id="data-form" class="pl-3 pr-3">
          <div class="row">
            <input type="hidden" id="id" name="id" class="form-control" placeholder="Id" maxlength="11" required>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="nopol" class="col-form-label"> Nopol: <span class="text-danger">*</span> </label>
                <input type="text" id="nopol" name="nopol" class="form-control" placeholder="Nopol" minlength="0"
                  maxlength="50" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="warna" class="col-form-label"> Warna: </label>
                <input type="text" id="warna" name="warna" class="form-control" placeholder="Warna" minlength="0"
                  maxlength="50">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="biaya_sewa" class="col-form-label"> Biaya sewa: <span class="text-danger">*</span> </label>
                <input type="text" id="biaya_sewa" name="biaya_sewa" class="form-control" placeholder="Biaya sewa"
                  minlength="0" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="deskripsi" class="col-form-label"> Deskripsi: </label>
                <input type="text" id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi"
                  minlength="0" maxlength="255">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="cc" class="col-form-label"> Cc: </label>
                <input type="number" id="cc" name="cc" class="form-control" placeholder="Cc" minlength="0"
                  maxlength="50">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="tahun" class="col-form-label"> Tahun: <span class="text-danger">*</span> </label>
                <input type="number" id="tahun" name="tahun" class="form-control" placeholder="Tahun" minlength="0"
                  maxlength="50" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="merk_id" class="col-form-label"> Merk: </label>
                <select class="form-control" id="merk_id" name="merk_id"></select>
              </div>
            </div>
          </div>

          <div class="form-group text-center">
            <div class="btn-group">
              <button type="submit" class="btn btn-success mr-2" id="form-btn">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div id="data-modal-upload" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md">
    <div class="modal-content">
    <div class="text-center bg-info p-3" id="model-header-upload">
        <h4 class="modal-title text-white" id="info-header-modalLabel-upload"></h4>
      </div>
      <div class="modal-body">
        <form id="data-form-upload" class="pl-3 pr-3"  enctype="multipart/form-data">
          <div class="row">
            <input type="hidden" id="id_upload" name="id_upload" class="form-control" placeholder="id_upload"
              maxlength="11" required>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="foto_upload" class="col-form-label"> Foto: </label>
                <input type="file" class="" id="foto_upload" name="foto_upload"accept="image/*">
              </div>
            </div>
          </div>
          <div class="form-group text-center">
            <div class="btn-group">
              <button type="button" onclick="submitUpload()" class="btn btn-success mr-2" id="form-btn-upload">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- /ADD modal content -->



<?= $this->endSection() ?>
<!-- /.content -->


<!-- page script -->
<?= $this->section("pageScript") ?>
<script>
  $(document).ready(function () {

    

  });
  // dataTables
  $(function () {
    var table = $('#data_table').removeAttr('width').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "scrollY": '45vh',
      "scrollX": true,
      "scrollCollapse": false,
      "responsive": false,
      "ajax": {
        "url": '<?php echo base_url($controller . "/getAll") ?>',
        "type": "POST",
        "dataType": "json",
        async: "true"
      }
    });

    initSelect2();

  });
  function submitUpload(){
    $('#data-form-upload').submit();

  }
  function initSelect2() {
    $.ajax({
      url: '<?php echo base_url($controller . "/getMerks") ?>',
      type: 'get',
      dataType: 'json',
      success: function (response) {
        $('#merk_id').select2({
          "data": response.results,
          "theme": "bootstrap"
          // "matcher": matchCustom,
          // "dropdownParent": $("#myModal1")
        });

      }
    });
  }
  var urlController = '';
  var submitText = '';

  function getUrl() {
    return urlController;
  }

  function getSubmitText() {
    return submitText;
  }

  function save(id) {
    // reset the form 
    $("#data-form")[0].reset();
    $(".form-control").removeClass('is-invalid').removeClass('is-valid');
    if (typeof id === 'undefined' || id < 1) { //add
      urlController = '<?= base_url($controller . "/add") ?>';
      submitText = 'Save';
      $('#model-header').removeClass('bg-info').addClass('bg-success');
      $("#info-header-modalLabel").text('Add');
      $("#form-btn").text(submitText);
      $('#data-modal').modal('show');
    } else { //edit
      urlController = '<?= base_url($controller . "/edit") ?>';
      submitText = 'Update';
      $.ajax({
        url: '<?php echo base_url($controller . "/getOne") ?>',
        type: 'post',
        data: {
          id: id
        },
        dataType: 'json',
        success: function (response) {
          $('#model-header').removeClass('bg-success').addClass('bg-info');
          $("#info-header-modalLabel").text('Edit');
          $("#form-btn").text(submitText);
          $('#data-modal').modal('show');
          //insert data to form
          $("#data-form #id").val(response.id);
          $("#data-form #nopol").val(response.nopol);
          $("#data-form #warna").val(response.warna);
          $("#data-form #biaya_sewa").val(response.biaya_sewa);
          $("#data-form #deskripsi").val(response.deskripsi);
          $("#data-form #cc").val(response.cc);
          $("#data-form #tahun").val(response.tahun);
          $("#data-form #merk_id").val(response.merk_id);
          // $("#data-form #foto").val(response.foto);

          // var param = new {id : 0};
          // param.id = response.merk_id;
          $("#merk_id").val(response.merk_id).trigger('change');

        }
      });
    }
    $.validator.setDefaults({
      highlight: function (element) {
        $(element).addClass('is-invalid').removeClass('is-valid');
      },
      unhighlight: function (element) {
        $(element).removeClass('is-invalid').addClass('is-valid');
      },
      errorElement: 'div ',
      errorClass: 'invalid-feedback',
      errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        } else if ($(element).is('.select')) {
          element.next().after(error);
        } else if (element.hasClass('select2')) {
          //error.insertAfter(element);
          error.insertAfter(element.next());
        } else if (element.hasClass('selectpicker')) {
          error.insertAfter(element.next());
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function (form) {
        var form = $('#data-form');
        // var form = new FormData($(this).get(0));
        // var file_data = $('#foto_upload').prop('files')[0];   
        // var form_data = new FormData();                  
        // form.append('foto_uploads', file_data);
        $(".text-danger").remove();
        $.ajax({
          // fixBug get url from global function only
          // get global variable is bug!
          url: getUrl(),
          type: 'post',
          data: form.serialize(),
          // data: form.serialize(),

          cache: false,
          // contentType: false,
          processData: false,
          dataType: 'json',
          beforeSend: function () {
            $('#form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
          },
          success: function (response) {
            if (response.success === true) {
              Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: response.messages,
                showConfirmButton: false,
                timer: 1500
              }).then(function () {
                $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                $('#data-modal').modal('hide');
              })
            } else {
              if (response.messages instanceof Object) {
                $.each(response.messages, function (index, value) {
                  var ele = $("#" + index);
                  ele.closest('.form-control')
                    .removeClass('is-invalid')
                    .removeClass('is-valid')
                    .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');
                  ele.after('<div class="invalid-feedback">' + response.messages[index] + '</div>');
                });
              } else {
                Swal.fire({
                  toast: false,
                  position: 'bottom-end',
                  icon: 'error',
                  title: response.messages,
                  showConfirmButton: false,
                  timer: 3000
                })

              }
            }
            $('#form-btn').html(getSubmitText());
          }
        });
        return false;
      }
    });

    

    $('#data-form').validate({

      //insert data-form to database

    });
  }
  function upload(id) {
    // reset the form 
    $("#data-form-upload")[0].reset();
    $(".form-control").removeClass('is-invalid').removeClass('is-valid');
    if (typeof id === 'undefined' || id < 1) { //add
      urlController = '<?= base_url($controller . "/add") ?>';
      submitText = 'Save';
      $('#model-header-upload').removeClass('bg-info').addClass('bg-success');
      $("#info-header-modalLabel-upload").text('Add');
      $("#form-btn-upload").text(submitText);
      $('#data-modal-upload').modal('show');
    } else { //edit
      urlController = '<?= base_url($controller . "/upload") ?>';
      submitText = 'Update';
      $.ajax({
        url: '<?php echo base_url($controller . "/getOne") ?>',
        type: 'post',
        data: {
          id: id
        },
        dataType: 'json',
        success: function (response) {
          $('#model-header-upload').removeClass('bg-success').addClass('bg-info');
          $("#info-header-modalLabel-upload").text('Edit');
          $("#form-btn-upload").text(submitText);
          $('#data-modal-upload').modal('show');
          //insert data to form
          $("#data-form-upload #id_upload").val(response.id);

        }
      });
    }

    $('#data-form-upload').submit(function (event) {
        console.log("MASUK");
        // $.validator.addMethod('accept', function () { return true; });
        // $.validator.unobtrusive.parse($(this));
        // var isValid = $(this).valid();
        // isValid = true;
        event.preventDefault();

        // var form = $('#data-form-upload');
        // var form = new FormData($(this).get(0));
        var file_data = $('#foto_upload').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('foto_upload', file_data);
        form_data.append('id_upload', $("#id_upload").val());

        $(".text-danger").remove();
        $.ajax({
          // fixBug get url from global function only
          // get global variable is bug!
          url: getUrl(),
          type: 'post',
          data: form_data,
          // data: form.serialize(),
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          beforeSend: function () {
            $('#form-btn-upload').html('<i class="fa fa-spinner fa-spin"></i>');
          },
          success: function (response) {
            if (response.success === true) {
              Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: response.messages,
                showConfirmButton: false,
                timer: 1500
              }).then(function () {
                $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                $('#data-modal-upload').modal('hide');
              })
            } else {
              if (response.messages instanceof Object) {
                $.each(response.messages, function (index, value) {
                  var ele = $("#" + index);
                  ele.closest('.form-control')
                    .removeClass('is-invalid')
                    .removeClass('is-valid')
                    .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');
                  ele.after('<div class="invalid-feedback">' + response.messages[index] + '</div>');
                });
              } else {
                Swal.fire({
                  toast: false,
                  position: 'bottom-end',
                  icon: 'error',
                  title: response.messages,
                  showConfirmButton: false,
                  timer: 3000
                })

              }
            }
            $('#form-btn-upload').html(getSubmitText());
          }
        });
        return false;
    
    });
    
    
  }


  function remove(id) {
    Swal.fire({
      text: "Are you sure want to delete this data?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirm',
      cancelButtonText: 'Cancel'
    }).then((result) => {

      if (result.value) {
        $.ajax({
          url: '<?php echo base_url($controller . "/remove") ?>',
          type: 'post',
          data: {
            id: id
          },
          dataType: 'json',
          success: function (response) {

            if (response.success === true) {
              Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: response.messages,
                showConfirmButton: false,
                timer: 1500
              }).then(function () {
                $('#data_table').DataTable().ajax.reload(null, false).draw(false);
              })
            } else {
              Swal.fire({
                toast: false,
                position: 'bottom-end',
                icon: 'error',
                title: response.messages,
                showConfirmButton: false,
                timer: 3000
              })
            }
          }
        });
      }
    })
  }

</script>


<?= $this->endSection() ?>