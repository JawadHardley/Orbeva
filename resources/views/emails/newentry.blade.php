<x-mail::message>
    # Hi

    New entry just arrived in our system

    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
