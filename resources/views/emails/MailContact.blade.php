<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
</head>
<body>
        <h1>Missatge de {{$details['nom']}}</h1>
        <h4>Informació client</h4>
        <p>Nom : {{$details['nom']}}</p>
        <p>Cognom : {{$details['cognom']}}</p>
        <p>Correu : {{$details['correu']}}</p>
        <h4>Missatge client</h4>
        <p>Missatge : {{$details['missatge']}}</p>
    
</body>
</html>