/**
 * Perform a request to retrieve the IP address from the bigdatacloud API,
 * then use the obtained IP address to fetch location data from the apibundle.io API
 * and display the location on a Leaflet map along with nearby bike stores.
 */
fetch('https://api.bigdatacloud.net/data/client-ip')
    .then(response => {
        if (!response.ok) {
            throw new Error('The request failed.');
        }
        return response.json();
    })
    .then(data => {
        // Retrieve the IP address
        var ip = data.ipString;

        // Perform another API request using the obtained IP address
        return fetch(`https://api.apibundle.io/ip-lookup?apikey=94569a89e6f3443fb8b3a30fd03e09c4&ip=${ip}&language=fr`);
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('The request failed.');
        }
        return response.json();
    })
    .then(data => {
        // Retrieve the coordinates (latitude and longitude) from the response
        var latitude = data.latitude;
        var longitude = data.longitude;

        // initialize Leaflet
        var map = L.map('map').setView([
            latitude, longitude
        ], 2);

        // add the OpenStreetMap tiles
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
        }).addTo(map);

        // show the scale bar on the lower left corner
        L.control.scale({ imperial: true, metric: true }).addTo(map);

        // Add marker at the IP location
        L.marker([latitude, longitude]).addTo(map).bindPopup('Your IP Location');

        // Define GeoJSON data for bike store locations
        var geojsonFeature = {
            "type": "FeatureCollection",
            "features": [
                {
                    "type": "Feature",
                    "properties": {
                        "name": "Santa Cruz Bikes"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [-122.02205, 36.98637]
                    }
                },
                {
                    "type": "Feature",
                    "properties": {
                        "name": "Baldwin Bikes"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [-73.77041, 40.73869]
                    }
                },
                {
                    "type": "Feature",
                    "properties": {
                        "name": "Rowlett Bikes"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [-96.54582, 32.91553]
                    }
                }
            ]
        };

        // Define custom style for GeoJSON points
        var myStyle = {
            "color": "#ff7800",
            "weight": 5,
            "opacity": 0.65
        };

        // Add GeoJSON layer to the map with popups showing store names and custom style for points
        L.geoJSON(geojsonFeature, {
            pointToLayer: function (feature, latlng) {
                return L.circleMarker(latlng, myStyle);
            },
            onEachFeature: function (feature, layer) {
                if (feature.properties && feature.properties.name) {
                    layer.bindPopup(feature.properties.name);
                }
            }
        }).addTo(map);
    })
    .catch(error => {
        console.error('Error:', error);
    });
