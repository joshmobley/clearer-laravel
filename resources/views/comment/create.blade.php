@extends('spark::layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-11 col-md-9">
        <div class="card card-default">
            <div class="card-header">
            <form method="POST" action="/idea/{{ $idea->id }}/comment/">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="question">Comment:</label>
                        <input type="text" class="form-control" id="text" name="text" />
                    </div>

                    <input class="btn btn-primary" type="submit" value="Save" />

                </form>
            </div>
        </div>
    </div>
</div>
@endsection