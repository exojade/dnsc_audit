
<!-- <link rel="stylesheet" href="AdminLTE/bower_components/jvectormap/jquery-jvectormap.css"> -->
<!-- <link rel="stylesheet" href="AdminLTE_new/plugins/jqvmap/jqvmap.min.css"> -->
<link rel="stylesheet" href="AdminLTE_new/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
     
        </div>
      </div>
    </section> -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


      <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <div class="info-box-content">
               
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
                <span class="info-box-text">APPOINTMENTS</span>
              </div>
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-briefcase"></i></span>

            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <div class="info-box-content">
                <span class="info-box-number">41,410</span>
                <span class="info-box-text">INQUIRIES</span>

              </div>
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-question"></i></span>

            </div>
          </div>

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <div class="info-box-content">
                <span class="info-box-number">760</span>
                <span class="info-box-text">PENDING PATIENTS</span>
              </div>
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-paw"></i></span>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <div class="info-box-content">
                <span class="info-box-number">2,000</span>
                <span class="info-box-text">COMPLETED ACTIVITIES</span>
              </div>
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-check"></i></span>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-12">


          <div class="card bg-gradient-gray" id="fullscreenDiv">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  MAP
                  
                </h3>
                <button class="btn btn-info" style="float:right;" id="toggleFullscreen">Toggle Fullscreen</button>
                <br>
                <br>
                <br>
                <div class="row">
                <div class="col-sm-6">
                    <!-- checkbox -->
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary1" value="parvo" onchange="updateMapColors(event, 'parvo')" >
                        <label for="checkboxPrimary1">
                        PARVO
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary2" value="flu" onchange="updateMapColors(event, 'flu')">
                        <label for="checkboxPrimary2">
                        FLU
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary3" value="dengue" onchange="updateMapColors(event, 'dengue')">
                        <label for="checkboxPrimary3">
                        DENGUE
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
<!-- 

                <input type="checkbox" id="parvoCheckbox" value="parvo" onchange="updateMapColors()"> PARVO
                <input type="checkbox" id="fluCheckbox" value="flu" onchange="updateMapColors()"> FLU
                <input type="checkbox" id="dengueCheckbox" value="dengue" onchange="updateMapColors()"> DENGUE -->

                <!-- card tools -->
        
                <!-- /.card-tools -->
              </div>
              <div class="card-body" style="height: 400px; overflow: hidden;">
              <div id="thisTheMap" style="height: 350px;"></div>
  <!-- <button id="focus-single">Focus on Australia</button>
  <button id="focus-multiple">Focus on Australia and Japan</button>
  <button id="focus-coords">Focus on Cyprus</button>
  <button id="focus-init">Return to the initial state</button> -->
  
              </div>
            </div>


           
            <!-- Default box -->
           
          </div>
        </div>
      </div>
    </section>
  </div>



  <script src="AdminLTE_new/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="AdminLTE_new/plugins/jszip/jszip.min.js"></script>
<script src="AdminLTE_new/plugins/pdfmake/pdfmake.min.js"></script>
<script src="AdminLTE_new/plugins/pdfmake/vfs_fonts.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>




