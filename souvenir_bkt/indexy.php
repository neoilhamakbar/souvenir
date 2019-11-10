<?php
require("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <title>Bukittinggi's Souvenir</title>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true"></script>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    <link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
     <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datetimepicker/datertimepicker.html" />
  <link rel="stylesheet" href="assets/css/bootstrap-slider.css" type="text/css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<script type="text/javascript">

var server = "http://localhost/souvenir/souvenir_bkt/";
var map;
var markersDua = [];
var koordinat = 'null'
var infoposisi = [];
var markerposisi = [];
var centerLokasi;
var markerposisi = [];
var centerBaru;
var cekRadiusStatus = "off"; 
var circles = [];
var rad;
var fotosrc = 'image/';
var angkot = [];
var directionsDisplay;
var infoDua=[];
var rute = [];
var color = "";

function a()
{
  $("#filterik").hide();
  $('#hasilik').show();
  $('#hasilcari1').show();
  $('#hasilcari').empty();
  $("#nearbyik").hide();
  $("#nearbyik1").hide();
  hapusInfo();

}


//Membuat Fungsi Saat Onload
function init()
{
  basemap();
  viewdigitcul();
  viewdigitkec();
}


function hapusawal()
{
  init();
  hapusMarkerTerdekat();
  hapusRadius();
  clearroute2();
  clearangkot();
  clearroute();
  hapusInfo();
  $("#nearbyik").hide();
  $("#hasilrute").hide();
  $("#tampilangkotsekitarik").hide();
  $("#selectkulll").hide();
  $("#selectfacility").hide();
  $('#hasildet').hide();
  $('#hasilcari').empty();
  $('#hasilpencarian').empty();
  $("#filterik").hide();
  $('#hasilik').show();
  $('#hasilcari1').show();
  $('#hasilcari').empty();
  $("#hasilculi").hide();
  $("#hasilsouv").hide();
  $("#hasilindustry").hide();
  $("#hasilobj").hide();
  $("#hasilhotel").hide();
  $("#hasilmosque").hide();
  $("#hasilrestaurant").hide();
}

function hapusawal1()
{
  hapusMarkerTerdekat();
  clearroute2();
  clearangkot();
  clearroute();
  hapusInfo();
  $("#nearbyik").hide();
  $("#hasilrute").hide();
  $("#tampilangkotsekitarik").hide();
  $("#selectkulll").hide();
  $("#selectfacility").hide();
  $('#hasildet').hide();
  $('#hasilcari').empty();
  $('#hasilpencarian').empty();
  $("#filterik").hide();
  $('#hasilik').show();
  $('#hasilcari1').show();
  $('#hasilcari').empty();
  $("#hasilculi").hide();
  $("#hasilsouv").hide();
  $("#hasilindustry").hide();
  $("#hasilobj").hide();
  $("#hasilhotel").hide();
  $("#hasilmosque").hide();
  $("#hasilrestaurant").hide();
}

//Membuat Fungsi Lokasi Manual
function lokasimanual()
{
  $("#filterik").hide();
  alert('Click On The Map');
  //hapusMarkerTerdekat();
  hapusRadius();
  cekRadius();    
  map.addListener('click', function(event) {

    icon: "assets/img/now.png",
    addMarker(event.latLng);

    });
  }


function viewdigitcul()
{
  cull = new google.maps.Data();
  cull.loadGeoJson(server+'souvenir.php');
  cull.setStyle(function(feature)
  {
    return({
            fillColor: '#f75d5d',
            strokeColor: '#f75d5d ',
            strokeWeight: 2,
            fillOpacity: 0.5
          });          
  }
  );
  cull.setMap(map);
}


//Membuat Fungsi Menampilkan Digitasi Kecamatan (Batas Kecamatan Bukittinggi)
function viewdigitkec()
{
  ab = new google.maps.Data();
  ab.loadGeoJson(server+'subdistrict_boundary.php');
  ab.setStyle(function(feature)
  {
     var gid = feature.getProperty('id');
     console.log("gid="+gid);
     color = '#ff3300';
     console.log(color); 
      if (gid == 'K001'){ color = '#ff3300'; 
        console.log(color); 
        return({
          fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpacity:0.2,
          clickable: false
        }); 
    }
      else if(gid == 'K002'){ color = '#ffd777'; 
        return({
        fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpacity:0.2,
          clickable: false
        });
    }
      else if(gid == 'K003'){ color = '#ec87ec'; 
        return({
        fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpacity:0.2,
          clickable: false
        });

    }
              
  }
  );
  ab.setMap(map);
}

function legenda()
{
  $('#tombol').empty();
  $('#tombol').append('<a type="button" id="hidelegenda" onclick="hideLegenda()" class="btn btn-default " data-toggle="tooltip" title="Sembunyikan Legenda" style="margin-right: 7px;"><i class="fa fa-eye-slash"></i></a> ');
  
  var layer = new google.maps.FusionTablesLayer(
    {
          query: {
            select: 'Location',
            from: 'AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE'
          },
          map: map
        });
    var legend = document.createElement('div');
        legend.id = 'legend';
        var content = [];
        content.push('<h4>Legenda</h4>');
        content.push('<p><div class="color l"></div>Culinary</p>');
        content.push('<p><div class="color f"></div>Small Industry</p>');
        content.push('<p><div class="color g"></div>Souvenir</p>');
        content.push('<p><div class="color h"></div>Hotel</p>');
        content.push('<p><div class="color i"></div>Restaurant</p>');
        content.push('<p><div class="color j"></div>WorshipPlace</p>');
        content.push('<p><div class="color k"></div>Tourism</p>');
        content.push('<p><div class="color e"></div>Angkot</p>');
        content.push('<p><div class="color d"></div>District of Mandiangin Koto Selayan</p>');
        content.push('<p><div class="color c"></div>District of Guguk Panjang</p>');
        content.push('<p><div class="color b"></div>District of Aur Birugo Tigo Baleh</p>');
        
        legend.innerHTML = content.join('');
        legend.index = 1;
        map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);

        
}

function hideLegenda() {
  $('#legend').remove();
  $('#tombol').empty();
  console.log("hy jackkky");
  $('#tombol').append('<a type="button" id="showlegenda" onclick="legenda()" class="btn btn-primary btn-sm " data-toggle="tooltip" title="Legenda" style="margin-right: 7px;"><i class="fa fa-eye" style="color:white;"> </i></a>');
}


//Membuat Fungsi Memberikan Marker IK
function addMarker(location)
{
  for (var i = 0; i < markerposisi.length; i++) 
  {
    markerposisi[i].setMap(null);
    hapusMarkerTerdekat();
    hapusRadius();
    cekRadius();
  } 
  marker = new google.maps.Marker
  ({
    icon: "assets/img/now.png",
    position : location,
    map: map,
    animation: google.maps.Animation.DROP,
  });
  koordinat = 
  {
    lat: location.lat(),
    lng: location.lng(),
  }
  centerLokasi = new google.maps.LatLng(koordinat.lat, koordinat.lng);
  markerposisi.push(marker);
  infowindow = new google.maps.InfoWindow();
  infowindow.setContent("<center><a style='color:black;'>You're Here <br> lat : "+koordinat.lat+" <br> long : "+koordinat.lng+"</a></center>");
  infowindow.open(map, marker);
  usegeolocation=true;
  markerposisi.push(marker)
  infoposisi.push(infowindow);  
}


//Membuat Fungsi Menampilkan Posisi Saat Ini
function posisisekarang()
{
  $("#filterik").hide();
  hapusMarkerTerdekat();  
  google.maps.event.clearListeners(map, 'click');
  navigator.geolocation.getCurrentPosition(function(position)
  {
    koordinat = 
    {
      lat: position.coords.latitude,
      lng: position.coords.longitude
    };
    console.log(koordinat)

    marker = new google.maps.Marker
    ({
      icon:"assets/img/now.png",
      position: koordinat,
      map: map,
      animation: google.maps.Animation.DROP,
    });

    infowindow = new google.maps.InfoWindow
    ({
      position: koordinat,
      content: "<center><a style='color:black;'>You're Here <br> lat : "+koordinat.lat+" <br> long : "+koordinat.lng+"</a></center>"
    });
    infowindow.open(map, marker);
    markersDua.push(marker);
    infoposisi.push(infowindow);
     map.setCenter(koordinat);
     map.setZoom(20); 
  });
}


