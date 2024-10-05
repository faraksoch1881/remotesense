<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Map with GeoJSON via Ajax</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@1.0.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline@1.0.0"></script>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="js-colormaps.js"></script>

    <style>
           /* Make sure the body and html have 100% height */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    /* Set the map container to take up 100% of the width and height */
    #map {
        width: 100%;
        height: 100%;
    }
/* Style the legend container */
#legend {
    position: absolute;
    bottom: 30px; /* Distance from the bottom */
    left: 30px;   /* Distance from the left */
    z-index: 1000;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Style for the span elements inside the legend */
#legend span {
    color: white;                /* White text color */
    font-size: 18px;
    font-weight: bold;
    text-shadow: 1px 1px 1px black; /* Optional: to improve visibility */
}


    /* Color scale bar */
    #color-scale {
        width: 20px;
        height: 200px;
        background: linear-gradient(to top, rgb(255, 255, 255), rgb(0, 0, 0));
        position: relative;
        margin-bottom: 10px;
    }

#radioDiv {
    background-color: #e0e0e0; /* Light grey background */
    border-radius: 15px;       /* Rounded corners */
    padding: 15px;             /* Padding around the radio buttons */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for a nice effect */
    width: fit-content;        /* Content-based width */

    /* Positioning at bottom right */
    position: fixed;           /* Fixed positioning to stick to viewport */
    bottom: 40px;              /* 20px from the bottom */
    right: 20px;               /* 20px from the right */

    z-index: 1000;             /* Ensure it's on top of other elements */
}

#radioDiv h4 {
    margin-top: 0;             /* No top margin for heading */
    font-family: Arial, sans-serif; /* Font styling */
    color: #333;               /* Text color */
}

#radioDiv input {
    margin-right: 5px;         /* Space between radio button and text */
}

        .slide-box {
            display: none;
            width: 100%;
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
            height: 400px;
        }

        /* Ensure comments stay inside commentList and scroll */
        .comment-list {
    max-height: 200px;    /* Restrict the height for scrolling */
    overflow-y: auto;     /* Enable scroll */
    padding: 10px;
    border: 1px solid #ccc;
    background-color: #fff;
    border-radius: 5px;
    text-align: left; 
        }

        .comment-item {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }

        .comment-meta {
            font-size: 12px;
            color: #6c757d;
            margin-bottom: 5px;
        }

        .comment-text {
            font-size: 14px;
            color: #343a40;
        }

</style>


</head>


<body >

    <!-- Legend Container -->
<div id="legend">
        <span id="max-value-label"></span>
    <div id="color-scale"></div>
    <span id="min-value-label"></span>

</div>



<div id="map"></div>

<!-- Modal for displaying the chart -->
<div class="modal fade" id="chartModal" tabindex="-1" aria-labelledby="chartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h6 class="modal-title w-100" id="subtitle">Modal Header</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <canvas id="myChart"></canvas>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer d-flex align-items-center">
                <div id="collapseToggle" class="me-2">
                    <i id="collapseIcon" class="fas fa-chevron-down"></i>
                </div>
                <div id="slideBox" class="slide-box">
                    <div>
                        <textarea id="comment" class="form-control mb-2" placeholder="Enter your comment"></textarea>
                       <div style="display: flex; justify-content: space-between; align-items: center;">
    <input type="text" id="username" class="form-control mb-2" placeholder="Enter your name" style="width: 60%; font-size: 0.9rem;">
    <button class="btn btn-primary" onclick="submitComment()" style="margin-left: 10px;">Submit</button>
</div>
                    </div>
<p id="cmntCount" style="font-weight: bold; margin-bottom: 10px; text-align: left;">Total Comments: 0</p>

                    <!-- Comment list with scroll bar -->
                    <div class="comment-list mt-3" id="commentList"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Modal -->


<script>

    // Global variables for min and max values of location.value
var minValue = Infinity;
var maxValue = -Infinity;
let id_cmnt, my_url;

var colorScaleDiv = document.getElementById('color-scale');
var gradientColors = [];