<link rel="stylesheet" media="all" href="vector_maps/jquery-jvectormap.css"/>
  <!-- <script src="assets/jquery-1.8.2.js"></script> -->
  <script src="vector_maps/jquery-jvectormap.js"></script>
  <script src="vector_maps/lib/jquery-mousewheel.js"></script>

  <script src="vector_maps/src/jvectormap.js"></script>

  <script src="vector_maps/src/abstract-element.js"></script>
  <script src="vector_maps/src/abstract-canvas-element.js"></script>
  <script src="vector_maps/src/abstract-shape-element.js"></script>

  <script src="vector_maps/src/svg-element.js"></script>
  <script src="vector_maps/src/svg-group-element.js"></script>
  <script src="vector_maps/src/svg-canvas-element.js"></script>
  <script src="vector_maps/src/svg-shape-element.js"></script>
  <script src="vector_maps/src/svg-path-element.js"></script>
  <script src="vector_maps/src/svg-circle-element.js"></script>
  <script src="vector_maps/src/svg-image-element.js"></script>
  <script src="vector_maps/src/svg-text-element.js"></script>

  <script src="vector_maps/src/vml-element.js"></script>
  <script src="vector_maps/src/vml-group-element.js"></script>
  <script src="vector_maps/src/vml-canvas-element.js"></script>
  <script src="vector_maps/src/vml-shape-element.js"></script>
  <script src="vector_maps/src/vml-path-element.js"></script>
  <script src="vector_maps/src/vml-circle-element.js"></script>
  <script src="vector_maps/src/vml-image-element.js"></script>

  <script src="vector_maps/src/map-object.js"></script>
  <script src="vector_maps/src/region.js"></script>
  <script src="vector_maps/src/marker.js"></script>

  <script src="vector_maps/src/vector-canvas.js"></script>
  <script src="vector_maps/src/simple-scale.js"></script>
  <script src="vector_maps/src/ordinal-scale.js"></script>
  <script src="vector_maps/src/numeric-scale.js"></script>
  <script src="vector_maps/src/color-scale.js"></script>
  <script src="vector_maps/src/legend.js"></script>
  <script src="vector_maps/src/data-series.js"></script>
  <script src="vector_maps/src/proj.js"></script>
  <script src="vector_maps/src/map.js"></script>
  <script src="public/dashboard_system/panabo_map.js"></script>

  <!-- <script src="vector_maps/tests/assets/jquery-jvectormap-world-mill-en.js"></script> -->
  <script>



    // jQuery.noConflict();
    // jQuery(function(){
      // var $ = jQuery;

      // $('#focus-single').click(function(){
      //   $('#map1').vectorMap('set', 'focus', {region: 'AU', animate: true});
      // });
      // $('#focus-multiple').click(function(){
      //   $('#map1').vectorMap('set', 'focus', {regions: ['AU', 'JP'], animate: true});
      // });
      // $('#focus-coords').click(function(){
      //   $('#map1').vectorMap('set', 'focus', {scale: 7, lat: 35, lng: 33, animate: true});
      // });
      // $('#focus-init').click(function(){
      //   $('#map1').vectorMap('set', 'focus', {scale: 1, x: 0.5, y: 0.5, animate: true});
      // });

      
      $('#thisTheMap').vectorMap({
        map: 'usa_en',
        panOnDrag: true,
        backgroundColor: 'transparent',
        regionStyle: {
        initial: {
            fill: '#fff',
            'fill-opacity': 1,
            stroke: '#000', // Set stroke color to black
            'stroke-width': 3, // Adjusted stroke width
            'stroke-opacity': 1 // Adjusted stroke opacity
        }
    },
        // focusOn: {
        //   x: 0.5,
        //   y: 0.5,
        //   scale: 2,
        //   animate: true
        // },
        series: {
          regions: [{
            scale: ['#FFF2CC', '#833C0C'],
            normalizeFunction: 'polynomial',
            values: {
              "1": 16.63,
              "17": 351.02,
              "12": 5745.13,
              "15": 15.34,
              // "38": 0.15,
              // "37": 986.26,
              // "32": 770.31,
              // "35": 174.79,
              // "2": 8.81,
              // "3": 17.17,
              // "25": 438.88,
              // "4": 126.52,
              // "5": 1476.91,
              // "6": 5.69,
              // "7": 0.55,
              // "21": 285.21,
              // "17": 15.69,
              // "18": 5.57
            }
          }]
        },
      });
      

      var diseaseData = {
        parvo: [1, 2, 3, 4, 5], // Dummy data for PARVO
        flu: [6, 7, 8, 9, 10],   // Dummy data for FLU
        dengue: [11, 12, 13, 14, 15]  // Dummy data for DENGUE
    };

    // Function to update map colors based on selected diseases
    function updateMapColors(event, disease) {
      // alert(disease)

      var checkbox = event.target;
            // Get the ID of the checkbox
            var checkboxId = checkbox.id;
            // alert(checkboxId);

      var checkEd = $('#'+checkboxId).prop('checked');
      console.log(checkEd);
      if(checkEd == false){
        $('#thisTheMap').vectorMap('get', 'mapObject').remove();


        $('#thisTheMap').vectorMap({
        map: 'usa_en',
        panOnDrag: true,
        backgroundColor: 'transparent',
        regionStyle: {
        initial: {
            fill: '#fff',
            'fill-opacity': 1,
            stroke: '#000', // Set stroke color to black
            'stroke-width': 3, // Adjusted stroke width
            'stroke-opacity': 1 // Adjusted stroke opacity
        }
    },
        // focusOn: {
        //   x: 0.5,
        //   y: 0.5,
        //   scale: 2,
        //   animate: true
        // },
        series: {
          regions: [{
            scale: ['#FFF2CC', '#833C0C'],
            normalizeFunction: 'polynomial',
            values: {
              "1": 16.63,
              "17": 351.02,
              "12": 5745.13,
              "15": 15.34,
              // "38": 0.15,
              // "37": 986.26,
              // "32": 770.31,
              // "35": 174.79,
              // "2": 8.81,
              // "3": 17.17,
              // "25": 438.88,
              // "4": 126.52,
              // "5": 1476.91,
              // "6": 5.69,
              // "7": 0.55,
              // "21": 285.21,
              // "17": 15.69,
              // "18": 5.57
            }
          }]
        },
      });

      }

      else{

        var jsonData = "";
        $.ajax({
          type : 'post',
          url : 'ajaxMapDisease', //Here you will fetch records 
          data: {
              disease: disease, action: "mapDisease"
          },
          success : function(data){
            
            jsonData = data;

            $('#thisTheMap').vectorMap('get', 'mapObject').remove();
        // var jsonData = '{"1": 16.63, "17": 351.02,"12": 5745.13,"15": 15.34,"38": 0.15,"37": 986.26,"32": 770.31,"35": 174.79,"2": 8.81,"3": 17.17,"25": 438.88,"4": 126.52,"5": 1476.91,"6": 5.69,"7": 0.55,"21": 285.21,"18": 5.57}';

// Parse the JSON into a JavaScript object
var dataObject = JSON.parse(jsonData);

// Constructing the series object dynamically
var series = {
    regions: [{
        scale: ['#FFF2CC', '#833C0C'],
        normalizeFunction: 'polynomial',
        values: {}
    }]
};

// Add values from the data object to the series object
for (var key in dataObject) {
    if (dataObject.hasOwnProperty(key)) {
        series.regions[0].values[key] = dataObject[key];
    }
}




// Reinitialize the map with new options
$('#thisTheMap').vectorMap({
        map: 'usa_en',
        panOnDrag: true,
        backgroundColor: 'transparent',
        regionStyle: {
        initial: {
            fill: '#fff',
            'fill-opacity': 1,
            stroke: '#000', // Set stroke color to black
            'stroke-width': 3, // Adjusted stroke width
            'stroke-opacity': 1 // Adjusted stroke opacity
        }
    },
        // focusOn: {
        //   x: 0.5,
        //   y: 0.5,
        //   scale: 2,
        //   animate: true
        // },
        series: series



        




      });
            
            // $('#eventModal .modal-body').html(data);
            // // swal.close();
            // $('#eventModal').modal('show');

              // Swal.close();
              // $(".select2").select2();//Show fetched data from database
          }
      });


      console.log(jsonData);
    

      }


      

     




      //   if (document.getElementById('parvoCheckbox').checked) {
      //       selectedDiseases = selectedDiseases.concat(diseaseData.parvo);
      //   }
      //   if (document.getElementById('fluCheckbox').checked) {
      //       selectedDiseases = selectedDiseases.concat(diseaseData.flu);
      //   }
      //   if (document.getElementById('dengueCheckbox').checked) {
      //       selectedDiseases = selectedDiseases.concat(diseaseData.dengue);
      //   }




  


      

      // console.log($('#thisTheMap').vectorMap('get', 'mapObject'));
      // $('#thisTheMap').vectorMap('set', 'regionStyle', { initial: { fill: '#ff0000' } });
     
      //   var selectedDiseases = []; // Array to store selected diseases
      //   // Check which checkboxes are checked
      //   if (document.getElementById('parvoCheckbox').checked) {
      //       selectedDiseases = selectedDiseases.concat(diseaseData.parvo);
      //   }
      //   if (document.getElementById('fluCheckbox').checked) {
      //       selectedDiseases = selectedDiseases.concat(diseaseData.flu);
      //   }
      //   if (document.getElementById('dengueCheckbox').checked) {
      //       selectedDiseases = selectedDiseases.concat(diseaseData.dengue);
      //   }
      //   // Get selected regions
      //   var selectedRegions = $('#thisTheMap').vectorMap('get', 'mapObject').getSelectedRegions(12);
      //   console.log(selectedRegions);
      //   // Update map colors based on selected diseases
      //   selectedRegions.forEach(function (region) {
      //       var regionId = region.id;
      //       if (selectedDiseases.includes(regionId)) {
      //           region.setValues({ 'fill': 'red' });
      //       } else {
      //           region.setValues({ 'fill': '#fff' });
      //       }
      //   });
    }


    // })


   


  </script>










