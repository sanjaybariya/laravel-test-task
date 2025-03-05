@extends("layouts.app")

@section('content')
<div class="container">
    <h2>Plans Listing</h2>
    <a href="{{ route('plans.create') }}" class="btn btn-primary">Create New Plan
        </a>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th >ID</th>
                <th >Name</th>
                <th >Price</th>
                <th >Acctions </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plans as $plan)
            <tr>
                <td>{{ $plan->id }}</td>
                <td>{{ $plan->name }}</td>  
                <td>{{ $plan->price }}</td>
                <td>
                    <a href="{{route('plans.edit',$plan)}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('plans.destroy',$plan)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">Delete</button>
                    </form>
                </td>
            @endforeach
        </tbody>

    </table>
    <div>
        {{ $plans->links() }}
    </div>
</div>
@endsection