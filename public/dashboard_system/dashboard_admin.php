
<!-- <link rel="stylesheet" href="AdminLTE/bower_components/jvectormap/jquery-jvectormap.css"> -->
<!-- <link rel="stylesheet" href="AdminLTE_new/plugins/jqvmap/jqvmap.min.css"> -->
<link rel="stylesheet" href="AdminLTE_new/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<link rel="stylesheet" href="AdminLTE_new/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">



<style>

.highcharts-figure,
.highcharts-data-table table {
    min-width: 500px;
    max-width: 900px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}


        #map{
            height: 100vh;
            width: 100%;
        }

        .info {
    padding: 6px 8px;
    font: 14px/16px Arial, Helvetica, sans-serif;
    background: white;
    background: rgba(255,255,255,0.8);
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    border-radius: 5px;
    color: #000 !important;
}
.info h4 {
    margin: 0 0 5px;
    color: #000 !important;
}
.info h4:after {
    margin: 0 0 5px;
    color: #000 !important;
}

.legend {
    line-height: 18px;
    color: #555;
}
.legend i {
    width: 18px;
    height: 18px;
    float: left;
    margin-right: 8px;
    opacity: 0.7;
}

.map-label {
    font-size: 14px;
    font-weight: bold;
    color: #333;  /* Dark color for better contrast */
    background-color: rgba(255, 255, 255, 0.7);  /* Semi-transparent background */
    padding: 2px 5px;  /* Padding around the text */
    border-radius: 3px; /* Rounded corners */
    text-align: center;
    box-shadow: 0px 0px 2px rgba(0,0,0,0.5); /* Slight shadow for readability */
}



    </style>
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
          <div class="col-12">

          


          <div class="card bg-gradient-gray" id="fullscreenDiv">
             
              <div class="card-body" style="height: 60vh; overflow: hidden;">

              <div class="row">
                  <div class="col-3">
                    <div class="form-group">

                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          <input autocomplete="off" type="text" placeholder="Enter Date Here..." class="form-control" id="reservation" onchange="alert('awit')">
                        </div>
                        </div>

                    </div>
                  <div class="col-8">
                    <select id="diseaseSelect" multiple="multiple" onchange="updateMapColors()" style="width: 100%;">
                        <?php
                        $diseases = query("select * from disease");
                        foreach ($diseases as $row):
                        ?>
                            <option value="<?php echo $row['diseaseId']; ?>" data-disease="<?php echo htmlspecialchars($row['diseaseName']); ?>">
                                <?php echo htmlspecialchars($row['diseaseName']); ?>
                            </option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                    </div>

                    <div class="col-1">
                    <button class="btn btn-info btn-block"  id="toggleFullscreen"><i class="fa fa-expand"></i></button>  
                    </div>
                </div>
              <div id="map" style="height: 50vh;"></div>
  <!-- <button id="focus-single">Focus on Australia</button>
  <button id="focus-multiple">Focus on Australia and Japan</button>
  <button id="focus-coords">Focus on Cyprus</button>
  <button id="focus-init">Return to the initial state</button> -->
  
              </div>
            </div>


           
            <!-- Default box -->
           
          </div>
        </div>



        <div class="card">
        <div class="card-header">
          <h3 >Data Visualization
          <form class="sales_chart_form float-right" data-url="data_analysis">
              <input type="hidden" name="action" value="chart">
              <button  class="btn btn-primary float-right ml-3" type="submit">Filter</button>
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


                    </h3>

          
        </div>
        <div class="card-body">
        


        <div class="row">
            <div class="col-4">
            <div class="highcharts-figure">
    <div id="container"></div>
   
</div>
            </div>
        </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Data Analysis
        </div>
        <!-- /.card-footer-->
      </div>

     
      </div>
    </section>
  </div>

  <script src="AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>

  <script src="AdminLTE_new/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="AdminLTE_new/plugins/moment/moment.min.js"></script>