//Membuat Fungsi Menampilkan Peta Google Map
function basemap()
{
  map = new google.maps.Map(document.getElementById('map'), 
  {
    zoom: 13,
    center: new google.maps.LatLng(-0.297030581246098, 100.388439689506),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
}



//Membuat Fungsi Hapus Market Terdekat
function hapusMarkerTerdekat() 
{
  for (var i = 0; i < markersDua.length; i++) 
  {
    markersDua[i].setMap(null);
  }
}

function detailinforestaurant(id19)
{  
  $('#info').empty();
  hapusInfo();
  clearangkot();
  clearroute();
  hapusMarkerTerdekat();
       $.ajax({ 
      url: server+'detailinforestaurant.php?info='+id19, data: "", dataType: 'json', success: function(rows)
        { 
         for (var i in rows) 
          { 
            console.log('dd');
            var row = rows[i];
            var id = row.id;
            
            var namaa = row.name;
            var address=row.address;
            
           
            var owner=row.owner;
            var cp = row.cp;
            var latitude  = row.latitude; ;
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/img/culf.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(16); 
            if (address==null)
                    {
                      address="tidak ada";
                    } 
             $('#info').append("");
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,

            content: "<center><span style=color:black><b>Information</b><table><tr><td><i class='fa fa-home'></i>Nama</td><td>:</td><td> "+namaa+"</td></tr><br><tr><td><i class='fa fa-map-marker'></i>Alamat</td><td>:</td><td> "+address+"</td></tr><br><tr><td><i class='fa fa-phone'></i>Telepon</td><td>:</td><td> "+cp+"</td></tr></table></span>",   
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoposisi.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
        }
      }); 
}

//Menampilkan Detail Info IK
function detailinfoik(id1)
{  
  $('#info').empty();
  hapusInfo();
  clearangkot();
  clearroute();
  hapusMarkerTerdekat();
       $.ajax({ 
      url: server+'detailinfoik.php?info='+id1, data: "", dataType: 'json', success: function(rows)
        { 
         for (var i in rows) 
          { 
            console.log('dd');
            var row = rows[i];
            var id = row.id;
            
            var namaa = row.name;
            var address=row.address;
            
           
            var owner=row.owner;
            var cp = row.cp;
            var latitude  = row.latitude; ;
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/img/ik.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(16); 
            if (address==null)
                    {
                      address="tidak ada";
                    } 
          //           if (foto=='null' || foto=='' || foto==null){
          //   foto='eror.png';
          // } 
             $('#info').append("");
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,

            content: "<center><span style=color:black><b>Information</b><table><tr><td><i class='fa fa-home'></i>Nama</td><td>:</td><td> "+namaa+"</td></tr><br><tr><td><i class='fa fa-map-marker'></i>Alamat</td><td>:</td><td> "+address+"</td></tr><br><tr><td><i class='fa fa-phone'></i>Telepon</td><td>:</td><td> "+cp+"</td></tr></table></span>",   
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoposisi.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
           
            // ;ow();tampilsekitar()
        }
      }); 
}

function nearby()
{  
  $("#hasilik").hide();
  $("#nearbyik").show();
  $("#nearbyik1").show();
}



//Menghapus Info
function hapusInfo() 
{
  for (var i = 0; i < infoposisi.length; i++) 
    {
      infoposisi[i].setMap(null);
    }
}


function detailinfomosque(id9)
{  
  $('#info').empty();
   hapusInfo();
      // clearroute2();
      hapusMarkerTerdekat();
      clearangkot();
      clearroute();
       $.ajax({ 
      url: server+'detailinfomosque.php?info='+id9, data: "", dataType: 'json', success: function(rows)
        { 
         for (var i in rows) 
          { 
            console.log('dd');
            var row = rows[i];
            var id = row.id;
            //var foto = row.foto;
            var name = row.name;
            var address=row.address;
            var capacity = row.capacity;
            var latitude  = row.latitude; ;
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/img/msj.png',
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
            content: "<center><span style=color:black><b>Information</b><table><tr><td><i class='fa fa-home'></i>Nama Masjid</td><td>:</td><td> "+name+"</td></tr><br><tr><td><i class='fa fa-map-marker'></i>Alamat</td><td>:</td><td> "+address+"</td></tr><br><tr><td><i class='fa fa-building'></i>Kapasitas</td><td>:</td><td> "+capacity+"</td></tr></table></span>",   
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoposisi.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }   
        }
      }); 
}


//Menampilkan Detail Info Obj Wisata
function detailinfoobj(id3)
{   
  $('#info').empty();
   hapusInfo();
     clearangkot();
      clearroute();
      hapusMarkerTerdekat();
       $.ajax({ 
      url: server+'detailinfoobj.php?info='+id3, data: "", dataType: 'json', success: function(rows)
        { 
         for (var i in rows) 
          { 
            console.log('dddd');
            var row = rows[i];
            var id = row.id;
            //var foto = row.foto;
            var name = row.name;
            var address=row.address;
            var open = row.open;
            var close = row.close;
            var ticket = row.ticket;
            //var fasilitas = row.fasilitas;
            var latitude  = row.latitude; ;
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/img/tours.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(16); 
         
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<center><span style=color:black><b>Information</b><table><tr><td><i class='fa fa-home'></i>Nama Objek</td><td>:</td><td> "+name+"</td></tr><br><tr><td><i class='fa fa-map-marker'></i>Alamat</td><td>:</td><td> "+address+"</td></tr><br><tr><td><i class='fa fa-building'></i>Jam Buka</td><td>:</td><td> "+open+"</td></tr><br><tr><td><i class='fa fa-map-marker'></i>Jam Tutup</td><td>:</td><td> "+close+"</td></tr><br><tr><td><i class='fa fa-map-marker'></i>Biaya</td><td>:</td><td> "+ticket+"</td></tr></table></span>",   
            pixelOffset: new google.maps.Size(0, -33)
            });
            infoposisi.push(infowindow); 
            hapusInfo();
            infowindow.open(map);
            
          }      
        }
      }); 
}


//Menampilkan Detail Info Souvenir
function detailinfosou(id14)
{  
  $('#info').empty();
   hapusInfo();
      clearangkot();
      clearroute();
      hapusMarkerTerdekat();
       $.ajax({ 
      url: server+'detailinfosouv.php?info='+id14, data: "", dataType: 'json', success: function(rows)
        { 
         for (var i in rows) 
          { 
            console.log('ddd');
            var row = rows[i];
            var id = row.id;
            var namaa = row.name;
            var address=row.address;
            var cp = row.cp;
            var owner = row.owner;
           

            var latitude  = row.latitude; ;
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/img/souv.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
            if (address==null)
                    {
                      address="tidak ada";
                    } 
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<center><span style=color:black><b>Information</b><table><tr><td><i class='fa fa-home'></i>Nama</td><td>:</td><td> "+namaa+"</td></tr><br><tr><td><i class='fa fa-map-marker'></i>Alamat</td><td>:</td><td> "+address+"</td></tr><br><tr><td><i class='fa fa-phone'></i>Telepon</td><td>:</td><td> "+cp+"</td></tr></table></span>",   
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoposisi.push(infowindow); 
          hapusInfo();
          infowindow.open(map);   
          }  
        }
      }); 
}



function detailangkot(id_angkot,lat,lng,lat1,lng1)
{
          clearangkot();
          hapusRadius();
          //hapusMarkerTerdekat();
          clearangkot();
          clearroute();
          
            $.ajax({ 
            url: server+'/tampilkanrute.php?id='+id_angkot, data: "", dataType: 'json', success: function(rows) 
            { 
              for (var i in rows.features) 
                { 
                  var id=rows.features[i].properties.id;
                  //var warna=rows.features[i].properties.warna;
                  var latitude  = rows.features[i].properties.latitude; 
                  var longitude = rows.features[i].properties.longitude ;
                  var destination=rows.features[i].properties.destination;
                  var track=rows.features[i].properties.track;
                  var route_color=rows.features[i].properties.route_color;
                  console.log(id);

                  tampilrute(id,  latitude, longitude,route_color);
                  var centerBaru = new google.maps.LatLng(latitude,longitude);
                  map.setCenter(centerBaru);
                  var infowindow = new google.maps.InfoWindow({
                    position: centerBaru,
                    content: "<bold>INFORMASI</bold><br>Kode Trayek: "+id+"<br>Jurusan: "+destination+"<br>Jalur Angkot: "+track+"",
                  });
                    infowindow.open(map);                    
                  route_sekitar(lat,lng,lat1,lng1);

                }  
                                     
            } 
         });           
}

function listgeom(id_angkot){
        hapusInfo();
        $.ajax({ 
            url: server+'tampilkanrute.php?id='+id_angkot, data: "", dataType: 'json', success: function(rows) 
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
              //console.log(mid);
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


function tampilrute(id_angkot,  latitude, longitude, route_color){
        //clearangkot();
        ja = new google.maps.Data();
        ja.loadGeoJson(server+'tampilkanrute.php?id='+id_angkot);
        ja.setStyle(function(feature){
          return({
              fillColor: 'yellow',
              strokeColor: route_color,
              strokeWeight: 2,
              fillOpacity: 0.5
              });          
        });
        ja.setMap(map);  
        angkot.push(ja);
        map.setZoom(18);
        }


//Membuat Fungsi Menampilkan Seluruh Kuliner 
function viewsou()
{
  hapusawal();
  $.ajax
  ({ 
    url: server+'viewsou.php', data: "", dataType: 'json', success: function(rows) 
    { 
      if(rows==null)
      {
        alert('Data Did Not Exist!');
      }
      else
      {
        $('#hasilcari').append("<thead><th>Name</th><th colspan='3'>Action</th></thead>");
        console.log(rows);
        for (var i in rows) 
        { 
          var row = rows[i];
          var id = row.id;
          var name = row.name;
          var address=row.address;
          var lat=row.lat;
          var lon = row.lng;
          console.log(name);
          centerBaru = new google.maps.LatLng(lat, lon);
          map.setCenter(centerBaru);
          map.setZoom(13); 
          clickMarker(centerBaru, id); 
          // var marker = new google.maps.Marker
          // ({
          //   position: centerBaru,              
          //   icon:'assets/img/souv.png',
          //   animation: google.maps.Animation.DROP,
          //   map: map
          // });
          // markersDua.push(marker);
          map.setCenter(centerBaru);
           $('#hasilcari').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-success' onclick='detsou(\""+id+"\");detsousou(\""+id+"\");'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='souangkot(\""+id+"\")'></a></td></tr>");
        }
      } 
      $('#hasilpencarian').append("<h5 class='box-title' id='hasilpencarian'>Result :</h5>"+rows.length);
    }
  });           
}


//Menampilkan Detail Info Kuliner
function detsousou(id144){  
  
 $('#info').empty();
   $('#tampilangkotsekitarik').hide();
   $("#hasilrute").hide();
   $('#hasilcaridetculi').empty();
   $('#hasilcaridetculi1').show();
   $('#hasildet').show();
   $('#hasilcaridet').empty();
   $('#hasilcaridet1').show();
   hapusInfo();
   hapusrouteangkot();
   clearroute2();
   clearroute();
   hapusMarkerTerdekat();
       $.ajax({ 
      url: server+'detailinfosou.php?info='+id144, data: "", dataType: 'json', success: function(rows)
        { 
         for (var i in rows) 
          { 
            console.log('ddd');
            var row = rows[i];
            var id = row.id;
            var namaa = row.name;
            var nama = row.nama;
            var status = row.status;
            var address=row.address;
            var cp=row.cp;
            var latitude  = row.latitude; ;
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            //markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
                $('#hasilcaridet').append("<tr><td><b> Place's Status </b></td><td>:</td><td> "+status+"</td></tr>");
                $('#hasilcaridet').append("<tr><td><b> Souvenir's Type </b></td><td>:</td><td> "+nama+"</td></tr>");
            if (address==null)
                    {
                      address="tidak ada";
                    } 
          }  
        }
      }); 
}


//Menampilkan Detail Info Kuliner
function detsousou1(id144z){  
  
$('#info').empty();
   $('#tampilangkotsekitarik').hide();
   $("#hasilrute").hide();
   $('#hasilcaridetculi').empty();
   $('#hasilcaridetculi1').show();
   $('#hasildet').show();
   $('#hasilcaridet').empty();
   $('#hasilcaridet1').show();
   hapusInfo();
   hapusrouteangkot();
   clearroute2();
   clearroute();
       $.ajax({ 
      url: server+'detailinfosou.php?info='+id144z, data: "", dataType: 'json', success: function(rows)
        { 
         for (var i in rows) 
          { 
            console.log('ddd');
            var row = rows[i];
            var id = row.id;
            var namaa = row.name;
            var nama = row.nama;
            var status = row.status;
            var address=row.address;
            var cp=row.cp;
            var latitude  = row.latitude; ;
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            //markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
                $('#hasilcaridet').append("<tr><td><b> Place's Status </b></td><td>:</td><td> "+status+"</td></tr>");
                $('#hasilcaridet').append("<tr><td><b> Souvenir's Type </b></td><td>:</td><td> "+nama+"</td></tr>");
            if (address==null)
                    {
                      address="tidak ada";
                    } 
          }  
        }
      }); 
}


//Menampilkan Detail Info Kuliner
function detsou(id14433){  
  
  $('#info').empty();
  $('#tampilangkotsekitarik').hide();
  $("#hasilrute").hide();
  $('#hasilcaridetculi').empty();
  $('#hasilcaridetculi1').show();
  $('#hasildet').show();
  $('#hasilcaridet').empty();
  $('#hasilcaridet1').show();
   hapusInfo();
   clearroute2();
   clearroute();
   hapusrouteangkot();
   hapusMarkerTerdekat();
      console.log('aaa');
      
       $.ajax({ 
      url: server+'detsou.php?info='+id14433, data: "", dataType: 'json', success: function(rows)
        { 

          $('#hasilcaridet').append("<tr><td colspan='2'><strong>Product</strong></td><td><strong>Price</strong></td></tr>");
           console.log('bb');
         for (var i in rows) 
          { 
            console.log('ddd');
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            
            var address=row.address;
            var cp=row.cp;
            var owner=row.owner;
           
            var price = row.price;
            var product_souvenir = row.product_souvenir; 
            var latitude  = row.latitude; ;
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/img/souv.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              console.log(id);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 

                $('#hasilcaridet').append("<tr><td colspan='2'> "+product_souvenir+"</td><td> "+price+"</td></tr>");
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<center><span style=color:black><b>Information</b><table><tr><td><i class='fa fa-home'></i>Nama</td><td>:</td><td> "+name+"</td></tr><br><tr><td><i class='fa fa-map-marker'></i>Alamat</td><td>:</td><td> "+address+"</td></tr><br><tr><td><i class='fa fa-phone'></i>Telepon</td><td>:</td><td> "+cp+"</td></tr><br><tr><td><i class='fa fa-clock-o'></i>Owner</td><td>:</td><td> "+owner+"</td></tr></table></span><br><input type='button' class='btn btn-success' value='Object Arround' onclick='tampil_sekitar(\""+latitude+"\",\""+longitude+"\",\""+name+"\")'<br>&nbsp&nbsp<input type='button' class='btn btn-success' value='Gallery' onclick='gallery(\""+id+"\")'<br>&nbsp&nbsp <input type='button' class='btn btn-success' value='Route' onclick='callRoute(centerLokasi,centerBaru);rutetampil()' />",   
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoposisi.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
        }
      }); 
}


//Menampilkan Detail Info Kuliner
function detsou1(id14433f){  
  
 $('#info').empty();
   $('#tampilangkotsekitarik').hide();
   $("#hasilrute").hide();
   $('#hasilcaridetculi').empty();
   $('#hasilcaridetculi1').show();
   $('#hasildet').show();
   $('#hasilcaridet').empty();
   $('#hasilcaridet1').show();
   hapusInfo();
   hapusrouteangkot();
   clearroute2();
   clearroute();
      console.log('aaa');
      
       $.ajax({ 
      url: server+'detsou.php?info='+id14433f, data: "", dataType: 'json', success: function(rows)
        { 

          $('#hasilcaridet').append("<tr><td colspan='2'><strong>Product</strong></td><td><strong>Price</strong></td></tr>");
           console.log('bb');
         for (var i in rows) 
          { 
            console.log('ddd');
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            
            var address=row.address;
            var cp=row.cp;
            var owner=row.owner;
           
            var price = row.price;
            var product_souvenir = row.product_souvenir; 
            var latitude  = row.latitude; ;
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/img/souv.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              console.log(id);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 

                $('#hasilcaridet').append("<tr><td colspan='2'> "+product_souvenir+"</td><td> "+price+"</td></tr>");
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<center><span style=color:black><b>Information</b><table><tr><td><i class='fa fa-home'></i>Nama</td><td>:</td><td> "+name+"</td></tr><br><tr><td><i class='fa fa-map-marker'></i>Alamat</td><td>:</td><td> "+address+"</td></tr><br><tr><td><i class='fa fa-phone'></i>Telepon</td><td>:</td><td> "+cp+"</td></tr><br><tr><td><i class='fa fa-clock-o'></i>Owner</td><td>:</td><td> "+owner+"</td></tr></table></span><br><input type='button' class='btn btn-success' value='Object Arround' onclick='tampil_sekitar(\""+latitude+"\",\""+longitude+"\",\""+name+"\")'<br>&nbsp&nbsp<input type='button' class='btn btn-success' value='Gallery' onclick='gallery(\""+id+"\")'<br>&nbsp&nbsp <input type='button' class='btn btn-success' value='Route' onclick='callRoute(centerLokasi,centerBaru);rutetampil()' />",   
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoposisi.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
        }
      }); 
}

function hapusrouteangkot() 
{
  for (var i = 0; i < angkot.length; i++) 
  {
    angkot[i].setMap(null);
  }
}

function gallery(azz){    
      console.log(azz);
    window.open(server+'gallery.php?idgallery='+azz);    
   }


function clickMarker(centerBaru, id)
{
  
  var marker = new google.maps.Marker
    ({
      icon: "assets/img/souv.png",
      position: centerBaru,
      map: map
    });
    markersDua.push(marker);
    
    google.maps.event.addListener(marker, "click", function(){
        detsou1(id);
        detsousou1(id);
       
      });

}


//Membuat Fungsi Mencari Kuliner
function find_sou() 
{
  hapusawal();
  if(kul_nama.value=='')
  {
    alert("Isi kolom pencarian terlebih dahulu !");
  }
  else
  {
    //$('#hasilcari').empty();
    $('#hasilcari').append("<thead><th>Name</th><th colspan='3'>Action</th></thead>");
    var kulnama = document.getElementById('kul_nama').value;
    
    $.ajax
    ({ 
      url: server+'find_sou.php?cari_nama='+kulnama, data: "", dataType: 'json', success: function(rows)
      { 
        if(rows==null)
        {
          alert('Data Did Not Exist !');
        }
        for (var i in rows)
        {   
          var row     = rows[i];
          var id  = row.id;
          var name   = row.name;
          var lat  = row.latitude ;
          var lon = row.longitude ;
          centerBaru = new google.maps.LatLng(lat, lon);
          marker = new google.maps.Marker
          ({
            position: centerBaru,
            map: map,
            icon: "assets/img/souv.png",
          });
          // console.log(lat);
          // console.log(lon);
          markersDua.push(marker);
          map.setCenter(centerBaru);
          map.setZoom(15);
          clickMarker(centerBaru, id);
          console.log(name);
          $('#hasilcari').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-success' onclick='detsou(\""+id+"\");detsousou(\""+id+"\");'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='souangkot(\""+id+"\")'></a></td></tr>");
        }   
        $('#hasilpencarian').append("<h5 class='box-title' id='hasilpencarian'>Result :</h5>"+rows.length);
      }

    }); 
  }
}



//Membuat Fungsi Cari Kuliner Berdasarkan Kecamatan
function viewkecamatansou()
{
  hapusawal();
  if (document.getElementById('carikecamatankul').value=="")
    {
      alert("Pilih Option Dahulu !");
    }
    else
    {
    $('#hasilcari').append("<thead><th>Name</th><th colspan='3'>Action</th></thead>");
    var kulkec = document.getElementById('carikecamatankul').value;
    console.log(kulkec);
    
    $.ajax
    ({ 
      url: server+'district.php?district='+kulkec, data: "", dataType: 'json', success: function(rows)
      { 
        if(rows==null)
        {
          alert('Data Did Not Exist !');
        }
        for (var i in rows)
        {   
          var row     = rows[i];
          var id_tempat_kuliner  = row.id;
          var nama_tempat_kuliner   = row.name;
          var id_kecamatan   = row.id;
          var lat  = row.latitude ;
          var lon = row.longitude ;
          centerBaru = new google.maps.LatLng(lat, lon);
          marker = new google.maps.Marker
          ({
            position: centerBaru,
            map: map,
            icon: "assets/img/souv.png",
          });
          markersDua.push(marker);
          map.setCenter(centerBaru);
          map.setZoom(14);
          clickMarker(centerBaru, id_tempat_kuliner);
          console.log(id_kecamatan);
          $('#hasilcari').append("<tr><td>"+nama_tempat_kuliner+"</td><td><a role='button' class='btn btn-success' onclick='detsou(\""+id_tempat_kuliner+"\");detsousou(\""+id+"\");'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='souangkot(\""+id_tempat_kuliner+"\")'></a></td></tr>");
        }   
        $('#hasilpencarian').append("<h5 class='box-title' id='hasilpencarian'>Result :</h5>"+rows.length);
      }
    }); 
  }
}


function viewtipe()
{
  hapusawal();
  if (document.getElementById('caritipe').value=="")
    {
      alert("Pilih Option Dahulu !");
    }
    else
    {
    $('#hasilcari').append("<thead><th>Name</th><th colspan='3'>Action</th></thead>");
    var stat = document.getElementById('caritipe').value;
    console.log(stat);
    $('#hasilcari').empty();
    $('#hasilpencarian').empty();
    $.ajax
    ({ 
      url: server+'sou_tipe.php?tipe_sou='+stat, data: "", dataType: 'json', success: function(rows)
      { 
        if(rows==null)
        {
          alert('Data Did Not Exist !');
        }
        for (var i in rows)
        {   
          var row     = rows[i];
          var id  = row.id;
          var nama   = row.nama;
          var address   = row.address;
          var owner   = row.owner;
          var id_souvenir_type   = row.id_souvenir_type;
          var lat  = row.latitude ;
          var lon = row.longitude ;
          centerBaru = new google.maps.LatLng(lat, lon);
          marker = new google.maps.Marker
          ({
            position: centerBaru,
            map: map,
            icon: "assets/img/souv.png",
          });
          markersDua.push(marker);
          map.setCenter(centerBaru);
          map.setZoom(14);
          clickMarker(centerBaru, id);
          console.log(id_souvenir_type);
          $('#hasilcari').append("<tr><td>"+nama+"</td><td><a role='button' class='btn btn-success' onclick='detsou(\""+id+"\");detsousou(\""+id+"\");'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='souangkot(\""+id+"\")'></a></td></tr>");
        }   
        $('#hasilpencarian').append("<h5 class='box-title' id='hasilpencarian'>Result :</h5>"+rows.length);
      }
    }); 
  }
}


function viewtipe2()
{
  hapusawal();
  if (document.getElementById('caritipe2').value=="")
    {
      alert("Pilih Option Dahulu !");
    }
    else
    {
    $('#hasilcari').append("<thead><th>Name</th><th colspan='3'>Action</th></thead>");
    var stat = document.getElementById('caritipe2').value;
    console.log(stat);
    $('#hasilcari').empty();
    $('#hasilpencarian').empty();
    $.ajax
    ({ 
      url: server+'ik_tipe.php?tipe_ik='+stat, data: "", dataType: 'json', success: function(rows)
      { 
        if(rows==null)
        {
          alert('Data Did Not Exist !');
        }
        for (var i in rows)
        {   
          var row     = rows[i];
          var id  = row.id;
          var nama   = row.nama;
          var address   = row.address;
          var owner   = row.owner;
          var id_industry_type   = row.id_industry_type;
          var lat  = row.latitude ;
          var lon = row.longitude ;
          centerBaru = new google.maps.LatLng(lat, lon);
          marker = new google.maps.Marker
          ({
            position: centerBaru,
            map: map,
            icon: "assets/img/ik.png",
          });
          markersDua.push(marker);
          map.setCenter(centerBaru);
          map.setZoom(14);
          clickMarker(centerBaru, id);
          console.log(id_industry_type);
          $('#hasilcari').append("<tr><td>"+nama+"</td><td><a role='button' class='btn btn-success' onclick='detik(\""+id+"\");detikik(\""+id+"\");'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='ikangkot(\""+id+"\")'></a></td></tr>");
        }   
        $('#hasilpencarian').append("<h5 class='box-title' id='hasilpencarian'>Result :</h5>"+rows.length);
      }
    }); 
  }
}


function viewstatus()
{
  hapusawal();
  if (document.getElementById('caristatus').value=="")
    {
      alert("Pilih Option Dahulu !");
    }
    else
    {
    $('#hasilcari').append("<thead><th>Name</th><th colspan='3'>Action</th></thead>");
    var stat = document.getElementById('caristatus').value;
    console.log(stat);
    $('#hasilcari').empty();
    $('#hasilpencarian').empty();
    $.ajax
    ({ 
      url: server+'sou_status.php?status_sou='+stat, data: "", dataType: 'json', success: function(rows)
      { 
        if(rows==null)
        {
          alert('Data Did Not Exist !');
        }
        for (var i in rows)
        {   
          var row     = rows[i];
          var id  = row.id;
          var name   = row.name;
          var address   = row.address;
          var owner   = row.owner;
          var id_status   = row.id_status;
          var lat  = row.latitude ;
          var lon = row.longitude ;
          centerBaru = new google.maps.LatLng(lat, lon);
          marker = new google.maps.Marker
          ({
            position: centerBaru,
            map: map,
            icon: "assets/img/souv.png",
          });
          markersDua.push(marker);
          map.setCenter(centerBaru);
          map.setZoom(14);
          clickMarker(centerBaru, id);
          console.log(id_status);
          $('#hasilcari').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-success' onclick='detsou(\""+id+"\");detsousou(\""+id+"\");'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='souangkot(\""+id+"\")'></a></td></tr>");
        }   
        $('#hasilpencarian').append("<h5 class='box-title' id='hasilpencarian'>Result :</h5>"+rows.length);
      }
    }); 
  }
}



function detailinfohotel(id90){  
  
  $('#info').empty();
   hapusInfo();
      // clearroute2();
      hapusMarkerTerdekat();
       $.ajax({ 
      url: server+'detailinfohotel.php?info='+id90, data: "", dataType: 'json', success: function(rows)
        { 
         for (var i in rows) 
          { 
            console.log('dd');
            var row = rows[i];
            var id = row.id
            //var foto = row.foto;
            var name = row.name;
            var address=row.address;
            var cp = row.cp;
            
            var latitude  = row.latitude; ;
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/img/hotels.png',
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
            content: "<center><span style=color:black><b>Information</b><br><table><tr><td><i class='fa fa-home'></i>Nama Hotel</td><td>:</td><td> "+name+"</td></tr><br><tr><td><i class='fa fa-map-marker'></i>Alamat</td><td>:</td><td> "+address+"</td></tr><br><tr><td><i class='fa fa-phone'></i>Fasilitas</td><td>:</td><td> "+cp+"</td></tr></table></span>",   
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoposisi.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
            
          }  
        }
      }); 
}


//Menampilkan Angkot Sekitar Kuliner
function kulAngkot(id_angkot1122){
          hapusMarkerTerdekat();
          hapusInfo();
          clearroute();
          clearroute2();
          $('#tampilangkotsekitarik').show();
          $('#tampillistangkotik1').show();
          $('#tampillistangkotik').empty();
          $('#hasildet').hide();
          $('#hasilrute').hide();
          $('#tampillistangkotik').append("<thead><th>No Angkot</th><th colspan='2'>Action</th></thead>");
          $.ajax({ 
          url: server+'/_angkot_culinary.php?id='+id_angkot1122, data: "", dataType: 'json', success: function(rows) 
          { 
            if(rows==null)
            {
              alert('Data Did Not Exist!');
            }
            else
            {
            for (var i in rows) 
              { 
                var row = rows[i];
                var id_angkot = row.id;
                var route_color = row.route_color;
                var name = row.name; 
                var lat=row.latitude;
                var lon = row.longitude;
                console.log(id_angkot);
                listgeom(id_angkot);
                tampilrute(id_angkot,  lat, lon, route_color);
                centerBaru = new google.maps.LatLng(lat, lon);
                map.setCenter(centerBaru);
                map.setZoom(18);  
                var marker = new google.maps.Marker({
                  position: centerBaru,              
                  icon:'assets/img/cul.png',
                  animation: google.maps.Animation.DROP,
                  map: map
                  });
                //markersDua.push(marker);
                map.setCenter(centerBaru);
                infowindow = new google.maps.InfoWindow({
                  position: centerBaru,
                  content: "<bold>"+name+"",
                  pixelOffset: new google.maps.Size(0, -1)
                    });
                infoposisi.push(infowindow); 
                infowindow.open(map,marker);
                console.log(id_angkot);
                $('#tampillistangkotik').append("<tr><td>"+id_angkot+"</td><td><a role='button' class='btn btn-success' onclick='detailangkot(\""+id_angkot+"\")'>Lihat</a></td></tr>");
              }
            }
           }
         });  
        }

function ikangkot(id_angkot1122442,lat1,lng1){
          hapusMarkerTerdekat();
          hapusInfo();
          clearroute();
          clearroute2();
          $('#tampilangkotsekitarik').show();
          $('#tampillistangkotik1').show();
          $('#tampillistangkotik').empty();
          $('#tampillistangkotik').append("<thead><th>No Angkot</th><th colspan='2'>Action</th></thead>");
          console.log("hh");
          $.ajax({ 
          url: server+'/_angkot_industri.php?id='+id_angkot1122442, data: "", dataType: 'json', success: function(rows) 
          { 
            if(rows==null)
            {
              alert('Data Did Not Exist!');
            }
            else
            {
            for (var i in rows) 
              { 
                var row = rows[i];
                var id = row.id;
                var id_angkot = row.id_angkot;
                var route_color = row.route_color;
               var lat = row.lat;
               var lng = row.lng;
               var description = row.description;
                var name = row.name;
                
                var latitude=row.latitude;
                var longitude= row.longitude;
                console.log(id_angkot);
                listgeom(id_angkot);
                tampilrute(id_angkot,  latitude, longitude, route_color);
                centerBaru = new google.maps.LatLng(latitude, longitude);
                map.setCenter(centerBaru);
                map.setZoom(18);  
                var marker = new google.maps.Marker({
                  position: centerBaru,              
                  icon:'assets/img/ik.png',
                  animation: google.maps.Animation.DROP,
                  map: map
                  });
                //markersDua.push(marker);
                map.setCenter(centerBaru);
                infowindow = new google.maps.InfoWindow({
                  position: centerBaru,
                  content: "<bold>"+name+"",
                  pixelOffset: new google.maps.Size(0, -1)
                    });
                infoposisi.push(infowindow); 
                infowindow.open(map,marker);
                console.log(id_angkot);
                $('#tampillistangkotik').append("<tr><td>"+id_angkot+"</td><td><a role='button' class='btn btn-success' onclick='detailangkot(\""+id_angkot+"\",\""+lat+"\",\""+lng+"\",\""+lat1+"\",\""+lng1+"\")'>Lihat</a></td></tr>");
              }
            }
           }
         });  
        }

function restaurantangkot(id_angkot1122492,lat1,lng1){
          hapusMarkerTerdekat();
          hapusInfo();
          clearroute();
          clearroute2();
          $('#tampilangkotsekitarik').show();
          $('#tampillistangkotik1').show();
          $('#tampillistangkotik').empty();
          $('#tampillistangkotik').append("<thead><th>No Angkot</th><th colspan='2'>Action</th></thead>");
          console.log("hh");
          $.ajax({ 
          url: server+'/_angkot_restaurant.php?id='+id_angkot1122492, data: "", dataType: 'json', success: function(rows) 
          { 
            if(rows==null)
            {
              alert('Data Did Not Exist!');
            }
            else
            {
            for (var i in rows) 
              { 
                var row = rows[i];
                var id = row.id;
                var id_angkot = row.id_angkot;
                var route_color = row.route_color;
               var lat = row.lat;
               var lng = row.lng;
               var description = row.description;
                var name = row.name;
                
                var latitude=row.latitude;
                var longitude= row.longitude;
                console.log(id_angkot);
                listgeom(id_angkot);
                tampilrute(id_angkot,  latitude, longitude, route_color);
                centerBaru = new google.maps.LatLng(latitude, longitude);
                map.setCenter(centerBaru);
                map.setZoom(18);  
                var marker = new google.maps.Marker({
                  position: centerBaru,              
                  icon:'assets/img/ik.png',
                  animation: google.maps.Animation.DROP,
                  map: map
                  });
                //markersDua.push(marker);
                map.setCenter(centerBaru);
                infowindow = new google.maps.InfoWindow({
                  position: centerBaru,
                  content: "<bold>"+name+"",
                  pixelOffset: new google.maps.Size(0, -1)
                    });
                infoposisi.push(infowindow); 
                infowindow.open(map,marker);
                console.log(id_angkot);
                $('#tampillistangkotik').append("<tr><td>"+id_angkot+"</td><td><a role='button' class='btn btn-success' onclick='detailangkot(\""+id_angkot+"\",\""+lat+"\",\""+lng+"\",\""+lat1+"\",\""+lng1+"\")'>Lihat</a></td></tr>");
              }
            }
           }
         });  
        }

function souangkot(id_angkot112244,lat1,lng1){
          hapusMarkerTerdekat();
          hapusInfo();
          clearroute();
          clearroute2();
          $('#tampilangkotsekitarik').show();
          $('#tampillistangkotik1').show();
          $('#tampillistangkotik').empty();
          $('#tampillistangkotik').append("<thead><th>No Angkot</th><th colspan='2'>Action</th></thead>");
          console.log("hh");
          $.ajax({ 
          url: server+'/_angkot_souvenirs.php?id='+id_angkot112244, data: "", dataType: 'json', success: function(rows) 
          { 
            if(rows==null)
            {
              alert('Data Did Not Exist!');
            }
            else
            {
            for (var i in rows) 
              { 
                var row = rows[i];
                var id = row.id;
                var id_angkot = row.id_angkot;
                var route_color = row.route_color;
               var lat = row.lat;
               var lng = row.lng;
               var description = row.description;
                var name = row.name;
                
                var latitude=row.latitude;
                var longitude= row.longitude;
                console.log(id_angkot);
                listgeom(id_angkot);
                tampilrute(id_angkot,  latitude, longitude, route_color);
                centerBaru = new google.maps.LatLng(latitude, longitude);
                map.setCenter(centerBaru);
                map.setZoom(18);  
                var marker = new google.maps.Marker({
                  position: centerBaru,              
                  icon:'assets/img/souv.png',
                  animation: google.maps.Animation.DROP,
                  map: map
                  });
                //markersDua.push(marker);
                map.setCenter(centerBaru);
                infowindow = new google.maps.InfoWindow({
                  position: centerBaru,
                  content: "<bold>"+name+"",
                  pixelOffset: new google.maps.Size(0, -1)
                    });
                infoposisi.push(infowindow); 
                infowindow.open(map,marker);
                console.log(id_angkot);
                $('#tampillistangkotik').append("<tr><td>"+id_angkot+"</td><td><a role='button' class='btn btn-success' onclick='detailangkot(\""+id_angkot+"\",\""+lat+"\",\""+lng+"\",\""+lat1+"\",\""+lng1+"\")'>Lihat</a></td></tr>");
              }
            }
           }
         });  
        }

function hotelangkot(id_angkot11224436,lat1,lng1){
          hapusMarkerTerdekat();
          hapusInfo();
          clearroute();
          clearroute2();
          $('#tampilangkotsekitarik').show();
          $('#tampillistangkotik1').show();
          $('#tampillistangkotik').empty();
          $('#tampillistangkotik').append("<thead><th>No Angkot</th><th colspan='2'>Action</th></thead>");
          console.log("hh");
          $.ajax({ 
          url: server+'/_angkot_hotel.php?id='+id_angkot11224436, data: "", dataType: 'json', success: function(rows) 
          { 
            if(rows==null)
            {
              alert('Data Did Not Exist!');
            }
            else
            {
            for (var i in rows) 
              { 
                var row = rows[i];
                var id = row.id;
                var id_angkot = row.id_angkot;
                var route_color = row.route_color;
               var lat = row.lat;
               var lng = row.lng;
               var description = row.description;
                var name = row.name;
                
                var latitude=row.latitude;
                var longitude= row.longitude;
                console.log(id_angkot);
                listgeom(id_angkot);
                tampilrute(id_angkot,  latitude, longitude, route_color);
                centerBaru = new google.maps.LatLng(latitude, longitude);
                map.setCenter(centerBaru);
                map.setZoom(18);  
                var marker = new google.maps.Marker({
                  position: centerBaru,              
                  icon:'assets/img/hotels.png',
                  animation: google.maps.Animation.DROP,
                  map: map
                  });
                //markersDua.push(marker);
                map.setCenter(centerBaru);
                infowindow = new google.maps.InfoWindow({
                  position: centerBaru,
                  content: "<bold>"+name+"",
                  pixelOffset: new google.maps.Size(0, -1)
                    });
                infoposisi.push(infowindow); 
                infowindow.open(map,marker);
                console.log(id_angkot);
                $('#tampillistangkotik').append("<tr><td>"+id_angkot+"</td><td><a role='button' class='btn btn-success' onclick='detailangkot(\""+id_angkot+"\",\""+lat+"\",\""+lng+"\",\""+lat1+"\",\""+lng1+"\")'>Lihat</a></td></tr>");
              }
            }
           }
         });  
        }

function owangkot(id_angkot11224439,lat1,lng1){
          hapusMarkerTerdekat();
          hapusInfo();
          clearroute();
          clearroute2();
          $('#tampilangkotsekitarik').show();
          $('#tampillistangkotik1').show();
          $('#tampillistangkotik').empty();
          $('#tampillistangkotik').append("<thead><th>No Angkot</th><th colspan='2'>Action</th></thead>");
          console.log("hh");
          $.ajax({ 
          url: server+'/_angkot_ow.php?id='+id_angkot11224439, data: "", dataType: 'json', success: function(rows) 
          { 
            if(rows==null)
            {
              alert('Data Did Not Exist!');
            }
            else
            {
            for (var i in rows) 
              { 
                var row = rows[i];
                var id = row.id;
                var id_angkot = row.id_angkot;
                var route_color = row.route_color;
               var lat = row.lat;
               var lng = row.lng;
               var description = row.description;
                var name = row.name;
                
                var latitude=row.latitude;
                var longitude= row.longitude;
                console.log(id_angkot);
                listgeom(id_angkot);
                tampilrute(id_angkot,  latitude, longitude, route_color);
                centerBaru = new google.maps.LatLng(latitude, longitude);
                map.setCenter(centerBaru);
                map.setZoom(18);  
                var marker = new google.maps.Marker({
                  position: centerBaru,              
                  icon:'icon/marker_tw.png',
                  animation: google.maps.Animation.DROP,
                  map: map
                  });
                //markersDua.push(marker);
                map.setCenter(centerBaru);
                infowindow = new google.maps.InfoWindow({
                  position: centerBaru,
                  content: "<bold>"+name+"",
                  pixelOffset: new google.maps.Size(0, -1)
                    });
                infoposisi.push(infowindow); 
                infowindow.open(map,marker);
                console.log(id_angkot);
                $('#tampillistangkotik').append("<tr><td>"+id_angkot+"</td><td><a role='button' class='btn btn-success' onclick='detailangkot(\""+id_angkot+"\",\""+lat+"\",\""+lng+"\",\""+lat1+"\",\""+lng1+"\")'>Lihat</a></td></tr>");
              }
            }
           }
         });  
        }

function worshipangkot(id_angkot11224437,lat1,lng1){
          hapusMarkerTerdekat();
          hapusInfo();
          clearroute();
          clearroute2();
          $('#tampilangkotsekitarik').show();
          $('#tampillistangkotik1').show();
          $('#tampillistangkotik').empty();
          $('#tampillistangkotik').append("<thead><th>No Angkot</th><th colspan='2'>Action</th></thead>");
          console.log("hh");
          $.ajax({ 
          url: server+'/_angkot_worship.php?id='+id_angkot11224437, data: "", dataType: 'json', success: function(rows) 
          { 
            if(rows==null)
            {
              alert('Data Did Not Exist!');
            }
            else
            {
            for (var i in rows) 
              { 
                var row = rows[i];
                var id = row.id;
                var id_angkot = row.id_angkot;
                var route_color = row.route_color;
               var lat = row.lat;
               var lng = row.lng;
               var description = row.description;
                var name = row.name;
                
                var latitude=row.latitude;
                var longitude= row.longitude;
                console.log(id_angkot);
                listgeom(id_angkot);
                tampilrute(id_angkot,  latitude, longitude, route_color);
                centerBaru = new google.maps.LatLng(latitude, longitude);
                map.setCenter(centerBaru);
                map.setZoom(18);  
                var marker = new google.maps.Marker({
                  position: centerBaru,              
                  icon:'icon/marker_tw.png',
                  animation: google.maps.Animation.DROP,
                  map: map
                  });
                //markersDua.push(marker);
                map.setCenter(centerBaru);
                infowindow = new google.maps.InfoWindow({
                  position: centerBaru,
                  content: "<bold>"+name+"",
                  pixelOffset: new google.maps.Size(0, -1)
                    });
                infoposisi.push(infowindow); 
                infowindow.open(map,marker);
                console.log(id_angkot);
                $('#tampillistangkotik').append("<tr><td>"+id_angkot+"</td><td><a role='button' class='btn btn-success' onclick='detailangkot(\""+id_angkot+"\",\""+lat+"\",\""+lng+"\",\""+lat1+"\",\""+lng1+"\")'>Lihat</a></td></tr>");
              }
            }
           }
         });  
        }

function callRoute(start, end)
{
  init();
  $('#hasildet').hide();
  $('#hasilrute').hide();  
  $('#detailrute1').show();
  $('#detailrute').empty();
  $('#hasildet').empty();
  clearroute2();

  if (koordinat == 'null' || typeof(koordinat) == "undefined")
  {
    alert('Klik Tombol Posisi Saat ini Dulu');
  }
  else
  {
    $('#hasilrute').show();
    directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer;
    directionsService.route
    (
    {
      origin:start,
      destination : end,
      travelMode:google.maps.TravelMode.DRIVING
    },
    function(response, status)
    {
      if (status === google.maps.DirectionsStatus.OK)
      {
        directionsDisplay.setDirections(response);
      }
      else
      {
        window.alert('Direction request failed due to' +status);
      }
    }
    );
    directionsDisplay.setMap(map);
    map.setZoom(16);

    directionsDisplay.setPanel(document.getElementById('detailrute1'));
  }
}




function clearroute2(){      
    if(typeof(directionsDisplay) != "undefined" && directionsDisplay.getMap() != undefined){
    directionsDisplay.setMap(null);
    $("#rute").remove();
    }     

}

//Menampilkan Form FilterIK
function selectsou()
{

  $("#selectkulll").show();
  $("#hasilik").hide();
  $("#selectfacility").hide();

}

function selectfacility()
{

  $("#selectfacility").show();
  $("#hasilik").hide();
  $("#selectkulll").hide();
  //$("#filterik").hide();
}

function viewsouv()
{
  clearroute2();
  $("#hasilik").show();
  $('#hasilcari1').show();
  $('#hasilcari').empty();
  $('#hasilcari').empty();
  $('#hasilpencarian').empty();

hapusawal();
  var fas=selectsou.value;
  var arrayLay=[];
  for(i=0;i<$("input[name=product_small_industry]:checked").length;i++){
    arrayLay.push($("input[name=product_small_industry]:checked")[i].value);
  }
  console.log('zz');
  if (arrayLay==''){
    alert('Pilih Produk');
  }else{
    $('#hasilcari').append("<thead><th>Name</th><th colspan='3'>Action</th></thead>");
    $.ajax({ url: server+'selectsou.php?lay='+arrayLay, data: "", dataType: 'json', success: function(rows){
      console.log("hai");
      if(rows==null)
            {
              alert('Data not found');
            }
        for (var i in rows) 
            {   
              var row     = rows[i];
              var id   = row.id;
              var nama_produk   = row.name;
              var nama_tempat_kuliner   = row.name;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/img/souv.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(name);
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
              map.setZoom(16);
              clickMarker(centerBaru, id);
              $('#hasilcari').append("<tr><td>"+nama_tempat_kuliner+"</td><td><a role='button' class='btn btn-success' onclick='detsou(\""+id+"\");detsousou(\""+id+"\");'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='souangkot(\""+id+"\")'></a></td></tr>");
            }
            $('#hasilpencarian').append("<h5 class='box-title' id='hasilpencarian'>Result :</h5>"+rows.length);
    }});
  }
}


 function hapus_Semua(){
          //set posisi
          basemap()

          //hapus semua data
          hapusRadius();
          //hapus_landmark();
          //hapus_kecuali_landmark();
          a();
          }

 function hapus_kecuali_landmark(){
            hapusRadius();
            hapusMarkerObject();
            hapusInfo();
            clearangkot();
            clearroute();
          }
 
 function hapusMarkerObject() {
            for (var i = 0; i < markersDua.length; i++) {
                  markersDua[i].setMap(null);
              }
          }

   function clearangkot(){
          for (i in angkot){
              angkot[i].setMap(null);
            } 
            angkot=[]; 
          }

  function clearroute(){
          for (i in rute){
            rute[i].setMap(null);
          } 
          rute=[]; 
        }

 /********************************************************** RADIUS - OBJEK SEKITAR******************************************************/
 /***************************************************************************************************************************************/


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
          rute.push(directionsDisplay);          
      }



 function tampil_sekitar(latitude,longitude,namaa){
       hapus_Semua();

        rad_lat = latitude;
        rad_lng = longitude;

        //Hilangkan Button Sekitar
        $('#view_sekitar').empty();
        $('#hasilik').hide();
        document.getElementById("inputradius").style.display = "inline";

        // POSISI MARKER
        centerBaru = new google.maps.LatLng(latitude, longitude);
        map.setZoom(16);  
          var marker = new google.maps.Marker({map: map, position: centerBaru, 
         icon:'assets/img/souv.png',
          animation: google.maps.Animation.DROP,
          clickable: true});

        //INFO WINDOW
        marker.info = new google.maps.InfoWindow({
          content: "<bold>"+namaa+"",
          pixelOffset: new google.maps.Size(0, -1)
            });
          marker.info.open(map, marker);

        $("#nearbyik").show();
        $("#hasildet").hide();
        $("#hasilcaridet").hide();
        $("#hasilculi").hide();
        $("#hasilsouv").hide();
        $("#hasilindustry").hide();
        $("#hasilobj").hide();
        $("#hasilhotel").hide();
        $("#hasilmosque").hide();
        $("#hasilrestaurant").hide();
                        
      }


function industri_sekitar(latitude,longitude,rad){ //INDUSTRI SEKITAR
        $('#hasilcariind').empty();
        $('#hasilcariind1').show();
        $('#hasilcariind').append("<thead><th class='centered'>Nama</th><th colspan='3' class='centered'>Aksi</th></thead>");
        $.ajax({url: server+'_sekitar_industri.php?lat='+latitude+'&long='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){ 
          for (var i in rows){ 
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            var address = row.address;
            var cp = row.cp;
            var lat=row.latitude;
            var lon = row.longitude;
            console.log(name);

            //POSISI MAP
            centerBaru = new google.maps.LatLng(lat, lon);
            map.setCenter(centerBaru);
            map.setZoom(16);  
            var marker = new google.maps.Marker({
              position: centerBaru,              
              icon:'assets/img/ik.png',
              animation: google.maps.Animation.DROP,
              map: map
              });
            markersDua.push(marker);
            map.setCenter(centerBaru);
            $('#hasilcariind').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-danger fa fa-info' onclick='detailinfoik(\""+id+"\")'></a></td><td><a role='button' class='btn btn-danger fa fa-road' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='ikangkot(\""+id+"\",\""+lat+"\",\""+lon+"\")'></a></td></tr>");
          }//end for
        }});//end ajax  
      }

function restaurant_sekitar(latitude,longitude,rad){ //INDUSTRI SEKITAR
        $('#hasilcarirestaurant').empty();
        $('#hasilcarirestaurant1').show();
        $('#hasilcarirestaurant').append("<thead><th class='centered'>Nama</th><th colspan='3' class='centered'>Aksi</th></thead>");
        $.ajax({url: server+'_sekitar_restaurant.php?lat='+latitude+'&long='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){ 
          for (var i in rows){ 
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            var address = row.address;
            var cp = row.cp;
            var lat=row.latitude;
            var lon = row.longitude;
            console.log(name);

            //POSISI MAP
            centerBaru = new google.maps.LatLng(lat, lon);
            map.setCenter(centerBaru);
            map.setZoom(16);  
            var marker = new google.maps.Marker({
              position: centerBaru,              
              icon:'assets/img/culf.png',
              animation: google.maps.Animation.DROP,
              map: map
              });
            markersDua.push(marker);
            map.setCenter(centerBaru);
            $('#hasilcarirestaurant').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-danger fa fa-info' onclick='detailinforestaurant(\""+id+"\")'></a></td><td><a role='button' class='btn btn-danger fa fa-road' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='restaurantangkot(\""+id+"\",\""+lat+"\",\""+lon+"\")'></a></td></tr>");
          }//end for
        }});//end ajax  
      }


function kuliner_sekitar(latitude,longitude,rad){ //KULINER SEKITAR 

          $('#hasilcariculi').empty();
          $('#hasilcariculi1').show();
          $('#hasilcariculi').append("<thead><th class='centered'>Nama</th><th colspan='3' class='centered'>Aksi</th></thead>");
          $.ajax({url: server+'_sekitar_kuliner.php?lat='+latitude+'&long='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){ 
            for (var i in rows){ 
              var row = rows[i];
              var id = row.id;
              var name = row.name;
              var address = row.address;
              var cp = row.cp;
              
              var open = row.open;
              var close = row.close;
              var capacity = row.capacity;
              
              var employee = row.employee;
              var lat=row.latitude;
              var lon = row.longitude;

              //POSISI MAP
              centerBaru = new google.maps.LatLng(lat, lon);
              map.setCenter(centerBaru);
              map.setZoom(16);  
              var marker = new google.maps.Marker({
                position: centerBaru,              
                icon:'assets/img/cul.png',
                animation: google.maps.Animation.DROP,
                map: map
                });
              markersDua.push(marker);
              map.setCenter(centerBaru);

              $('#hasilcariculi').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-danger fa fa-info' onclick='detsou(\""+id+"\")'></a></td><td><a role='button' class='btn btn-danger fa fa-road' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a></td></tr>");
            }//end for
          }});//end ajax  
        }


function masjid_sekitar(latitude,longitude,rad){ // MASJID SEKITAR 

        $('#hasilcarimosque').empty();
        $('#hasilcarimosque1').show();
        $('#hasilcarimosque').append("<thead><th class='centered'>Nama</th><th colspan='3' class='centered'>Aksi</th></thead>");
        $.ajax({url: server+'_sekitar_masjid.php?lat='+latitude+'&long='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){ 
          for (var i in rows){ 
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            var address = row.address;
            var capacity = row.capacity;
            var lat=row.latitude;
            var lon = row.longitude;
            
            //POSISI MAP
            centerBaru = new google.maps.LatLng(lat, lon);
            map.setCenter(centerBaru);
            map.setZoom(16);  
            var marker = new google.maps.Marker({
              position: centerBaru,              
              icon:'assets/img/msj.png',
              animation: google.maps.Animation.DROP,
              map: map
              });
            markersDua.push(marker);
            map.setCenter(centerBaru);

            $('#hasilcarimosque').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-danger fa fa-info' onclick='detailinfomosque(\""+id+"\")'></a></td><td><a role='button' class='btn btn-danger fa fa-road' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='worshipangkot(\""+id+"\",\""+lat+"\",\""+lon+"\")'></a></td></tr>");
          }//end for
        }});//end ajax  
      }

function oleholeh_sekitar(latitude,longitude,rad){ // OLEH-OLEH SEKITAR 

          $('#hasilcarisouv').empty();
           $('#hasilcarisouv1').show();
          $('#hasilcarisouv').append("<thead><th class='centered'>Nama</th><th colspan='3' class='centered'>Aksi</th></thead>");
          $.ajax({url: server+'_sekitar_oleholeh.php?lat='+latitude+'&long='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){ 
            for (var i in rows){ 
              var row = rows[i];
              var id = row.id;
              var name = row.name;
              var owner = row.owner;
              var cp = row.cp;
              var address = row.address;
              
              var lat=row.latitude;
              var lon = row.longitude;
              
              //POSISI MAP
              centerBaru = new google.maps.LatLng(lat, lon);
              map.setCenter(centerBaru);
              map.setZoom(16);  
              var marker = new google.maps.Marker({
                position: centerBaru,              
                icon:'assets/img/souv.png',
                animation: google.maps.Animation.DROP,
                map: map
                });
              markersDua.push(marker);
              map.setCenter(centerBaru);

              $('#hasilcarisouv').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-danger fa fa-info' onclick='detailinfosou(\""+id+"\")'></a></td><td><a role='button' class='btn btn-danger fa fa-road' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='souangkot(\""+id+"\",\""+lat+"\",\""+lon+"\")'></a></td></tr>");
            }//end for
          }});//end ajax  
        } 

function tw_sekitar(latitude,longitude,rad){ // TEMPAT WISATA SEKITAR 

          $('#hasilcariobj').empty();
          $('#hasilcariobj1').show();
          $('#hasilcariobj').append("<thead><th class='centered'>Nama</th><th colspan='3' class='centered'>Aksi</th></thead>");
          $.ajax({url: server+'_sekitar_tw.php?lat='+latitude+'&long='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){ 
            for (var i in rows){ 
              var row = rows[i];
              var id = row.id;
              var name = row.name;
              var address = row.address;
              var open = row.open;
              var close = row.close;
              var ticket = row.ticket;
              
              var lat=row.latitude;
              var lon = row.longitude;
              
              //POSISI MAP
              centerBaru = new google.maps.LatLng(lat, lon);
              map.setCenter(centerBaru);
              map.setZoom(16);  
              var marker = new google.maps.Marker({
                position: centerBaru,              
                icon:'assets/img/tours.png',
                animation: google.maps.Animation.DROP,
                map: map
                });
              markersDua.push(marker);
              map.setCenter(centerBaru);

              $('#hasilcariobj').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-danger fa fa-info' onclick='detailinfoobj(\""+id+"\")'></a></td><td><a role='button' class='btn btn-danger fa fa-road' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='owangkot(\""+id+"\",\""+lat+"\",\""+lon+"\")'></a></td></tr>");
            }//end for
          }});//end ajax  

        }



      function h_sekitar(latitude,longitude,rad){ // TEMPAT WISATA SEKITAR 

          $('#hasilcarihotel').empty();
          $('#hasilcarihotel1').show();
          //cekRadius();
          $('#hasilcarihotel').append("<thead><th class='centered'>Nama</th><th colspan='3' class='centered'>Aksi</th></thead>");
          $.ajax({url: server+'_sekitar_hotel.php?lat='+latitude+'&long='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){ 
            for (var i in rows){ 
              var row = rows[i];
              var id = row.id;
              var name = row.name;
              var address = row.address;
              var cp = row.cp;
              
              var lat=row.latitude;
              var lon = row.longitude;
              
              //POSISI MAP
              centerBaru = new google.maps.LatLng(lat, lon);
              map.setCenter(centerBaru);
              map.setZoom(16);  
              var marker = new google.maps.Marker({
                position: centerBaru,              
                icon:'assets/img/hotels.png',
                animation: google.maps.Animation.DROP,
                map: map
                });
              markersDua.push(marker);
              map.setCenter(centerBaru);
              console.log(rad);

              $('#hasilcarihotel').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-danger fa fa-info' onclick='detailinfohotel(\""+id+"\")'></a></td> <td><a role='button' class='btn btn-danger fa fa-road'  onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='hotelangkot(\""+id+"\",\""+lat+"\",\""+lon+"\")'></a></td></tr>");
            }//end for
          }});//end ajax  
        }


