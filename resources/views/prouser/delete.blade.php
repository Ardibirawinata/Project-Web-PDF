<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>Blank Page | AdminKit Demo</title>
    <script src="/assets/js/pdf-designer.js" type="text/javascript"></script>
    <script defer src="/assets/js/pdfkit-standalone-0.10.0.js"></script>
  <script defer src="/assets/js/blob-stream-0.1.3.js"></script>
  <script src="/assets/js/pdf.min-2.5.207.js"></script>
  <script src="/assets/js/FileSaver.min-2.0.4.js"></script>
  <script src="/assets/js/sortable.min.1.10.2.js"></script>
	<link href="/assets/css/app.css" rel="stylesheet">
    <link href="/assets/css/delete.css" rel="stylesheet">
  
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

<style>#inputfile {
      display: none; /* Sembunyikan input file asli */
    }
    </style>
		@include('layouts.pinggir')
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				@include('layouts.profile')
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Remove PDF</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
                                <script type="text/javascript">  
  var Analyst = null;  
      
  window.onload = function(){           
       var obj = document.getElementById("inputfile");  
       obj.addEventListener("change",onAddFile,false);
  }
  
  // ユーザーによりファイルが追加された  
  function onAddFile(event) {
      var file   = event.target.files;       
      var reader = new FileReader();
      
      reader.onload = function (ev) {
        var AStream = new Uint8Array(reader.result);            

        Analyst = new TPDFAnalyst(file[0].name);
        try {
            Analyst.LoadFromStream(AStream);
            Analyst.Error = false;
        } catch (e) {
            Analyst.Error = true;
            Analyst.FilName = file[0].name;
        }          
        CreateHTML();             
      };
      reader.readAsArrayBuffer(file[0]);          
  }    
    
  // ドラッグオーバー
  function onDragOver(event){    
      event.preventDefault(); 
  } 
    
  // ドロップ    
  function onDrop(event){
      var files  = event.dataTransfer.files;       
      var reader = new FileReader();      
    
      reader.onload = function (ev) {
        var AStream = new Uint8Array(reader.result);            

        Analyst = new TPDFAnalyst(files[0].name);
        try {
           
            Analyst.LoadFromStream(AStream);
            Analyst.Error = false;
        } catch (e) {
            Analyst.Error = true;
            Analyst.FilName = files[0].name;
        }           
        CreateHTML();             
      }
      
      if (files[0] != undefined){    
        reader.readAsArrayBuffer(files[0]); 
      }
      event.preventDefault(); 
  }  

  // HTMLの作成   
  function CreateHTML() {    
      var html = '';    
      
      if (Analyst != undefined){
          html +=  '<p></p>';
          
          // テーブルヘッダ
          html += '<div id="tbl_head_div">';
            html += '<table id="tbl_head">';
            html += '<tr>';
            html += ' <th style="width:18px;"></th>';
            html += ' <th>FileName</th>';
            html += ' <th style="width:50px;">Pages</th>';
            html += ' <th style="width:70px;">Format</th>';            
            html += ' <th style="width:50px;">Info</th>';
            html += '</tr>';   
            html += '</table>';                                      
          html += '</div>';

          // テーブルデータ
          html += '<div id="dummy">';  // IE用ダミー  
          html += '<div id="tbl_data_div">';            
            
            html += '<table id="tbl_data">';
     
              html += '<tr>';
              html += ' <td style="width:18px;"><input type="radio" name="rowitem" value="good" checked></td>';
              
              // 読み込めないファイル
              if (Analyst.Error){
                  html += ' <td>' +  Analyst.FileName  +'</td>';                           
                  html += ' <td style="width:50px;text-align:right;">-</td>';
                  if (Analyst.Version != ''){
                      html += ' <td style="width:70px;">PDF' + Analyst.Version  + '</td>';                    
                  }else{
                      html += ' <td style="text-align:right;">-</td>';
                  }
                  html += ' <td style="width:50px;">Unsupported</td>';              
              }else{
                  html += ' <td>' +  Analyst.FileName  +'</td>';                
                  html += ' <td style="width:50px;text-align:right;"> ' +  Analyst.PageCount +'</td>';
                  html += ' <td style="width:70px;">PDF' +  Analyst.Version   +'</td>';
                  if (Analyst.Encrypt)
                    html += ' <td style="width:50px;">Encryption</td>';
                  else
                    html += ' <td style="width:50px;">OK</td>';
              }
              html += '</tr>';   

            html += '</table>';
          html += '</div>';     
          html += '</div>';
          
        
          if ((Analyst.Error || Analyst.Encrypt)){
             html += '<p id ="errmsg" style="color:red;" >This file is not supported. Please read a different file.</p>';          
          }else{
             html += '<p>Please enter a range of pages that you want to delete.</p>';
             
             html += '<p>Starting page <span id="input_area"><input type="number" id="begin" min="1" max="'+ Analyst.PageCount +'" required></span><span class="sp"><br> <br></span>';
             html += ' End page <span id="input_area"><input type="number" id="end"   min="1" max="'+ Analyst.PageCount +'" required></span></p>';
             
             html += '<p id ="errmsg" style="color:red;" ></p>';
             html += '<input class="btn btn-primary" type="submit" id="btn_start" value="Start Convert" onclick="return run();">';
          }
      
          document.getElementById("tbl_div").style.display = 'block';              
      }else{
          document.getElementById("tbl_div").style.display = 'none'; 
      }
      
      document.getElementById("tbl_div").innerHTML = html; 
      
      if (document.getElementById("begin")) {
        document.getElementById("begin").focus();      
      }  
  }  
            
  // 削除の開始
  function run(){   
      var begin  = document.getElementById("begin").value;
      var end    = document.getElementById("end").value;
      
      document.getElementById("errmsg").innerHTML = '';
       
      // エラーチェック
      // ※明示的にブラウザのValidation機能(HTML5)を発動させています。
      if (!document.getElementById("begin").checkValidity()){
        return true;
      }

      if (!document.getElementById("end").checkValidity()){
        return true;
      }      
      
      // スワップ
      begin = parseInt(begin,10);
      end   = parseInt(end,10);
     
      if (begin > end){
         begin = parseInt(document.getElementById("end").value,10);        
         end   = parseInt(document.getElementById("begin").value,10);
      }        
      
      if(begin == 1 && end == Analyst.PageCount){
         document.getElementById("errmsg").innerHTML  = 'Please delete the PDF file on your own if you want to delete all of the pages.';
         return false;
      }
      
      var PDFDeletePage = new TPDFDeletePage();      
       
      try {      
           PDFDeletePage.SaveToFile(PDF_GetDateTime_Now() + '.pdf', Analyst, begin, end);
           return false; 
      } catch (e) {
          document.getElementById("errmsg").innerHTML  = 'Failed to convert PDF file.';
          return false; 
      }           
  } 
    
</script>
</head>
<body ondrop="onDrop(event);" ondragover="onDragOver(event);">
<div id="top">
<div id="header">
<header>   

</header>
</div>

 
    <div id="contents">  
      <div id="main">
      <article> 
        <center>
      <section>
         
          <p>Remove PDF</p>      
      
          
          <form>
          <label class="btn btn-primary" for="inputfile">Select PDF File</label>
            <input type="file" id="inputfile" accept="application/pdf">
          </form>
                      
          <form name="frm_action">        
            <div id="tbl_div" style="display:none;">
            </div>
          </form>
</center>
          <p></p>          
          


								</div>
								<div class="card-body">
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a>								&copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="/assets/js/app.js"></script>

</body>

</html>