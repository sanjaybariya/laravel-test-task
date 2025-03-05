@extends("layouts.app")

@section('content')
<div class="container">
    <h2>Eligibility Criteria Listing</h2>
    <a href="{{ route('eligibility-criteria.create') }}" class="btn btn-primary">Create New Plan
        </a>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th >ID</th>
                <th >Name</th>
                <th >Age (Min - Max )</th>
                <th >Income (Min - Max )</th>
                <th >Last Login (Days ago)</th>
                <th >Actions </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eligiblityCritera as $critera)
            <tr>
                <td>{{ $critera->id }}</td>
                <td>{{ $critera->name }}</td>  
                <td>
                    {{$critera->age_greater_than ?? 'N/A'}} - {{$critera->age_less_than ?? 'N/A'}}
                </td>
                <td>
                    {{ number_format($critera->income_greater_than,2) ?? 'N/A' }} - {{ number_format($critera->income_less_than,2) ?? 'N/A' }}
                </td>
                <td>
                    {{$critera->last_login_days_ago ?? 'N/A' }}
                </td>
                <td>
                    <a href="{{route('eligibility-criteria.edit',$critera)}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('eligibility-criteria.destroy',$critera)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">Delete</button>
                    </form>
                </td>
            @endforeach
        </tbody>

    </table>
    {{ $eligiblityCritera->links() }}
</div>
@endsection