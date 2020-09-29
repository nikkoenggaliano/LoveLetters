<!DOCTYPE html>
<html>
<head>
	<title>Love Letters</title>
	
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
  <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />
    <!-- CSS only -->

	<!-- JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <style>
      html, body, pre, code, kbd, samp {
          font-family: "Press Start 2P";
      }
      body{
        background: #eee;
      }

    .cardwarp {
      padding:5px;
      float:left;
      max-width: 388px;
      max-height: 388px;
    }
    .card{
      box-shadow: 0px 0px 2px 2px #404040;
    }
    #cardisi{
      position: relative;
      margin: 0px auto;
    }

    .navbar{
      top:0px;
      position: fixed;
      width: 100%;
      height: 40px;
      background: #4285f4;
      z-index: 1;
      box-shadow: 0px 0px 2px 2px #404040;
    }

    #container{
      margin-top: 50px;
    }

    </style>
</head>
<body>

<div class="navbar"></div> 

<div id="container" class="container-fluid gedf-wrapper">
  <div class="row">
    
    <div class="col-md-1"></div>
    <div class="col-md-10">

      <?php 

        if(!isset($_GET['id'])){


      ?>

      <div class="row">
        <div class="col-md-12">
          <div class="nes-container with-title is-centered">
            <div class="nes-field">
              <label for="default_select">Dari manakah kamu tahu app ini?</label>
              <div class="nes-select">
                <select required name="dari" id="default_select">
                  <option value="twitter" selected>Twitter</option>
                  <option value="instagram">Instagram</option>
                  <option value="facebook">Facebook</option>
                  <option value="wa">WhatsApp</option>
                  <option value="telegram">Telegram</option>
                  <option value="line">Line</option>
                  <option value="dll">Lainya</option>
                </select>
              </div>
              <label for="name_field">Nama kamu</label>
              <input type="text" required name="nama" placeholder="Masukan nama kamu" id="name_field" class="nes-input">
              <button type="button" class="nes-btn is-primary float-right" align="right">Daftar</button>
            </div>
          </div>
        </div>
      </div>

      <?php 
        }else{

      ?>

      <div class="row">
        <div class="col-md-12">
          <div class="nes-container with-title is-centered">
            <label for="textarea_field" id="labname"></label>
            <textarea id="textarea_field" class="nes-textarea" placeholder="Write some love letters for @jae"></textarea>
            <button type="button" class="nes-btn is-primary float-right" align="right">Submit</button>
            <br>
          </div>
        </div>
      </div>
      
        <div class="col-md-12" align="center" id="newmsg"> 
          
        </div>

      <div id="cardisi">
        <div style="position: relative;margin: 0px auto;max-width: 1552px;">
        

          


      </div>
      </div>
    <?php } ?>


    </div><!-- end col-10 -->
    <div class="col-md-1"></div>
</div><!-- end row -->

  </div>
  </div>
</div>


<script type="text/javascript">

$('#textarea_field').attr("placeholder","Hello Nikko");

  function GetLastID(array){
    
    array = array.sort(function(a, b){return b-a})
    return array[0]

  }


  function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
  }

  function cards_html(date, isi){
      var cards =  '<div class="cardwarp col-md-4">'
      cards += '<div class="card">'
      cards += '<div class="card-body">'
      cards += '<h5 class="card-title" style="color: #4285f4">'+date+'</h5>'
      cards += '<p class="card-text">'+isi+'</p>'
      cards += '</div>'
      cards += '</div>'
      cards += '</div>'
      return cards;
  }
  let uid = window.location.search.substr(1).replace("id=", "");
  var last_count = 0;
  var data_baru  = 0;
  var now_id = [];
  function firstRender(id){


    let uid = id;
    const api = `http://elpida.my.id/ll/api.php?id=${uid}`;
    $.ajax({
      url: api,
      async: false,
      success: function(result){

        if(result.code == 404){
          console.log('Redirect');
          console.log('Profil tidak ditemukan!');
          return false;
        }

        let profile_name = result.profil[0]['name'];
        $("#labname").text("Surat cinta untuk "+profile_name);
        let pesan = result.pesan;
        last_count = result.pesan.length;
        for(d in pesan){
            let msg = pesan[d]['pesan'];
            let date  = pesan[d]['date'];
            now_id.push(pesan[d]['id']);
            $("#cardisi").append(cards_html(date,msg))
        }

      }
    });

  }

  function CekNewData(id){
    let uid   = id;
    var count = 0;
    const api = `http://elpida.my.id/ll/api.php?id=${uid}`;
    $.ajax({
      'url': api,
      'async': false,
      success: function(result){
        let pesan = result.pesan;
        count = pesan.length;
      }
    })
    return count;
  }

  $(document).ready(function(){
    firstRender(uid);
    console.log(last_count);
  })

  function RenderNewData(){
    let lid   = GetLastID(now_id);
    const api = `http://elpida.my.id/ll/api.php?lid=${lid}&uid=${uid}`;
    $.ajax({
      'url': api,
      'async':false,
      success: function(result){
        for(res in result){
          let msg  = result[res]['pesan'];
          let date = result[res]['date'];
          now_id.push(result[res]['id']);
          $("#cardisi").append(cards_html(date,msg));
        }
      }
    });
    $("#renew").remove();
    last_count = CekNewData(uid);

  }

setInterval(function(){ 
  
    var cn = CekNewData(uid)
    data_baru = cn - last_count;
    if(data_baru == 0){
      //console.log('Tidak ada data baru');
    }else{
      $("#newmsg").html('<button type="button" class="nes-btn is-success" onclick="RenderNewData();" id="renew">Terdapat '+data_baru+' pesan baru</button>')
    }
  }, 3000);


</script>

</body>
</html>