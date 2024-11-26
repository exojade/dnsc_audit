
  <!-- Font Awesome -->
  <!-- DataTables -->
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">
<div class="content-wrapper">

<style>
.cityvet-logo {
    max-width: 400px; /* Adjust to your preferred width */
    height: auto; /* Ensures the image maintains its aspect ratio */
    object-fit: contain; /* Preserves the image quality */
}
</style>

<?php
$siteOptions = query("select * from siteoptions");
$siteOptions = $siteOptions[0];
?>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
              <div class="card-header">
                <h4 class="m-0">Settings Page
                <div class="form-group" style="float:right;">
                </div>
                </h4>
              </div>
              <div class="card-body">

                <div class="row">
                  <div class="col-4">
                    <div>
                        <!-- <img class="img-fluid pad" src="resources/logocityvet.png" alt="Photo"> -->
                        <img src="<?= $siteOptions["mainLogo"] == "" ? 'resources/logocityvet_old.png' : $siteOptions["mainLogo"]; ?>" class="img-thumbnail cityvet-logo" alt="Logo">
                    </div>
                  </div>
                  <div class="col-8">
                  <form class="generic_form_trigger" data-url="settings">
                    <input type="hidden" name="action" value="updateSettings">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Site Title <span class="color-red">*</span></label>
                    <input value="<?php echo($siteOptions["mainTitle"]); ?>" name="mainTitle" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Site Title">
                  </div>


                  <div class="form-group">
                  <label>Color Site <span class="color-red">*</span></label>
                  <div class="input-group my-colorpicker2">
                    <input value="<?php echo($siteOptions["mainColor"]); ?>" name="mainColor" required type="text" class="form-control">

                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label>Text Color Site <span class="color-red">*</span></label>
                  <div class="input-group my-colorpicker2">
                    <input value="<?php echo($siteOptions["textColor"]); ?>" name="textColor" required type="text" class="form-control">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Logo Image <span class="color-red">*</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="logoImage" type="file" class="custom-file-input" id="exampleInputFile" accept="image/*">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <button class="btn btn-primary">Save</button>

                  </form>


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
