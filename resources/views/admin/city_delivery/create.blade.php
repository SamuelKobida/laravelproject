@extends('layouts.admin')

@section('content')

    <form method="post" action="{{ route('city_deliveries.store') }}" enctype="multipart/form-data">

        <select type="text" name="city_id">
            <option value="">Vybrať mesto</option>
            @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select><br>

        <select type="text" name="delivery_id">
            <option value="">Vybrať donáškovu službu</option>
            @foreach($deliveries as $delivery)
                <option value="{{ $delivery->id }}">{{ $delivery->name }}</option>
            @endforeach
        </select><br>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" value="Ulozit">

    </form>
@endsection
