@extends('employee.layout')
 
@section('content')
    <div class="row mt-4 mb-4">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tutorial CRUD Laravel - SolusiKoding</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employee.create') }}"> Create New Employee</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employee as $item)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <form action="{{ route('employee.destroy',$item->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('employee.edit',$item->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $employee->links() !!}
      
@endsection