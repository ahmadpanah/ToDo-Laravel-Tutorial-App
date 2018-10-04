@extends('app')

@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $errors)
        <li>{{ $errors }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Create Todo</h1>
            </div>
            <div class="card-body">
                <form action="{{url('todo')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="control-label">Todo</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">List Todo</h1>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Option</th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($todos as $todo)
                        <tr>
                            <td>{{ $todo -> name }}</td>
                            <td>
                                <form action="{{ url ('/todo/'. $todo->id) }}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