//Fungsi Aktifkan Radius
function aktifkanRadius()
{
   var koordinat = new google.maps.LatLng(rad_lat, rad_lng);
          map.setCenter(koordinat);
          map.setZoom(16);  

          hapus_kecuali_landmark();
          hapusRadius();
          var inputradius=document.getElementById("inputradius").value;
          console.log(inputradius);
          var rad = parseFloat(inputradius*100);
          var circle = new google.maps.Circle({
            center: koordinat,
            radius: rad,      
            map: map,
            strokeColor: "blue",
            strokeOpacity: 0.5,
            strokeWeight: 1,
            fillColor: "blue",
            fillOpacity: 0.35
          });        
          circles.push(circle);     
          //TAMPILAN
          $("#hasilindustry").hide();
          $("#hasilculi").hide();
          $("#hasilmosque").hide();
          $("#hasilsouv").hide();
          $("#hasilobj").hide();
          $("#hasilhotel").hide();
           $("#hasilrestaurant").hide();

          if (document.getElementById("check_i").checked) {
            industri_sekitar(rad_lat,rad_lng,rad);
            $("#hasilindustry").show();
          }        

          if (document.getElementById("check_k").checked) {
            kuliner_sekitar(rad_lat,rad_lng,rad);
            $("#hasilculi").show();
          }      

          if (document.getElementById("check_m").checked) {
            masjid_sekitar(rad_lat,rad_lng,rad);
            $("#hasilmosque").show();
          }        

          if (document.getElementById("check_oo").checked) {
            oleholeh_sekitar(rad_lat,rad_lng,rad);
            $("#hasilsouv").show();
          }        

          if (document.getElementById("check_tw").checked) {
            tw_sekitar(rad_lat,rad_lng,rad);
            $("#hasilobj").show();
          }        

          if (document.getElementById("check_h").checked) {
            h_sekitar(rad_lat,rad_lng,rad);
            $("#hasilhotel").show();
          }  
          if (document.getElementById("check_res").checked) {
            restaurant_sekitar(rad_lat,rad_lng,rad);
            $("#hasilrestaurant").show();
          }        
          
        }

 function set_center(lat,lon,nama){

        //Hapus Info Sebelumnya
        hapusInfo();
        
        //POSISI MAP
        var centerBaru      = new google.maps.LatLng(lat, lon);
        map.setCenter(centerBaru);

        //JENDELA INFO
        var infowindow = new google.maps.InfoWindow({
              position: centerBaru,
              content: "<bold>"+nama+"</bold>",
            });
        infoDua.push(infowindow); 
        infowindow.open(map);  

      }


