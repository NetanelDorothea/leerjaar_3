@extends('layouts.app')

@section('title', 'Customer List')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customer List</h1>
        </div>
    </div>



    <div class="row">
        <div class="col-12">
            <form action="customers" method="POST">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name='name' value='{{old('name')}}' class="form-control">
                    <div>{{ $errors->first('name') }}</div>
                </div>


                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name='email' value='{{old('email')}}' class="form-control">
                    <div>{{ $errors->first('email') }}</div>
                </div>

                <div class="form-group">
                    <lable for="active">Status</lable>
                    <select name="active" id="active" class="form-control">
                        <option value="" disabled>select customer status</option>
                        <option value="1">active</option>
                        <option value="0">Inactive</option>

                    </select>
                </div>

                <div class="form-group">
                    <lable for="company_id">Company</lable>
                    <select name="company_id" id="company_id" class="form-control">
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Customer</button>
            </form>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-6">
            <h3>Active customers</h3>
            <ul>
                @foreach ($activeCustomers as $activeCustomer)
                    <li>{{ $activeCustomer->name }} <span class="text-muted">({{ $activeCustomer->company->name }}
                            )</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-6">
            <h3>Inactive customers</h3>
            <ul>
                @foreach ($inactiveCustomers as $inactiveCustomer)
                    <li>{{ $inactiveCustomer->name }} <span class="text-muted">({{ $inactiveCustomer->company->name }}
                            )</span></li>
                @endforeach
            </ul>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-12">
            @foreach($companies as $company)
                <h3>{{$company->name}}</h3>

                <ul>
                    @foreach($company->customers as $customer)
                        <li>{{$customer->name}} ({{$customer->active}})</li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>
@endsection

