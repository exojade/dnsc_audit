
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">
<div class="content-wrapper">
<style>
.cityvet-logo {
    max-width: 400px; /* Adjust to your preferred width */
    height: auto; /* Ensures the image maintains its aspect ratio */
    object-fit: contain; /* Preserves the image quality */
}
</style>


<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Settings</h1>
      </div>
    </div>
  </div>
</section>

    <section class="content">
      <div class="container-fluid">

      <div class="row">
        <div class="col">
            <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title"><b>Audit Plan Settings</b></h3>
            </div>
            <div class="card-body">
              


              
            </div>
          </div>
        </div>

        <div class="col">
            <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title"><b>Audit Plan Settings</b></h3>
            </div>
            <div class="card-body">
              Start creating your amazing application!
            </div>
          </div>
        </div>

 

        
      </div>







      </div>
    </section>
  </div>
  <?php require("layouts/footer.php") ?>


<script src="AdminLTE_new/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="AdminLTE_new/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


<script>

$(function () {
  bsCustomFileInput.init();
});
$('.my-colorpicker2').colorpicker()

$('.my-colorpicker2').on('colorpickerChange', function(event) {
  $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
})
</script> 
