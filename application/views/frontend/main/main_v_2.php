<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Cesar Mamani Dominguez">

        <title>API Tipo de cambio</title>

        <script src="http://d3js.org/d3.v3.min.js" type="text/javascript"></script>
        <style> 
    /* set the CSS */
    /*body { font: 12px Arial;}*/

    path { 
        stroke: steelblue;
        stroke-width: 2;
        fill: none;
    }

    .axis path,
    .axis line {
        fill: none;
        stroke: grey;
        stroke-width: 1;
        shape-rendering: crispEdges;
    }   
</style>
<!-- Page
    </head>
    <body>

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script type="text/javascript">
            //hacemos la petición a la api con ajax para obtener un usuario por su id
            $.ajax({
            url: 'http://localhost:81/apitipocambio/api/user/id/1/x-api-key/8hu8fWMCIhCXyq0U4TP0CMJ9waHkCGNcsrqok8zS',
                    type:'GET',
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (response) {
                        console.log(response);
                    }
            });
            //});
        </script>

        <?php
//hacemos la petición a la api via curl
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => 'http://localhost:81/apitipocambio/api/user/id/1/x-api-key/8hu8fWMCIhCXyq0U4TP0CMJ9waHkCGNcsrqok8zS'
        ));
        $response = curl_exec($ch);
        echo "<pre>";
        var_dump($response);
        echo "</pre>";
//como pedimos un json, debemos decodificarlo con json_decode para accederlo
        $jsondecode = json_decode($response);
        echo "Usuario: ".$jsondecode->username;
        echo "<br>";
        // echo $jsondecode['username'];
        echo "Fecha de registro: ".$jsondecode->register_date;
        // echo $jsondecode['register_date'];
        ?>	
    </body>

    <script type="text/javascript">
    var csvdata;
    var jsondata;
 
// OTRO javascript
    // FUNCION PETICION REST DESDE EL CONTROLADOR API
    //hacemos la petición a la api con ajax para obtener un usuario por su id
//    $.ajax({
//        url: 'http://localhost:81/apitipocambio/api/ery/id/2014/x-api-key/8hu8fWMCIhCXyq0U4TP0CMJ9waHkCGNcsrqok8zS',
//        type: 'GET',
//        success: function (data) {
//
//            // var json = $.parseJSON(data);
//            jsondata = data;
//            csvdata = JSON2CSV(data);
//            // console.log(jsondata);
//            // console.log(csvdata);
//
//        },
//        error: function (response) {
//            console.log(response);
//        }
//    });
/*************WORKING!***********/

// Set the dimensions of the canvas / graph
// var margin = {top: 30, right: 20, bottom: 30, left: 50},
//     width = 600 - margin.left - margin.right,
//     height = 270 - margin.top - margin.bottom;

// // Parse the date / time
// var parseDate = d3.time.format("%d-%b-%y").parse;

// // Set the ranges
// var x = d3.time.scale().range([0, width]);
// var y = d3.scale.linear().range([height, 0]);

// // Define the axes
// var xAxis = d3.svg.axis().scale(x)
//     .orient("bottom").ticks(5);

// var yAxis = d3.svg.axis().scale(y)
//     .orient("left").ticks(5);

// // Define the line
// var valueline = d3.svg.line()
//     .x(function(d) { return x(d.erd); })
//     .y(function(d) { return y(d.erp); });
    
// // Adds the svg canvas
// var svg = d3.select("#d3graphic")
//     .append("svg")
//         .attr("width", width + margin.left + margin.right)
//         .attr("height", height + margin.top + margin.bottom)
//     .append("g")
//         .attr("transform", 
//               "translate(" + margin.left + "," + margin.top + ")");

// // Get the data
// data = <?php echo $response ?>
// ;

// //d3.csv("data.csv", function(error, data) {
//    data.forEach(function(d) {
//         d.erd = parseDate(d.erd);
//         d.erp = +d.erp;
//     });

//     // Scale the range of the data
//     x.domain(d3.extent(data, function(d) { return d.erd; }));
//     y.domain([0, d3.max(data, function(d) { return d.erp; })]);

//     // Add the valueline path.
//     svg.append("path")
//         .attr("class", "line")
//         .attr("d", valueline(data));

//     // Add the X Axis
//     svg.append("g")
//         .attr("class", "x axis")
//         .attr("transform", "translate(0," + height + ")")
//         .call(xAxis);

//     // Add the Y Axis
//     svg.append("g")
//         .attr("class", "y axis")
//         .call(yAxis);

/****************NEW WORKING!***************/

var margin = {top: 20, right: 20, bottom: 70, left: 40},
    width = 600 - margin.left - margin.right,
    height = 300 - margin.top - margin.bottom;

// Parse the date / time
var parseDate = d3.time.format("%Y-%m").parse;

var x = d3.scale.ordinal().rangeRoundBands([0, width], .05);

var y = d3.scale.linear().range([height, 0]);

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom")
    .tickFormat(d3.time.format("%Y-%m"));

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left")
    .ticks(10);

var svg = d3.select("#d3graphic").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", 
          "translate(" + margin.left + "," + margin.top + ")");

// Get the data
    data = <?php echo $response ?>;
// d3.csv("bar-data.csv", function(error, data) {
    data.forEach(function(d) {
        d.erd = parseDate(d.erd);
        d.erp = +d.erp;
    });
    
  x.domain(data.map(function(d) { return d.erd; }));
  y.domain([0, d3.max(data, function(d) { return d.erp; })]);

  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis)
    .selectAll("text")
      .style("text-anchor", "end")
      .attr("dx", "-.8em")
      .attr("dy", "-.55em")
      .attr("transform", "rotate(-90)" );

  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis)
    .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", ".71em")
      .style("text-anchor", "end")
      .text("Value ($)");

  svg.selectAll("bar")
      .data(data)
    .enter().append("rect")
      .style("fill", "steelblue")
      .attr("x", function(d) { return x(d.erd); })
      .attr("width", x.rangeBand())
      .attr("y", function(d) { return y(d.erp); })
      .attr("height", function(d) { return height - y(d.erp); });

// });

</script>
</html>