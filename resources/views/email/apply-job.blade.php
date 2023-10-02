<x-mail::message>
    # {{ __('Dear :companyName,', ['companyName' => $companyName]) }}

    {{ $presentation }}

    {{ __('Best regards,') }}
    {{ config('app.name') }}
</x-mail::message>
