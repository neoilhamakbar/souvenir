<div class="row">
<div class="col-xs-12">
<div class="box">
    <div class="box-body">
<form role="form" action="act/addjnssouprocess.php" method="post">
             <!--menampilkan map-->
    <select name = "detailcul" id="detailcul" class="form-control">
    <option value="0" >
    Pilih Tempat Kuliner
    </option>
  
    <?php
          $query = pg_query("SELECT * FROM tempat_kuliner order by nama_tempat_kuliner ASC ");
          while($result = pg_fetch_array($query)){
              echo  "<option value = ".$result['id_tempat_kuliner'].">".$result ['nama_tempat_kuliner']."</option>";
          };
        ?>
          </select>

          <br><br>
          <table class="table table-hover table-bordered table-striped" id="tabel_kuliner">
            <thead id="headTabel">
            </thead>
            <tbody id="bodyTabel">
            </tbody>
          </table>
           <!-- menampilkan form tambah mesjid-->
           
             <div id="tempatbutton">
             </div>        
          <script type="text/javascript">
            var detailcul = document.getElementById('detailcul');
            detailcul.onchange = function(){
              //alert('hai jack');
              var server = "http://localhost/industri_kecil/server/";
              var xhttp = new XMLHttpRequest();
              var id_tempat_kuliner = detailcul.value;
              var thead = document.getElementById('headTabel');
              thead.innerHTML = "<td>Nomor</td><td>Nama</td>";
              var table = document.getElementById('bodyTabel')
              table.innerHTML = "";
              var tempatbutton = document.getElementById('tempatbutton');
              xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){    
                    var response = JSON.parse(this.response);
                    console.log(response)
                    var no = 1;
                    for(var k in response){
                      var tr = document.createElement('tr');
                      tr.innerHTML = "<td>"+no+"</td><td>"+response[k].nama_kuliner+"</td>";
                      table.appendChild(tr)
                      no++;
                    }
                    tempatbutton.innerHTML='<a href="?page=formadddetailcul" class="btn btn-primary pull-left"><i class="fa fa-chevron-left"></i> Add</a>'
                }
              }
              xhttp.open("GET",server+"detail_cul.php?id_tempat_kuliner="+id_tempat_kuliner,true);
              xhttp.send();

            }
          </script>
                                           
                  
                  </form>
                  </div>
                  </div>
                  </div>
                  </div>

        