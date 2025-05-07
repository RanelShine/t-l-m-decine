@component('mail::message')
# Rendez-vous confirmé

Bonjour {{ $rv->patient->user->nom }},

Votre rendez-vous du **{{ $rv->date_rendezvous->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($rv->heure)->format('H:i') }}** est confirmé.

Cliquez sur le bouton ci-dessous pour rejoindre la consultation Zoom :

@component('mail::button', ['url' => $rv->zoom_link])
Rejoindre la réunion Zoom
@endcomponent

À bientôt,<br>
L’équipe
@endcomponent
