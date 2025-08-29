@extends('layouts.userlayout')
@section('content')
    {{-- the if statement to stop this --}}
    @if (1 == 1)
        <div class="row card p-2 mb-3">
            <div class="col d-flex justify-content-end align-items-center gap-3">
                <p class="fs-6 mb-0">
                    Download Excel template for Feri Application.
                </p>
                <a href="{{ route('transporter.feri.template.download') }}" class="btn btn-success">
                    <i class="fa fa-circle-down me-2"></i> Download Template
                </a>
            </div>
        </div>

        <x-errorshow />

        <div class="row p-5 card">
            <h4 class="mb-3">Feri Application Template - Excel</h4>
            <div class="col">
                <form action="{{ route('transporter.feri.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-12 mb-4">
                            <div class="input-group input-group-static mb-4">
                                <label>Excel File</label>
                                <input type="file" name="excel_file" class="form-control border mt-3 rounded" required />
                            </div>
                        </div>


                        <div class="col-12 mb-3">
                            <label>Document for each Excel Row</label>
                            <div id="row-files-wrapper">
                                <div class="input-group mb-2 mt-3">
                                    <input type="file" name="attachments[]" class="form-control border rounded" />
                                    <button type="button" class="btn btn-success add-file-btn">+</button>
                                </div>
                            </div>
                        </div>

                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const wrapper = document.getElementById('row-files-wrapper');

                wrapper.addEventListener('click', function(e) {
                    if (e.target.classList.contains('add-file-btn')) {
                        const newInputGroup = document.createElement('div');
                        newInputGroup.classList.add('input-group', 'mb-2');

                        newInputGroup.innerHTML = `
                    <input type="file" name="attachments[]" class="form-control border rounded" />
                    <button type="button" class="btn btn-danger remove-file-btn">-</button>
                `;
                        wrapper.appendChild(newInputGroup);
                    }

                    if (e.target.classList.contains('remove-file-btn')) {
                        e.target.closest('.input-group').remove();
                    }
                });
            });
        </script>
    @else
        <div class="text-center mx-auto">
            <h4>Quick Apply Comming Soon</h4>
        </div>
    @endif
@endsection
