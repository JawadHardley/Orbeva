<!DOCTYPE html>
<html lang="en">

@php
    $tatal = 0;
    $firstId = null;
    $lastId = null;
@endphp

@foreach ($invoice as $key => $record)
    @if ($loop->first)
        @php $firstId = $record->id; @endphp
    @endif
    @if ($loop->last)
        @php $lastId = $record->id; @endphp
    @endif
@endforeach

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A4 Invoice</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            text-indent: 0;
        }

        @page {
            size: A4 portrait;
            /* A4, portrait mode */
            margin: 15mm 15mm 15mm 15mm;
            /* top, right, bottom, left */
        }

        body {
            margin: 0;
            padding: 25px;
            background: #eee;
            font-family: serif;
            /* just to show contrast */
        }

        .a4-page {
            width: 100%;
            /* use full page width minus margins */
            box-sizing: border-box;
            /* includes padding/border inside width */
            padding: 10px;
        }

        @media print {
            body {
                background: none;
            }

            .a4-page {
                margin: 0;
                box-shadow: none;
                /* page-break-after: always;
                width: 200px; */
            }
        }

        .bol {
            border: 1px solid black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            /* force equal width columns */
        }

        th,
        td {
            /* each cell gets its border */
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="a4-page">
        <table class="table" style="width: 100%; border:1px solid black; margin: 0;">
            <thead>
                <tr>
                    <td style="vertical-align: top;">
                        {{-- <img src="{{ asset('images/inv-logo.png') }}" style="width: 300px; height: auto;"> --}}
                        <h1 style="color: #14213d; font-family: elephant;">MIKHANYI</h1>
                        <h5 style="color: #ae2012; text-align: left;">LOGISTICS</h5>
                    </td>
                    <td style="text-align: right; font-size: 13px;">
                        <div>
                            MIKHANYI PTY LTD
                        </div>
                        <div>
                            Prism Business Park
                        </div>
                        <div>
                            1 Ruby Cl, Witkoppen
                        </div>
                        <div>
                            Fourways, Johannesburg
                        </div>
                        <div>
                            Cell: +27 83 639 3338
                        </div>
                        <div>
                            Tel: +27 10 220 5828
                        </div>
                        <div>
                            ilungam@mikhanyi.co.za
                        </div>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr style="font-size: 13px;">
                    <td>
                        {{-- nothing --}}
                    </td>
                    <td>
                        <div>
                            VAT:  4750279434
                        </div>
                    </td>
                </tr>
                <tr style="font-size: 13px;">
                    <td>
                        <div>
                            ALISTAIR GROUP
                        </div>
                        <div>
                            ALM TRANSPORT (MAURITIUS) LTD
                        </div>
                        <div>
                            Sovereign Trust (Mauritius) Limited
                        </div>
                        <div>
                            Unit 21, Circle Square Business Park, Forbach, Mauritius.
                        </div>
                        {{-- <div style="font-weight: bold; font-size: 16px; margin-top: 8px;">
                            Isaac Ibrahim
                        </div>
                        <div>
                            isaac.brahim@alistairgroup.com
                        </div>
                        <div>
                            +255 757 434 320
                        </div> --}}
                    </td>
                    <td style="padding: 0;">
                        <table>
                            <tr class="bol" style="font-size: 13px;">
                                <td style="background-color: #5c5c5cff; padding: 2px;">INVOICE DATE</td>
                                <td style="text-align: right; padding: 0;">{{ date('d.m.Y') }}</td>
                            </tr>
                            {{-- <tr class="bol">
                                <td style="background-color: #5c5c5cff; padding: 2px;">AMOUNT DUE </td>
                                <td style="text-align: right; padding: 0; color: #941f1fff;">$4 492,92</td>
                            </tr> --}}
                            <tr class="bol">
                                <td style="background-color: #5c5c5cff; padding: 2px;">CLIENT NAME </td>
                                <td style="text-align: right; padding: 0;">ALM</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td class="bol" style="padding: 2px; font-weight: bold;">Banking details</td>
                                <td class="bol" style="padding: 0;"></td>
                            </tr>
                            <tr>
                                <td class="bol" style="padding: 2px;">Name:</td>
                                <td class="bol" style="padding: 0;">Mikhanyi Pty Ltd</td>
                            </tr>
                            <tr>
                                <td class="bol" style="padding: 2px;">Acc No:</td>
                                <td class="bol" style="padding: 0;">63138197371</td>
                            </tr>
                            <tr>
                                <td class="bol" style="padding: 2px;">Acc type:</td>
                                <td class="bol" style="padding: 0;">CFC Business Account</td>
                            </tr>
                            <tr>
                                <td class="bol" style="padding: 2px;">Bank:</td>
                                <td class="bol" style="padding: 0;">First National Bank</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center; padding: 0;">
                        <h3 style="margin: 25px;">STATEMENT</h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 0;">
                        @php
                            $chunked = $invoice->chunk(20);
                            $tatal = 0;
                        @endphp

                        @foreach ($chunked as $chunkIndex => $chunk)
                            <table style="width: 100%; border:1px solid black; margin: 0; page-break-inside: avoid;">
                                <tbody>
                                    <tr style="text-align: center; background-color: #9f9f9fff; font-size: 10px;">
                                        <td>Date</td>
                                        <td>Invoice Number</td>
                                        <td>Certificate Number</td>
                                        <td>File Ref Number</td>
                                        <td>PO Number</td>
                                        <td>Amount(USD)</td>
                                        <td>Balance</td>
                                    </tr>
                                    @foreach ($chunk as $record)
                                        @php
                                            $amount = (float) str_replace(',', '', $record->amount);
                                            $rate = (float) str_replace(',', '', $record->tz_rate);
                                            $tzamountRaw = $amount * $rate;
                                            $tzamount = number_format($tzamountRaw, 2, '.', ',');
                                            $tatal += $amount;
                                        @endphp
                                        <tr style="text-align: center; font-size: 8px;">
                                            <td style="padding: 3px;">
                                                {{ \Carbon\Carbon::parse($record->invoice_date)->format('j.n.Y') }}</td>
                                            <td style="padding: 3px;">MKH-M-{{ $record->id }}</td>
                                            <td style="padding: 3px;">{{ $record->certificate_no }}</td>
                                            <td style="padding: 3px;">{{ $record->customer_ref }}</td>
                                            <td style="padding: 3px;">{{ $record->po }}</td>
                                            <td class="hrr">${{ $amount }}</td>
                                            <td style="padding: 3px;"></td>
                                        </tr>
                                    @endforeach

                                    @if ($loop->last)
                                        <!-- Only on the last chunk, show totals -->
                                        <tr style="text-align: center; font-size: 8px;">
                                            <td colspan="7"></td>
                                        </tr>
                                        <tr style="text-align: center; background-color: #9f9f9fff; font-size: 11px;">
                                            <td colspan="3">120+ Days</td>
                                            <td>90 Days</td>
                                            <td>60 Days</td>
                                            <td>30 Days</td>
                                            <td>${{ number_format($tatal, 2) }}</td>
                                        </tr>
                                        <tr class="bol" style="font-size: 13px; text-align: right;">
                                            <td colspan="6" style="text-align: right;">Total amount Due:</td>
                                            <td class="bol" style="text-align: left;">${{ number_format($tatal, 2) }}
                                            </td>
                                        </tr>
                                        <tr class="bol" style="font-size: 13px;">
                                            <td class="bol" colspan="6" style="text-align: right;">Amount Overdue:
                                            </td>
                                            <td></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            @if (!$loop->last)
                                <div style="page-break-after: always;"></div>
                            @endif
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