<!-- <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- Morris.js charts -->
<script src="AdminLTE/bower_components/raphael/raphael.min.js"></script>
<!-- <script src="bower_components/morris.js/morris.min.js"></script> -->
<!-- Sparkline -->
<!-- <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script> -->
<!-- jvectormap -->
<!-- <script src="AdminLTE_new/plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->
<!-- <script src="AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->
<!-- <script src="AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->

<!-- jQuery Knob Chart -->
<!-- <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<!-- <script src="bower_components/moment/min/moment.min.js"></script> -->
<!-- <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script> -->
<!-- datepicker -->
<!-- <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
<!-- Bootstrap WYSIHTML5 -->
<!-- <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
<!-- Slimscroll -->
<!-- <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<!-- FastClick -->
<!-- <script src="bower_components/fastclick/lib/fastclick.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->


<!-- 
<script>
var visitorsData = {
    path1: 200, // USA
    SA: 400, // Saudi Arabia
    CA: 1000, // Canada
    DE: 500, // Germany
    FR: 760, // France
    CN: 300, // China
    AU: 700, // Australia
    BR: 600, // Brazil
    IN: 800, // India
    GB: 320, // Great Britain
    RU: 3000 // Russia
};

var labels = {
    '1': 'Sen. John Doe (R) - Voted Yes<br/>Sen Jane Doe (D) - Voted No',
    '2': 'Some other text, you can make use of html tags'
};

