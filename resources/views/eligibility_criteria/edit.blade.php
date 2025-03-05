@extends("layouts.app")

@section('content')
<div class="container">
    <h2>{{ isset($eligibilityCriteria)?"Edit Eligibility Criteria":"Create new Eligibility Criteria"}}</h2>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action="{{ route('eligibility-criteria.update',$eligibilityCriteria->id)}} " method="POSt">

        @csrf
        @if (isset($eligibilityCriteria))
            @method("PUT")
        @endif
        <div class="mb-3">
            <label class="form-label">Criteria Name</label>
            <input type="text" name="name" class="form-control" value="{{isset($eligibilityCriteria)?$eligibilityCriteria->name:''}}" required>
        </div>
        <div class="row">
            <div class=" col-md-6 mb-3">
                <label class="form-label">Age greter than</label>
                <input type="number" name="age_greater_than" class="form-control" value="{{isset($eligibilityCriteria)?$eligibilityCriteria->age_greater_than:''}}" required>
            </div>
            <div class=" col-md-6 mb-3">
                <label class="form-label">Age Less than</label>
                <input type="number" name="age_less_than" class="form-control" value="{{isset($eligibilityCriteria)?$eligibilityCriteria->age_less_than:''}}" required>
            </div>
        </div>
        <div class="row">
            <div class=" col-md-6 mb-3">
                <label class="form-label">Income greter than</label>
                <input type="number" name="income_greater_than" class="form-control" value="{{isset($eligibilityCriteria)?$eligibilityCriteria->income_greater_than:''}}" required>
            </div>
            <div class=" col-md-6 mb-3">
                <label class="form-label">Income Less than</label>
                <input type="number" name="income_less_than" class="form-control" value="{{isset($eligibilityCriteria)?$eligibilityCriteria->income_less_than:''}}" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Last login dayys</label>
            <input type="number" name="price" class="form-control" value="{{isset($eligibilityCriteria)?$eligibilityCriteria->last_login_days_ago:''}}" required>
        </div>
        <div class="mb-3">
            <br>
            <button type="submit" class="btn btn-primary">{{isset($eligibilityCriteria)?'Update ':'Create'}}</button>
        </div>
    </form>
</div>
@endsection