//Cek Radius
function cekRadius()
{
  rad = inputradius.value*100;
  console.log(rad);
}


//Fungsi Hapus Radius
function hapusRadius()
{
  for(var i=0;i<circles.length;i++)
  {
    circles[i].setMap(null);
  }
  circles=[];
  cekRadiusStatus = 'off';
}

//Fungsi Aktifkan Radius
function aktifkanRadiuss()
{
  if (koordinat == 'null')
  {
    alert ('Click the Button of Your Position Beforehand');
  }
  else 
  {
    hapusRadius();
    //hapusgrafik();
    var inputradiuss=document.getElementById("inputradiuss").value;
    var circle = new google.maps.Circle
    ({
      center: koordinat,
      radius: parseFloat(inputradiuss*100),      
      map: map,
      strokeColor: "blue",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "blue",
      fillOpacity: 0.35
    });        
    map.setZoom(12);       
    map.setCenter(koordinat);
    circles.push(circle);     
  }
  cekRadiusStatus = 'on';
  tampilradiuss();
}


//Menampilkan Data Radius yg dicari pada Result
function tampilradiuss()
{
  hapusawal1();
  cekRadiuss();
  $('#hasilcari').append("<thead><th>Name</th><th colspan='2'>Action</th></thead>");
  $.ajax
  ({ 
    url: server+'souvenirradius.php?lat='+koordinat.lat+'&lng='+koordinat.lng+'&rad='+rad, data: "", dataType: 'json', success: function(rows)
    { 
      for (var i in rows) 
      {   
        var row     = rows[i];
        var id  = row.id;
        var name   = row.name;
        var latitude  = row.latitude; ;
        var longitude = row.longitude ;
        centerBaru      = new google.maps.LatLng(latitude, longitude);
        //map.setCenter(centerBaru);
       // map.setCenter(koordinat);
        centerBaru = new google.maps.LatLng(latitude, longitude);
        marker = new google.maps.Marker
        ({
          position: centerBaru,
          map: map,
          icon: "assets/img/souv.png",
        });
        markersDua.push(marker);
        map.setCenter(centerBaru);
        map.setZoom(14);
        console.log(latitude);
        console.log(longitude);
        console.log(rad);
        clickMarker(centerBaru, id);
        $('#hasilcari').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-success' onclick='detsou(\""+id+"\");detsousou(\""+id+"\");'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='souangkot(\""+id+"\")'></a></td></tr>");     
       }
       $('#hasilpencarian').append("<h5 class='box-title' id='hasilpencarian'>Result :</h5>"+rows.length);
    }

  });   
}