function createLegend(minValue, maxValue) {
    var legend = L.control({ position: "bottomright" });

    legend.onAdd = function () {
        var div = L.DomUtil.create("div", "info legend");
         // Set the maxValue label
        var maxValueLabel = document.getElementById('max-value-label');
        maxValueLabel.innerText = minValue.toFixed(2); // Set the max value

        var minValueLabel = document.getElementById('min-value-label');
        minValueLabel.innerText = maxValue.toFixed(2); // Set the min value


        // Color steps
        var scaleSteps = 10;
        var stepValue = (maxValue - minValue) / scaleSteps;
        var gradientColors = [];

        for (var i = 0; i <= scaleSteps; i++) {
            var value = minValue + i * stepValue;
            var normalizedValue = (value - minValue) / (maxValue - minValue);

            // Get color for the normalized value using Turbo colormap
            var colorArray = evaluate_cmap(normalizedValue, 'turbo', true);
            var color = `rgb(${colorArray[0]}, ${colorArray[1]}, ${colorArray[2]})`;
            gradientColors.push(color);
        }

        // Apply the gradient to the color bar
        var colorScaleDiv = document.querySelector('#color-scale');
        colorScaleDiv.style.background = `linear-gradient(to top, ${gradientColors.join(', ')})`;



        return div;
    };

    legend.addTo(map);
}
    // Initialize the map
    var map = L.map('map').setView([27.675579, 85.346373], 12); // Center coordinates and zoom level

    // Add OpenStreetMap tile layer
var tileLayers = {
            "OpenStreetMap": L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }),
            "CARTO Dark": L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://www.carto.com/attributions">CARTO</a>'
            }),
            "CARTO Voyager": L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://www.carto.com/attributions">CARTO</a>'
            }),
            "CARTO Positron": L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://www.carto.com/attributions">CARTO</a>'
            }),
            "Imagery": L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: '&copy; <a href="https://www.arcgis.com">Esri</a>'
            })
        };

        // Add one of the tile layers as the default layer
        tileLayers["OpenStreetMap"].addTo(map);

        // Add layer control to switch between the tile layers
        L.control.layers(tileLayers).addTo(map);


        // Define the URLs for the GeoJSON files
    var url1 = 'line/2019.geo.cont.geojson';
    var url2 = 'line/2024.geo.cont.geojson'; // Changed for the second GeoJSON file
    var url3 = 'asc_myloc.json'; // Changed for the second GeoJSON file
    var url4 = 'dsc_myloc.json'; // Changed for the second GeoJSON file
    var url5 = 'gnss_myloc.json'; // Changed for the second GeoJSON file
    var currentLayer;
    var myChart = null; // Initialize chart variable


function submitComment() {
    console.log(id_cmnt, my_url);
    const comment = document.getElementById('comment').value.trim();
    const username = document.getElementById('username').value.trim();
    const slideBox = document.getElementById('slideBox');

    // Reset the border color before checking
    slideBox.style.border = '';

    if (!comment || !username) {
        alert('Please fill in both the comment and your name.');

        // Apply red border if fields are empty
        slideBox.style.border = '2px solid red';
        return; // Prevent submission if either field is empty
    }
    const path_2 = `${my_url}/${id_cmnt}`; // e.g., "asc/5"
    
    // Proceed with submission if both fields are filled
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'save_comment.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const commentList = document.getElementById('commentList');
            const newComment = {
                username: username,
                comment: comment,
                date: new Date().toLocaleString() // Use the same date format as in loadComments
            };

            // Create a new comment element
            const commentDiv = document.createElement('div');
            commentDiv.classList.add('comment-item');
            commentDiv.innerHTML = `
                <div class="comment-meta">
                    <strong>${newComment.username}</strong> - ${newComment.date}
                </div>
                <div class="comment-text">${newComment.comment}</div>
            `;

            commentList.prepend(commentDiv); // Prepend to add latest comment on top
            
            // Clear input fields
            document.getElementById('comment').value = '';
            document.getElementById('username').value = '';
            slideBox.style.border = ''; // Remove red border on successful submission
        }
    };

    xhr.send('comment=' + encodeURIComponent(comment) + 
             '&username=' + encodeURIComponent(username) + 
             '&path_2=' + encodeURIComponent(path_2));
}


        // Load comments function
