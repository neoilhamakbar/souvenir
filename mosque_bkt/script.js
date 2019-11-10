window.onload=init;
var infoDua = [];
var markers = [];
var markersDua = [];
var markersDua1 = [];
var circles=[];
var angkot = [];
var jalurAngkot=[];
var rute = [];  //NAVIGASI
var pos ='null';
var infowindow;
var centerBaru;
var centerLokasi;
var inputradiusmes;
var fotosrc = '../_foto/';
var directionsDisplay;
var marker_1 = []; //MARKER UNTUK POSISI SAAT INIvar marker_2 = []; //MARKER UNTUK POSISI SAAT INI
var marker_2 = [];
var awal = 0;
var tujuan = 0;
var server = "http://localhost/kuliner_bkt/mosque_bkt/";
//var server = "http://gisfaisal.in/tourism_bkt/t2-eng/";

var cekRadiusStatus = "off";
function init(){
    basemap();
	tempatibadah();
    kecamatanTampil();
}

function basemap() //google maps
{
    
    map = new google.maps.Map(document.getElementById('map'), 
        {
          zoom: 13,
          center: new google.maps.LatLng(-0.304820, 100.381421),
          mapTypeId: google.maps.MapTypeId.ROADMAP,
// 		  styles:[
//   {
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#1d2c4d"
//       }
//     ]
//   },
//   {
//     "elementType": "labels.text.fill",
//     "stylers": [
//       {
//         "color": "#8ec3b9"
//       }
//     ]
//   },
//   {
//     "elementType": "labels.text.stroke",
//     "stylers": [
//       {
//         "color": "#1a3646"
//       }
//     ]
//   },
//   {
//     "featureType": "administrative.country",
//     "elementType": "geometry.stroke",
//     "stylers": [
//       {
//         "color": "#4b6878"
//       }
//     ]
//   },
//   {
//     "featureType": "administrative.land_parcel",
//     "elementType": "labels.text.fill",
//     "stylers": [
//       {
//         "color": "#64779e"
//       }
//     ]
//   },
//   {
//     "featureType": "administrative.province",
//     "elementType": "geometry.stroke",
//     "stylers": [
//       {
//         "color": "#4b6878"
//       }
//     ]
//   },
//   {
//     "featureType": "landscape.man_made",
//     "elementType": "geometry.stroke",
//     "stylers": [
//       {
//         "color": "#334e87"
//       }
//     ]
//   },
//   {
//     "featureType": "landscape.natural",
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#023e58"
//       }
//     ]
//   },
//   {
//     "featureType": "poi",
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#283d6a"
//       }
//     ]
//   },
//   {
//     "featureType": "poi",
//     "elementType": "labels.text.fill",
//     "stylers": [
//       {
//         "color": "#6f9ba5"
//       }
//     ]
//   },
//   {
//     "featureType": "poi",
//     "elementType": "labels.text.stroke",
//     "stylers": [
//       {
//         "color": "#1d2c4d"
//       }
//     ]
//   },
//   {
//     "featureType": "poi.park",
//     "elementType": "geometry.fill",
//     "stylers": [
//       {
//         "color": "#023e58"
//       }
//     ]
//   },
//   {
//     "featureType": "poi.park",
//     "elementType": "labels.text.fill",
//     "stylers": [
//       {
//         "color": "#3C7680"
//       }
//     ]
//   },
//   {
//     "featureType": "road",
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#304a7d"
//       }
//     ]
//   },
//   {
//     "featureType": "road",
//     "elementType": "labels.text.fill",
//     "stylers": [
//       {
//         "color": "#98a5be"
//       }
//     ]
//   },
//   {
//     "featureType": "road",
//     "elementType": "labels.text.stroke",
//     "stylers": [
//       {
//         "color": "#1d2c4d"
//       }
//     ]
//   },
//   {
//     "featureType": "road.highway",
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#2c6675"
//       }
//     ]
//   },
//   {
//     "featureType": "road.highway",
//     "elementType": "geometry.stroke",
//     "stylers": [
//       {
//         "color": "#255763"
//       }
//     ]
//   },
//   {
//     "featureType": "road.highway",
//     "elementType": "labels.text.fill",
//     "stylers": [
//       {
//         "color": "#b0d5ce"
//       }
//     ]
//   },
//   {
//     "featureType": "road.highway",
//     "elementType": "labels.text.stroke",
//     "stylers": [
//       {
//         "color": "#023e58"
//       }
//     ]
//   },
//   {
//     "featureType": "transit",
//     "elementType": "labels.text.fill",
//     "stylers": [
//       {
//         "color": "#98a5be"
//       }
//     ]
//   },
//   {
//     "featureType": "transit",
//     "elementType": "labels.text.stroke",
//     "stylers": [
//       {
//         "color": "#1d2c4d"
//       }
//     ]
//   },
//   {
//     "featureType": "transit.line",
//     "elementType": "geometry.fill",
//     "stylers": [
//       {
//         "color": "#283d6a"
//       }
//     ]
//   },
//   {
//     "featureType": "transit.station",
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#3a4762"
//       }
//     ]
//   },
//   {
//     "featureType": "water",
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#0e1626"
//       }
//     ]
//   },
//   {
//     "featureType": "water",
//     "elementType": "labels.text.fill",
//     "stylers": [
//       {
//         "color": "#4e6d70"
//       }
//     ]
//   }
// ]
        });
}

function aktifkanGeolocation(){ //posisi saat ini

    navigator.geolocation.getCurrentPosition(function(position) {
     hapusMarkerInfowindow();
     hapusInfo();
      pos = {
      lat: position.coords.latitude,
      lng: position.coords.longitude

      };console.log(pos.lat);
      marker = new google.maps.Marker({
      position: pos,
      map: map,
      animation: google.maps.Animation.DROP,
      });
      centerLokasi = new google.maps.LatLng(pos.lat, pos.lng);
      markers.push(marker);
      infowindow = new google.maps.InfoWindow({
      position: pos,
      content: "<center><a style='color:black;'>You're Here <br> lat : "+pos.lat+" <br> long : "+pos.lng+"</a></center>"
      });
      infowindow.open(map, marker);
      map.setCenter(pos);
    });   
  }

function manualLocation(){ //posisi manual
  hapusRadius();
  alert('Click the map');
  map.addListener('click', function(event) {
    addMarker(event.latLng);
    });
  }
  
    function addMarker(location){
    hapusposisi();
    marker = new google.maps.Marker({
      position : location,
      map: map,
      animation: google.maps.Animation.DROP,
      });
    pos = {
      lat: location.lat(), lng: location.lng()
    }
    centerLokasi = new google.maps.LatLng(pos.lat, pos.lng);
    markers.push(marker);
    infowindow = new google.maps.InfoWindow();
    infowindow.setContent('Current Position');
    infowindow.open(map, marker);
    usegeolocation=true;
    google.maps.event.clearListeners(map, 'click');
	console.log(pos);

}

function aktifkanRadius(){ //fungsi radius mesjid
    if (pos == 'null'){
    alert ('Click button current position or manual position first !');
    }
    else {
    hapusRadius();
    inputradiusmes=document.getElementById("inputradius").value;
	console.log(inputradiusmes);
    var circle = new google.maps.Circle({
      center: pos,
      radius: parseFloat(inputradiusmes*100),      
      map: map,
      strokeColor: "blue",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "blue",
      fillOpacity: 0.35
      });        
      map.setZoom(14);       
      map.setCenter(pos);
      circles.push(circle);     
    }   
    cekRadiusStatus = 'on';
    masjidradius();
  }
  
  function aktifkanRadiusAngkot(){ //fungsi radius angkot
  console.log("hai")
    if (pos == 'null'){
    alert ('Click button current position or manual position first !');
    }
    else {
    hapusRadius();
    var inputradiusangkot=document.getElementById("inputradiusangkot").value;
	console.log(inputradiusangkot);
    var circle = new google.maps.Circle({
      center: pos,
      radius: parseFloat(inputradiusangkot*100),      
      map: map,
      strokeColor: "red",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "red",
      fillOpacity: 0.35
      });        
      map.setZoom(14);       
      map.setCenter(pos);
      circles.push(circle);     
    }   
    cekRadiusStatus = 'on';
    angkotradius();
  }


 function masjidradius(){ //menampilkan masjid berdasarkan radius
   
    $('#hasilcari1').show();
    $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
	  clearroute();
    clearangkot();
      hapusMarkerTerdekat();
      cekRadius();
	  console.log(pos.lat);
      console.log(pos.lng);

        $.ajax({ 
        url: server+'masjidradius.php?lat='+pos.lat+'&lng='+pos.lng+'&rad='+rad, data: "", dataType: 'json', success: function(rows)
        {
            console.log("hy");
            for (var i in rows) 
            {   
              var row     = rows[i];
              var id   = row.id;
              var nama   = row.name;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_masjid.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
			  klikInfoWindow(id);
              map.setZoom(14);
              $('#hasilcari').append("<tr><td>"+nama+"</td><td><a role='button' class='btn btn-success' onclick='detailmasjid(\""+id+"\");info1();'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='angkotmesjid(\""+id+"\",\""+latitude+"\",\""+longitude+"\");info12();'></a></td></tr>");
            } 
            }    
          });
}

function angkotradius(){    
        
       $('#hasilcari1').show();
    $('#hasilcari').empty();
    $('#hasilcari').append("<thead><th>Angkot Code</th><th>Major</th><th>Route</th><th>Gallery</th></thead>");
      hapusInfo();
      clearroute2();
	  clearroute();
    clearangkot();
      hapusMarkerTerdekat();
        cekRadiusangkot();
        hapusMarkerTerdekat();
        hapusInfo();
        
        console.log(pos.lat);
        console.log(pos.lng);
        console.log(rad);
        $.ajax({ 
          url: server+'angkotradius.php?lat='+pos.lat+'&lng='+pos.lng+'&rad='+rad, data: "", dataType: 'json', success: function(rows)
          { 

            for (var i in rows) 
            {   
              var row     = rows[i];
              var id_angkot   = row.id;
              var jurusan   = row.destination;
              var jalur_angkot   = row.track;
              var latitude  = row.latitude;
              var longitude = row.longitude ;
              console.log(jurusan);
              centerBaru      = new google.maps.LatLng(latitude, longitude);
             $('#hasilcari').append("<tr><td>"+id_angkot+"</td><td>"+jurusan+"</td><td><a role='button' class='btn btn-success fa fa-search' onclick='detailangkot(\""+id_angkot+"\")'></a></td><td><a role='button' class='btn btn-primary fa fa-picture-o' onclick='galeriangkot(\""+id_angkot+"\")'></a></td></tr>");
              }  
            }
          });    
        }

function tampilsemua(){ //menampilkan semua masjid

  $.ajax({ url: server+'carimasjid.php', data: "", dataType: 'json', success: function (rows){
    cari_masjid(rows);
  }});
}

//cari berdasarkan nama masjid
function carinamamasjid(){
  if(carimasjid.value==''){
    alert("Fill the input form first!");
    }else{
  
    $.ajax({ url: server+'carimasjid.php?cari_nama='+carimasjid.value, data: "", dataType: 'json', success: function (rows){
      cari_masjid(rows);
    }});
  }
}

