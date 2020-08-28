/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

 var showtime =

  function showTime() {
    var date = new Date();
    var detik = date.getSeconds();
    var jam = date.getHours();
    var menit = date.getMinutes();
    var tahun = date.getFullYear();
    var bulan = date.getMonth();
    var hari = date.getDate();

    const monthNames = ["January", 
                        "Februari",
                        "Maret",
                        "April",
                        "Mei",
                        "Juni",
                        "Juli",
                        "Agustus",
                        "September",
                        "Oktober",
                        "November",
                        "Desember"];

    try {
      document.getElementById('date').innerHTML = hari+" "+monthNames[bulan]+" "+tahun;
      document.getElementById('time').innerHTML = jam+" : "+menit;
    }
    catch(err) {
      console.log(err.message) ;
    }
        
    
  }

    setInterval(showtime, 1000);
;


      // ------------------------------menampilkan keterangan pada create absensi-----------------

  var currentValue = 0;
    function handleClick(status) {
    currentValue = status;
    var x = document.getElementById("keterangan");

    if(currentValue==3||currentValue==4){
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  
  }


  //initial number statuskeypressed pada 3 pilihan absen
  var statuskeypressed =0 ;

      function handleMap( ) {
     

      // ------------------------------mengambil koordinat lokasi-----------------
  
      // Step 1: Get user coordinates 

      var options = { 
        enableHighAccuracy: true, 
        timeout: 5000, 
        maximumAge: 0 
      }; 
    
      function success(pos) { 
        var crd = pos.coords; 
        var lat = crd.latitude.toString(); 
        var lng = crd.longitude.toString(); 
        var coordinates = [lat, lng]; 
        getCity(coordinates); 
    
        
        //--------------data handlee to view----------------------

        var lati = document.getElementById("lat");
        var lon = document.getElementById("lon");
        var labelabsen = document.getElementById("labellocation");
        
        
        if (statuskeypressed==0) {
          lati.value=lat;
          lon.value=lng;
          statuskeypressed = statuskeypressed +1;
          labelabsen.innerHTML="Tambah Keterangan Lokasi ✓";
  
          console.log( lati.value + lon.value + statuskeypressed);
        } else if(statuskeypressed==1) {
          lati.value="";
          lon.value="";
          statuskeypressed=statuskeypressed-1;;
          labelabsen.innerHTML="Tambah Keterangan Lokasi -";
  
          console.log( lati.value + lon.value );
        }
        console.log(statuskeypressed);

        return; 


      } 
    
      function error(err) { 
        console.warn(`ERROR(${err.code}): ${err.message}`); 
      } 
    
      navigator.geolocation.getCurrentPosition(success, error, options); 
      
  }

  
    
    // Step 2: Get city name 
    function getCity(coordinates) { 
      var xhr = new XMLHttpRequest(); 
      var lat = coordinates[0]; 
      var lng = coordinates[1]; 
      var alamat = document.getElementById("alamat");

      
    
      // Paste your LocationIQ token below. 
      xhr.open('GET',"https://us1.locationiq.com/v1/reverse.php?key=7ab8b85ab3e21e&lat=" + lat + "&lon=" + lng + "&format=json", true); 
      xhr.send(); 
      xhr.onreadystatechange = processRequest; 
      xhr.addEventListener("readystatechange", processRequest, false); 
    
      function processRequest(e) { 
        if (xhr.readyState == 4 && xhr.status == 200) { 
          var response = JSON.parse(xhr.responseText); 
          var city = response.display_name; 
          console.log(city); 
          document.getElementById("addressa").innerHTML="Lokasi anda : "+city;

          if (statuskeypressed==0) {
            alamat.value="";

          } else if(statuskeypressed==1) {
            alamat.value=city;

          }

          return; 
        } 
      } 
      } 


    

  
"use strict";
