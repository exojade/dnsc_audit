
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
        <div class="col-md-12">




        <form class="sales_chart_form float-right" data-url="data_analysis">
              <input type="hidden" name="action" value="chart">
              <button style="margin-left: 5px;" class="btn btn-primary float-right" type="submit">Filter</button>
              <div style="margin-left: 5px;" class="form-group float-right">
                  <input name="year" type="number" value="<?php echo(date("Y")); ?>" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
                <div style="margin-left: 5px;" class="form-group float-right">
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
              <div style="margin-left: 5px;" class="form-group float-right">
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
            </form>

            <br>
            <br>
            <br>





        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo(date("Y")) ?> Report Visitation for Checkup and Vaccination</h3>

                
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
        </div>

        <div class="col-md-6">
        <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Vaccinated</h3>

           
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
        </div>

        <div class="col-md-6">
        <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Disease Chart</h3>

              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                <ul class="chart-legend clearfix text-left" style="margin-left: 20px;">
                    <li><i class="fa fa-circle text-red"></i> Male</li>
                    <li><i class="fa fa-circle text-green"></i> Female</li>
                  </ul>
              </div>
              <!-- /.card-body -->
            </div>
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

<script src="AdminLTE_new/plugins/chart.js/Chart.min.js"></script>

  <script>
$(document).ready(function() {
      // Trigger the form submit during document ready
      // $('.deceased_chart_form').submit();
      $('.sales_chart_form').submit();
    });
  </script>


<script>
$('.sales_chart_form').submit(function(e) {
var form = $(this)[0];
var formData = new FormData(form);
console.log(formData);
  var promptmessage = 'This form will be submitted. Are you sure you want to continue?';
  var prompttitle = 'Data submission';
e.preventDefault();
  var url = $(this).data('url');
    var promptmessage = 'This form will be submitted. Are you sure you want to continue?';
    var prompttitle = 'Data submission';
    e.preventDefault();

    Swal.fire({title: 'Please wait...', imageUrl: 'AdminLTE_new/dist/img/loader.gif', showConfirmButton: false});
    $.ajax({
            type: 'post',
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function (results) {
            var o = jQuery.parseJSON(results);
            console.log(o);
            areaChartData.labels = o.labels;
            areaChartData.datasets[0].data = o.dataset;
              lineChart.destroy();
              // pieChart.clear();
              var lineChartCanvas = $('#lineChart').get(0).getContext('2d');
              lineChart = new Chart(lineChartCanvas).Line(areaChartData, areaChartOptions);
              console.log(pieChart);

              pieChart.destroy();
              PieData = o.disease;
              var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
              pieChart = new Chart(pieChartCanvas).Doughnut(PieData, pieOptions);
              $('.chart-legend').empty();
            PieData.forEach(function(item) {
                var legendItem = '<li><i class="fa fa-circle" style="color:' + item.color + '"></i> ' + item.label + '</li>';
                $('.chart-legend').append(legendItem);
            });
              Swal.close();
            }
        });
});

var areaChartData2 = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          label               : 'Checkup',
          // backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          // pointRadius          : false,
          // pointColor          : '#3b8bba',
          // pointStrokeColor    : 'rgba(60,141,188,1)',
          // pointHighlightFill  : '#fff',
          // pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90, 84, 56, 66, 22, 76],
          lineTension: 0,
          fill                : false 
        },
        {
          label               : 'Vaccination',
          // backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          // pointRadius         : false,
          // pointColor          : 'rgba(210, 214, 222, 1)',
          // pointStrokeColor    : '#c1c7d1',
          // pointHighlightFill  : '#fff',
          // pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40, 65, 54, 35, 62, 87],
          lineTension: 0,
          fill                : false 
        },
      ]
    }

// // var barChartCanvas = $('#lineChart').get(0).getContext('2d')
//     var barChartData = $.extend(true, {}, areaChartData2)
//     var temp0 = areaChartData2.datasets[0]
//     var temp1 = areaChartData2.datasets[1]
//     barChartData.datasets[0] = temp1
//     barChartData.datasets[1] = temp0

//     var barChartOptions = {
//       responsive              : true,
//       maintainAspectRatio     : false,
//       datasetFill             : true
//     }

//     new Chart(barChartCanvas, {
//       type: 'line',
//       data: barChartData,
//       options: barChartOptions
//     })






