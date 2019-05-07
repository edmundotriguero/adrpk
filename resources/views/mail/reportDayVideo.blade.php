
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h4>finalizo tiempo de video</h4><br/>
    <h1>{{$video->contract->client->name}} </h1>
    <h5>{{$video->name}} </h5>
    <h5>{{"Desde: ".$video->start_date." - Hasta:".$video->end_date}}</h5>
    <p>
    Aqui colocar los comentarios
    </p>
</body>
</html>