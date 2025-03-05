@extends("layouts.app")

@section('content')
<div class="container">
    <h2>{{ isset($eligiblityCritera)?"Edit Eligibility Criteria":"Create new Eligibility Criteria"}}</h2>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ isset($eligiblityCritera)?route('plans.update'):route('eligibility-criteria.store')}}" method="POSt">
        @csrf
        @if (isset($eligiblityCritera))
            @method("PUT")
        @endif
        <div class="mb-3">
            <label class="form-label">Criteria Name</label>
            <input type="text" name="name" class="form-control" value="{{isset($eligiblityCritera)?$eligiblityCritera->name:''}}" required>
        </div>
        <div class="row">
            <div class=" col-md-6 mb-3">
                <label class="form-label">Age greter than</label>
                <input type="number" name="age_greater_than" class="form-control" value="{{isset($eligiblityCritera)?$eligiblityCritera->age_greater_than:''}}" required>
            </div>
            <div class=" col-md-6 mb-3">
                <label class="form-label">Age Less than</label>
                <input type="number" name="age_less_than" class="form-control" value="{{isset($eligiblityCritera)?$eligiblityCritera->age_less_than:''}}" required>
            </div>
        </div>
        <div class="row">
            <div class=" col-md-6 mb-3">
                <label class="form-label">Income greter than</label>
                <input type="number" name="income_greater_than" class="form-control" value="{{isset($eligiblityCritera)?$eligiblityCritera->income_greater_than:''}}" required>
            </div>
            <div class=" col-md-6 mb-3">
                <label class="form-label">Income Less than</label>
                <input type="number" name="income_less_than" class="form-control" value="{{isset($eligiblityCritera)?$eligiblityCritera->income_less_than:''}}" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Last login days</label>
            <input type="number" name="price" class="form-control" value="{{isset($eligiblityCritera)?$eligiblityCritera->last_login_days_ago:''}}" required>
        </div>
        <div class="mb-3">
            <br>
            <button type="submit" class="btn btn-primary">{{isset($eligiblityCritera)?'Update Plan':'Create'}}</button>
        </div>
    </form>
</div>
@endsection