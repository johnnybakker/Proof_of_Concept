@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table bg-white">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titel</th>
                                    <th>Start datum/tijd</th>
                                    <th>Eind datum/tijd</th>
                                    <th>Adres</th>
                                    <th>Postcode</th>
                                    <th>Plaats</th>
                                    <th><a class="text-success" href="{{ route('appointments.create') }}">Aanmaken</a></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($appointments as $appointment)
                                <tr class="">
                                    <td>{{ $appointment->id }}</td>
                                    <td>{{ $appointment->title }}</td>
                                    <td>{{ $appointment->start_datetime }}</td>
                                    <td>{{ $appointment->end_datetime }}</td>
                                    <td>{{ $appointment->address }}</td>
                                    <td>{{ $appointment->zipcode }}</td>
                                    <td>{{ $appointment->city }}</td>
                                    <td>
                                        <a class="text-primary px-2" href="{{ route('appointments.show', $appointment->id) }}">Open</a>                                
                                    </td>
                                <tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    