<script src="AdminLTE_new/plugins/daterangepicker/daterangepicker.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="AdminLTE_new/plugins/jszip/jszip.min.js"></script>
<script src="AdminLTE_new/plugins/pdfmake/pdfmake.min.js"></script>
<script src="AdminLTE_new/plugins/pdfmake/vfs_fonts.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>





<!-- <link rel="stylesheet" media="all" href="vector_maps/jquery-jvectormap.css"/> -->
  <!-- <script src="assets/jquery-1.8.2.js"></script> -->
  <!-- <script src="vector_maps/jquery-jvectormap.js"></script>
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
  <script src="vector_maps/src/map.js"></script> -->
  <!-- <script src="public/dashboard_system/panabo_map.js"></script> -->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="data/line.js"></script>
<script src="data/point.js"></script>
<script src="data/polygon.js"></script>
<script src="data/nepaldata.js"></script>
<script src="data/panabojson.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script>




  </script>


<script>

    /*===================================================
                      OSM  LAYER               
===================================================*/

var jsonData = [];


// console.log(jsonData);
  var map = L.map('map').setView([7.358584, 125.649624], 12);
var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});
osm.addTo(map);

/*===================================================
                      MARKER               
===================================================*/

var singleMarker = L.marker([28.25255,83.97669]);
singleMarker.addTo(map);
var popup = singleMarker.bindPopup('This is a popup')
popup.addTo(map);

/*===================================================
                     TILE LAYER               
===================================================*/

var CartoDB_DarkMatter = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
subdomains: 'abcd',
	maxZoom: 19
});
// CartoDB_DarkMatter.addTo(map);

// Google Map Layer

googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
 });
//  googleStreets.addTo(map);

 // Satelite Layer
googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
   maxZoom: 20,
   subdomains:['mt0','mt1','mt2','mt3']
 });
// googleSat.addTo(map);

var Stamen_Watercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
 attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
subdomains: 'abcd',
minZoom: 1,
maxZoom: 16,
ext: 'jpg'
});
// Stamen_Watercolor.addTo(map);


/*===================================================
                      GEOJSON               
===================================================*/

// var linedata = L.geoJSON(lineJSON).addTo(map);
// var pointdata = L.geoJSON(pointJSON).addTo(map);
// var nepalData = L.geoJSON(nepaldataa).addTo(map);
var panabodata = L.geoJSON(panabodataa).addTo(map);
var polygondata = L.geoJSON(polygonJSON,{
    onEachFeature: function(feature,layer){
        layer.bindPopup('<b>This is a </b>' + feature.properties.name)
    },
    style:{
        fillColor: 'red',
        fillOpacity:1,
        color: 'green'
    }
}).addTo(map);



/*===================================================
                      LAYER CONTROL               
===================================================*/

var baseLayers = {
    "Satellite":googleSat,
    "Google Map":googleStreets,
    "Water Color":Stamen_Watercolor,
    "OpenStreetMap": osm,
};

var overlays = {
    "Marker": singleMarker,
    // "PointData":pointdata,
    // "LineData":linedata,
    "PolygonData":polygondata
};

L.control.layers(baseLayers, overlays).addTo(map);


/*===================================================
                      SEARCH BUTTON               
===================================================*/

// L.Control.geocoder().addTo(map);


/*===================================================
                      Choropleth Map               
===================================================*/

// L.geoJSON(statesData).addTo(map);


function getColor(d) {
    return d > 300 ? '#D63230' :
           d > 200  ? '#F39237' :
           d > 100  ? '#2C6E49' :
           d >= 1  ? '#2C6E49' :
                      '#5E6572';
}

function style(feature) {
  // console.log(feature);
    return {
        fillColor: getColor(feature.properties.density),
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '3',
        fillOpacity: 0.5
    };
}

L.geoJson(panabodataa, {style: style}).addTo(map);

