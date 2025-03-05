@extends("layouts.app")

@section('content')
<div class="container">
    <h2>{{ isset($comboPlan)?"Edit Plan":"Create new plan"}}</h2>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('combo-plans.update',$comboPlan->id)}}" method="POSt">
        @csrf
        @if (isset($comboPlan))
            @method("PUT")
        @endif
        <div class="mb-3">
            <label class="form-label">Combo Plan Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Combo plan name" value="{{isset($comboPlan)?$comboPlan->name:''}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control" placeholder="Enter Price " step="0.01" value="{{isset($comboPlan)?$comboPlan->price:''}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Select Included Plans</label>
            <select name="plans[]" class="form-control"multiple required>
                @foreach ( $plans as $plan )
                    <option value="{{$plan->id}}"
                        @if(in_array($plan->id,$comboPlan->plans->pluck('id')->toArray())) selected @endif>
                        {{$plan->name}} ({{number_format($plan->price,2)}})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">

            <button type="submit" class="btn btn-primary">Update Combo Plan</button>
            <a href="{{route('combo-plans.index')}}" class="btn btn-info">cancel</a>
        </div>
    </form>
</div>
@endsection