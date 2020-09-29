<!DOCTYPE html>
<html>
<head>
	<title>Love Letters</title>
	
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
  <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />
    <!-- CSS only -->

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
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

        if(!isset($_GET['id']) || empty($_GET['id'])){


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
            <label for="textarea_field">Letters for Jae</label>
            <textarea id="textarea_field" class="nes-textarea" placeholder="Write some love letters for @jae"></textarea>
            <button type="button" class="nes-btn is-primary float-right" align="right">Submit</button>
            <br>
          </div>
        </div>
      </div>  
      <div id="cardisi">
        <div style="position: relative;margin: 0px auto;max-width: 1552px;">
        
        <div class="cardwarp col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="color: #4285f4">28-9-2020 5:49</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>


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


      for(let i = 0; i<10; i++){
              $("#cardisi").append(cards_html('tanggal', 'You are so worthy, we love you so much!'));        
      }


</script>

</body>
</html>