function carinamaresangkot(){
  if(cariress.value==''){
    alert("Fill the input form first!");
    }else{
  
    $.ajax({ url: server+'cariresangkot.php?cari_nama='+cariress.value, data: "", dataType: 'json', success: function (rows){
      cari_resutkangkot(rows);
    }});
  }
}


  function caritglk(rows) //fungsi cari event berdasarkan date
  {   
     $('#hasilcari1').show();
     $('#hasilcari').show();
     $('#hasilcari').empty();
	 $('#hasilcari').append("<thead><th>Mosque</th><th>Event</th><th>Info</th><th>Route Angkot</th></thead>");
      hapusInfo();
      clearroute2();
	  clearroute();
	  hapusRadius();
    clearangkot();
      hapusMarkerTerdekat();
	  var mesjidevent=[''];
            if(rows==null)
            {
              alert('No Data');
            }
        for (var i in rows) 
				{   
				  var row     = rows[i];
				  var id   = row.id_worship_place;
				  var nama_keg   = row.event_name;
				  var nama_mes = row.worship_place_name;
          var date = row.date;
          var time = row.time;
				   var latitude  = row.latitude ;
				var longitude = row.longitude ;
				console.log(id);
        console.log(date);
				mesjidevent.push(row.id_worship_place);
							centerBaru = new google.maps.LatLng(latitude, longitude);
							map.setCenter(centerBaru);
							map.setZoom(14); 
							var marker = new google.maps.Marker({
							 position: centerBaru,              
							 icon:'assets/ico/aaa.png',
							 animation: google.maps.Animation.DROP,
							 map: map
							  });
							markersDua.push(marker);
							map.setCenter(centerBaru);
			  

				  $('#hasilcari').append("<tr><td>"+nama_mes+"</td><td>"+nama_keg+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailevent(\""+id+"\", \""+time+"\", \""+date+"\");infoev();'></a></td><td><a role='button' class='btn btn-default fa fa-bus' title='jalur angkot' onclick='angkotmesjid(\""+id+"\",\""+latitude+"\",\""+longitude+"\");info12();'></a></td></tr>");

          console.log("auuu");
				}
$.ajax({ url: server+'caritglkeg.php?id_worship_place='+mesjidevent, data: "", dataType: 'json', success: function (rows){
    console.log("huuuuu");
      console.log(server+'caritglkeg.php?id_worship_place='+mesjidevent);
    for (var i in rows) 
        {   
          var row     = rows[i];
           var latitude  = row.latitude ;
        var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              map.setCenter(centerBaru);
              map.setZoom(12); 
              var marker = new google.maps.Marker({
               position: centerBaru,              
               icon:'assets/ico/66.png',
               animation: google.maps.Animation.DROP,
               map: map
                });
              markersDua.push(marker);
              map.setCenter(centerBaru);
        }
  }})
  }
  
  //memunculkan info ketika di klik marker
function klikInfoWindow(id)
{
    google.maps.event.addListener(marker, "click", function(){
        detailmes_infow(id);
       
      });

}

function klikInfoWindow_ow(id)
{
    google.maps.event.addListener(marker, "click", function(){
        detailow_infow(id);
       
      });

}

function klikInfoWindow_industri(id)
{
    google.maps.event.addListener(marker, "click", function(){
        detailindustri_infow(id);
       
      });

}

function klikInfoWindow_oleh(id)
{
    google.maps.event.addListener(marker, "click", function(){
        detailoleh_infow(id);
       
      });

}

function klikInfoWindow_kuliner(id)
{
    google.maps.event.addListener(marker, "click", function(){
        detailkuliner_infow(id);
       
      });

}

function klikInfoWindow_hotel(id)
{
    google.maps.event.addListener(marker, "click", function(){
        detailhotel_infow(id);
       
      });

}

function klikInfoWindow_res(id)
{
    google.maps.event.addListener(marker, "click", function(){
        detailres_infow(id);
       
      });

}

function tempatibadah() //tampil digitasi tempat ibadah
    {
            ti = new google.maps.Data();
            ti.loadGeoJson(server+'masjid.php');
            ti.setStyle(function(feature){
            return({
                    fillColor: '#2a9dd6',
                    strokeColor: '#2a9dd6',
                    strokeWeight: 1,
                    fillOpacity: 7
                   });          
              });
            ti.setMap(map);
        }

function kecamatanTampil()
  {
    kecamatan = new google.maps.Data();
    kecamatan.loadGeoJson(server+'kecamatan.php');
    kecamatan.setStyle(function(feature)
    {
      var gid = feature.getProperty('id');
      if (gid == 'K001'){ color = '#ff3300' 
        return({
      fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpacity:0.3,
          clickable: false
        }); 
    }
      else if(gid == 'K002'){ color = '#ffd777' 
        return({
        fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpacity:0.3,
          clickable: false
        });
    }
      else if(gid == 'K003'){ color = '#ec87ec' 
        return({
        fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpacity:0.3,
          clickable: false
        });

    }
      
       
        
    });
    kecamatan.setMap(map);
  }

function tempatibadah() //tampil digitasi tempat ibadah
    {
            ti = new google.maps.Data();
            ti.loadGeoJson(server+'masjid.php');
            ti.setStyle(function(feature){
            return({
                    fillColor: '#42cb6f',
                    strokeColor: '#42cb6f',
                    strokeWeight: 1,
                    fillOpacity: 7
                   });          
              });
            ti.setMap(map);
        }

function ow() //tampil digitasi objek wisata
    {
            ow = new google.maps.Data();
            ow.loadGeoJson(server+'ow.php');
            ow.setStyle(function(feature){
            return({
                    fillColor: '#f18989',
                    strokeColor: '#f18989',
                    strokeWeight: 1,
                    fillOpacity: 0.6
                   });          
              });
            ow.setMap(map);
        }


  function caritpkec() //fungsi cari mesjid berdasarkan kecamatan
  {


    var kec=document.getElementById('kecamatan').value;
    $('#hasilcari1').show();
    $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
	  clearroute();
    clearangkot();
	hapusRadius();
      hapusMarkerTerdekat();
    //var kecamatan= kec.value;
    $.ajax({ 
        url: server+'kecamatan_tp.php?kecamatan='+kec, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('Data Tidak Ditemukan');
            }
          for (var i in rows) 
            {   
              var row     = rows[i];
              var id   = row.id;
              var nama   = row.name;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_masjid.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
			  klikInfoWindow(id);
              map.setZoom(14);
              $('#hasilcari').append("<tr><td>"+nama+"</td><td><a role='button' class='btn btn-success' onclick='detailmasjid(\""+id+"\");info1();'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' title='jalur angkot' onclick='angkotmesjid(\""+id+"\",\""+latitude+"\",\""+longitude+"\");info12();'></a></td></tr>");
            } 
           
          }
        }); 
  }

function carikategori()
  {

    $('#hasilcari1').show();
    $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
	  clearroute();
    clearangkot();
	hapusRadius();
      hapusMarkerTerdekat();
   var kat=id_kategori.value;
    console.log(kat);
    $.ajax({ 
        url: server+'carikat.php?id_kategori='+kat, data: "", dataType: 'json', success: function(rows)
          { 
            console.log("hai riri");
            if(rows==null)
            {
              alert('Worship Place Not Found');
            }
          for (var i in rows) 
            {   
              var row     = rows[i];
              var id   = row.id;
              var nama   = row.name;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_masjid.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
			  klikInfoWindow(id);
              map.setZoom(14);
              $('#hasilcari').append("<tr><td>"+nama+"</td><td><a role='button' class='btn btn-success' onclick='detailmasjid(\""+id+"\");info1();'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' title='jalur angkot' onclick='angkotmesjid(\""+id+"\",\""+latitude+"\",\""+longitude+"\");info12();'></a></td></tr>");
            } 
           
          }
        });  
  }

  function pilihkendaraan() //fungsi cari mesjid berdasarkan kendaraaan yang digunakan
  {

    $('#hasilcari1').show();
    $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
	  clearroute();
    clearangkot();
	hapusRadius();
      hapusMarkerTerdekat();
    kend=pilihkend.value;

    $.ajax({ 
        url: server+'carikendaraan.php?status='+kend, data: "", dataType: 'json', success: function(rows)
          { 
              console.log("yuhuuuuuuuu");
            if(rows==null)
            {
              alert('Worship Place Not Found !');
            }
          for (var i in rows) 
            {   
              var row     = rows[i];
              var id   = row.id;
              var nama   = row.name;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_masjid.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(id);
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
			   klikInfoWindow(id);
              map.setZoom(14);
              $('#hasilcari').append("<tr><td>"+nama+"</td><td><a role='button' class='btn btn-success' onclick='detailmasjid(\""+id+"\");info1();'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' title='jalur angkot' onclick='angkotmesjid(\""+id+"\",\""+latitude+"\",\""+longitude+"\");info12();'></a></td></tr>");
            } 
           
          }
        });  
  }

  function cari_masjid(rows) //fungsi cari mesjid berdasarkan nama
  {   
     $('#result').show();
     $('#hasilcari1').show();

     $('#hasilcari').show();
     $('#resultsekitar').hide();
    $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
	  clearroute();
    clearangkot();
	hapusRadius();
      hapusMarkerTerdekat();
            if(rows==null)
            {
              alert('Mosque Not found');
            }
        for (var i in rows) 
            {   
              var row     = rows[i];
              var id   = row.id;
              var nama   = row.name;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_masjid.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(id);
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
			  klikInfoWindow(id);
              map.setZoom(14);
              $('#hasilcari').append("<tr><td>"+nama+"</td><td><a role='button' class='btn btn-success' onclick='detailmasjid(\""+id+"\");'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' title='jalur angkot' onclick='angkotmesjid(\""+id+"\",\""+latitude+"\",\""+longitude+"\");info12();'></a></tr>");
            }
            }
			
			function cari_resutkangkot(rows) //fungsi cari mesjid berdasarkan nama
  {   
     $('#hasilcari1').show();
    $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
	  clearroute();
    clearangkot();
      hapusMarkerTerdekat();
            if(rows==null)
            {
              alert('Mosque Not found');
            }
        for (var i in rows) 
            {   
              var row     = rows[i];
              var id   = row.id;
              var nama   = row.name;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_masjid.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(id);
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
              map.setZoom(14);
              $('#hasilcari').append("<tr><td>"+nama+"</td><td><a role='button' class='btn btn-success' onclick='detailmasjid(\""+id+"\");info1();'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' title='jalur angkot' onclick='angkotmesjid(\""+id+"\",\""+latitude+"\",\""+longitude+"\");info12();'></a></td></tr>");
            }
            }

