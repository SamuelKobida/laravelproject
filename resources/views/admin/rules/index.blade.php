@extends('layouts.admin')

@section('content')

    <table>
        <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                Názov pravidla
            </th>
            <th>
                Vkladaná hodnota
            </th>
            <th>
                Kurierska služba
            </th>
            <th>
                Eshop
            </th>
            <th>
                Subject
            </th>
            <th>
                Predicate
            </th>
            <th>
                <button><a href="{{ route('rules.create') }}">Pridať pravidlo</a></button>
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($rules as $rule)
            <tr>

                <td>{{ $rule->id }}</td>
                <td>{{ $rule->name }}</td>
                <td>{{ $rule->value }}</td>
                <td>{{ $carrier_service[$rule->carrier_service_id-1]->name}}</td>
                <td>{{ $eshop[$rule->eshop_id-1]->name}}</td>
                <td>{{ $subject[$rule->subject_id-1]->name }}</td>
                <td>{{ $predicate[$rule->predicate_id-1]->name }}</td>
                <td><button><a href="{{ route('rules.delete', ['id' => $rule->id]) }}">Vymazať</a></button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