// Load comments function
function loadComments(id, my_url) {
    console.log("Loading comments for:", id, my_url);

    const path = `${my_url}/${id}`; // e.g., "asc/1.json"
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `load_comments.php?asc=${encodeURIComponent(path)}`, true); // Pass the path
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                const comments = JSON.parse(xhr.responseText);
                console.log("Comments loaded:", comments); // Debug log

                const commentList = document.getElementById('commentList');
                commentList.innerHTML = '';

                // Display the total comment count
                const cmntCountElement = document.getElementById('cmntCount');
                console.log("Comment Count Element:", cmntCountElement); // Debug log

                if (cmntCountElement) {
                    cmntCountElement.innerHTML = `Total Comments: ${comments.length}`;
                } else {
                    console.error("Comment count element not found!");
                }

                comments.forEach(comment => {
                    const commentDiv = document.createElement('div');
                    commentDiv.classList.add('comment-item');
                    commentDiv.innerHTML = `
                        <div class="comment-meta">
                            <strong>${comment.username}</strong> - ${comment.date}
                        </div>
                        <div class="comment-text">${comment.comment}</div>
                    `;
                    commentList.prepend(commentDiv); // Prepend to add latest comment on top
                });
            } else {
                console.error("Failed to load comments. Status:", xhr.status); // Log errors
            }
        }
    };
    xhr.send();
}

    // Function to load the chart based on the marker ID and display it in a modal