function angkotmesjid(id_angkot, lat1, lng1){
    $('#infoak').empty();
    hapusInfo();
    clearroute2();
	  clearroute();
    clearangkot();
    hapusMarkerTerdekat();
    $('#infoak').append("<thead><th class='centered'>Destination</th><th class='centered'>Info</th></thead>");

     $.ajax({ 
        url: server+'angkotmesjid.php?id='+id_angkot, data: "", dataType: 'json', success: function(rows)
          { 
            
            if(rows==null)
            {
              alert('Urban transport route not found');
            }
          for (var i in rows) 
            {   
              var row     = rows[i];
              var id_angkot   = row.id_angkot;
              var jurusan   = row.destination;
              var route_color = row.route_color;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
      		  	var lat = row.lat;
      			  var lng = row.lng;
      				console.log(latitude);
      				console.log(longitude);
              listgeom(id_angkot)
              tampilrute(id_angkot, route_color, latitude, longitude);
		        	centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
              ({
                position: centerBaru,
                icon:'assets/ico/marker_masjid.png',
                map: map,
                animation: google.maps.Animation.DROP,
              });
              markersDua.push(marker);
              map.setCenter(centerBaru);
              map.setZoom(13);
              $('#infoak').append("<tr><td>"+jurusan+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailangkot(\""+id_angkot+"\",\""+lat+"\",\""+lng+"\",\""+lat1+"\",\""+lng1+"\")'></a></td></tr> ");
            } 
           
          }
        });  

}

function angkotkuliner(id_angkot, lat1, lng1){
 $('#infoak').empty();
   hapusInfo();
      clearroute2();
	  clearroute();
    clearangkot();
      hapusMarkerTerdekat();
      console.log("d");
	  $('#infoak').append("<thead><th class='centered'>Destination</th><th class='centered'>Info</th></thead>");

     $.ajax({ 
        url: server+'angkotkuliner.php?id='+id_angkot, data: "", dataType: 'json', success: function(rows)
          {             
            if(rows==null)
            {
              alert('Urban transport route not found');
            }
          for (var i in rows) 
            {   
              var row     = rows[i];
              var id_angkot   = row.id_angkot;
              var jurusan   = row.destination;
              var route_color = row.route_color;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
			  var lat  = row.lat ;
              var lng = row.lng ;

              listgeom(id_angkot)
              tampilrute(id_angkot, route_color, latitude, longitude);
			centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/food.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(id_angkot);
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
              map.setZoom(13);
               $('#infoak').append("<tr><td>"+jurusan+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailangkot(\""+id_angkot+"\",\""+lat+"\",\""+lng+"\",\""+lat1+"\",\""+lng1+"\")'></a></td></tr> ");
            } 
           
          }
        });  

}

function angkotindustri(id_angkot, lat1, lng1){
 $('#infoak').empty();
   hapusInfo();
      clearroute2();
	  clearroute();
    clearangkot();
      hapusMarkerTerdekat();
      console.log("d");
	  $('#infoak').append("<thead><th class='centered'>Destination</th><th class='centered'>Info</th></thead>");

     $.ajax({ 
        url: server+'angkotindustri.php?id='+id_angkot, data: "", dataType: 'json', success: function(rows)
          {             
            if(rows==null)
            {
              alert('Urban transport route not found');
            }
          for (var i in rows) 
            {   
              var row     = rows[i];
              var id_angkot   = row.id_angkot;
              var jurusan   = row.destination;
              var route_color = row.route_color;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
			  var lat  = row.lat ;
              var lng = row.lng ;

              listgeom(id_angkot)
              tampilrute(id_angkot, route_color, latitude, longitude);
			centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/industries.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(id_angkot);
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
              map.setZoom(13);
               $('#infoak').append("<tr><td>"+jurusan+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailangkot(\""+id_angkot+"\",\""+lat+"\",\""+lng+"\",\""+lat1+"\",\""+lng1+"\")'></a></td></tr> ");
            } 
           
          }
        });  

}

function angkotsouvenir(id_angkot, lat1, lng1){
 $('#infoak').empty();
   hapusInfo();
      clearroute2();
	  clearroute();
    clearangkot();
      hapusMarkerTerdekat();
      console.log("d");
	  $('#infoak').append("<thead><th class='centered'>Destination</th><th class='centered'>Info</th></thead>");

     $.ajax({ 
        url: server+'angkotsouvenir.php?id='+id_angkot, data: "", dataType: 'json', success: function(rows)
          {             
            if(rows==null)
            {
              alert('Urban transport route not found');
            }
          for (var i in rows) 
            {   
              var row     = rows[i];
              var id_angkot   = row.id_angkot;
              var jurusan   = row.destination;
              var route_color = row.route_color;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
			  var lat  = row.lat ;
              var lng = row.lng ;

              listgeom(id_angkot)
              tampilrute(id_angkot, route_color, latitude, longitude);
			centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/shopping.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(id_angkot);
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
              map.setZoom(13);
               $('#infoak').append("<tr><td>"+jurusan+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailangkot(\""+id_angkot+"\",\""+lat+"\",\""+lng+"\",\""+lat1+"\",\""+lng1+"\")'></a></td></tr> ");
            } 
           
          }
        });  

}

function angkotrestaurant(id_angkot, lat1, lng1){
 $('#infoak').empty();
   hapusInfo();
      clearroute2();
    clearroute();
    clearangkot();
      hapusMarkerTerdekat();
      console.log("d");
    $('#infoak').append("<thead><th class='centered'>Destination</th><th class='centered'>Action</th></thead>");

     $.ajax({ 
        url: server+'angkotrestaurant.php?id='+id_angkot, data: "", dataType: 'json', success: function(rows)
          { 
            
            if(rows==null)
            {
              alert('Urban transport route not found');
            }
          for (var i in rows) 
            {   
              var row     = rows[i];
              var id_angkot   = row.id_angkot;
              var jurusan   = row.destination;
			  var route_color = row.route_color;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
			  var lat = row.lat;
			  var lng = row.lng;
			  var description = row.description;

              listgeom(id_angkot)
              tampilrute(id_angkot, route_color, latitude, longitude);
			centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/restaurants.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(id_angkot);
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
              map.setZoom(14);
                $('#infoak').append("<tr><td>"+jurusan+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailangkot(\""+id_angkot+"\",\""+lat+"\",\""+lng+"\",\""+lat1+"\",\""+lng1+"\")'></a></td></tr> ");
				
				/* route_sekitar(lat,lng,lat1,lng1); */
				
            } 
           
          }
        });  

}

function angkothotel(id_angkot, lat1, lng1){
 $('#infoak').empty();
   hapusInfo();
      clearroute2();
    clearroute();
    clearangkot();
      hapusMarkerTerdekat();
      console.log("d");
    $('#infoak').append("<thead><th class='centered'>Destination</th><th class='centered'>Action</th></thead>");

     $.ajax({ 
        url: server+'angkothotel.php?id='+id_angkot, data: "", dataType: 'json', success: function(rows)
          { 
            
            if(rows==null)
            {
              alert('Urban transport route not found');
            }
          for (var i in rows) 
            {   
              var row     = rows[i];
              var id_angkot   = row.id_angkot;
              var jurusan   = row.destination;
			  var route_color = row.route_color;
              var latitude  = row.latitude;
              var longitude = row.longitude;
			  var lat = row.lat;
			  var lng = row.lng;
			  var description = row.description;
				console.log(latitude);
				console.log(longitude);
              listgeom(id_angkot)
              tampilrute(id_angkot, route_color, latitude, longitude);
			centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_hotel.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(id_angkot);
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
              map.setZoom(14);
                $('#infoak').append("<tr><td>"+jurusan+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailangkot(\""+id_angkot+"\",\""+lat+"\",\""+lng+"\",\""+lat1+"\",\""+lng1+"\")'></a></td></tr> ");
				
				/* route_sekitar(lat,lng,lat1,lng1); */
				
            } 
           
          }
        });  

}

function angkotwisata(id_angkot, lat1, lng1){
 $('#infoak').empty();
   hapusInfo();
      clearroute2();
    clearroute();
    clearangkot();
      hapusMarkerTerdekat();
      console.log("d");
    $('#infoak').append("<thead><th class='centered'>Destination</th><th class='centered'>Action</th></thead>");

     $.ajax({ 
        url: server+'angkotwisata.php?id='+id_angkot, data: "", dataType: 'json', success: function(rows)
          { 
            
            if(rows==null)
            {
              alert('Urban transport route not found');
            }
          for (var i in rows) 
            {   
              var row     = rows[i];
              var id_angkot   = row.id_angkot;
              var jurusan   = row.destination;
			  var route_color = row.route_color;
              var latitude  = row.latitude;
              var longitude = row.longitude;
			  var lat = row.lat;
			  var lng = row.lng;
			  var description = row.description;
				console.log(latitude);
				console.log(longitude);
              listgeom(id_angkot)
              tampilrute(id_angkot, route_color, latitude, longitude);
			centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/hotels.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(id_angkot);
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
              map.setZoom(14);
                $('#infoak').append("<tr><td>"+jurusan+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailangkot(\""+id_angkot+"\",\""+lat+"\",\""+lng+"\",\""+lat1+"\",\""+lng1+"\")'></a></td></tr> ");
				
				/* route_sekitar(lat,lng,lat1,lng1); */
				
            } 
           
          }
        });  

}

function detailangkot(id_angkot, lat, lng, lat1, lng1){
	
  clearangkot();
  hapusRadius();
 
  console.log("D");
  $.ajax({
    url: server+'tampilrute.php?id_angkot='+id_angkot, data: "", dataType: 'json', success: function(rows){
       console.log("Dii");
      for (var i in rows.features){
              console.log("Diii");
        var id_angkot=rows.features[i].properties.id;
        var route_color=rows.features[i].properties.route_color;
        var latitude=rows.features[i].properties.latitude;
        var longitude=rows.features[i].properties.longitude;
        var jalur_angkot=rows.features[i].properties.track;
        var jurusan=rows.features[i].properties.destination;
        
        console.log(id_angkot);
        
        tampilrute(id_angkot, route_color,latitude, longitude);
        var centerBaru = new google.maps.LatLng(latitude, longitude);
        map.setCenter(centerBaru);
        var marker = new google.maps.Marker({
          position: centerBaru,
          animation: google.maps.Animation.DROP,              
          // icon:'assets/ico/marker_angkot.png',
          map: map
        });
        console.log(centerBaru)
        let infowindow = new google.maps.InfoWindow({
          position: centerBaru,
          content: "<b><u>Information</u></b><br>Route Code: "+id_angkot+"<br>Destination: "+jurusan+"<br>Track: "+jalur_angkot+"",
        }).open(map);
        // infowindow.open(map);
        console.log(infowindow)
        infoDua.push(infowindow);  
    		route_sekitar(lat,lng,lat1,lng1);
      }
      jalurAngkot.push(ja);
    }
  });
}

function listgeom(id_angkot){
        hapusInfo();
        $.ajax({ 
            url: server+'tampilrute.php?id_angkot='+id_angkot, data: "", dataType: 'json', success: function(rows) 
            { 
              arraylatlngangkot=[];
              var count=0;
              for (var i in rows.features[0].geometry.coordinates) 
                { 
                  for (var n in rows.features[0].geometry.coordinates[i])
                  {
                    var latlng=rows.features[0].geometry.coordinates[i][n];
                    // var latlng=rows.features[0].geometry.coordinates[i][n][0];
                    count++;
                    arraylatlngangkot.push(latlng);
                  }
                  console.log("a");
                } 
              console.log(count);
              if(count%2==1){
                count++;
              }
              console.log(mid);
              var mid=count/2;
              // arraylatlngangkot[mid];
              var lat=arraylatlngangkot[mid][1];
              var lon=arraylatlngangkot[mid][0];
              var id_angkot=rows.features[0].properties.id;
              var jalur_angkot=rows.features[0].properties.track;
              var jurusan=rows.features[0].properties.destination;
              
           }
         });
        }

function tampilrute(id_angkot, route_color, latitude, longitude){
  console.log("ini rute");
  console.log(route_color);
  ja = new google.maps.Data();
  ja.loadGeoJson(server+'tampilrute.php?id_angkot='+id_angkot);
  ja.setStyle(function(features){
    return({
      fillColor : 'yellow',
      strokeColor: route_color,
      strokeWeight : 2,
      fillOpacity : 0.5,

    });

  });
  ja.setMap(map);
    angkot.push(ja);
    map.setZoom(14);
}
function detailmasjid(id1){  //menampilkan informasi masjid
  
  $('#info').empty();
   hapusInfo();
      clearroute2();
	  clearroute();
      hapusMarkerTerdekat();
	 clearangkot();
       $.ajax({ 
      url: server+'detailmasjid.php?cari='+id1, data: "", dataType: 'json', success: function(rows)
        { 
		 console.log("hiaiii");
          console.log(id1);
         for (var i in rows.data) 
          { 

            console.log('dd');
            var row = rows.data[i];
            var id = row.id;
            var nama = row.name_mesjid;
            var alamat=row.address;
            var luas_tanah=row.land_size;
            var luas_bangunan=row.building_size;
            var luas_area_parkir=row.park_area_size;
            var kapasitas=row.capacity;
            var thn_berdiri=row.est;
            var thn_renovasi_terakhir=row.last_renovation;
            var jml_imam=row.imam;
            var jml_jamaah=row.jamaah;
            var jml_remaja=row.teenager;
            var nama_kat=row.name_category;
            var image = row.image;
            var latitude  = row.latitude; 
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_masjid.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
            $('#info').append("<tr><td><b>Name</b></td><td>:</td><td> "+nama+"</td></tr><tr><td><b>Address </b></td><td>:</td><td> "+alamat+"</td></tr><tr><td><b>Capacity</b></td><td>:</td><td>"+kapasitas+" Jamaah</td></tr><tr><td><b>Land Size</b></td><td>:</td><td> "+luas_tanah+" m<sup>2</sup></td></tr><tr><td><b>Building Size</b></td><td>:</td><td> "+luas_bangunan+" m<sup>2</sup></td></tr><tr><td><b>Park Area Size</b></td><td>:</td><td> "+luas_area_parkir+" m<sup>2</sup></td></tr><tr><td><b>Establish</b></td><td>:</td><td> "+thn_berdiri+"</td></tr><tr><td><b>Last Renovation</b></td><td>:</td><td> "+thn_renovasi_terakhir+"</td></tr><tr><td><b>Imam</b></td><td>:</td><td> "+jml_imam+"</td></tr><tr><td><b>Jamaah</b></td><td>:</td><td> "+jml_jamaah+"</td></tr><tr><td><b>Teenager</b></td><td>:</td><td> "+jml_remaja+"</td></tr><tr><td><b>Category</b></td><td>:</td><td> "+nama_kat+"</td></tr><tr><td><a class='btn btn-default' role=button' data-toggle='collapse' href='#terdekat1' onclick='tampil_sekitar(\""+latitude+"\",\""+longitude+"\",\""+nama+"\")' title='Nearby' aria-controls='Nearby'><i class='fa fa-compass' style='color:black;''></i><label>&nbsp Attraction Nearby</label></a><div class='collapse' id='terdekat1'><div class='well' style='width: 150%'><div class='checkbox'><label><input id='check_t' type='checkbox'>Tourism</label></div><div class='checkbox'><label><input id='check_i' type='checkbox'>Small Industry</label></div><div class='checkbox'><label><input id='check_oo' type='checkbox' value=''>Souvenir</label></div><div class='checkbox'><label><input id='check_k' type='checkbox' value=''>Culinary</label></div><div class='checkbox'><label><input id='check_h' type='checkbox' value='5'>Hotel</label></div><div class='checkbox'><label><input id='check_r' type='checkbox' value=''>Restaurant</label></div><label><b>Radius&nbsp</b></label><label style='color:black' id='km1'><b>0</b></label>&nbsp<label><b>m</b></label><br><input  type='range' onchange='cek1();aktifkanRadiusSekitar();resultt1();info1();' id='inputradius1' name='inputradius1' data-highlight='true' min='1' max='15' value='1' ></div></div></td></tr>")
			 infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b><br><img src='"+fotosrc+image+"' alt='image in infowindow' width='150'></center><br><i class='fa fa-home'></i> "+nama+"<br><i class='fa fa-map-marker'></i> "+alamat+"<br><br><input type='button' class='btn btn-success' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a>&nbsp&nbsp<input type='button' class='btn btn-success' value='More Information' onclick='galeri(\""+id+"\")'></a>&nbsp<a role='button' title='around' class='btn btn-success' value='Object Around' onclick='objectAround();tampil_sekitar(\""+latitude+"\",\""+longitude+"\",\""+nama+"\")'>Object Arround</a></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
			//FASILITAS MASJID
          var isi="<br><b style='margin-left:20px'>Facility</b> <br><ol>";
          for (var i in rows.fasilitas){ 
            var row = rows.fasilitas[i];
            var id_fas = row.id_fas;
            var name = row.name;
            console.log(name);
            isi = isi+"<li>"+name+"</li>";
          }//end for
          isi = isi + "</ol>";
          $('#info').append(isi);
		  
		  //KEGIATAN MASJID
          var isi="<b style='margin-left:20px'>Event</b> <br><ol>";
          for (var i in rows.keg){ 
            var row = rows.keg[i];
            var event_name = row.event_name;
            var date = row.date;
            var time = row.time;
            console.log(event_name);
            isi = isi+"<li><b>Event Name</b><b>:</b> &nbsp "+event_name+"<br><b>Date</b><b>:</b> &nbsp"+date+"<br><b>Time</b><b>:</b> &nbsp"+time+"</li>";
          }//end for
          isi = isi + "</ol>";
          $('#info').append(isi);
		  
           
            
          }  
           

        }
      }); 
}

function detailmes_infow(id){  //menampilkan informasi masjid di marker
  
  $('#info').empty();
   hapusInfo();
      clearroute2();
	  clearroute();
	 clearangkot();
       $.ajax({ 
      url: server+'detailmasjid1.php?cari='+id, data: "", dataType: 'json', success: function(rows)
        { 
		 console.log("hiaiii");
          console.log(id);
         for (var i in rows) 
          { 

            console.log('dd');
            var row = rows[i];
            var id = row.id;
            var nama = row.name_mesjid;
            var alamat=row.address;
			var image = row.image;
            var latitude  = row.latitude; 
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_masjid.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b><br><img src='"+fotosrc+image+"' alt='image in infowindow' width='150'></center><br><i class='fa fa-home'></i> "+nama+"<br><i class='fa fa-map-marker'></i> "+alamat+"<br><br><input type='button' class='btn btn-success' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a>&nbsp<input type='button' class='btn btn-success' value='More Information' value='Gallery' onclick='galeri(\""+id+"\")'></a>&nbsp<a role='button' title='around' class='btn btn-success' value='Object Around' onclick='objectAround();tampil_sekitar(\""+latitude+"\",\""+longitude+"\",\""+nama+"\")'>Object Around</a></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
          }  
           

        }
      }); 
}

function objectAround(){
  $('#hasilcari1').hide();
  $('#result').hide();
  $('#resultsekitar').show();
  $('#resultsekitar').empty();
  $('#resultsekitar').append("<div class='' id='terdekat1'><div class='well' style='width: 150%'><div class='checkbox'><label><input id='check_t' type='checkbox'>Tourism</label></div><div class='checkbox'><label><input id='check_i' type='checkbox'>Small Industry</label></div><div class='checkbox'><label><input id='check_oo' type='checkbox' value=''>Souvenir</label></div><div class='checkbox'><label><input id='check_k' type='checkbox' value=''>Culinary</label></div><div class='checkbox'><label><input id='check_h' type='checkbox' value='5'>Hotel</label></div><div class='checkbox'><label><input id='check_r' type='checkbox' value=''>Restaurant</label></div><label><b>Radius&nbsp</b></label><label style='color:black' id='km1'><b>0</b></label>&nbsp<label><b>m</b></label><br><input  type='range' onchange='cek1();aktifkanRadiusSekitar();resultt1();' id='inputradius1' name='inputradius1' data-highlight='true' min='1' max='15' value='1' ></div></div>");
}

function galeri(a){    
      console.log(a);
    window.open(server+'gallery.php?idgallery='+a);    
   }

function detailoleh(id1){  //menampilkan Information oleh oleh
  
  $('#info').empty();
   hapusInfo();
      clearroute2();
	  clearroute();
      hapusMarkerTerdekat();
      console.log('ini souvenir');
       $.ajax({ 
      url: server+'detailoleh.php?cari='+id1, data: "", dataType: 'json', success: function(rows)
        { 
          console.log(id1);
         for (var i in rows) 
          { 

            console.log('dd');
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            var address=row.address;
            var owner=row.owner;
            var cp=row.cp;
            var employee=row.employee;
            var latitude  = row.latitude; 
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/shopping.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
            $('#info').append("<tr><td><b>Name</b></td><td>:</td><td> "+name+"</td></tr><tr><td><b>Address </b></td><td>:</td><td> "+address+"</td></tr><tr><td><b>Owner</b></td><td>:</td><td>"+owner+"</td></tr><tr><td><b>Contact Person</b></td><td>:</td><td> "+cp+"</td></tr><tr><td><b>Employee</b></td><td>:</td><td> "+employee+"</td></tr>")
              // <a class='btn btn-default fa fa-compass' title='Attraction Nearby' onclick='owsekitar("+latitude+","+longitude+",200);ow();owtampil();'></a></td></tr> ");
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b></center><br><i class='fa fa-home'></i> "+name+"<br><i class='fa fa-map-marker'></i> "+address+"<br><a role='button' title='Route from your position' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a><a role='button' title='gallery' class='btn btn-default fa fa-picture-o' value='Gallery' onclick='galeri(\""+id+"\")'></a></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
           

        }
      }); 
}

function detailoleh_infow(id){  //menampilkan Information oleh oleh
  
  $('#info').empty();
   hapusInfo();
      clearroute2();
	  clearroute();
      console.log('ini souvenir');
       $.ajax({ 
      url: server+'detailoleh.php?cari='+id, data: "", dataType: 'json', success: function(rows)
        { 
          console.log(id);
         for (var i in rows) 
          { 

            console.log('dd');
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            var address=row.address;
            var latitude  = row.latitude; 
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/shopping.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b></center><br><i class='fa fa-home'></i> "+name+"<br><i class='fa fa-map-marker'></i> "+address+"<br><a role='button' title='Route from your position' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a><a role='button' title='gallery' class='btn btn-default fa fa-picture-o' value='Gallery' onclick='galeri(\""+id+"\")'></a></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
           

        }
      }); 
}

function detailrestaurant(id1){  //menampilkan Information rm
  
  $('#info').empty();
   hapusInfo();
      clearroute2();
    clearroute();
      hapusMarkerTerdekat();
       $.ajax({ 
      url: server+'detailrestaurant.php?cari='+id1, data: "", dataType: 'json', success: function(rows)
        { 
          console.log(id1);
         for (var i in rows) 
          { 

            console.log('dd');
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            var address=row.address;
            var cp=row.cp;
            var open=row.open;
            var close=row.close;
            var capacity=row.capacity;
            var mushalla=row.mushalla;
            var park_area=row.park_area;
            var employee=row.employee;
            var bathroom = row.bathroom;
            var latitude  = row.latitude; 
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/restaurants.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
            $('#info').append("<tr><td><b>Name</b></td><td>:</td><td> "+name+"</td></tr><tr><td><b>Address </b></td><td>:</td><td> "+address+"</td></tr><tr><td><b>Contact Person</b></td><td>:</td><td>"+cp+"</td></tr><tr><td><b>Open</b></td><td>:</td><td> "+open+"</td></tr><tr><td><b>Close</b></td><td>:</td><td> "+close+"</td></tr><tr><td><b>Capacity</b></td><td>:</td><td> "+capacity+"</td></tr><tr><td><b>Employee</b></td><td>:</td><td> "+employee+"</td></tr>")
              // <a class='btn btn-default fa fa-compass' title='Attraction Nearby' onclick='owsekitar("+latitude+","+longitude+",200);ow();owtampil();'></a></td></tr> ");
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b></center><br><i class='fa fa-home'></i> "+name+"<br><i class='fa fa-map-marker'></i> "+address+"<br><a role='button' title='Route from your position' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a></a>&nbsp<a role='button' title='gallery' class='btn btn-default fa fa-picture-o' value='Gallery' onclick='galeri(\""+id+"\")'></a></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
           

        }
      }); 
}

function detailres_infow(id){  //menampilkan Information rm
  
  $('#info').empty();
   hapusInfo();
      clearroute2();
    clearroute();
        $.ajax({ 
      url: server+'detailrestaurant.php?cari='+id, data: "", dataType: 'json', success: function(rows)
        { 
          console.log(id);
         for (var i in rows) 
          { 

            console.log('dd');
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            var address=row.address;
            var latitude  = row.latitude; 
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/restaurants.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b></center><br><i class='fa fa-home'></i> "+name+"<br><i class='fa fa-map-marker'></i> "+address+"<br><a role='button' title='Route from your position' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a></a>&nbsp<a role='button' title='gallery' class='btn btn-default fa fa-picture-o' value='Gallery' onclick='galeri(\""+id+"\")'></a></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
           

        }
      }); 
}

function detailik(id1){  //menampilkan Information rm
  
  $('#info').empty();
   hapusInfo();
      clearroute2();
    clearroute();
      hapusMarkerTerdekat();
       $.ajax({ 
      url: server+'detailik.php?cari='+id1, data: "", dataType: 'json', success: function(rows)
        { 
          console.log(id1);
         for (var i in rows) 
          { 

            console.log('dd');
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            var address=row.address;
            var cp=row.cp;
            var owner=row.owner;
            var employee=row.employee;
            var capacity=row.capacity;
            var latitude  = row.latitude; 
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/industries.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
            $('#info').append("<tr><td><b>Name</b></td><td>:</td><td> "+name+"</td></tr><tr><td><b>Address </b></td><td>:</td><td> "+address+"</td></tr><tr><td><b>Contact Person</b></td><td>:</td><td>"+cp+"</td></tr><tr><td><b>Owner</b></td><td>:</td><td> "+owner+"</td></tr><tr><td><b>Employee</b></td><td>:</td><td> "+employee+"</td></tr>")
              // <a class='btn btn-default fa fa-compass' title='Attraction Nearby' onclick='owsekitar("+latitude+","+longitude+",200);ow();owtampil();'></a></td></tr> ");
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b></center><br><i class='fa fa-home'></i> "+name+"<br><i class='fa fa-map-marker'></i> "+address+"<br><a role='button' title='Route from your position' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a>&nbsp<a role='button' title='gallery' class='btn btn-default fa fa-picture-o' value='Gallery' onclick='galeri(\""+id+"\")'></a></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
           

        }
      }); 
}

function detailindustri_infow(id){  //menampilkan Information rm
  
  $('#info').empty();
   hapusInfo();
      clearroute2();
    clearroute();
       $.ajax({ 
      url: server+'detailik.php?cari='+id, data: "", dataType: 'json', success: function(rows)
        { 
          console.log(id);
         for (var i in rows) 
          { 

            console.log('dd');
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            var address=row.address;
            var latitude  = row.latitude; 
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/industries.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b></center><br><i class='fa fa-home'></i> "+name+"<br><i class='fa fa-map-marker'></i> "+address+"<br><a role='button' title='Route from your position' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a>&nbsp<a role='button' title='gallery' class='btn btn-default fa fa-picture-o' value='Gallery' onclick='galeri(\""+id+"\")'></a></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
           

        }
      }); 
}

function detailculinary(id1){  //menampilkan Information culinary
  $('#info').empty();
   hapusInfo();
      clearroute2();
	  clearroute();
      hapusMarkerTerdekat();
       $.ajax({ 
      url: server+'detailrm.php?cari='+id1, data: "", dataType: 'json', success: function(rows)
        { 
          console.log(id1);
         for (var i in rows) 
          { 

            console.log('dd');
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            var address=row.address;
            var cp=row.cp;
            var capacity=row.capacity;
            var jam_buka=row.open;
            var jam_tutup=row.close;
            var employee=row.employee;
            var latitude  = row.latitude; 
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/food.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
            $('#info').append("<tr><td><b>Name</b></td><td>:</td><td> "+name+"</td></tr><tr><td><b>Address </b></td><td>:</td><td> "+address+"</td></tr><tr><td><b>Contact Person</b></td><td>:</td><td>"+cp+"</td></tr><tr><td><b>Special Menu</b></td><td>:</td><td> "+capacity+"</td></tr><tr><td><b>Open</b></td><td>:</td><td> "+jam_buka+"</td></tr><tr><td><b>Close </b></td><td>:</td><td> "+jam_tutup+"</td></tr><tr><td><b>Capacity</b></td><td>:</td><td> "+employee+"</td></tr><tr><td><b>Facility</b></td></tr>")
              // <a class='btn btn-default fa fa-compass' title='Attraction Nearby' onclick='owsekitar("+latitude+","+longitude+",200);ow();owtampil();'></a></td></tr> ");
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b><br></center><br><i class='fa fa-home'></i> "+name+"<br><i class='fa fa-map-marker'></i> "+address+"<br><a role='button' title='Route from your position' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a>&nbsp<a role='button' title='gallery' class='btn btn-default fa fa-picture-o' value='Gallery' onclick='galeri(\""+id+"\")'></a></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
           

        }
      }); 
}

function detailkuliner_infow(id){  //menampilkan Information culinary
  $('#info').empty();
   hapusInfo();
      clearroute2();
	  clearroute();
         $.ajax({ 
      url: server+'detailrm.php?cari='+id, data: "", dataType: 'json', success: function(rows)
        { 
          console.log(id);
         for (var i in rows) 
          { 

            console.log('dd');
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            var address=row.address;
             var latitude  = row.latitude; 
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/food.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b><br></center><br><i class='fa fa-home'></i> "+name+"<br><i class='fa fa-map-marker'></i> "+address+"<br><a role='button' title='Route from your position' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a>&nbsp<a role='button' title='gallery' class='btn btn-default fa fa-picture-o' value='Gallery' onclick='galeri(\""+id+"\")'></a></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
           

        }
      }); 
}

function detailhotel(id1){  //menampilkan Information hotel
  
  $('#info').empty();
   hapusInfo();
      clearroute2();
    clearroute();
      hapusMarkerTerdekat();
       $.ajax({ 
      url: server+'detailhotel.php?cari='+id1, data: "", dataType: 'json', success: function(rows)
        { 
          console.log(id1);
         for (var i in rows) 
          { 

            console.log('dd');
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            var address=row.address;
            var cp=row.cp;
            var ktp=row.ktp;
            var marriage_book=row.marriage_book;
            var mushalla=row.mushalla;
            var star=row.star;
            var lat  = row.latitude; 
            var lon = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_hotel.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(lat);
              console.log(lon);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
			var syarat="0";
                if (ktp == 1 && marriage_book == 1) {
                  syarat = "KTP & Marriage Book";
                }
                else if (ktp == 1) {
                  syarat = "KTP";
                } else if (marriage_book == 1) {
                  syarat = "Marriage Book";
                }
            $('#info').append("<tr><td><b>Name</b></td><td>:</td><td> "+name+"</td></tr><tr><td><b>Address </b></td><td>:</td><td> "+address+"</td></tr><tr><td><b>Contact Person</b></td><td>:</td><td>"+cp+"</td></tr><tr><td><b>Stay Requirements</b></td><td>:</td><td> "+syarat+"</td></tr><tr><td><b>Star</b></td><td>:</td><td> "+star+"</td></tr>")
              // <a class='btn btn-default fa fa-compass' title='Attraction Nearby' onclick='owsekitar("+latitude+","+longitude+",200);ow();owtampil();'></a></td></tr> ");
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b></center><br><i class='fa fa-home'></i> "+name+"<br><i class='fa fa-map-marker'></i> "+address+"<br><a role='button' title='Route from your position' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a>&nbsp<a role='button' title='gallery' class='btn btn-default fa fa-picture-o' value='Gallery' onclick='galeri(\""+id+"\")'></a></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
           

        }
      }); 
}

function detailhotel_infow(id){  //menampilkan Information hotel
  
  $('#info').empty();
   hapusInfo();
      clearroute2();
    clearroute();
       $.ajax({ 
      url: server+'detailhotel.php?cari='+id, data: "", dataType: 'json', success: function(rows)
        { 
          console.log(id);
         for (var i in rows) 
          { 

            console.log('dd');
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            var address=row.address;
            var lat  = row.latitude; 
            var lon = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_hotel.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(lat);
              console.log(lon);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 

            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b></center><br><i class='fa fa-home'></i> "+name+"<br><i class='fa fa-map-marker'></i> "+address+"<br><a role='button' title='Route from your position' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a>&nbsp<a role='button' title='gallery' class='btn btn-default fa fa-picture-o' value='Gallery' onclick='galeri(\""+id+"\")'></a></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
           

        }
      }); 
}


function detailow(id1){  //menampilkan Information ow
  
  $('#info').empty();
   hapusInfo();
      clearroute2();
	  clearroute();
      hapusMarkerTerdekat();
       $.ajax({ 
      url: server+'detailow.php?cari='+id1, data: "", dataType: 'json', success: function(rows)
        { 
          console.log(id1);
         for (var i in rows) 
          { 

            console.log('dd');
            var row = rows[i];
            var id = row.id;
            var name   = row.name;
        var address = row.address;
        var open = row.open;
        var close = row.close;
        var ticket = row.ticket;
        var fasilitas = row.fasilitas;
            var latitude  = row.latitude; 
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_tw.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
            $('#info').append("<tr><td><b>Name</b></td><td>:</td><td> "+name+"</td></tr><tr><td><b>Address </b></td><td>:</td><td> "+address+"</td></tr><tr><td><b>Open</b></td><td>:</td><td>"+open+"</td></tr><tr><td><b>Close</b></td><td>:</td><td> "+close+"</td></tr><tr><td><b>Price</b></td><td>:</td><td> "+ticket+"</td></tr>")
              // <a class='btn btn-default fa fa-compass' title='Attraction Nearby' onclick='owsekitar("+latitude+","+longitude+",200);ow();owtampil();'></a></td></tr> ");
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b><br></center><br><i class='fa fa-home'></i> "+name+"<br><i class='fa fa-map-marker'></i> "+address+"<br><a role='button' title='Route from your position' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a>&nbsp<a role='button' title='gallery' class='btn btn-default fa fa-picture-o' value='Gallery' onclick='galeri(\""+id+"\")'></a></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
           

        }
      }); 
}

function detailow_infow(id){  //menampilkan Information ow
  
  $('#info').empty();
   hapusInfo();
      clearroute2();
	  clearroute();
       $.ajax({ 
      url: server+'detailow.php?cari='+id, data: "", dataType: 'json', success: function(rows)
        { 
          console.log(id);
         for (var i in rows) 
          { 

            console.log('dd');
            var row = rows[i];
            var id = row.id;
            var name   = row.name;
        var address = row.address;
            var latitude  = row.latitude; 
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_tw.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b><br></center><br><i class='fa fa-home'></i> "+name+"<br><i class='fa fa-map-marker'></i> "+address+"<br><a role='button' title='Route from your position' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a>&nbsp<a role='button' title='gallery' class='btn btn-default fa fa-picture-o' value='Gallery' onclick='galeri(\""+id+"\")'></a></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);            
          }           

        }
      }); 
}

function detailevent(id1, id2, id3){  //menampilkan Information event
  
  $('#infoevent').empty();
   hapusInfo();
      clearroute2();
	  clearroute();
      hapusMarkerTerdekat();
	  console.log("hay");
       $.ajax({ 
      url: server+'detailevent.php?cari='+id1+'&time='+id2+'&date='+id3, data: "", dataType: 'json', success: function(rows)
        { 
          console.log(id1);
         for (var i in rows) 
          { 

            console.log('dd');
            var row = rows[i];
            var nama = row.worship_place_name;
            var nama_keg=row.event_name;
            var tgl_keg=row.date;
            var nama_ustad=row.ustad_name;
            var materi=row.description;
            var jam=row.time;
            var image=row.image;
			var latitude = row.lat;
			var longitude = row.lng;
            centerBaru = new google.maps.LatLng(row.lat, row.lng);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/aaa.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
            $('#infoevent').append("<tr><td><b>Mosque</b></td><td>:</td><td> "+nama+"</td></tr><tr><td><b> Event </b></td><td>:</td><td> "+nama_keg+"</td></tr><tr><td><b>Date</b></td><td>:</td><td>"+tgl_keg+"</td></tr><tr><td><b>Time</b></td><td>:</td><td> "+jam+"</td></tr><tr><td><b>Ustad</b></td><td>:</td><td> "+nama_ustad+"</td></tr><tr><td><b>Content</b></td><td>:</td><td> "+materi+"</td></tr>")
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b><br><img src='"+fotosrc+image+"' alt='image in infowindow' width='150'></center><br><i class='fa fa-home'></i> "+nama+"<br><i class='fa fa-map-marker'></i> "+nama_keg+"<br></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
           

        }
      }); 
}

var rad_lat=0;
      var rad_lng=0;
      function tampil_sekitar(latitude,longitude,nama){
       
        rad_lat = latitude;
        rad_lng = longitude;
		console.log(rad_lat);
		console.log(rad_lng);
        document.getElementById("inputradius1").style.display = "inline";

        // POSISI MARKER
        centerBaru = new google.maps.LatLng(latitude, longitude);
          var marker = new google.maps.Marker({map: map, position: centerBaru, 
          icon:'assets/ico/marker_masjid.png',
          animation: google.maps.Animation.DROP,
          clickable: true});                       
      }
	  


function aktifkanRadiusSekitar(){
			hapusRadius();
			hapusMarkerTerdekat();
          var pos = new google.maps.LatLng(rad_lat, rad_lng);
          map.setCenter(pos);
          map.setZoom(16);   
		  console.log(pos);
          console.log(rad_lat);
		  console.log(rad_lng);
          var inputradius1=document.getElementById('inputradius1').value;
		  var a=document.getElementById('check_h').value;
		  console.log(inputradius1);
          var rad = parseFloat(inputradius1*100);
          var circle = new google.maps.Circle({
            center: pos,
            radius: rad,      
            map: map,
            strokeColor: "blue",
            strokeOpacity: 0.5,
            strokeWeight: 1,
            fillColor: "blue",
            fillOpacity: 0.35
          });        
          circles.push(circle); 
console.log("aada");	

			if (document.getElementById('check_t').checked) {
            owsekitar(rad_lat,rad_lng,rad);
			} 
			
			if (document.getElementById('check_h').checked) {
            hotelsekitar(rad_lat,rad_lng,rad);
			}
			
			if (document.getElementById('check_i').checked) {
            industrisekitar(rad_lat,rad_lng,rad);
			} 

			if (document.getElementById('check_oo').checked) {
            oleholehsekitar(rad_lat,rad_lng,rad);
			} 

			if (document.getElementById('check_k').checked) {
            kulinersekitar(rad_lat,rad_lng,rad);
			}  
			if (document.getElementById('check_r').checked) {
            restaurantsekitar(rad_lat,rad_lng,rad);
      }  
			 
             

        }
		
function oleholehsekitar(latitude,longitude,rad){ // SOUVENIR SEKITAR MASJID

          $('#hasilcari2').show();
		  $('#hasilcariaround').empty();
		  cekRadius1();
          $.ajax({url: server+'carioleholeh.php?lat='+latitude+'&long='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){ 
            for (var i in rows){ 
              var row = rows[i];
              var id_oleh_oleh = row.id;
              var nama_oleh_oleh = row.name;
              var cp = row.cp;
              var pemilik = row.owner;
              var alamat = row.address;
              var id_status_tempat = row.id_souvenir_type;
			        var jumlah_karyawan = row.employee;
              var lat=row.latitude;
              var lon = row.longitude;
			  console.log(nama_oleh_oleh);

  centerBaru = new google.maps.LatLng(lat, lon);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/shopping.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(id_oleh_oleh);
              console.log(lat);
              console.log(lon);
              markersDua.push(marker);
              map.setCenter(centerBaru);
			  klikInfoWindow_oleh(id_oleh_oleh);
              map.setZoom(14);			  
			  $('#hasilcariaround').append("<tr><td>"+nama_oleh_oleh+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailoleh(\""+id_oleh_oleh+"\");info1();'></a></td><td><a role='button' class='btn btn-default fa fa-bus' title='jalur angkot' onclick='angkotsouvenir(\""+id_oleh_oleh+"\",\""+lat+"\",\""+lon+"\");info12();'></a></td><td><a role='button' title='Route from mosque' class='btn btn-default fa fa-male' value='Route' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a></td></tr>");
            }//end for
          }});//end ajax 
        }
		
		function kulinersekitar(latitude,longitude,rad){ // KULINER SEKITAR MASJID

          $('#hasilcari2').show();
		  $('#hasilcariaround').empty();
		  cekRadius1();
          $.ajax({url: server+'carikuline.php?lat='+latitude+'&long='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){ 
            for (var i in rows){ 
              var row = rows[i];
              var id = row.id;
              var name = row.name;
              var address = row.address;
              var cp = row.cp;
              var capacity = row.capacity;
              var jam_buka = row.open;
              var jam_tutup = row.close;
              var employee = row.employee;
              var lat=row.latitude;
              var lon = row.longitude;
			  console.log(name);
				  centerBaru = new google.maps.LatLng(lat, lon);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/food.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(id);
              console.log(lat);
              console.log(lon);
              markersDua.push(marker);
              map.setCenter(centerBaru);
			  klikInfoWindow_kuliner(id);
              map.setZoom(14);
              $('#hasilcariaround').append("<tr><td>"+name+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailculinary(\""+id+"\");info1();'></a></td><td><a role='button' class='btn btn-default fa fa-bus' title='jalur angkot' onclick='angkotkuliner(\""+id+"\",\""+lat+"\",\""+lon+"\");info12();'></a></td><td><a role='button' title='Route from mosque' class='btn btn-default fa fa-male' value='Route' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a></td></tr>");
            }
          }});
        }

function hotelsekitar(latitude,longitude,rad){ // HOTEL SEKITAR MASJID

          $('#hasilcari2').show();
		  $('#hasilcariaround').empty();
		  cekRadius1();
          $.ajax({url: server+'carihotel.php?lat='+latitude+'&long='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){ 
            for (var i in rows){ 
              var row = rows[i];
              var id_hotel = row.id;
              var nama = row.name;
              var alamat = row.address;
              var cp = row.cp;
              var ktp = row.ktp;
              var marriage_book = row.marriage_book;
              var mushalla = row.mushalla;
              var star = row.star;
              var id_type = row.id_type;
              var lat=row.latitude;
              var lon = row.longitude;
			  console.log(name);
 			  centerBaru = new google.maps.LatLng(lat, lon);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_hotel.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(id_hotel);
              console.log(lat);
              console.log(lon);
              markersDua.push(marker);
              map.setCenter(centerBaru);
			  klikInfoWindow_hotel(id_hotel);
              map.setZoom(14);
			$('#hasilcariaround').append("<tr><td>"+nama+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailhotel(\""+id_hotel+"\");info1();'></a></td><td><a role='button' class='btn btn-default fa fa-bus' title='jalur angkot' onclick='angkothotel(\""+id_hotel+"\",\""+lat+"\",\""+lon+"\");info12();'></a></td><td><a role='button' title='Route from mosque' class='btn btn-default fa fa-male' value='Route' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a></td></tr>");
            }//end for
          }});//end ajax  
        }

		function industrisekitar(latitude,longitude,rad){ // INDUSTRI SEKITAR MASJID
          $('#hasilcari2').show();
		  $('#hasilcariaround').empty();
		  cekRadius1();
      console.log("ini industri");
          $.ajax({url: server+'cariindustri.php?lat='+latitude+'&long='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){ 
            console.log("ini juga");
            for (var i in rows){ 
              var row = rows[i];
              var id_industri = row.id;
              var nama_industri = row.name;
              var cp = row.cp;
              var pemilik = row.owner;
              var alamat = row.address;
              var id_status_tempat = row.id_industry_type;
			  var jumlah_karyawan = row.employee;
              var lat=row.latitude;
              var lon = row.longitude;
			  console.log(name);

			  centerBaru = new google.maps.LatLng(lat, lon);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/industries.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(id_industri);
              console.log(lat);
              console.log(lon);
              markersDua.push(marker);
              map.setCenter(centerBaru);
			  klikInfoWindow_industri(id_industri);
              map.setZoom(14);
			$('#hasilcariaround').append("<tr><td>"+nama_industri+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailik(\""+id_industri+"\");info1();'></a></td><td><a role='button' class='btn btn-default fa fa-bus' title='jalur angkot' onclick='angkotindustri(\""+id_industri+"\",\""+lat+"\",\""+lon+"\");info12();'></a></td><td><a role='button' title='Route from mosque' class='btn btn-default fa fa-male' value='Route' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a></td></tr>");
            }//end for
          }});//end ajax  
        }
		
		
	function owsekitar(latitude,longitude,rad){ // OW SEKITAR MASJID
          $('#hasilcari2').show();
		  $('#hasilcariaround').empty();
		  cekRadius1();
		  console.log(server+'cariow.php?lat='+latitude+'&long='+longitude+'&rad='+rad)
          $.ajax({url: server+'cariow.php?lat='+latitude+'&long='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){ 
            for (var i in rows){ 
              var row = rows[i];
              var id = row.id;
              var nama = row.name;
              var lokasi = row.address;
              var jam_buka = row.open;
              var jam_tutup = row.close;
              var fasilitas = row.ticket;
              var keterangan = row.id_type;
              var lat = row.latitude;
              var lon = row.longitude;
			  console.log(name);
			  centerBaru = new google.maps.LatLng(lat, lon);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_tw.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(id);
              console.log(lat);
              console.log(lon);
              markersDua.push(marker);
              map.setCenter(centerBaru);
			  klikInfoWindow_ow(id);
              map.setZoom(14);
			 
			$('#hasilcariaround').append("<tr><td>"+nama+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailow(\""+id+"\");info1();'></a></td><td><a role='button' class='btn btn-default fa fa-bus' title='jalur angkot' onclick='angkotwisata(\""+id+"\",\""+lat+"\",\""+lon+"\");info12();'></a></td><td><a role='button' title='Route from mosque' class='btn btn-default fa fa-male' value='Route' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a></td></tr>");
            }//end for
          }});//end ajax  
        }

        function restaurantsekitar(latitude,longitude,rad){ // restaurant SEKITAR MASJID
          $('#hasilcari2').show();
		  $('#hasilcariaround').empty();
      cekRadius1();
      console.log(server+'carirestaurant.php?lat='+latitude+'&long='+longitude+'&rad='+rad)
          $.ajax({url: server+'carirestaurant.php?lat='+latitude+'&long='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){ 
            for (var i in rows){ 
              var row = rows[i];
              var id = row.id;
              var nama = row.name;
              var lokasi = row.address;
              var lat = row.latitude;
              var lon = row.longitude;
        console.log(name);
			 centerBaru = new google.maps.LatLng(lat, lon);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/restaurants.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(id);
              console.log(lat);
              console.log(lon);
              markersDua.push(marker);
              map.setCenter(centerBaru);
			  klikInfoWindow_res(id);
              map.setZoom(14);
			 

      $('#hasilcariaround').append("<tr><td>"+nama+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailrestaurant(\""+id+"\");info1();'></a></td><td><a role='button' class='btn btn-default fa fa-bus' title='jalur angkot' onclick='angkotrestaurant(\""+id+"\",\""+lat+"\",\""+lon+"\");info12();'></a></td><td><a role='button' title='Route from mosque' class='btn btn-default fa fa-male' value='Route' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a></td></tr>");
            }//end for
          }});//end ajax  
        }

		
		
 function callRoute(start, end) {
      if (pos == 'null' || typeof(pos) == "undefined"){
    alert ('Please click button current position or button manual position first');
    }
    else
    {
       directionsService = new google.maps.DirectionsService;
	   directionsDisplay = new google.maps.DirectionsRenderer;
         
    
      directionsService.route
      (
        {
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING
        }, 
        function(response, status) 
        {
            if (status === google.maps.DirectionsStatus.OK) 
            {
              directionsDisplay.setDirections(response);
            } 
            else 
            {
              window.alert('Directions request failed due to ' + status);
            }
          }
      );
      directionsDisplay.setMap(map);
      map.setZoom(16);
      $('#rute').append("<div class='box-body' style='max-height:350px;overflow:auto;'><div class='form-group' id='detailrute'></div></div></div>")
      directionsDisplay.setPanel(document.getElementById('detailrute'));
     }
 }
 
 function route_sekitar(lat1,lng1,lat,lng) {
          var start = new google.maps.LatLng(lat1, lng1);
          var end = new google.maps.LatLng(lat, lng);

          if(directionsDisplay){
              clearroute();  
              hapusInfo();
          }

          directionsService = new google.maps.DirectionsService();
          var request = {
            origin:start,
            destination:end,
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC,
            provideRouteAlternatives: true
          };

          directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
             directionsDisplay.setDirections(response);
           }
          });
          
          directionsDisplay = new google.maps.DirectionsRenderer({
            draggable: false,
            polylineOptions: {
              strokeColor: "darkorange"
            }
          });

          directionsDisplay.setMap(map);
          $('#rute').show();
          $('#att2').show();
          $('#rute').append("<div class='box-body' style='max-height:350px;overflow:auto;'><div class='form-group' id='detailrute'></div></div></div>")
          directionsDisplay.setPanel(document.getElementById('detailrute'));
          rute.push(directionsDisplay);          
      }

//menampilkan checkbox fasilitas
function fasilitas(){
  
  $('#fasilitaslist .checkbox').remove();
  var v=fasilitaslist.value;
  $.ajax({ url: server+'fasilitas.php?id='+v, data: "", dataType: 'json', success: function(rows){
    for (var i in rows){
      console.log("hy");
      var row = rows[i];
      var id_fasilitas=row.id;
      var nama_fasilitas=row.name;
      console.log(id_fasilitas);
      $('#fasilitaslist').append('<div class="checkbox" style="color: #f3fff4"><label><input type="checkbox" name="fasilitas" value="'+id_fasilitas+'">'+nama_fasilitas+'</label></div>');
    }
  }});
}

function tampilkatwilayah(){ //fungsi cari berdasarkan wilayah dan kategori
  var b = document.getElementById('kecamatan1').value;
  var cari = document.getElementById('id_kategori1').value;
  console.log(b);
  $('#hasilcari1').show();
      $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
	  clearroute();
    clearangkot();
	hapusRadius();
      hapusMarkerTerdekat();
    console.log(cari);
            $.ajax({ 
            url: server+'/carikatwilayah.php?id='+b+'&cari='+cari, data: "", dataType: 'json', success: function(rows) 
            { 
        
        if(rows==null)
          {
            alert('Worship Place Not Found !');
          
          }
        else{
           for (var i in rows) 
                    { 
            
                        var row = rows[i];
                        var id   = row.id;
                        var nama   = row.worship_place_name;
                        var alamat   = row.address;
                        var kapasitas = row.capacity;
                        var latitude  = row.latitude ;
                        var longitude = row.longitude ;
                        console.log(nama);
     
						
						centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_masjid.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
			  klikInfoWindow(id);
              map.setZoom(14);
               
             $('#hasilcari').append("<tr><td>"+nama+"</td><td><a role='button' class='btn btn-success' onclick='detailmasjid(\""+id+"\");info1();'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' title='jalur angkot' onclick='angkotmesjid(\""+id+"\",\""+latitude+"\",\""+longitude+"\");info12();'></a></td></tr>");
                        }
            
        }
            } 
         });
  
}

function carifasilitas(){

$('#hasilcari1').show();
    $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
	  clearroute();
    clearangkot();
	hapusRadius();
      hapusMarkerTerdekat();
  var fas=fasilitaslist.value;
  var arrayLay=[];
  for(i=0;i<$("input[name=fasilitas]:checked").length;i++){
    arrayLay.push($("input[name=fasilitas]:checked")[i].value);
  }
  if (arrayLay==''){
    alert('Choose Facility !');
  }else{
    console.log("yuhuuuuuuuuu");

    $.ajax({ url: server+'carifasilitas.php?lay='+arrayLay, data: "", dataType: 'json', success: function(rows){
      console.log(server+'carifasilitas.php?lay='+arrayLay);
      if(rows==null)
            {
              alert('Mosque not found');
            }
        for (var i in rows) 
            {   
              var row     = rows[i];
              var id   = row.id;
              var nama   = row.name;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_masjid.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(id);
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
			   klikInfoWindow(id);
              map.setZoom(14);
              $('#hasilcari').append("<tr><td>"+nama+"</td><td><a role='button' class='btn btn-success' onclick='detailmasjid(\""+id+"\");info1();'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' title='jalur angkot' onclick='angkotmesjid(\""+id+"\",\""+latitude+"\",\""+longitude+"\");info12();'></a></td></tr>");
            }

    }});
  }
}

function caritglkeg(){
  if(caritgl.value==''){
    alert("Fill the input form first!");
    }else{
    console.log("hau");
    $.ajax({ url: server+'caritglkeg.php?tgl='+caritgl.value, data: "", dataType: 'json', success: function (rows){

      console.log(server+'caritglkeg.php?tgl='+caritgl.value);
      caritglk(rows);
    }});
  }
}

function tampiljurusan()
  {

    $('#hasilcari1').show();
    $('#hasilcari').empty();
    $('#hasilcari').append("<thead><th>Angkot Code</th><th>Major</th><th>Route</th><th>Gallery</th></thead>");
      hapusInfo();
      clearroute2();
	  clearroute();
    clearangkot();
	hapusRadius();
    /*   hapusMarkerTerdekat(); */
   var jur=jurusan.value;
    console.log(jur);
    $.ajax({ 
        url: server+'carijur.php?jur='+jur, data: "", dataType: 'json', success: function(rows)
          { 
            
            if(rows==null)
            {
              alert('Route Not Found');
            }
          for (var i in rows) 
            {   
              console.log("hai riri");
              var row     = rows[i];
              var id_angkot   = row.id;
              var jurusan   = row.destination;
              $('#hasilcari').append("<tr><td>"+id_angkot+"</td><td>"+jurusan+"</td><td><a role='button' class='btn btn-success fa fa-search' onclick='detailangkot(\""+id_angkot+"\")'></a></td><td><a role='button' class='btn btn-primary fa fa-picture-o' onclick='galeriangkot(\""+id_angkot+"\")'></a></td></tr>");
            } 
           
          }
        });  
  }


  function galeriangkot(){

  }

  function clearangkot(){
        for (i in angkot){
        //for (var i = 0; i < angkot.length; i++) {
            angkot[i].setMap(null);
          } 
          angkot=[]; 
        }

 function posisiawal(){ //POSISI AWAL

        if (awal==0) {
            $('#text_awal').empty();
            $('#text_awal').append("<div class='alert alert-info' style='display: inline-block;padding: 6px 12px;width:100%'>Silahkan klik posisi anda</div>");   
        } else { 
            $('#text_awal').empty();
            $('#text_awal').append("<div class='alert alert-danger' style='display: inline-block;padding: 6px 12px;width:100%'>Reset Dulu</div>");   
        }
    
        map.addListener('click', function(event) {
          console.log("manual 1 mulai");
          if (awal == 0) {
              console.log("mulai");
              marker_awal = new google.maps.Marker({
               //icon: "assets/img/biru1.ico",
                position : event.latLng,
                map: map,
                animation: google.maps.Animation.DROP,
                });

              posisi_1 = {
              lat: event.latLng.lat(),
              lng: event.latLng.lng() }

              document.getElementById('input_posisi_awal_lat').value=posisi_1.lat;
              document.getElementById('input_posisi_awal_lng').value=posisi_1.lng;

              marker_awal.info = new google.maps.InfoWindow({
                  content: "<center><a style='color:black;'>Anda Disini</a></center>",
                  pixelOffset: new google.maps.Size(0, -1)
                    });
                  marker_awal.info.open(map, marker_awal);

              marker_1.push(marker_awal);
              awal=1;
              $('#text_awal').empty();
              $('#text_awal').append("<div class='alert alert-success' style='display: inline-block;padding: 6px 12px;width:100%'>Lokasi telah dipilih</div>");   
          }//end awal == 0
        });//end add listener
      }

      function posisitujuan(){ //POSISI TUJUAN

        if (tujuan==0) {
            $('#text_tujuan').empty();
            $('#text_tujuan').append("<div class='alert alert-info' style='display: inline-block;padding: 6px 12px;width:100%'>Silahkan klik posisi anda</div>"); 
          } else {
            $('#text_tujuan').empty();
            $('#text_tujuan').append("<div class='alert alert-danger' style='display: inline-block;padding: 6px 12px;width:100%'>Reset dulu</div>"); 
          }

        map.addListener('click', function(event) {
          console.log("manual 2 mulai"); 
          if (tujuan == 0) {
            console.log("mulai");
            for (var i = 0; i < marker_2.length; i++) {
              marker_2[i].setMap(null);        
            } 

            marker = new google.maps.Marker({
             //icon: "assets/img/biru1.ico",
              position : event.latLng,
              map: map,
              animation: google.maps.Animation.DROP,
              });

            posisi_2 = {
            lat: event.latLng.lat(),
            lng: event.latLng.lng() }

            document.getElementById('input_posisi_tujuan_lat').value=posisi_2.lat;
            document.getElementById('input_posisi_tujuan_lng').value=posisi_2.lng;

            marker.info = new google.maps.InfoWindow({
                content: "<center><a style='color:black;'>Tujuan Anda Disini </a></center>",
                pixelOffset: new google.maps.Size(0, -1)
                  });
                marker.info.open(map, marker);

            marker_2.push(marker);
            tujuan =1;
            $('#text_tujuan').empty();
            $('#text_tujuan').append("<div class='alert alert-success' style='display: inline-block;padding: 6px 12px;width:100%'>Lokasi telah dipilih</div>"); 

          }//end tujuan ==0
       });//end addlistener

      }
	  
	  

	  function call_rute(){ // Panggil Track
        //loader                 
         $('#hasilcari1').show();
    $('#hasilcari').empty();
    $('#hasilcari').append("<thead><th>Angkot Code</th><th>Route</th><th>Gallery</th></thead>");
      hapusInfo();
      clearroute2();
	  clearroute();
      hapusMarkerTerdekat();   

        var lat1= document.getElementById('input_posisi_awal_lat').value;
        var lng1= document.getElementById('input_posisi_awal_lng').value;
        var lat2 = document.getElementById('input_posisi_tujuan_lat').value
        var lng2 = document.getElementById('input_posisi_tujuan_lng').value;

        

        if (lat1==""||lng1==""||lat2==""||lng2=="") {
          $('#kanan_rute').append("<div class='alert alert-danger' style='font-size:12px; display: inline-block;padding: 6px 12px;width:100%'><b>Pilih Lokasi Anda Terlebih Dahulu</b></div>");
        } else {
          var url_tujuan = server+'track.php?lat1='+lat1+'&lng1='+lng1+'&lat2='+lat2+'&lng2='+lng2+'&rad=300'; 
          console.log(url_tujuan);
          $.ajax({url: url_tujuan, data: "", dataType: 'json', success: function(rows){            
            //{"jumlah":6,"data":[{"rute-ke":1,"data":["A002","18"]},{"rute-ke":2,"data":["D003","18"]},{"rute-ke":3,"data":["A001","18"]},{"rute-ke":4,"data":["C006","18"]},{"rute-ke":5,"data":["A003","18"]},{"rute-ke":6,"data":["C001","18"]}]}
			console.log(lat1);
			console.log(lng1);
			console.log("haii");
			console.log(lat2);
			console.log(lng2);
            console.log(rows.jumlah);
            console.log(rows.data);
            for (var i in rows.data){ 
              var row = rows.data[i];
              var data = row.data;
			  var id_angkot = row.id_angkot;
              var rute="";
              var fungsi="";
              for(var x in data){
                var isi = data[x];
                console.log(isi);
                if (rute=="") {
                  rute = isi;                   
                }else{
                  rute = rute+' - '+isi;
                }
                fungsi = fungsi + "detailangkot(\'"+isi+"\');";
              }//end for
              console.log("hasil rute");
              console.log(rute);
              console.log(fungsi);
              $('#hasilcari').append("<tr><td>"+isi+"</td><td><a role='button' class='btn btn-success fa fa-search' onclick=\"hapus_kecuali_landmark();"+fungsi+"\"></a></td><td><a role='button' class='btn btn-primary fa fa-picture-o' onclick='galeriangkot(\""+isi+"\")'></a></td></tr>");                          
            }//end for
            if (rows.jumlah == 0) {
              $('#kanan_rute').empty();
              $('#kanan_rute').append("<div class='alert alert-danger' style='font-size:12px; display: inline-block;padding: 6px 12px;width:100%'><b>Tidak ada angkot di sekitar posisi pilihan anda</b></div>"); 
            }//end if   
            //loader                 
            $("#loader").hide();
            $("#loader_text").hide();               
          }});//end ajax      
        }

      }
	  
function legenda()
{
	$('#tombol').empty();
	$('#tombol').append('<a class="btn btn-default" role="button" id="hidelegenda" data-toggle="tooltip" onclick="hideLegenda()" title="Hide Legend"><i class="fa fa-eye-slash" style="color:black;"></i></a>');
	
	var layer = new google.maps.FusionTablesLayer(
		{
          query: {
            select: 'Location',
            from: '1NIVOZxrr-uoXhpWSQH2YJzY5aWhkRZW0bWhfZw'
          },
          map: map
        });
		var legend = document.createElement('div');
        legend.id = 'legend';
        var content = [];
        content.push('<h4>Legend</h4>');
        content.push('<p><div class="color b"></div>District Mandiangin Koto Selayan</p>');
        content.push('<p><div class="color c"></div>District Guguak Panjang</p>');
        content.push('<p><div class="color d"></div>District Aur Birugo Tigo Baleh</p>');
		content.push('<p><div class="color e"></div>Place of Worship</p>');
        content.push('<p><div class="color f"></div>Tourism</p>');
        content.push('<p><div class="color g"></div>Small Industry</p>');
        content.push('<p><div class="color h"></div>Restaurant</p>');
		content.push('<p><div class="color i"></div>Hotel</p>');
		content.push('<p><div class="color j"></div>Culinary</p>');
		content.push('<p><div class="color k"></div>Souvenir</p>');
		content.push('<p><div class="color l"></div>Route Angkot</p>');
        legend.innerHTML = content.join('');
        legend.index = 1;
        map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
}
		
function hideLegenda() {
	$('#legend').remove();
	$('#tombol').empty();
	$('#tombol').append('<a class="btn btn-default" role="button" id="showlegenda" data-toggle="tooltip" onclick="legenda()" title="Legend"><i class="fa fa-eye" style="color:black;"></i></a>');
}
	  
	  function cek()
        {
         document.getElementById('km').innerHTML=document.getElementById('inputradiusmes').value*100
        }
		
	   function cek1()
        {
         document.getElementById('km1').innerHTML=document.getElementById('inputradius1').value*100
        }
	  
	  function reset_rute () { //RESET KLIK RUTE
          tujuan=0;
          awal=0;
          hapus_kecuali_landmark();
          basemap();
		  $('#hasilcari').empty();
		  $('#hasilcari').append("<thead><th>Angkot Code</th><th>Route</th><th>Gallery</th></thead>");

      }
	  
	  function hapus_kecuali_landmark(){
            hapusRadius();
            hapusMarkerTerdekat();
            hapusInfo();
            clearangkot();
            clearroute();
          }
 

function reset(){
  $("#hasilcari1").hide();
     $('#resultsekitar').hide();

  hapusInfo();
  clearroute2();
  clearroute();
  /* hapusMarkerTerdekat(); */
  $("#att2").hide();
}

function owtampil(){
  $("#att1").show();
  $("#att2").hide();
  $("#radiuss").hide();
  $("#infoo1").hide();
     $('#resultsekitar').hide();
  $("#infoev").hide(); 
}

function rutetampil(){
  $("#att2").show();
  $("#att1").hide();
  $("#radiuss").hide();
  $("#infoo1").hide();
  $("#infoev").hide();
     $('#resultsekitar').hide();
  $("#infoo").show();
}

function info1(){
  $("#infoo").show();
  $("#att2").hide();
  $("#radiuss").hide()
  $("#infoo1").hide();;
     $('#resultsekitar').hide();
  
  $("#infoev").hide();   
}

function infoev(){
  $("#infoo").hide();
  $("#att2").hide();
  $("#infoev").show();
  $("#radiuss").hide()
  $("#infoo1").hide();
     $('#resultsekitar').hide();
 
  
}

function info12(){
  $("#infoo1").show();
  $("#radiuss").hide();
  $("#infoo").hide();
  $("#att2").hide();
     $('#resultsekitar').hide();
  $("#infoev").hide();   
}

function eventt(){
  $("#eventt").show();
  $("#result").hide();
  $("#att1").hide();
  $("#hide2").show();
  $("#infoo").hide();
  $("#showlist").hide();
  $("#radiuss").hide();
     $('#resultsekitar').hide();
  $("#infoo1").hide();
  $("#att2").hide();
  $("#infoev").hide();   
}

function resultt(){
  $("#result").show();
  $("#resultaround").hide();
  $("#eventt").hide();
  $("#infoo").hide();
  $("#att1").hide();
  $("#hide2").show();
  $("#showlist").hide();
  $("#radiuss").hide();
  $("#infoo1").hide();
     $('#resultsekitar').hide();
  $("#att2").hide();
  $("#infoev").hide(); 
}

function resultt1(){
  $("#result").show();
  $("#resultaround").show();
  $("#eventt").hide();
  $("#infoo").hide();
  $("#att1").hide();
  $("#hide2").show();
  $("#showlist").hide();
  $("#radiuss").hide();
  $("#infoo1").hide();
  $("#att2").hide();
     $('#resultsekitar').hide();
  $("#infoev").hide(); 
}

function list(){
  $("#result").hide();
  $("#eventt").hide();
  $("#infoo").hide();
  $("#att1").hide();
  $("#hide2").hide();
  $("#showlist").show();
  $("#radiuss").hide();
  $("#infoo1").hide();
  $("#att2").hide();
     $('#resultsekitar').hide();
  $("#infoev").hide(); 
}

function resetangkot(){
  $("#eventt").hide();
  $("#infoo").show();
  $("#att1").hide();
  $("#showlist").hide();
  $("#radiuss").hide();
  $("#infoo1").hide();
     $('#resultsekitar').hide();
  $("#infoev").hide();
}


function cekRadius(){
          rad = inputradius.value*100;
          console.log(rad);
          }
		  
function cekRadiusangkot(){
          rad = inputradiusangkot.value*100;
          console.log(rad);
          }
		  
function cekRadius1(){
          rad = inputradius1.value*100;
          console.log(rad);
          }

function clearroute2(){      
    if(typeof(directionsDisplay) != "undefined" && directionsDisplay.getMap() != undefined){
    directionsDisplay.setMap(null);
    $("#detailrute").remove();
    }     

}

function hapusMarkerTerdekat() {
          for (var i = 0; i < markersDua.length; i++) {
                markersDua[i].setMap(null);
            }
        }

function hapusMarkerTerdekat1() {
          for (var i = 0; i < markersDua1.length; i++) {
                markersDua1[i].setMap(null);
            }
        }

function hapusMarkerInfowindow(){
         setMapOnAll(null);
         hapusMarkerTerdekat();
         pos = 'null';
    }
function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
        }
    }
function hapusInfo() {
        for (var i = 0; i < infoDua.length; i++) {
              infoDua[i].setMap(null);
              }
      }

function hapusRadius(){
  for(var i=0;i<circles.length;i++)
               {
                   circles[i].setMap(null);
               }
    circles=[];
  cekRadiusStatus = 'off';
  }
  

  function hapusposisi(){
  for (var i = 0; i < markers.length; i++){
    markers[i].setMap(null);
  }
  markers = [];
}

 function clearroute(){
          for (i in rute){
            rute[i].setMap(null);
          } 
          rute=[]; 
        }window.onload=init;