function highlightFeature(e) {
    var layer = e.target;

    layer.setStyle({
        weight: 5,
        color: '#666',
        dashArray: '',
        fillOpacity: 0.5
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        layer.bringToFront();
    }

    info.update(layer.feature.properties);
}

function resetHighlight(e) {
    geojson.resetStyle(e.target);
    info.update();
}

var geojson;
// ... our listeners
// geojson = L.geoJson(statesData);

function zoomToFeature(e) {
    map.fitBounds(e.target.getBounds());
}

// function onEachFeature(feature, layer) {
//     layer.on({
//         mouseover: highlightFeature,
//         mouseout: resetHighlight,
//         click: zoomToFeature
//     });
// }

// function onEachFeature(feature, layer) {
//     // Add permanent tooltip for barangay names
//     layer.bindTooltip(feature.properties.name, {
//         permanent: true,     // The label will always be visible
//         direction: 'center', // Tooltip appears in the center of the polygon
//         className: 'map-label'  // Class for custom styling
//     }).openTooltip(); // Display the label immediately

//     // Optional mouseover, mouseout, and click events
//     layer.on({
//         mouseover: highlightFeature,
//         mouseout: resetHighlight,
//         click: zoomToFeature
//     });
// }

function onEachFeature(feature, layer) {
    // Add mouseover event to show tooltip on hover
    layer.on('mouseover', function(e) {
        layer.bindTooltip(feature.properties.name, {
            direction: 'center',  // Tooltip appears in the center of the polygon
            className: 'map-label'  // Class for custom styling
        }).openTooltip(e.latlng);  // Show the tooltip at the location of the mouse cursor
    });

    // Add mouseout event to hide the tooltip when not hovering
    layer.on('mouseout', function(e) {
        layer.closeTooltip();  // Close the tooltip when the mouse leaves the layer
    });

        layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: zoomToFeature
    });

    // Optional click event to zoom into the feature
    layer.on('click', zoomToFeature);
}

geojson = L.geoJson(panabodataa, {
    style: style,
    onEachFeature: onEachFeature
}).addTo(map);

var info = L.control();

info.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
    this.update();
    return this._div;
};

// method that we will use to update the control based on feature properties passed
info.update = function (props) {
    if (!props) {
        this._div.innerHTML = '<h4>Disease Density</h4>Hover over a barangay';
        return;
    }

    // Collect the selected diseases
    let selectedDiseases = [];
    let selectedDiseasesId = [];

    $('#diseaseSelect option:selected').each(function () {
        let disease = $(this).data('disease'); // Get the disease name
        let disease_id = $(this).val(); // Get the disease ID
       
        selectedDiseases.push(disease);  
        selectedDiseasesId.push(disease_id);  
    });

    // Build the dynamic content based on selected diseases
    let content = `<h4>Disease Density</h4><b>${props.name}</b><br><br>`;
    let total = 0;

    selectedDiseasesId.forEach((diseaseId, index) => {
        if (props[diseaseId] !== undefined) {
            content += `<b>${selectedDiseases[index].toUpperCase()}:</b> <span style="float: right;">${props[diseaseId]}</span><br>`;
            total += props[diseaseId];  // Accumulate total density
        }
    });

    // Add the total density if there are selected diseases
    if (selectedDiseases.length > 0) {
        content += `<b>TOTAL:</b> <span style="float: right;">${total}</span>`;
    }

    // Update the info div with the new content
    this._div.innerHTML = content;
};


info.addTo(map);

var legend = L.control({position: 'bottomleft'});

legend.onAdd = function (map) {

    var div = L.DomUtil.create('div', 'info legend'),
        grades = [0, 100, 200, 500, 1000],
        labels = [];

    // loop through our density intervals and generate a label with a colored square for each interval
    for (var i = 0; i < grades.length; i++) {
        div.innerHTML +=
            '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
            grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
    }

    return div;
};
$('#reservation').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });

    $('#reservation').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
        updateMapColors();
    });

    $('#reservation').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