function loadChart(id, sub_value, my_urlParam) {
    console.log("loadchart",id,my_urlParam)

            id_cmnt = id; 
            my_url = my_urlParam;

        if (my_url === 'asc_myloc.json') {
        my_url = 'asc';
    } else if (my_url === 'dsc_myloc.json') {
        my_url = 'dsc';
    } else if (my_url === 'gnss_myloc.json') { // Corrected to use 'else if'
        my_url = 'gnss';
    }

    loadComments(id,my_url); 


    var chartModal = new bootstrap.Modal(document.getElementById('chartModal'), {});
    chartModal.show();

    // Get the currently selected radio button (geoLayer) value
    var selectedLayer = document.querySelector('input[name="geoLayer"]:checked').value;

    // Dynamically set the URL based on the selected layer
    const URLS = {
    url_3: 'asc_mydisp.json',
    url_4: 'dsc_mydisp.json',
    url_5_id1: 'nast_disp.json',
    url_5_id_default: 'kkn4_disp.json'
};

var in_angle;
var url = '';
switch (selectedLayer) {
    case 'url3':
        url = URLS.url_3;
        in_angle = 33.99;
        break;
    case 'url4':
        url = URLS.ur_4;
        in_angle = 33.98;
        break;
    case 'url5':
        url = (id === 1) ? URLS.url_5_id1 : URLS.url_5_id_default;
        in_angle = 0;
        break;
    default:
        console.error('Invalid layer selected'); // Handle unexpected cases
        break;
}



 function calculateSlopeInDays(data_slope) {
    let n = data_slope.length;
    let sumX = 0, sumY = 0, sumXY = 0, sumX2 = 0;

    for (let i = 0; i < n; i++) {
      let x = new Date(data_slope[i].x).getTime() / (1000 * 60 * 60 * 24); // Convert to days
      let y = data_slope[i].y / ( Math.cos(in_angle * Math.PI / 180));
      sumX += x;
      sumY += y;
      sumXY += x * y;
      sumX2 += x * x;
    }

    let slope = ((n * sumXY - sumX * sumY) / (n * sumX2 - sumX * sumX))*365;
    return slope;
  }

// Make AJAX request to fetch data based on selected URL
$.ajax({
    url: url,
    dataType: 'json',
    success: function (data) {
        // Log the fetched data to verify its structure
        

        // Filter the data based on the id
        var filteredData = data.map(item => ({
            Date: item.Date,
            Value: item[id.toString()]  // Dynamically get the value for the clicked marker id
        }));


        // Prepare the chart data
        var chartData = {
            datasets: [{
                label: `Dataset for ID ${id}`,
                data: filteredData.map(item => ({
                    x: item.Date, // Assuming Date is already in MM/DD/YYYY format
                    y: item.Value
                })), 
                borderColor: '#000000',
                fill: false,
                backgroundColor: '#000000',
                showLine: false,
              trendlineLinear: {
              style: "red",
              lineStyle: "solid",
              width: 2,
              projection: true
            },
            }]
        };



let data_slope = chartData.datasets[0].data;
let slopeInDays = calculateSlopeInDays(data_slope);
let filt_slope_text = `${slopeInDays.toFixed(3)} mm/yr`;  // Format as filtered slope with 3 decimal places
let slope_los= `${sub_value.toFixed(3)} mm/yr`;  // Format as filtered slope with 3 decimal places

document.getElementById('subtitle').innerHTML = `<font color="red">V₁(filt) = <strong>${filt_slope_text}</strong></font>,&nbsp;&nbsp;&nbsp;V₂ (LOS) = <strong>${slope_los}
</strong>`;

        // Destroy previous chart instance if it exists
        if (myChart !== null) {
            myChart.destroy();
        }

        // Create a new chart instance
        myChart = new Chart('myChart', {
            type: 'scatter', // Use scatter chart to handle individual points
            data: chartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        type: 'time', // Set x-axis to time scale
                        time: {
                            parser: 'MM/dd/yyyy',          // Set parser for MM/DD/YYYY format
                            unit: 'day',
                            displayFormats: {
                                day: 'MMM, YYYY'           // Display format for axis labels
                            },
                            tooltipFormat: 'MMM D, YYYY' // Format for tooltips
                        },
                        title: { display: true, text: '' }
                    },
                    y: { title: { display: true, text: 'Subsidence (mm/yr)' } }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    },
    error: function (xhr, status, error) {
        console.error("Error loading JSON: ", status, error);
    }
});


  
}


function loadGeoJSON(url) {


    // Check if descending or ascending

    // end check if descending or ascending
   $.ajax({
    url: url,  // Path to your GeoJSON file
    dataType: 'json',
    success: function (data) {

            if (currentLayer) {
                    map.removeLayer(currentLayer);
                }


        // Calculate min and max values
        var minValue = Infinity;
        var maxValue = -Infinity;

// Geojson
        if(url.includes('.geojson')){
   
        data.features.forEach(function (feature) { 
            var value = feature.properties['UD.geo.tif'];
            if (value < minValue) minValue = value;
            if (value > maxValue) maxValue = value;
        });

        // Add GeoJSON layer to the map with color mapping and tooltips
        currentLayer =L.geoJSON(data, {
            style: function(feature) {
                var value = feature.properties['UD.geo.tif'];
                
                // Normalize the value between 0 and 1
                var normalizedValue = (value - minValue) / (maxValue - minValue);
                normalizedValue = Math.max(0, Math.min(1, normalizedValue)); // Ensure it's between 0 and 1

                // Get the color using the colormap function
                var colorArray = evaluate_cmap(normalizedValue, 'turbo', false);
                var color = `rgb(${colorArray[0]}, ${colorArray[1]}, ${colorArray[2]})`;

                return {
                    color: color, // Set the color based on normalized value
                    opacity: feature.properties._opacity || 1,
                    weight: feature.properties._weight || 5
                };
            },
            onEachFeature: function(feature, layer) {
                // Create a tooltip with the value
                var value = feature.properties['UD.geo.tif'];
                layer.bindTooltip(`Value: ${value}`, {
                    permanent: false, // Tooltip appears on hover
                    direction: 'auto', // Tooltip direction
                    sticky: true // Tooltip follows the mouse
                });
            }
        }).addTo(map);

        }else{
        data.forEach(function (location) {
            if (location.value < minValue) minValue = location.value;
            if (location.value > maxValue) maxValue = location.value;
        });


        // Then create markers
        var markers = L.layerGroup();
        data.forEach(function (location) {
            // Normalize the value between 0 and 1
            var normalizedValue = (location.value - minValue) / (maxValue - minValue);

            // Use the evaluate_cmap function to get the color (from RdBu_r colormap)
            var colorArray = evaluate_cmap(normalizedValue, 'turbo', false);
            var color = `rgb(${colorArray[0]}, ${colorArray[1]}, ${colorArray[2]})`;

                    var marker;
                   
                    if (url.trim() === 'gnss_myloc.json') { // Normalize comparison
                        
                        marker = L.marker([location.lat, location.lon]);
                    } else {
                        console.log("This is circle",url)
                        marker = L.circleMarker([location.lat, location.lon], {
                            radius: 3,
                            color: color,
                            fillOpacity: 0.7
                        });
                    }


            // Add a popup with a button to load the chart
            marker.bindPopup(`
                <div>
                    <strong>ID: ${location.id}</strong><br>
                    Latitude: ${location.lat}<br>
                    Longitude: ${location.lon}<br>
                     Value: <strong>${location.value}</strong> mm/yr<br><hr> <!-- Updated line -->
                    <button class="btn btn-primary" onclick="loadChart(${location.id}, ${location.value}, '${url}')">View Chart</button>
                </div>
            `);

               marker.bindTooltip(`ID: ${location.id}<br>Value: ${location.value} mm/yr`, {
        permanent: false,
        direction: 'top', // Tooltip position
        opacity: 0.9
    });

            markers.addLayer(marker);
        });

        currentLayer = markers.addTo(map);

        }

        // This is end of Geojson

        createLegend(minValue, maxValue);
    },
    error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error loading GeoJSON: " + textStatus, errorThrown);
    }
});
}

