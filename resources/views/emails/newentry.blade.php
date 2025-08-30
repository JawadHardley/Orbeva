<x-mail::message>
    # Hi, Mikhanyi

    A new application has been submitted in the system.
    Kindly log in to review the details and take the required action

    Entry Reference: {{ $feriApp->company_ref }}
    Feri Type: {{ $feriApp->feri_type }}

    Applicant Name: {{ $transporter->name }}
    Applicant Email: {{ $transporter->email }}
    Transport Mode / Transporteur: {{ $feriApp->transport_mode }}
    Transporter Company: {{ $company2->name }}
    Entry Board Point into the DRC: {{ $feriApp->entry_border_drc }}
    Port/Airport/Rail Station of Arrival: {{ $feriApp->arrival_station }}
    Truck Details: {{ $feriApp->truck_details }}
    Final Destination in DRC: {{ $feriApp->final_destination }}
    Importer Name: {{ $feriApp->importer_name }}
    Importer Phone: {{ $feriApp->importer_phone }}
    Importer Email: {{ $feriApp->importer_email }}
    FXI Number: {{ $feriApp->fix_number }}
    Exporter Name: {{ $feriApp->exporter_name }}
    Exporter Phone: {{ $feriApp->exporter_phone }}
    Exporter Email: {{ $feriApp->exporter_email }}
    Clearing/Forwarding Agent: {{ $feriApp->cf_agent }}
    Clearing/Forwarding Agent Contact: {{ $feriApp->cf_agent_contact }}
    Cargo Description: {{ $feriApp->cargo_description }}
    HS Code: {{ $feriApp->hs_code }}
    PO: {{ $feriApp->po }}
    Package Type: {{ $feriApp->package_type }}
    Quantity: {{ $feriApp->quantity }}
    Company Reference: {{ $feriApp->company_ref }}
    Processing Location / Cargo Origin: {{ $feriApp->cargo_origin }}
    Customs Declaration Number: {{ $feriApp->customs_decl_no }}
    Manifest Number / VG: {{ $feriApp->manifest_no }}
    OCC/ BIVAC: {{ $feriApp->occ_bivac }}
    Instructions / Validation Notes: {{ $feriApp->instructions }}
    FOB: {{ $feriApp->fob_value }}
    Freight: USD {{ $feriApp->freight_value }}
    Insurance: USD {{ $feriApp->insurance_value }}
    Additional Fees: USD {{ $feriApp->additional_fees_value }}

    If you have any questions or encounter any issues accessing the system, please our system admin team.


    Kind regards,
    {{ $transporter->name }}

</x-mail::message>
