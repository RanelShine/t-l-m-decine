<!DOCTYPE html>
<html>
<head>
    <title>Rendez-vous confirmé</title>
</head>
<body>
    <p>Bonjour Dr {{ $rendezvous->medecin->user->name }},</p>

    <p>Un rendez-vous a été confirmé avec le patient {{ $rendezvous->patient->user->name }}.</p>

    <p><strong>Date :</strong> {{ $rendezvous->date_rendezvous->format('d/m/Y') }}</p>
    <p><strong>Heure :</strong> {{ $rendezvous->heure }}</p>
    <p><strong>Motif :</strong> {{ $rendezvous->motif }}</p>

    <p><strong>Lien Zoom :</strong> <a href="{{ $rendezvous->zoom_link }}">{{ $rendezvous->zoom_link }}</a></p>

    <p>Cordialement,<br>L'équipe de gestion des rendez-vous</p>
</body>
</html>
