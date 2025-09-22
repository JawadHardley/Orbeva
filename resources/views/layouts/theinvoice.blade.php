<!DOCTYPE html>
<html lang="en">

@php
    $feriQty = (float) ($invoice->feri_quantity ?? 0);
    $feriUnits = (float) ($invoice->feri_units ?? 0);
    $codQty = (float) ($invoice->cod_quantities ?? 0);
    $codUnits = (float) ($invoice->cod_units ?? 0);
    $euroRate = (float) ($invoice->euro_rate ?? 1);
    $transporterQty = (float) ($invoice->transporter_quantity ?? 0);

    // Calculating the amounts
    $feriAmount = $feriQty * $feriUnits;
    $codAmount = $codQty * $codUnits;
    $upTotal = $feriAmount + $codAmount;
    $transporterAmount = $transporterQty * 0.018;
    $grandTotal = $transporterAmount + $upTotal * $euroRate - 5;
    $grandTotal_r = number_format($grandTotal, 2, '.', ',');

    $formattedDate = \Carbon\Carbon::parse($invoice->invoice_date)->format('d.m.Y');
@endphp

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
                    <td style="vertical-align: top; font-size: 30px;">
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
                        <div>
                            INV NO: MKH-M-{{ $invoice->id }}
                        </div>
                        <div>
                            CERTIFICATE NUMBER: {{ $invoice->certificate_no }}
                        </div>
                    </td>
                    <td>
                        <div>
                            VAT: 4750279434
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
                        <div style="font-weight: bold; font-size: 16px; margin-top: 8px;">
                            {{ $applicantName }}
                        </div>
                        <div>
                            {{ $applicantEmail }}
                        </div>
                        <div>
                            {{-- nothing --}}
                        </div>
                    </td>
                    <td style="padding: 0;">
                        <table>
                            <tr class="bol" style="font-size: 13px;">
                                <td style="background-color: #5c5c5cff; padding: 2px;">INVOICE DATE</td>
                                <td style="text-align: right; padding: 0;">{{ $formattedDate }}</td>
                            </tr>
                            <tr class="bol">
                                <td style="background-color: #5c5c5cff; padding: 2px;">FILE REF NO</td>
                                <td style="text-align: right; padding: 0;">{{ $invoice->customer_trip_no }}</td>
                            </tr>
                            <tr class="bol">
                                <td style="background-color: #5c5c5cff; padding: 2px;">PO</td>
                                <td style="text-align: right; padding: 0;">{{ $feriapp->po }}</td>
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
                        <h3 style="margin: 50px;">{{ $feriapp->status != 5 ? 'DRAFT' : '' }} FERI/ AD INVOICE</h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 0;">
                        <table>
                            <tr style="text-align: center; background-color: #9f9f9fff; font-size: 13px;">
                                <td colspan="2">Description</td>
                                <td>Quantity</td>
                                <td>Amount (EUR)</td>
                                <td>Amount (USD)</td>
                                <td> Balance</td>
                            </tr>
                            <tr style="text-align: center; font-size: 10px;">
                                <td colspan="2">Application fee COD/FERI</td>
                                <td>{{ $codQty }}</td>
                                <td>{{ $codAmount }} €</td>
                                <td>${{ $euroRate * $codAmount }}</td>
                                <td></td>
                            </tr>
                            <tr style="text-align: center; font-size: 10px;">
                                <td colspan="2">Feri Cost Per ton/cbm</td>
                                <td>{{ $feriQty }}</td>
                                <td>{{ $feriAmount }} €</td>
                                <td>${{ number_format(floor($euroRate * $feriAmount * 100) / 100, 2, '.', '') }}</td>
                                <td></td>
                            </tr>
                            <tr style="text-align: center; font-size: 10px;">
                                <td colspan="2"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="text-align: center; font-size: 10px;">
                                <td colspan="2">Intervention Commission</td>
                                <td>{{ $transporterQty }}</td>
                                <td>1.80%</td>
                                <td>${{ number_format($transporterAmount, 2, '.', ',') }}</td>
                                <td></td>
                            </tr>
                            <tr style="text-align: center; background-color: #9f9f9fff; font-size: 13px;">
                                <td colspan="2">120+ Days</td>
                                <td>90 Days</td>
                                <td>60 Days</td>
                                <td>30 Days</td>
                                <td>${{ number_format($grandTotal, 2, '.', ',') }}</td>
                            </tr>
                            <tr class="bol" style="font-size: 13px; text-align: right; color: green;">
                                <td colspan="5" style="text-align: right;">Discount Applied:</td>
                                <td class="bol" style="text-align: right;">
                                    $5</td>
                            </tr>
                            <tr class="bol" style="font-size: 13px; text-align: right;">
                                <td colspan="5" style="text-align: right;">Total amount Due:</td>
                                <td class="bol" style="text-align: right;">
                                    ${{ number_format($grandTotal, 2, '.', ',') }}</td>
                            </tr>
                            <tr class="bol" style="font-size: 13px;">
                                <td class="bol" colspan="5" style="text-align: right;">Amount Overdue:</td>
                                <td></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
