@extends('layouts.userlayout')
@section('content')
    {{-- the code hiden below is future feature --}}
    <div class="row">
        <div class="col p-4">
            <button id="downloadBtn" class="btn btn-primary w-100">Download Snapshot</button>
        </div>
    </div>

    <div class="row mx-1 mt-5" id="captureMe">
        <x-calculator :eur="$rates->eur->amount" :tz="$rates->tz->amount" />
    </div>

    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        document.getElementById("downloadBtn").addEventListener("click", async () => {
            const {
                jsPDF
            } = window.jspdf;
            const captureElement = document.getElementById("captureMe");

            // Remove fade class
            captureElement.classList.remove("fade-section");

            // Wait for reflow
            await new Promise(r => setTimeout(r, 50));

            // Take screenshot
            const canvas = await html2canvas(captureElement);
            const imgData = canvas.toDataURL("image/png");

            // Create PDF
            const pdf = new jsPDF("l", "mm", "a4");
            const pageWidth = pdf.internal.pageSize.getWidth();
            const pageHeight = pdf.internal.pageSize.getHeight();

            // Scale image to fit within page while keeping ratio
            const imgProps = pdf.getImageProperties(imgData);
            const pdfWidth = pageWidth * 0.9; // 80% of page width
            const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

            // Calculate center position
            const x = (pageWidth - pdfWidth) / 2;
            const y = (pageHeight - pdfHeight) / 2;

            // Add image centered
            pdf.addImage(imgData, "PNG", x, y, pdfWidth, pdfHeight);
            pdf.save("screenshot.pdf");

            // Add fade class back
            captureElement.classList.add("fade-section");
        });
    </script>
@endsection
