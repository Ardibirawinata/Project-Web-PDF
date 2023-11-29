<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script src="assets/js/pdf-designer.js" type="text/javascript"></script>
<script type="text/javascript">
var Analysts = new Array();    
 
function onChangeFile(event,index) {
    var reader = new FileReader();
    var file = event.target.files;
    
    document.getElementById("errmsg").innerHTML = '';
    
    reader.onload = function (event) {
        var Stream = new Uint8Array(reader.result);
        
        Analysts[index] = new TPDFAnalyst();
        
        try {
          
            Analysts[index].LoadFromStream(Stream);
            
            if (Analysts[index].Encrypt) {
                document.getElementById("p"+(index+1)).innerHTML =
                   'No' + (index+1) + ' PDF File - Unsupported';
                document.getElementById("errmsg").innerHTML = 
                   'It does not support encrypted files.';
            } else {
                document.getElementById("p"+(index+1)).innerHTML = 
                   'No' + (index+1) + ' PDF File - [' + Analysts[index].PageCount +
                    ' Pages / PDF' + Analysts[index].Version + ']';
            }
        } catch (e) {
            Analysts[index] = null;
            document.getElementById("p"+(index+1)).innerHTML =
               'No' + (index+1) + ' PDF File - Unsupported';      
            document.getElementById("errmsg").innerHTML =
               'No' + (index+1) +' PDF File is Not supported.';
        }
    }
    reader.readAsArrayBuffer(file[0]);
}
 
function run() {        
    var PDFCombine = new TPDFCombine();
 
    if (Analysts[0] != null && Analysts[1] != null) {
        try {
          
            // PDF_GetDateTime_Now() return the current date and time.
            PDFCombine.SaveToFile(PDF_GetDateTime_Now() + '.pdf', Analysts);
            
        } catch (e) {
            Analysts[0] = null;
            Analysts[1] = null;
            
            document.getElementById("errmsg").innerHTML = 
              'failed in the convert of the PDF file.';
        }
    } else {
        document.getElementById("errmsg").innerHTML =
          'Two PDF files, please select.';
    }
}
</script>
</head>
<body>
<h1>Combine of PDF</h1>

<p>Two PDF files, please select.</p>
<p id="errmsg" style="color:red;"></p>   
<p id="p1">No1 PDF File</p>
<input type="file" id="inputfile1" accept="application/pdf" onchange="onChangeFile(event,0)"><br>
<p id="p2">No2 PDF File</p>
<input type="file" id="inputfile2" accept="application/pdf" onchange="onChangeFile(event,1)"><br>
<br>
<br>
<br>
<button id="run" style="width:200px;height:30px;" onclick="run();">Start Convert</button>
</body>
</html>