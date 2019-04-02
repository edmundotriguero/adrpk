
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h4>finalizo contrato</h4><br/>
    <h1>{{$contract->client->name}} </h1>
    <h5>{{"Desde: ".$contract->start_date." - Hasta:".$contract->end_date}}</h5>
    <p>
    @foreach ($contract->products as $product)
        <h5>{{$product->name}},</h5>
    @endforeach
    </p>
</body>
</html>