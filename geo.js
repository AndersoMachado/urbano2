    let h2 = document.querySelector('h2')
    
    function success(pos){
        console.log(pos.coords.latitude, pos.coords.longitude);
        h2.textContent = `Latitude: ${pos.coords.latitude}, Longitude: ${pos.coords.longitude}`
        var log = (pos.coords.longitude);
        var lat = (pos.coords.latitude);
        console.log(lat)
        var fm = document.forms[0];
        var el = fm.elements;
        el[5].value = lat;
        el[6].value = log;
    }
    
    navigator.geolocation.getCurrentPosition(success);

    