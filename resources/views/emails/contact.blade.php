<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle demande de contact</title>
</head>
<body style="margin:0; padding:0; background:#f5efe3; font-family:Arial, sans-serif; color:#17130d;">
<div style="max-width:680px; margin:0 auto; padding:32px;">
    <div style="background:#fffaf1; border:1px solid #e8d7a1; border-radius:24px; padding:28px;">
        <p style="margin:0 0 10px; color:#a7782d; text-transform:uppercase; letter-spacing:2px; font-size:12px; font-weight:bold;">
            Chatterie du Diamant Sauvage
        </p>

        <h1 style="margin:0 0 24px; font-size:32px;">
            Nouvelle demande de contact
        </h1>

        <p><strong>Nom :</strong> {{ $data['name'] }}</p>
        <p><strong>Email :</strong> {{ $data['email'] }}</p>

        @if(!empty($data['phone']))
            <p><strong>Téléphone :</strong> {{ $data['phone'] }}</p>
        @endif

        @if(!empty($data['preference']))
            <p><strong>Préférence :</strong> {{ $data['preference'] }}</p>
        @endif

        @if(!empty($data['subject']))
            <p><strong>Sujet :</strong> {{ $data['subject'] }}</p>
        @endif

        <div style="margin-top:24px; padding:20px; background:#f5efe3; border-radius:18px;">
            <p style="margin:0 0 8px; color:#a7782d; text-transform:uppercase; letter-spacing:1.5px; font-size:11px; font-weight:bold;">
                Message
            </p>

            <p style="margin:0; line-height:1.7; white-space:pre-line;">
                {{ $data['message'] }}
            </p>
        </div>
    </div>
</div>
</body>
</html>
