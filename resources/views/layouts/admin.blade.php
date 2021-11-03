<!DOCTYPE html>
<html>
<head>
    <title>Admin LaravelProject</title>
</head>
<body>
Nadupane admin rozhranie
<button><a href="{{ route('city_deliveries.index') }}">Vypis pravidel</a></button>
<button><a href="{{ route('city_deliveries.create') }}">Vytvor pravidlo</a></button>
@yield("content")

</body>
</html>