legend.addTo(map);
function updateMapColors() {
    let dateRange = $('#reservation').val();
    let selectedDiseases = $('#diseaseSelect').val(); // Get selected values from Select2

    console.log('Selected Diseases:', selectedDiseases);

    $.ajax({
        type: 'POST',
        url: 'ajaxMapDisease',
        data: {
            action: "ajaxMapDisease",
            selectedDiseases: selectedDiseases,
            dateRange: dateRange
        },
        success: function(data) {
            let densityData = JSON.parse(data);
            console.log(densityData);

            panabodataa.features.forEach(function(feature) {
                let id = feature.properties.id;
                if (densityData.hasOwnProperty(id)) {
                    feature.properties.density = Object.values(densityData[id]).reduce((a, b) => a + b, 0);
                    Object.assign(feature.properties, densityData[id]);
                }
            });

            polygondata.clearLayers();
            polygondata = L.geoJSON(panabodataa, {
                style: style,
                onEachFeature: onEachFeature
            }).addTo(map);

            legend.addTo(map);
        }
    });
}


</script>

<script>
$(document).ready(function(){
    $("#toggleFullscreen").click(function(){
        var elem = $("#fullscreenDiv").get(0); // Get the DOM element
        if (!document.fullscreenElement) {
            elem.requestFullscreen().catch(err => {
                alert(`Error attempting to enable full-screen mode: ${err.message} (${err.name})`);
            });
            $("#map").css("height", "800px"); // Set height to 800px when entering fullscreen
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            }
            $("#map").css("height", "400px"); // Set height to 400px when exiting fullscreen
        }
    });
});


$('#mySelect').select2({
        // This option will prevent the selected options from showing in the dropdown
        templateResult: function(data) {
            // Check if the option is selected
            if (data.selected) {
                return null; // Do not show the selected option
            }
            return data.text; // Show the option text
        },
        templateSelection: function(data) {
            return data.text; // Show the selected option text in the input
        },
        placeholder: "Select options",
        allowClear: true
    });

    // Event listener to refresh the dropdown options
    $(document).ready(function() {
    // Initialize Select2
    $('#diseaseSelect').select2({
        placeholder: "Select diseases",
        allowClear: true
    });

    // Handle the change event
    $('#diseaseSelect').on('change', function() {
        updateMapColors(); // Call the function to update the map colors
    });
});
</script>

<script>
$(document).ready(function() {
      // Trigger the form submit during document ready
      // $('.deceased_chart_form').submit();
      $('.sales_chart_form').submit();
    });
  </script>



<script>

