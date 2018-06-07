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
                                    <th>Naam</th>
                                    <th><a class="text-success" href="{{ route('todos.create') }}">Aanmaken</a></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($todos as $todo)
                                <tr class="">
                                    <td>{{ $todo->id }}</td>
                                    <td>{{ $todo->name }}</td>
                                    <td>
                                        <a class="text-primary px-2" href="{{ route('todos.show', $todo->id) }}">Open</a>                                
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
    