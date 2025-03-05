@extends("layouts.app")

@section('content')
<div class="container">
    <h2>{{ isset($plan)?"Edit Plan":"Create new plan"}}</h2>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ isset($plan)?route('plans.update',$plan->id):route('plans.store')}}" method="POSt">
        @csrf
        @if (isset($plan))
            @method("PUT")
        @endif
        <div class="mb-3">
            <label class="form-label">Plan Name</label>
            <input type="text" name="name" class="form-control" value="{{isset($plan)?$plan->name:''}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control" value="{{isset($plan)?$plan->price:''}}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{isset($plan)?'Update Plan':'Create Plan'}}</button>
    </form>
</div>
@endsection