$('.sales_chart_form').submit(function (e) {
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
    Swal.close();
    var o = JSON.parse(results);
    var diseaseData = o.disease;

    const speciesMap = {
        dog: {
            total: 0,
            diseases: [],
            color: "#00c0ef"
        },
        cat: {
            total: 0,
            diseases: [],
            color: "#3c8dbc"
        },
        both: {
            total: 0,
            diseases: [],
            color: "#000"
        }
    };

    // Grouping the diseases by species
    diseaseData.forEach(function (item) {
        const species = item.species_affected.toLowerCase(); // Ensure consistent case
        const disease = item.label;
        const value = item.value;

        // Update total for species
        speciesMap[species].total += value;
        speciesMap[species].diseases.push({ name: disease, value: value });
    });

    // Prepare chart data for pie chart
    const browserData = Object.keys(speciesMap).map(function (species) {
        return {
            name: species.charAt(0).toUpperCase() + species.slice(1), // Capitalize the first letter
            y: speciesMap[species].total,
            color: speciesMap[species].color,
            drilldown: species.charAt(0).toUpperCase() + species.slice(1) // Drilldown name
        };
    });

    const versionsData = [];
    Object.keys(speciesMap).forEach(function (species) {
        speciesMap[species].diseases.forEach(function (disease) {
          
            versionsData.push({
                name: disease.name,
                y: disease.value,
                color: Highcharts.color(speciesMap[species].color).brighten(0.2).get(),
                custom: {
                    version: species.charAt(0).toUpperCase() + species.slice(1) // Species name for tooltip
                }
            });
        });
    });

    // console.log(versionsData);

    // Destroy any existing chart instance
    if (window.pieChart) {
        window.pieChart.destroy();
    }

    // Create the chart
    window.pieChart = Highcharts.chart('container', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Diseases by Species Affected',
            align: 'left'
        },
        subtitle: {
            text: 'Hover on the slices',
            align: 'left'
        },
        plotOptions: {
            pie: {
                shadow: false,
                center: ['50%', '50%']
            }
        },
        tooltip: {
            valueSuffix: ''
        },
        series: [{
            name: 'Species Affected',
            data: browserData,
            size: '45%',
            dataLabels: {
                color: '#ffffff',
                distance: '-50%'
            }
        }, {
            name: 'Diseases',
            data: versionsData,
            size: '80%',
            innerSize: '60%',
            dataLabels: {
              
              format: '<b>{point.name}:</b> <span style="opacity: 1">{y}</span>', // Display disease name
              filter: {
                  property: 'y',
                  operator: '>',
                  value: 0
              },
              style: {
                  fontWeight: 'bold'
              }
          },
            id: 'versions'
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 400
                },
                chartOptions: {
                    series: [{
                    }, {
                        id: 'versions',
                        dataLabels: {
                            distance: 20,
                            // format: '{point.custom.version}',
                            filter: {
                                property: 'percentage',
                                operator: '>',
                                value: 2
                            }
                        }
                    }]
                }
            }]
        }
    });
}
});




});



// const colors = Highcharts.getOptions().colors,
//     categories = [
//         'Chrome',
//         'Safari',
//         'Edge',
//         'Firefox',
//         'Other'
//     ],
//     data = [
//         {
//             y: 61.04,
//             color: colors[2],
//             drilldown: {
//                 name: 'Chrome',
//                 categories: [
//                     'Chrome v97.0',
//                     'Chrome v96.0',
//                     'Chrome v95.0',
//                     'Chrome v94.0',
//                     'Chrome v93.0',
//                     'Chrome v92.0',
//                     'Chrome v91.0',
//                     'Chrome v90.0',
//                     'Chrome v89.0',
//                     'Chrome v88.0',
//                     'Chrome v87.0',
//                     'Chrome v86.0',
//                     'Chrome v85.0',
//                     'Chrome v84.0',
//                     'Chrome v83.0',
//                     'Chrome v81.0',
//                     'Chrome v89.0',
//                     'Chrome v79.0',
//                     'Chrome v78.0',
//                     'Chrome v76.0',
//                     'Chrome v75.0',
//                     'Chrome v72.0',
//                     'Chrome v70.0',
//                     'Chrome v69.0',
//                     'Chrome v56.0',
//                     'Chrome v49.0'
//                 ],
//                 data: [
//                     36.89,
//                     18.16,
//                     0.54,
//                     0.7,
//                     0.8,
//                     0.41,
//                     0.31,
//                     0.13,
//                     0.14,
//                     0.1,
//                     0.35,
//                     0.17,
//                     0.18,
//                     0.17,
//                     0.21,
//                     0.1,
//                     0.16,
//                     0.43,
//                     0.11,
//                     0.16,
//                     0.15,
//                     0.14,
//                     0.11,
//                     0.13,
//                     0.12
//                 ]
//             }
//         },
//         {
//             y: 9.47,
//             color: colors[3],
//             drilldown: {
//                 name: 'Safari',
//                 categories: [
//                     'Safari v15.3',
//                     'Safari v15.2',
//                     'Safari v15.1',
//                     'Safari v15.0',
//                     'Safari v14.1',
//                     'Safari v14.0',
//                     'Safari v13.1',
//                     'Safari v13.0',
//                     'Safari v12.1'
//                 ],
//                 data: [
//                     0.1,
//                     2.01,
//                     2.29,
//                     0.49,
//                     2.48,
//                     0.64,
//                     1.17,
//                     0.13,
//                     0.16
//                 ]
//             }
//         },
//         {
//             y: 9.32,
//             color: colors[5],
//             drilldown: {
//                 name: 'Edge',
//                 categories: [
//                     'Edge v97',
//                     'Edge v96',
//                     'Edge v95'
//                 ],
//                 data: [
//                     6.62,
//                     2.55,
//                     0.15
//                 ]
//             }
//         },
//         {
//             y: 8.15,
//             color: colors[1],
//             drilldown: {
//                 name: 'Firefox',
//                 categories: [
//                     'Firefox v96.0',
//                     'Firefox v95.0',
//                     'Firefox v94.0',
//                     'Firefox v91.0',
//                     'Firefox v78.0',
//                     'Firefox v52.0'
//                 ],
//                 data: [
//                     4.17,
//                     3.33,
//                     0.11,
//                     0.23,
//                     0.16,
//                     0.15
//                 ]
//             }
//         },
//         {
//             y: 11.02,
//             color: colors[6],
//             drilldown: {
//                 name: 'Other',
//                 categories: [
//                     'Other'
//                 ],
//                 data: [
//                     11.02
//                 ]
//             }
//         }
//     ],
//     browserData = [],
//     versionsData = [],
//     dataLen = data.length;