$('#world-map').vectorMap({
    map: 'usa_en',
    backgroundColor: 'transparent',
    regionStyle: {
        initial: {
            fill: '#fff',
            'fill-opacity': 1,
            stroke: '#000', // Set stroke color to black
            'stroke-width': 3, // Adjusted stroke width
            'stroke-opacity': 1 // Adjusted stroke opacity
        }
    },
    series: {
        regions: [{
            attribute: 'fill',
            values: {
                "1": '#ccc', // Color for path with ID "1"
                "34": '#ccc', // Color for path with ID "2"
                "7": '#ccc'  // Color for path with ID "2"
            },
            // scale: ['#ffffff', '#0154ad'],
            // normalizeFunction: 'polynomial'
        }]
    },
    onRegionLabelShow: function(event, label, code){
    if (!labels.hasOwnProperty(code)) {
        // no text found, return standard state name
        return true;
    }

    // construct label for state with extra text
    label.html(
        '<strong>' + label.html() + '</strong><br/>' + labels[code]
    );
}
//     onRegionLabelShow: function (e, el, code) {
//     console.log("Region label show event triggered for code: ", code);

//     // Check if el is a jQuery object
//     if (!(el instanceof jQuery)) {
//         console.error("el is not a jQuery object.");
//         return;
//     }

//     // Set custom HTML content for the label
//     el.html("awit");

//     // Log the HTML content of the label
//     console.log("Label HTML content: ", el.html());
// }
});

</script> -->

<script>
$(document).ready(function(){
    $("#toggleFullscreen").click(function(){
        var elem = $("#fullscreenDiv").get(0); // Get the DOM element
        if (!document.fullscreenElement) {
            elem.requestFullscreen().catch(err => {
                alert(`Error attempting to enable full-screen mode: ${err.message} (${err.name})`);
            });
            $("#thisTheMap").css("height", "800px"); // Set height to 800px when entering fullscreen
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            }
            $("#thisTheMap").css("height", "350px"); // Set height to 400px when exiting fullscreen
        }
    });
});



</script>
<?php require("layouts/footer.php") ?>