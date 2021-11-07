@extends('layouts.admin')

@section('content')

    <form method="post" action="{{ route('rules.store') }}" enctype="multipart/form-data">

        <input type="text" name="name" placeholder="Názov pravidla"><br>
        <input type="text" name="value" placeholder="Vkladaná hodnota"><br>

        <select type="text" name="carrier_service_id">
            <option value="">Vybrať kuriérsku službu</option>
            @foreach($carrier_services as $carrier_service)
                <option value="{{ $carrier_service->id }}">{{ $carrier_service->name }}</option>
            @endforeach
        </select><br>

        <select type="text" name="eshop_id">
            <option value="">Vybrať eshop</option>
            @foreach($eshops as $eshop)
                <option value="{{ $eshop->id }}">{{ $eshop->name }}</option>
            @endforeach
        </select><br>

        <select type="text" name="subject_id">
            <option value="">Vybrať subject</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select><br>

        <select type="text" name="predicate_id">
            <option value="">Vybrať predikát</option>
            @foreach($predicates as $predicate)
                <option value="{{ $predicate->id }}">{{ $predicate->name }}</option>
            @endforeach
        </select><br>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" value="Ulozit">

    </form>
@endsection
