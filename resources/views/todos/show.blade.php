@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        #{{ $todo->id }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $todo->name }}</h5>
                        <p class="card-text"><b>{{ $todo->description }}</b></p>                               
                        <a class="text-success mr-2" href="{{ route('todos.edit', $todo->id) }}">Bewerken</a>
                        <a class="text-danger" onclick="openModal(event, this);" href="{{ route('todos.destroy', $todo->id) }}">Verwijder</a>
                        <p class="card-text float-right"><small class="text-muted">Bijgewerkt op: {{ $todo->updated_at }}</small></p>
                    </div>
                </div>
                <p><a class="btn btn-primary mt-4" href="{{ route('todos.index') }}">Terug</a></p>
            </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="text-center">Weet je zeker dat je deze todo wilt verwijderen?</p>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Nee</button>
                            </div>
                            <div class="col-md-6">
                                <form method="post" id="deleteForm">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-block" type="submit">Ja</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function openModal(e, el){
            e.preventDefault();
            var href = el.href;
            $("#deleteForm").attr("action", href);
            $(".modal").modal("show");
        }
    </script>
@endsection