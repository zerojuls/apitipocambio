<!-- Main Body -->
<?php
//hacemos la petición a la api via curl
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => 'http://localhost:81/apitipocambio/api/ery/id/2014/x-api-key/8hu8fWMCIhCXyq0U4TP0CMJ9waHkCGNcsrqok8zS'
));
$response = curl_exec($ch);
?>
<!-- Styles -->
<style>

    .axis {
        font: 12px sans-serif;
    }

    .axis path,
    .axis line {
        fill: none;
        stroke: #000;
        shape-rendering: crispEdges;
    }

</style>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <h2 class="page-header">Api Tipos de Cambio - compra | 2014</h2>
            </div>
            <div class="col-lg-12">
                <code class="language-html" data-lang="html">
                    <pre>
                        <span class="nt">http://WEBSITE/apitipocambio/api/ery/id/2014/x-api-key/8hu8fWMCIhCXyq0U4TP0CMJ9waHkCGNcsrqok8zS</span>
                    </pre>
                </code>
            </div>
            <div id="d3graphic" class="col-lg-12">

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<!-- JavaScripts -->
<script type="text/javascript">

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
    data.forEach(function (d) {
        d.erd = parseDate(d.erd);
        d.erp = +d.erp;
    });

    x.domain(data.map(function (d) {
        return d.erd;
    }));
    y.domain([0, d3.max(data, function (d) {
            return d.erp;
        })]);

    svg.append("g")
            .attr("class", "x axis")
            .attr("transform", "translate(0," + height + ")")
            .call(xAxis)
            .selectAll("text")
            .style("text-anchor", "end")
            .attr("dx", "-.8em")
            .attr("dy", "-.55em")
            .attr("transform", "rotate(-90)");

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
            .attr("x", function (d) {
                return x(d.erd);
            })
            .attr("width", x.rangeBand())
            .attr("y", function (d) {
                return y(d.erp);
            })
            .attr("height", function (d) {
                return height - y(d.erp);
            });

// });

</script>