//Cek Radius
function cekRadiuss()
{
  rad = inputradiuss.value*100;
}


function clean()
 {
  $('#hasilcari').empty();
  $('#hasilculi').empty();
  $('#selectfacility').hide();
  $('#hasilpencarian').empty();
  $('#hasilpencarian').append("Bukittinggi Tourism..");
  //$('#jarakj').css('display','none');
  //hapusgrafik();
  hapusInfo();
  hapusRadius();
  hapusMarkerTerdekat();
  //clearmarkerDkt();
  //clearroute2();
  
}


function viewprice()
{
  hapusawal();
  if (document.getElementById('cariprice').value=="")
    {
      alert("Pilih Option Dahulu !");
    }
    else
    {
    $('#hasilcari').append("<thead><th>Name</th><th colspan='3'>Action</th></thead>");
    var kulprice = document.getElementById('cariprice').value;
    console.log(kulprice);
    $('#hasilcari').empty();
    $('#hasilpencarian').empty();
    console.log("s");
    $.ajax
    ({ 
      url: server+'price.php?harga='+kulprice, data: "", dataType: 'json', success: function(rows)
      { 
         console.log("sa");
        if(rows==null)
        {
          alert('Data Did Not Exist !');
        }
        for (var i in rows)
        {   
          var row     = rows[i];
          var id  = row.id;
          var name   = row.name;
          var price   = row.price;
          var latitude  = row.latitude ;
          var longitude = row.longitude ;
          centerBaru = new google.maps.LatLng(latitude, longitude);
          marker = new google.maps.Marker
          ({
            position: centerBaru,
            map: map,
            icon: "assets/img/souv.png",
          });
          markersDua.push(marker);
          map.setCenter(centerBaru);
          map.setZoom(14);
          clickMarker(centerBaru, id);
          console.log(id);
          $('#hasilcari').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-success' onclick='detsou(\""+id+"\");detsousou(\""+id+"\");'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='souangkot(\""+id+"\")'></a></td></tr>");
        }   
        $('#hasilpencarian').append("<h5 class='box-title' id='hasilpencarian'>Result :</h5>"+rows.length);
      }
    }); 
  }
}


        
</script>
</head>

  <body onload="init()"> 
 
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
            <div class="sidebar-toggle-box">
              <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
           <a class="logo"><p><img src="image/kul.png">&nbsp<b>WEB</b><b style="font-size: 17px">GIS</b> - <b>S</b>ouvenir</p></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
              <ul class="nav top-menu">
                    <!-- settings start -->
                   
                    <!-- inbox dropdown end -->
              </ul>
                <!--  notification end -->
            </div>
            <h4>
            <div class="top-menu">
              <ul class="nav pull-right" style="margin-top: 6px">
                   <a href="admin/" class="logo1" title="Login" ><img src="image/login.png">
                   <!-- <i class="fa fa-user"></i> -->
                   <span>Login</span></a>
              </ul>
            </div></h4>

            <style type="text/css">
      #legend {
        background:white;
        padding: 10px;
        margin: 5px;
        font-size: 12px;
    font-color: blue;
        font-family: Arial, sans-serif;
    }
    .color {
        border: 1px solid;
        height: 12px;
        width: 12px;
        margin-right: 3px;
        float: left;
    }
    .a {
        background: #f75d5d;
      }
    .b {
        background: #ff3300;
      }
      .c {
        background: #ffd777;
      }
    .d {
        background: #ec87ec;
      }
    .e {
        background: darkcyan;
      }
    .f {
        background: magenta;
      }
    .g {
        background: pink;
      }
    .h {
        background: white;
      }
    .i {
        background: maroon;
      }
    .j {
        background: yellow;
      }
    .k {
        background: blue;
      }
    .l {
        background: navy;
      }
   </style>

      </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>

          <div id="sidebar"  class="nav-collapse " >
              <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
              
              <p class="centered"><a href="#"><img src="assets/img/jam.jpg" class="img-circle" width="150" height="120"></a></p>
              <h5 class="centered">Hi, Visitor!!</h5>

            <br>

                
              <h6 class="centered" style="color: #f7d976;"">Souvenir</h6>

                     <li class="sub-menu">
                      <a href="javascript:;" >
                        <i class="fa fa-thumb-tack"></i>
                        <span>Arround Souvenir</span>
                      </a>
                      <ul class="treeview-menu">
                        <div class=" form-group" style="color: white;"> <br>
                          <label>Based On Radius</label><br>
                          <label for="inputradiuss">Radius : </label>
                          <label  id="nilai">0</label> m
                          <script>
                            function cekkk()
                            {
                              document.getElementById('nilai').innerHTML=document.getElementById('inputradiuss').value*100
                            }
                          </script>
                          <input  type="range" onchange="cekkk();aktifkanRadiuss()" id="inputradiuss" 
                                  name="inputradiuss" data-highlight="true" min="0" max="20" value="0" >
                        </div>
                                      <!-- <button type="button" id="inputradius" onclick="aktifkanRadius()" class="btn btn-info btn-block btn-flat" >Cari</button> -->
                      </ul>
                    </li>

         

              <li class="sub-menu">
                <a href="javascript:;" >
                  <i class="fa fa-search"></i>
                  <span>Searching</span>
                </a>
                <ul class="sub">
                  <div class=" form-group">
                    <li>
                      <div class="search">
                        <div class="col-md-15 padding-0 text-center">
                         <div class="form-group form-animate-text"><br>
                          <input type="text"  class="form-text" placeholder="...." id="kul_nama" required>
                            <span class="bar"></span> 
                        </div>         
                       <button type="submit" class="btn btn-info btn-block btn-flat" id="kul_button" onclick='find_sou();'>Search</button>
                     </div> 
                     </div> 
                    </li>
                  </div>         
                </ul>
                </li>


                <li class="sub-menu">
                  <a href="javascript:;" >
                    <i class="fa fa-eye"></i>
                    <span>View Souvenir</span>
                  </a>
                  <ul class="sub">
                    <li class="sub-menu">
                      <a href="javascript:;" >
                        <i class="fa fa-globe"></i>
                        <span>Sub District</span>
                      </a>
                      <ul class="sub">
                        <div class=" form-group"> <br>
                          <!-- <label style="color: white;">Sub District</label> -->
                          <select class="form-control select2" style="width: 100%; height: 70%;" id="carikecamatankul">
                            <option value="">-Choose-</option>
                            <?php
                              include("connect.php"); 
                              $carikecamatankul=mysqli_query($conn, "select * from district order by name ASC");
                              while($rowcarikecamatankul = mysqli_fetch_assoc($carikecamatankul))
                              {
                                echo"<option value=".$rowcarikecamatankul['id'].">".$rowcarikecamatankul['name']."</option>";
                              }
                            ?>
                          </select>
                                              
                        </div>
                        
                        <div class=" form-group">
                          <button type="submit" class="btn btn-info btn-block btn-flat" id="kul_kec" onclick='viewkecamatansou();'>Search</button>
                        </div>
                     </ul>
                    </li>

                    <li class="sub-menu">
                  <a href="javascript:;" >
                    <i class="fa fa-globe"></i>
                    <span>Type</span>
                  </a>
                  <ul class="sub-menu">
                  <li class="sub-menu">
                      <a href="javascript:;" >
                        <i class="fa fa-globe"></i>
                        <span>Souvenir</span>
                      </a>
                      <ul class="sub">
                        <div class=" form-group"> <br>
                          <!-- <label style="color: white;">Sub District</label> -->
                          <select class="form-control select2" style="width: 100%; height: 70%;" id="caritipe">
                            <option value="">-Choose-</option>
                            <?php
                              include("connect.php"); 
                              $caritipe=mysqli_query($conn, "select * from souvenir_type order by name ASC");
                              while($rowcaristatus = mysqli_fetch_assoc($caritipe))
                              {
                                echo"<option value=".$rowcaristatus['id'].">".$rowcaristatus['name']."</option>";
                              }
                            ?>
                          </select>
                                              
                        </div>
                        
                        <div class=" form-group">
                          <button type="submit" class="btn btn-info btn-block btn-flat" id="viewtipe" onclick='viewtipe();'>Search</button>
                        </div>
                     </ul>
                    </li>


                    <li class="sub-menu">
                      <a href="javascript:;" >
                        <i class="fa fa-globe"></i>
                        <span>Traditional</span>
                      </a>
                      <ul class="sub">
                        <div class=" form-group"> <br>
                          <!-- <label style="color: white;">Sub District</label> -->
                          <select class="form-control select2" style="width: 100%; height: 70%;" id="caritipe2">
                            <option value="">-Choose-</option>
                            <?php
                              include("connect.php"); 
                              $caritipe2=mysqli_query($conn, "select * from industry_type order by name ASC");
                              while($rowcaristatus = mysqli_fetch_assoc($caritipe2))
                              {
                                echo"<option value=".$rowcaristatus['id'].">".$rowcaristatus['name']."</option>";
                              }
                            ?>
                          </select>
                                              
                        </div>
                        
                        <div class=" form-group">
                          <button type="submit" class="btn btn-info btn-block btn-flat" id="viewstipe" onclick='viewtipe2();'>Search</button>
                        </div>
                     </ul>
                    </li>
                  </ul>
                  </li>


                    <li class="sub-menu">
                      <a href="javascript:;" >
                        <i class="fa fa-globe"></i>
                        <span>Status</span>
                      </a>
                      <ul class="sub">
                        <div class=" form-group"> <br>
                          <!-- <label style="color: white;">Sub District</label> -->
                          <select class="form-control select2" style="width: 100%; height: 70%;" id="caristatus">
                            <option value="">-Choose Souvenir-</option>
                            <?php
                              include("connect.php"); 
                              $caristatus=mysqli_query($conn, "select * from status order by status ASC");
                              while($rowcaristatus = mysqli_fetch_assoc($caristatus))
                              {
                                echo"<option value=".$rowcaristatus['id'].">".$rowcaristatus['status']."</option>";
                              }
                            ?>

                            <option value="">-Choose Traditional Fabric-</option>
                            <?php
                              include("connect.php"); 
                              $caristatus=mysqli_query($conn, "select * from status order by status ASC");
                              while($rowcaristatus = mysqli_fetch_assoc($caristatus))
                              {
                                echo"<option value=".$rowcaristatus['id'].">".$rowcaristatus['status']."</option>";
                              }
                            ?>
                          </select>
                                              
                        </div>
                        
                        <div class=" form-group">
                          <button type="submit" class="btn btn-info btn-block btn-flat" id="viewstatus" onclick='viewstatus();'>Search</button>
                        </div>
                     </ul>
                    </li>


                    <li class="sub-menu">
                      <a href="javascript:;" onclick="selectsou()">
                       <i class="fa fa-cutlery"></i>
                       <span>Select Souvenir</span>
                       </a>
                    </li>



                  <li class="sub-menu">
                  <a href="javascript:;" >
                    <i class="fa fa-money"></i>
                    <span>Price</span>
                  </a>
                  <ul class="sub">  

                  <li class="sub-menu">
                    <a href="javascript:;" >
                      <i class="fa fa-money"></i>
                      <span>Souvenir</span>
                    </a>
                    <ul class="sub">
                       <div class=" form-group"> <br>
                          <select class="form-control select2" style="width: 100%; height: 70%;" id="cariprice">
                            <option name="harga" value="">-Choose-</option>
                            <option name="harga" value="1"> < Rp 20.000</option>
                            <option name="harga" value="2">Rp 20.000 - Rp 50.000</option>
                            <option name="harga" value="3"> > Rp 50.000</option>
                          </select>
                        </div>
                        <div class=" form-group">
                          <button type="submit" class="btn btn-info btn-block btn-flat" id="kul_kec" onclick='viewprice();'>Search
                          </button>
                        </div>
                    </ul>
                  </li>


                  <li class="sub-menu">
                    <a href="javascript:;" >
                      <i class="fa fa-money"></i>
                      <span>Traditional Fabric</span>
                    </a>
                    <ul class="sub">
                       <div class=" form-group"> <br>
                          <select class="form-control select2" style="width: 100%; height: 70%;" id="cariprice">
                            <option name="harga" value="">-Choose-</option>
                            <option name="harga" value="1"> < Rp 100.000</option>
                            <option name="harga" value="2">Rp 100.000 - Rp 500.000</option>
                            <option name="harga" value="3"> > Rp 500.000</option>
                          </select>
                        </div>
                        <div class=" form-group">
                          <button type="submit" class="btn btn-info btn-block btn-flat" id="kul_kec" onclick='viewprice();'>Search
                          </button>
                        </div>
                    </ul>
                  </li>


                </ul>
              </li>

                
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <section id="main-content">
        <section class="wrapper site-min-height">
          <div class="row mt">
           <div class="col-lg-8 ds">
            <section class="panel">
               <header class="panel-heading">
                <label style="color: black">List :</label>
                   <button type="button" onclick="posisisekarang()" class="btn btn-default " data-toggle="tooltip" id="posisinow" title="Posisi Saya" 
                    style="margin: 15px" style="margin-right: 7px;" ><i class="fa fa-location-arrow" > </i>
                      </button>

                       <button type="button" onclick="lokasimanual()" class="btn btn-default"  data-toggle="tooltip" id="posmanual" title="Posisi Manual" 
                              style="margin-right: 7px;"><i class="fa fa-map-marker" ></i>
                      </button>
                                            
                       <button type="button" onclick="viewsou()" class="btn btn-default" data-toggle="tooltip" title="Melihat Semua Souvenir" 
                               style="margin: 7px" style="margin-right: 7px;"><i class="fa fa-bullseye"></i>
                       </button>

                       <!-- <button type="button" onclick="clean()" class="btn btn-default" data-toggle="tooltip" title="Refresh" style="margin-right: 7px;"><i class="fa fa-refresh"></i>
                       </button> -->
                       <label id="tombol">
                       <a type="button" onclick="legenda()" id="showlegenda" class="btn btn-default" data-toggle="tooltip" title="Legenda" style="margin-right: 7px;"><i class="fa fa-eye"></i>
                       </a>
                       </label>
                  </header>
                <!-- First Action -->
                      <div class="panel-body">
                          <div id="map" style="width:100%;height:400px; z-index:50"></div>
                      </div>
            </section>
           
              
                      <!--custom chart end-->
                          <div class="col-lg-6 ds"  id="hasildet" style="display:none;">
                          <!-- <div class="col-md-12 padding-0" style="display:none;"> -->
                          <!-- <h3 style="font-size:16px">Information</h3> -->
                          <a class="btn btn-compose">Information</a>
                              <!-- First Action -->
                              <div class="box-body" style="max-height:450px;overflow:auto;">
                                <div class="form-group" id="hasilcaridet1" style="display:none;">
                                  <table class="table " id='hasilcaridet'></table>
                               
                                </div>
                              </div>         
                        </div>

                         <div class="col-lg-4 ds"  id="hasildetsou" style="display:none;">
                          <!-- <div class="col-md-12 padding-0" style="display:none;"> -->
                          <!-- <h3 style="font-size:16px">Information Kul</h3> -->
                          <a class="btn btn-compose">Information</a>
                              <!-- First Action -->
                              <div class="box-body" style="max-height:450px;overflow:auto;">
                                <div class="form-group" id="hasilcaridetsou1" style="display:none;">
                                  <table class="table " id='hasilcaridetsou'></table>
                               
                                </div>
                                
                              </div>         
                        </div>

                        <div class="col-lg-4 ds"  id="tampilangkotsekitarik" style="display:none;" >
                          
                          <!-- <h3 style="font-size:16px">Angkot Information</h3> -->
                              <a class="btn btn-compose">Angkot Information</a>
                              <div class="box-body" style="max-height:450px;overflow:auto;">
                                <div class="form-group" id="tampillistangkotik1" style="display:none;">
                                  <table class="table table-bordered" id='tampillistangkotik'></table>
                                </div>
                              </div>         
                        </div> 
                        <div class="col-lg-4 ds"  id="hasilmosque" style="display:none;">
                          <!-- <div class="col-md-12 padding-0" style="display:none;"> -->
                          <!-- <h3 style="font-size:16px">Mosque Information</h3> -->
                          <a class="btn btn-compose">Mosque Information</a>
                              <!-- First Action -->
                              <div class="box-body" style="max-height:450px;overflow:auto;">
                                <div class="form-group" id="hasilcarimosque1" style="display:none;">
                                  <table class="table table-bordered" id='hasilcarimosque'></table>
                                </div>
                              </div>         
                        </div> 

                           <div class="col-lg-4 ds"  id="hasilrestaurant" style="display:none;">
                          <!-- <div class="col-md-12 padding-0" style="display:none;"> -->
                          <!-- <h3 style="font-size:16px">Mosque Information</h3> -->
                          <a class="btn btn-compose">Restaurant Information</a>
                              <!-- First Action -->
                              <div class="box-body" style="max-height:450px;overflow:auto;">
                                <div class="form-group" id="hasilcarirestaurant1" style="display:none;">
                                  <table class="table table-bordered" id='hasilcarirestaurant'></table>
                                </div>
                              </div>         
                        </div>


                        <div class="col-lg-4 ds"  id="hasilhotel" style="display:none;">
                          <!-- <div class="col-md-12 padding-0" style="display:none;"> -->
                          <!-- <h3 style="font-size:16px">Hotel Information</h3> -->
                          <a class="btn btn-compose">Hotel Information</a>
                              <!-- First Action -->
                              <div class="box-body" style="max-height:450px;overflow:auto;">
                                <div class="form-group" id="hasilcarihotel1" style="display:none;">
                                  <table class="table table-bordered" id='hasilcarihotel'></table>
                                </div>
                              </div>         
                        </div> 

                        <div class="col-lg-4 ds"  id="hasilobj" style="display:none;">
                          <!-- <div class="col-md-12 padding-0" style="display:none;"> -->
                          <!-- <h3 style="font-size:16px">Tourism Information</h3> -->
                          <a class="btn btn-compose">Tourism Information</a>
                              <!-- First Action -->
                              <div class="box-body" style="max-height:450px;overflow:auto;">
                                <div class="form-group" id="hasilcariobj1" style="display:none;">
                                  <table class="table table-bordered" id='hasilcariobj'></table>
                                </div>
                              </div>         
                        </div> 

                        <div class="col-lg-4 ds"  id="hasilindustry" style="display:none;">
                          <!-- <div class="col-md-12 padding-0" style="display:none;"> -->
                          <!-- <h3 style="font-size:16px">Industry Information</h3> -->
                          <a class="btn btn-compose">Industry Information</a>
                              <!-- First Action -->
                              <div class="box-body" style="max-height:450px;overflow:auto;">
                                <div class="form-group" id="hasilcariind1" style="display:none;">
                                  <table class="table table-bordered" id='hasilcariind'></table>
                                </div>
                              </div>         
                        </div> 

                        <div class="col-lg-4 ds"  id="hasilsouv" style="display:none;">
                          <!-- <div class="col-md-12 padding-0" style="display:none;"> -->
                          <!-- <h3 style="font-size:16px">Souvenir Information</h3> -->
                           <a class="btn btn-compose">Souvenir Information</a>
                              <!-- First Action -->
                              <div class="box-body" style="max-height:450px;overflow:auto;">
                                <div class="form-group" id="hasilcarisouv1" style="display:none;">
                                  <table class="table table-bordered" id='hasilcarisouv'></table>
                                </div>
                              </div>         
                        </div> 

                        <div class="col-lg-4 ds"  id="hasilculi" style="display:none;">
                          <!-- <div class="col-md-12 padding-0" style="display:none;"> -->
                          <!-- <h3 style="font-size:16px">Culinary Information</h3> -->
                           <a class="btn btn-compose">Culinary Information</a>
                              <!-- First Action -->
                              <div class="box-body" style="max-height:450px;overflow:auto;">
                                <div class="form-group" id="hasilcariculi1" style="display:none;">
                                  <table class="table table-bordered" id='hasilcariculi'></table>
                                </div>
                              </div>         
                        </div> 

                      </div>
                    
             
					

      <!-- </div>/col-lg-9 END SECTION MIDDLE -->
                  
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
    
        <div class="col-sm-4"  id="hasilik" >
          <section class="panel">
          <!-- <div class="col-md-12 padding-0" style="display:none;"> -->
          <h2 class="box-title" id="hasilpencarian">
          <!-- <marquee width="100%" behavior="alternate" scrollamount="4">Bukittinggi Tourism..</marquee> -->
          </h2><br>
           <section class="panel">
                    <div class="panel-body">
          <a class="btn btn-compose">Information</a>
              <!-- First Action -->

              <div class="box-body" style="max-height:400px;overflow:auto;">
                <div class="form-group" id="hasilcari1" style="display:none;">
                  <table class="table table-bordered" id='hasilcari'></table>
                </div>
              </div>         
        </div> 
        </section>
        </div>

      <div id="nearbyik" class="col-md-4 col-sm-4 mb" style="display:none">
                        <div class="white-panel pns" style="padding-bottom:5px">
                           <div class="white-header" style="height:40px;margin-bottom:0px;background:white;color:black">
                             <!-- <h4><u><b>Object Arround</b></u></h4> -->
                             <a class="btn btn-compose">Object Arround</a>
                           </div>
                           <div class="row">
                             <div class="col-sm-6 col-xs-6"></div>
                           </div>
                           <div style="text-align:left;margin:10px; color:black;">
                              <!--img src="assets/img/product.png" width="120"-->
                              <div class="checkbox">
                                <label>
                                  <input id="check_tw" type="checkbox">
                                  Tempat Wisata
                                </label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input id="check_i" type="checkbox" >
                                  Industri
                                </label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input id="check_m" type="checkbox" value="">
                                  Masjid
                                </label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input id="check_oo" type="checkbox" value="">
                                  Oleh - oleh
                                </label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input id="check_k" type="checkbox" value="">
                                  Kuliner
                                </label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input id="check_h" type="checkbox" value="">
                                  Hotel
                                </label>
                              </div>
                                <div class="checkbox">
                                <label>
                                  <input id="check_res" type="checkbox" value="">
                                  Restaurant
                                </label>
                              </div>

                              <!--RADIUS-->
                              <label for="inputradius">Radius : </label>
                          <label  id="nilaiiiii">0</label> m
                          <script>
                            function cek()
                            {
                              document.getElementById('nilaiiiii').innerHTML=document.getElementById('inputradius').value*100
                            }
                          </script>
                              <input type="range" onchange="cek(); aktifkanRadius()" id="inputradius" name="inputradius" data-highlight="true" min="0" max="15" value="0">

                              <!--BUTTON CARI SEKITAR-->
                              <div id="view_sekitar" class="centered">
                              </div>


                           </div>
                        </div>
                      </div><!-- /col-md-12 -->    
        


        <div class="col-lg-4 ds"  id="hasilrute" style="display:none;">
          <!-- <div class="col-md-12 padding-0" style="display:none;"> -->
          <!-- <h3 style="font-size:16px">Rute</h3> -->
          <a class="btn btn-compose">Rute</a>
              <!-- First Action -->
              <div class="box-body" style="max-height:557px;overflow:auto;">
                <div class="form-group" id="detailrute1" >

                  <table class="table table-bordered" id='detailrute'></table>
                </div>
              </div>         
        </div> 

        <div class="col-lg-4 ds"  id="selectkulll" style="display:none;">
          <!-- <h3 style="font-size:16px">Select Culinary</h3> -->
          <a class="btn btn-compose">Select Souvenir</a>
        <div class="panel box-v3">
                  <ul class="sub">
                        <div id="forml">
                        <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $id ?>">
                          <div class="form-group row col-xs-9" >
                            <?php
                              $sql2 = mysqli_query($conn, "select * from product_souvenir order by product");
                              while($dt = mysqli_fetch_array($sql2)){
                                  echo "<div class='checkbox'><label style='color:black'><input name='product_souvenir' value=\"$dt[id]\" type='checkbox' style='width:25px'>$dt[product]</label></div>";
                                }
                              
                            ?>


                             <?php
                              $sql2 = mysqli_query($conn, "select * from product_small_industry order by product");
                              while($dt = mysqli_fetch_array($sql2)){
                                  echo "<div class='checkbox'><label style='color:black'><input name='product_small_industry' value=\"$dt[id]\" type='checkbox' style='width:25px'>$dt[product]</label></div>";
                                }
                              
                            ?>
            
                      </div>
                      </div>
                        <div class=" form-group">
                          <button type="submit" class="btn btn-info btn-block btn-flat" id="kul_kec" onclick='viewsouv();'>Search</button>
                        </div>
                      </ul>
                </div> 
                </div>
     
      </section>
    </section>
  
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
  	<script src="assets/js/zabuto_calendar.js"></script>	
	
	   <script type="application/javascript">
        $(document).ready(function () 
        {
          $("#date-popover").popover({html: true, trigger: "manual"});
          $("#date-popover").hide();
          $("#date-popover").click(function (e) 
          {
           $(this).hide();
          });
        
          $("#my-calendar").zabuto_calendar
          ({
            action: function () 
            {
              return myDateFunction(this.id, false);
            },
            action_nav: function () 
            {
              return myNavFunction(this.id);
            },
            ajax: 
            {
              url: "show_data.php?action=1",
              modal: true
            },
            legend: 
            [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
            ]
          });
        });
        
        
        function myNavFunction(id) 
        {
          $("#date-popover").hide();
          var nav = $("#" + id).data("navigation");
          var to = $("#" + id).data("to");
          console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  </body>
</html>
