<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Survey Graph
            </h1>
          </div>
      
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


      <div class="card">
        <div class="card-header">
        <form class="lineChartForm" data-url="survey">
                            <input type="hidden" name="action" value="lineChart">
                            <button  class="btn btn-primary float-right ml-1" type="submit">Filter</button>
                            <div style="width: 15%;" class="form-group float-right mr-2">
                                <input  name="year" type="number" value="<?php echo(date("Y")); ?>" class="form-control" id="exampleInputEmail1" placeholder="---">
                                </div>
                                <div  style="width: 15%;" class="form-group float-right mr-2">
                                <select name="to" class="form-control">
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option selected value="12">December</option>
                                    <!-- <option selected value="<?php echo(date("m")); ?>"><?php echo(date("F")); ?></option> -->
                                </select>
                                </div>
                            <div  style="width: 15%;" class="form-group float-right mr-2">
                                <select name="from" class="form-control">
                                    <option selected value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                </div>

                                <div class="form-group float-right mr-2" style="width:20%;">
                                <select name="office" class="form-control" >
                                <option selected value="" >Select Office</option>
                                    <?php $office = query("select * from office"); ?>
                                    <?php foreach($office as $row): ?>
                                        <option value="<?php echo($row["office_id"]); ?>"><?php echo($row["office_name"]); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                            </form>

          
        </div>
        <div class="card-body">
            <div class="resultLineDiv"></div>
        <div class="chart">
                  <canvas id="lineChart" style="min-height: 350px; height: auto; max-height: 430px; max-width: 100%;"></canvas>
                </div>
          
        </div>
      </div>


       
        </div>















      </div>
    </section>
  </div>

<script src="AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
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
<script src="AdminLTE_new/plugins/chart.js/Chart.min.js"></script>
<?php require("layouts/footer.php") ?>

<script>
$(document).ready(function() {
      // Trigger the form submit during document ready
      // $('.deceased_chart_form').submit();
     
      $('.lineChartForm').submit();
    });
  </script>
<script>
        
let lineChartInstance;

$('.lineChartForm').submit(function (e) {
    e.preventDefault(); // Prevent the form from submitting

    var form = $(this)[0];
    var formData = new FormData(form);
    var url = $(this).data('url');

    Swal.fire({
        title: 'Please wait...',
        showClass: {
    popup: `
      animate__animated
      animate__bounceIn
      animate__faster
    `
  },
  hideClass: {
    popup: `
      animate__animated
      animate__bounceOut
      animate__faster
    `
  },
        imageUrl: 'AdminLTE_new/dist/img/loader.gif',
        showConfirmButton: false
    });

    $.ajax({

      type: 'POST',
url: url,
data: formData,
processData: false,
contentType: false,
success: function (results) {
    var response = JSON.parse(results);
        var data = response.dataset; // Adjust based on the response structure
        var disease = response.disease; // Adjust based on the response structure
        var totalCount = response.totalCount; // Adjust based on the response structure

            var labels = data.map(item => item.name);
            var counts = data.map(item => item.count);

            // Generate the background color for each count value based on the condition
    

            var LineChartData = {
                labels: labels,
                datasets: [{
                  label: 'Surveys',
        backgroundColor: 'rgba(60,141,188,0.8)',  // Line color (background color for the line itself)
        data: counts,  // The data values (survey counts)
        lineTension: 0,  // Set line tension to 0 for sharp corners
        fill: true,  // If you want to fill the area under the line (set to false to disable)
        borderWidth: 2 
                }]
            };

            var LineChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false,
                scales: {
                    y: {
                        ticks: {
                            callback: function (val) {
                                return val + '%'; // Optionally append '%' to Y axis ticks
                            }
                        }
                    },
                    x: {
                        ticks: {
                            autoSkip: false,
                            maxRotation: 90, // Rotate the labels 90 degrees
                            minRotation: 90
                        }
                    }
                }
            };


            if (lineChartInstance) {
                lineChartInstance.destroy();
            }
            var LineChartCanvas = $('#lineChart').get(0).getContext('2d');

            lineChartInstance = new Chart(LineChartCanvas, {
                type: 'bar',
                data: LineChartData,
                options: LineChartOptions
            });

            

            

            Swal.close();

            // if (disease !== "") {
                $('.resultLineDiv').html(`
                    <div class="alert alert-success" role="alert">
                        <strong>Office:</strong> ${disease} <br>
                        <strong>Total Survey:</strong> ${totalCount}
                    </div>
                `);
            // }

            // if()
            // resultLineDiv.html();
    

}
});
});
    </script>