loadGeoJSON(url5);

    // Create a control panel for layer selection
    var layerControl = L.control({position: 'topright'});

    layerControl.onAdd = function (map) {
        var div = L.DomUtil.create('div', 'layer-control');
    div.innerHTML = '<div id="radioDiv">' +
        '<strong><p class="badge bg-primary">Contour Lines</p></strong><br>' +
        '<input type="radio" name="geoLayer" value="url1" > 2019<br>' +
        '<input type="radio" name="geoLayer" value="url2">2024<br>' +
          '<hr><strong><p class="badge bg-danger">Subsidence(mm/yr)</p></strong><br>' +
        '<input type="radio" name="geoLayer" value="url3" >Ascending<br>' +
        '<input type="radio" name="geoLayer" value="url4">Descending<br>' +
        '<input type="radio" name="geoLayer" value="url5" checked>GNSS<br>' +
        '</div>';

        
        div.firstChild.onmousedown = div.firstChild.ondblclick = L.DomEvent.stopPropagation;

        // Add event listener to radio buttons
// Add event listener to the dynamically created radio buttons within the control panel
    div.querySelectorAll('input[name="geoLayer"]').forEach(function (radio) {
        radio.addEventListener('change', function (event) {
            // Check if the radio button is selected and get its value
            var selectedValue = event.target.value;

            // Determine the URL based on the selected radio button value
            var url;
            switch (selectedValue) {
                case 'url1':
                    url = url1;  // Assuming url1, url2, etc., are defined somewhere globally
                    break;
                case 'url2':
                    url = url2;
                    break;
                case 'url3':
                    url = url3;
                    break;
                case 'url4':
                    url = url4;
                    break;
                case 'url5':
                    url = url5;
                    break;
                default:
                    console.error('Invalid selection');
                    return;  // Exit if no valid selection is made
            }

            // Load the corresponding GeoJSON or JSON data for the selected URL
            loadGeoJSON(url);
        });
    });

    return div;
    };

    layerControl.addTo(map);


// modal
        // Toggle sliding div box with collapse icon
    document.getElementById('collapseToggle').addEventListener('click', function () {
        const slideBox = document.getElementById('slideBox');
        const collapseIcon = document.getElementById('collapseIcon');

        if (slideBox.style.display === "none" || slideBox.style.display === "") {
            slideBox.style.display = "block";
            collapseIcon.classList.remove('fa-chevron-down');
            collapseIcon.classList.add('fa-chevron-up');
        } else {
            slideBox.style.display = "none";
            collapseIcon.classList.remove('fa-chevron-up');
            collapseIcon.classList.add('fa-chevron-down');
        }
    });
</script>

</body>
</html>