//     var barChartDataSet = {
//   labels: ['2022', '2023', '2024'],
//   datasets: [
//     {
//       label: 'Vaccinated',
//       backgroundColor: 'rgba(60,141,188,0.9)',
//       borderColor: 'rgba(60,141,188,0.8)',
//       data: [35, 37, 25],
//       fill: false, // Ensure there is no background fill
//       tension: 0 // Make lines straight if this were a line chart
//     }
//   ]
// };

// var barChart2Canvas = $('#barChart').get(0).getContext('2d');

// // No need to swap datasets since there is only one
// var barChartData2 = $.extend(true, {}, barChartDataSet);

// var barChartOptions = {
//   responsive: true,
//   maintainAspectRatio: false
// };

// new Chart(barChart2Canvas, {
//   type: 'bar', // Use 'bar' for bar chart
//   data: barChartData2,
//   options: barChartOptions
// });

// $('.sales_chart_form').submit(function(e) {
// var form = $(this)[0];
// var formData = new FormData(form);
// console.log(formData);
//   var promptmessage = 'This form will be submitted. Are you sure you want to continue?';
//   var prompttitle = 'Data submission';
// e.preventDefault();
//   var url = $(this).data('url');
//     var promptmessage = 'This form will be submitted. Are you sure you want to continue?';
//     var prompttitle = 'Data submission';
//     e.preventDefault();

//     Swal.fire({title: 'Please wait...', imageUrl: 'AdminLTE/dist/img/loader.gif', showConfirmButton: false});
//     $.ajax({
//             type: 'post',
//             url: url,
//             data: formData,
//             processData: false,
//             contentType: false,
//             success: function (results) {
//             var o = jQuery.parseJSON(results);
            
//             areaChartData.labels = o.labels;
//             areaChartData.datasets[0].data = o.dataset;
//             lineChart2.destroy();
//             var lineChartCanvas2 = $('#lineChart2').get(0).getContext('2d');
//             lineChart2 = new Chart(lineChartCanvas2).Line(areaChartData, areaChartOptions);
//             Swal.close();
//             }
//         });
// });
  
var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    }


    var areaChartOptions = {
      bezierCurve: false,
      scales: {
    yAxes: [{
      ticks: {
        beginAtZero: true,
        callback: function (value, index, values) {
          return value.toLocaleString();
        }
      }
    }]
  },
      //Boolean - If we should show the scale at all
      showScale               : true,

      tooltips: {
    callbacks: {
      label: function (tooltipItem, data) {
        return data.datasets[tooltipItem.datasetIndex].label + ': ' + tooltipItem.yLabel.toLocaleString();
      }
    }
  },
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      // bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    // areaChart.Line(areaChartData, areaChartOptions)

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    areaChartOptions.datasetFill = false
    lineChart = new Chart(lineChartCanvas).Line(areaChartData, areaChartOptions);

// var barChart2Canvas = $('#barChart').get(0).getContext('2d');

// // No need to swap datasets since there is only one
// var barChartData2 = $.extend(true, {}, barChartDataSet);

// var barChartOptions = {
//   responsive: true,
//   maintainAspectRatio: false
// };

// new Chart(barChart2Canvas, {
//   type: 'bar', // Use 'bar' for bar chart
//   data: barChartData2,
//   options: barChartOptions
// });

var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var PieData        = [
      {
        value    : 700,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Chrome'
      },
      {
        value    : 500,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'IE'
      },
      {
        value    : 400,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'FireFox'
      },
      {
        value    : 600,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Safari'
      },
      {
        value    : 300,
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'Opera'
      },
      {
        value    : 100,
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : 'Navigator'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    // lineChart2 = new Chart(lineChartCanvas2).Line(areaChartData, areaChartOptions);
    pieChart = new Chart(pieChartCanvas).Doughnut(PieData, pieOptions);




    







    var areaChartData2 = {
      labels  : ['2022', '2023', '2024'],
      datasets: [
        {
          label               : 'Vaccinated',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80]
        }
      ]
    }

    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData2
    barChartData.datasets[0].fillColor   = '#00a65a'
    barChartData.datasets[0].strokeColor = '#00a65a'
    barChartData.datasets[0].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)

</script>

<?php require("layouts/footer.php") ?>