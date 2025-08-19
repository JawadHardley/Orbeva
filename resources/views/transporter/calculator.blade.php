@extends('layouts.userlayout')
@section('content')
    {{-- the code hiden below is future feature --}}
    {{-- <div class="row">
        <div class="col p-4">
            <button id="download-pdf" class="btn btn-primary w-100">Download Snapshot</button>
        </div>
    </div> --}}

    <div class="row mx-1 mt-5" id="calculator-capture">
        <x-calculator :eur="$rates->eur->amount" :tz="$rates->tz->amount" />
    </div>

    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        document.getElementById('download-pdf').addEventListener('click', function() {
            const captureElement = document.getElementById('calculator-capture');
            html2canvas(captureElement, {
                scale: 2
            }).then(function(canvas) {
                // Use JPEG and set quality to 0.8 (adjust as needed)
                const imgData = canvas.toDataURL('image/jpeg', 0.8);
                const pdf = new window.jspdf.jsPDF({
                    orientation: 'p',
                    unit: 'pt',
                    format: 'a4'
                });
                const pageWidth = pdf.internal.pageSize.getWidth();
                const imgWidth = pageWidth;
                const imgHeight = canvas.height * imgWidth / canvas.width;
                pdf.addImage(imgData, 'JPEG', 0, 0, imgWidth, imgHeight);
                pdf.save('cost_estimate.pdf');
            });
        });
    </script>
@endsection
