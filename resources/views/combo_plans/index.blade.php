@extends("layouts.app")

@section('content')
<div class="container">
    <h2>Combo Plans Listing</h2>
    <a href="{{ route('combo-plans.create') }}" class="btn btn-primary">Create New Combo  Plan
        </a>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th >ID</th>
                <th >Name</th>
                <th >Price</th>
                <th >Included Plans</th>
                <th >Acctions </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comboPlans as $comboPlan)
            <tr>
                <td>{{ $comboPlan->id }}</td>
                <td>{{ $comboPlan->name }}</td>  
                <td>{{ number_format($comboPlan->price,2)  }}</td>
                <td>
                    @foreach ($comboPlan->plans as $plan )
                        <span class="badge-bg-info"> {{$plan->name}} ({{ number_format($plan->price,2) }})  </span>
                    @endforeach
                </td>
                <td>
                    <a href="{{route('combo-plans.edit',$comboPlan)}}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('combo-plans.destroy',$comboPlan)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">Delete</button>
                    </form>
                </td>
              
            @endforeach
        </tbody>

    </table>
</div>
@endsection