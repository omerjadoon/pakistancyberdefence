<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
   
    <link rel="stylesheet" type="text/css" href="stylesheets/github-light.css" media="screen">
    <link rel="stylesheet" type="text/css" href="stylesheets/print.css" media="print">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <title>Pakistan Cyber Defence</title>
  </head>

  <body style="background-color:black;">
   

    <div id="content-wrapper ">
      <div class="inner clearfix">
        <section id="main-content" style="text-align:center;">

          <img src="cyber.png" style="width:250px;margin:0px auto;text-align: center;">
          


<p  style="background-color: rgba(0,255,0,0.3); color:  white; padding: 10px 10px 10px 10px;">Step1. Select an image from your computer</p>
<p><input style="margin:0px auto" type="file" id="file" accept="image/*" /></p>

 <input  style="color:blue;visibility: hidden;" type="radio" name="mode" id="m0" value=0 checked="checked" /> 

<p  style="background-color: rgba(0,255,0,0.3); color:  white; padding: 10px 10px 10px 10px;">Step2. Enter a password </p>
<p>Password: <input type="text" id="pass" value="" placeholder="No Password"/></p>
<p  style="background-color: rgba(0,255,0,0.3); color:  white; padding: 10px 10px 10px 10px;">Results</p>
<p>
<div id="result" style="background-color: rgba(0,255,0,0.3); color:  white; padding: 10px 10px 10px 10px;">Please finish step 1~3 above and click a button below. Your result will then show up here!</div>
</p>
<p>
<img id="resultimg" style="display:none" src="" />
</p>
<p style="color:#1A5B2E">Hidden Message</p>
<p>
<textarea id="msg" style="width:40%;height:50px; margin: 0px auto">Write your message here ...</textarea>
</p>
<a href="javascript: writeIMG()" class="btn btn-success" >Write message into image</a>
<p> </p>
<p>OR:</p>
<a href="javascript: readIMG()" class="btn btn-success" ><span >Read message from image</span></a>



        </section>

        
      </div>
    </div>

<footer>
    <h6 style="color:#fff; text-align: center;">Developed by Jadoon Technologies</h6>
</footer>
<script type="text/javascript" src="javascripts/jquery.min.js"></script> <!--jQuery is not required by the library. We use it in DEMO page-->
<!-- CryptoStego JS files.-->
<script type="text/javascript" src="src/sha512.js"></script>
<script type="text/javascript" src="src/mersenne-twister.js"></script>
<script type="text/javascript" src="src/utf_8.js"></script>
<script type="text/javascript" src="src/utils.js"></script>
<script type="text/javascript" src="src/readimg.js"></script>
<script type="text/javascript" src="src/setimg.js"></script>
<script type="text/javascript" src="src/main.js"></script>
<!-- above scripts equivalent to <script type="text/javascript" src="cryptostego.min.js"></script>-->
<script type="text/javascript">
function writeIMG(){
    $("#resultimg").hide();
    $("#resultimg").attr('src','');
    $("#result").html('Processing...');
    function writefunc(){
        var selectedVal = '';
        var selected = $("input[type='radio'][name='mode']:checked");
        if (selected.length > 0) {
            selectedVal = selected.val();
        }
        var t = writeMsgToCanvas('canvas',$("#msg").val(),$("#pass").val(),selectedVal);
        if(t===true){
            var myCanvas = document.getElementById("canvas");
            var image = myCanvas.toDataURL("image/png");
            $("#resultimg").attr('src',image);
            $("#result").html('Success! Save the result image below and send it to others!');
            $("#resultimg").show();
        } else $("#result").html(t);
    }
    loadIMGtoCanvas('file','canvas',writefunc,500);
}
function readIMG(){
    $("#resultimg").hide();
    $("#result").html('Processing...');
    function readfunc(){
        var selectedVal = '';
        var selected = $("input[type='radio'][name='mode']:checked");
        if (selected.length > 0) {
            selectedVal = selected.val();
        }
        var t= readMsgFromCanvas('canvas',$("#pass").val(),selectedVal);
        if(t!=null){
            t=t.split('&').join('&amp;');
            t=t.split(' ').join('&nbsp;');
            t=t.split('<').join('&lt;');
            t=t.split('>').join('&gt;');
            t=t.replace(/(?:\r\n|\r|\n)/g, '<br />');
            $("#result").html(t);
        }else $("#result").html('ERROR REAVEALING MESSAGE!');

    }
    loadIMGtoCanvas('file','canvas',readfunc);
}
</script>



  </body>
</html>