// let i,
//     j,
//     drillDataLen,
//     brightness;


// // Build the data arrays
// for (i = 0; i < dataLen; i += 1) {

//     // add browser data
//     browserData.push({
//         name: categories[i],
//         y: data[i].y,
//         color: data[i].color
//     });

//     // add version data
//     drillDataLen = data[i].drilldown.data.length;
//     for (j = 0; j < drillDataLen; j += 1) {
//         const name = data[i].drilldown.categories[j];
//         brightness = 0.2 - (j / drillDataLen) / 5;
//         versionsData.push({
//             name,
//             y: data[i].drilldown.data[j],
//             color: Highcharts.color(data[i].color).brighten(brightness).get(),
//             custom: {
//                 version: name.split(' ')[1] || name.split(' ')[0]
//             }
//         });
//     }
// }

// // Create the chart
// Highcharts.chart('container', {
//     chart: {
//         type: 'pie'
//     },
//     title: {
//         text: 'Browser market share, January, 2022',
//         align: 'left'
//     },
//     subtitle: {
//         text: 'Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>',
//         align: 'left'
//     },
//     plotOptions: {
//         pie: {
//             shadow: false,
//             center: ['50%', '50%']
//         }
//     },
//     tooltip: {
//         valueSuffix: '%'
//     },
//     series: [{
//         name: 'Browsers',
//         data: browserData,
//         size: '45%',
//         dataLabels: {
//             color: '#ffffff',
//             distance: '-50%'
//         }
//     }, {
//         name: 'Versions',
//         data: versionsData,
//         size: '80%',
//         innerSize: '60%',
//         dataLabels: {
//             format: '<b>{point.name}:</b> <span style="opacity: 0.5">' +
//                 '{y}%</span>',
//             filter: {
//                 property: 'y',
//                 operator: '>',
//                 value: 1
//             },
//             style: {
//                 fontWeight: 'normal'
//             }
//         },
//         id: 'versions'
//     }],
//     responsive: {
//         rules: [{
//             condition: {
//                 maxWidth: 400
//             },
//             chartOptions: {
//                 series: [{
//                 }, {
//                     id: 'versions',
//                     dataLabels: {
//                         distance: 10,
//                         format: '{point.custom.version}',
//                         filter: {
//                             property: 'percentage',
//                             operator: '>',
//                             value: 2
//                         }
//                     }
//                 }]
//             }
//         }]
//     }
// });

 
</script>
<?php require("layouts/footer.php") ?>