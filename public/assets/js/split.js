async function splitPDF() {
    const pdfFileInput = document.getElementById('pdfFile');
    const pdfFile = pdfFileInput.files[0];

    if (!pdfFile) {
        alert('Please select a PDF file.');
        return;
    }

    const pdfBytes = await pdfFile.arrayBuffer();
    const pdfDoc = await PDFLib.PDFDocument.load(pdfBytes);

    // Split PDF pages
    const pageCount = pdfDoc.getPageCount();

    for (let i = 0; i < pageCount; i++) {
        const newPdfDoc = await PDFLib.PDFDocument.create();
        const [copiedPage] = await newPdfDoc.copyPages(pdfDoc, [i]);
        newPdfDoc.addPage(copiedPage);

        const newPdfBytes = await newPdfDoc.save();
        downloadPDF(newPdfBytes, `page_${i + 1}.pdf`);
    }
}

function downloadPDF(pdfBytes, fileName) {
    const blob = new Blob([pdfBytes], { type: 'application/pdf' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = fileName;
    link.click();
}
