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
    <script defer src="/assets/js/pdfkit-standalone-0.10.0.js"></script>
  <script defer src="/assets/js/blob-stream-0.1.3.js"></script>
  <script src="/assets/js/pdf.min-2.5.207.js"></script>
  <script src="/assets/js/FileSaver.min-2.0.4.js"></script>
  <script src="/assets/js/sortable.min.1.10.2.js"></script>
	<link href="/assets/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

<style>#pdf_input {
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

					<h1 class="h3 mb-3">Compress PDF</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
                                <center>
  <div id="main_container">
    <div id="pdf_input_container">
    <label class="btn btn-primary" for="pdf_input">Select PDF File</label>
    <br><br>  <br><br>
      <input class="custom-upload-btn" id="pdf_input" type="file" accept="application/pdf" multiple />
    </div>
    <div id="selected_pdf_container">
      <div id="selected_pdf_list" title="Hold and drag the handle to order the output PDF pages"></div>
    </div>
    <div id="range_container">
      <input  id="compress_input" title="Compression Ratio" type="range" min="0" max="1" value="0.5" step="0.1" />
      <p id="compress_input_output" title="Higher the Value, Better the Compression">
        0.5
      </p>
    </div>
    <div id="compress_pdf_container">
      <button class="btn btn-primary" style="width:200px;height:40px;"  id="compress_pdf" title="Compress and Combine selected PDF files in Specified order">
        Compress PDF
      </button>
  </center>
    </div>
  </div>
  <div style="max-width: 0px; max-height: 0px; overflow: hidden">
    <canvas id="page_canvas"></canvas>
  </div>

  <script>
    function setLoading() {
      var compress_pdf = document.getElementById("compress_pdf");
      if (compress_pdf.style.animation == "none") {
        console.log("Loading...");
      } else {
        compress_pdf.style.animation = "loading 2s infinite";
      }
      compress_pdf.innerText = "Compressing...";
      compress_pdf.disabled = true;
    }

    function resetLoading() {
      var compress_pdf = document.getElementById("compress_pdf");
      compress_pdf.style.animation = "none";
      compress_pdf.disabled = false;
      compress_pdf.innerText = "Compress PDF";
    }

    function onPDFCompressed() {
      var pdf_input = document.getElementById("pdf_input");
      pdf_input.value = "";
      resetAll();
    }

    function resetAll() {
      resetTempArrays();
      //clearPDFList();
      resetLoading();
    }

    function addFileEntry(file_name) {
      var list = document.getElementById("selected_pdf_list");
      var entry = document.createElement("li");
      entry.style = "list-style: none; font-size: x-small;";
      var img = new Image();
      img.classList.add("handle");
      entry.append(img);
      var space = document.createTextNode("\u00A0");
      entry.append(space);
      entry.append(file_name);
      list.appendChild(entry);
    }

    var selected_pdf_list = document.getElementById("selected_pdf_list");
    var sortable_list = new Sortable(selected_pdf_list, {
      animation: 150,
      ghostClass: "ghost-class",
      onSort: function (event) {
        updateFileListOnSort(event.to);
      },
    });

    var tenet = [];
    var fc = 0;

    var input_file_names = [];
    var ordered_input_files = [];
    var ordered_index = [];
    var sorted = false;

    var input_scale = 1,
      input_quality = 0.5,
      input_quality_ui = 0.5,
      input_format = "image/jpeg";

    var pdf_input = document.getElementById("pdf_input");
    pdf_input.addEventListener("input", onInputPDF);

    var compress_pdf = document.getElementById("compress_pdf");
    compress_pdf.addEventListener("click", onProcessInputPDF);

    var quality_input = document.getElementById("compress_input");
    quality_input.addEventListener("input", onQualityInput);

    // var tenet_pdf = document.getElementById("tenet");
    // tenet_pdf.addEventListener("click", processImageData);

    function onQualityInput() {
      input_quality_ui = Number(this.value);
      var output_quality = document.getElementById("compress_input_output");
      // output_quality.value = input_quality_ui;
      output_quality.innerText = input_quality_ui;
      input_quality = 1 - input_quality_ui;
    }

    function resetTempArrays() {
      input_file_names = [];
      ordered_input_files = [];
      ordered_index = [];
      sorted_file_names = [];
      tenet = [];
      sorted = false;
    }

    function onInputPDF() {
      resetTempArrays();
      clearPDFList();

      fc = this.files.length;

      for (i = 0; i < fc; i++) {
        var file = this.files[i];

        if (!file) {
          return;
        }

        if (file.type != "application/pdf") {
          pdfName = null;
          pdfFileObject = null;
          console.log(
            file.name + " - Unsupported file format, Select a PDF file!!"
          );
          selected_file_name = file.name + " - Unsupported file format!!";
          alert(selected_file_name);
          return;
        }
      }

      ordered_input_files = Array.from(this.files);

      for (j = 0; j < fc; j++) {
        input_file_names.push(this.files[j]["name"]);
      }

      // console.log(ordered_input_files);
      generateFileList();
    }

    function generateFileList() {
      for (i = 0; i < ordered_input_files.length; i++) {
        addFileEntry(ordered_input_files[i]["name"]);
      }
    }

    function compareFileLists(oldList, newList) {
      var indexList = [];
      var i = 0,
        len = oldList.length;
      while (i < len) {
        indexList.push(newList.indexOf(oldList[i]));
        i++;
      }

      return indexList;
    }

    function sortFiles(fileListRef, sortedIndex) {
      var fileList = Array.from(fileListRef);
      var i = 0;
      len = sortedIndex.length;

      while (i < len) {
        while (sortedIndex[i] != i) {
          var currTgtIdx = sortedIndex[sortedIndex[i]];
          var currTgtData = fileList[sortedIndex[i]];

          sortedIndex[sortedIndex[i]] = sortedIndex[i];
          fileList[sortedIndex[i]] = fileList[i];

          sortedIndex[i] = currTgtIdx;
          fileList[i] = currTgtData;
        }
        i++;
      }
      return fileList;
    }

    function updateFileListOnSort(file_list_div) {
      sorted_file_names = [];
      var items = file_list_div.childNodes;
      for (i = 0; i < items.length; i++) {
        sorted_file_names.push(items[i].textContent.trim());
      }

      var finalIndex = compareFileLists(input_file_names, sorted_file_names);
      // ordered_input_files = sortFiles(ordered_input_files, finalIndex);
      ordered_index = Array.from(finalIndex);
      // console.log(ordered_index);
    }

    function clearPDFList() {
      var list = document.getElementById("selected_pdf_list");
      list.textContent = "";
    }

    function generateMetadata(file) {
      pdfName = file["name"];
      pdfFileObject = file;
      selected_file_name = pdfName;
    }

    function getFileToProcessed() {
      return ordered_input_files.shift();
    }

    function checkFileProcessProgress() {
      if (ordered_input_files.length == 0) {
        processImageData();
      } else {
        onProcessInputPDF();
      }
    }

    function checkFiles() {
      return ordered_input_files.length;
    }

    function sortFileList() {
      if (!sorted) {
        var sorted_files = sortFiles(ordered_input_files, ordered_index);
        // console.log(sorted_files);
        ordered_input_files = Array.from(sorted_files);
        sorted = true;
      }
    }

    function onProcessInputPDF() {
      if (!checkFiles()) {
        alert("Select PDF Files to Compress 🙂");
        return;
      }

      setLoading();

      sortFileList();

      // console.log(ordered_input_files);

      var file = getFileToProcessed();

      if (file) {
        generateMetadata(file);
      } else {
        return;
      }

      if (!pdfFileObject) {
        return;
      }

      console.log("Loading selected file: " + pdfName);

      const reader = new FileReader();

      reader.onload = function (e) {
        var url = e.target.result;
        pdf2img(url);
      };
      if (pdfFileObject) {
        reader.readAsDataURL(pdfFileObject);
      } else {
        console.log(
          "Error reading file: " + pdfName + " Choose file(s) again..."
        );
      }
    }

    pdfjsLib.GlobalWorkerOptions.workerSrc = "/assets/js/pdf.worker.min-2.5.207.js";

    var pdfDoc = null,
      pageNum = 1,
      pdfFileObject = null,
      pageRendering = false,
      pageCount = 0,
      pageNumPending = null,
      pageScale = input_scale,
      pageQuality = input_quality,
      pageQualityUI = input_quality_ui,
      pageFormat = input_format,
      imgData = null,
      pdfName = "doc",
      selected_file_name = "";

    var canvas = document.getElementById("page_canvas");
    var ctx = canvas.getContext("2d");

    function pdf2img(pdf_url) {
      readPDF(pdf_url).then(
        () => downloadAll(),
        () => {
          console.log("Error reading PDF... May be an encrypted one [-_^]");
        }
      );
    }

    function readPDF(url) {
      return new Promise((resolve, reject) => {
        var loadingTask = pdfjsLib.getDocument(url);
        loadingTask.promise.then(
          function (pdfDoc_) {
            pdfDoc = pdfDoc_;
            resetPDFMetaStore(pdfDoc.numPages);
            console.log("PDF Loaded: " + pdfName);
            selected_file_name += " - " + pageCount + " Pages";
            resolve(1);
          },
          () => reject(1)
        );
      });
    }

    function resetPDFMetaStore(numPages) {
      pageCount = numPages;
      imgData = {};
      pageNumPending = [];
      pageScale = input_scale;
      pageQuality = input_quality;
      pageQualityUI = input_quality_ui;
      pageFormat = input_format;
    }

    function getOutputPdfName() {
      if (fc == 1) {
        return pdfName.split(".pdf")[0] + "_min_" + pageQualityUI + ".pdf";
      } else {
        return "Comb_Doc" + "_min_" + pageQualityUI + ".pdf";
      }
    }

    /**
     * Get page info from document, resize canvas accordingly, and render page.
     * @param num Page number.
     */
    function renderPage(num) {
      pageRendering = true;
      // Using promise to fetch the page
      pdfDoc.getPage(num).then(function (page) {
        var viewport = page.getViewport({
          scale: pageScale
        });
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        // Render PDF page into canvas context
        var renderContext = {
          canvasContext: ctx,
          viewport: viewport,
        };
        var renderTask = page.render(renderContext);

        // Wait for rendering to finish
        renderTask.promise.then(function () {
          data = canvas.toDataURL(pageFormat, pageQuality);

          imgData[num] = data;
          console.log("Completed page: " + num);
          pageRendering = false;

          if (pageNumPending !== null && pageNumPending.length != 0) {
            // New page rendering is pending
            renderPage(pageNumPending.shift());
          } else {
            if (Object.keys(imgData).length == pageCount) {
              tenet.push(JSON.parse(JSON.stringify(imgData)));
              console.log("Rendering complete");
              checkFileProcessProgress();
              //processImageData();
            }
          }
        });
      });

      console.log("Processing page: " + num);
    }

    /**
     * If another page rendering in progress, waits until the rendering is
     * finised. Otherwise, executes rendering immediately.
     */
    function queueRenderPage(num) {
      if (pageRendering) {
        pageNumPending.push(num);
      } else {
        renderPage(num);
      }
    }

    function downloadAll() {
      for (i = 1; i <= pageCount; i++) {
        queueRenderPage(i);
      }
    }

    function getImgObj(data) {
      return new Promise(function (resolve, reject) {
        var img = new Image();
        img.onload = function () {
          resolve(img);
        };
        img.src = data;
      });
    }

    async function processImageData() {
      var options = {
        autoFirstPage: false,
        compress: false,
      };

      const doc = new PDFDocument(options);

      doc.info = {
        Title: "ImageDoc.pdf",
        Author: "Img2Pdf",
        Keywords: "https://opentoolkit.github.io/Img2Pdf/",
      };
      const stream = doc.pipe(blobStream());

      for (let k = 0; k < tenet.length; k++) {
        var imgData = tenet[k];
        console.log("PDF %d: %d pages", k + 1, Object.keys(imgData).length);

        for (let i = 1; i <= Object.keys(imgData).length; i++) {
          img_data = await getImgObj(imgData[i]);
          doc.addPage({
            size: [img_data.width, img_data.height],
          });
          doc.image(img_data.src, 0, 0);
        }
      }

      doc.end();

      stream.on("finish", function () {
        var output_blob = stream.toBlob("application/pdf");
        saveAs(output_blob, getOutputPdfName());
        onPDFCompressed();
      });
    }
  </script>
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