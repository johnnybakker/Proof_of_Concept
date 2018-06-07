@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Todo aanmaken</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form name="todo" action="{{ route('todos.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="naam">Naam</label>
                        <input type="text" class="form-control" name="name" id="naam" placeholder="Naam"></input>
                    </div>
                    <div class="form-group">
                        <label for="description">Omschrijving</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Omschrijving"></textarea>
                    </div>
                    <a href="{{ route('todos.index') }}" class="btn btn-primary mr-2">Terug</a><input type="submit" name="submit" class="btn btn-success" value="Aanmaken" />
                </form>
            </div>
        </div>
    </div>
@endsection