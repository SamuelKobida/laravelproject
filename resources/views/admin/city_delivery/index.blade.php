@extends('layouts.admin')

@section('content')

    <table>
        <thead>
        <tr>
            <th>
                ID;
            </th>
            <th>
                ID CITY;
            </th>
            <th>
                ID DELIVERY SLUZBY;
            </th>
            <th>
              <!--  <button><a href="{ route('categories.create') }}">Pridať kategoriu</a></button> -->
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($city_deliveries as $city_delivery)
            <tr>
                <td>{{ $city_delivery->id }}</td>
                <td>{{ $city_delivery->city_id }}</td>
                <td>{{ $city_delivery->delivery_id }}</td>
            <!--<td><button><a href="{ route('categories.edit', ['id' => $category->id]) }}">Edit</a></button></td>
                <td><button><a href="{ route('categories.delete', ['id' => $category->id]) }}">Delete</a></button></td> -->
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
