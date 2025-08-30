<x-mail::message>
    # Hi, {{ $vendor->name }}

    A new application has been submitted in the system.
    Kindly log in to review the details and take the required action

    Entry Reference: {{ $feriApp->company_ref }}
    Feri Type: {{ $feriApp->feri_type }}

    If you have any questions or encounter any issues accessing the system, please
    our system admin team.


    Kind regards,
    Applicant: {{ $transporter->name }}

</x-mail::message>
