@extends('layouts.master')

@section('content')

<div class="container-fluid add-form-list">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add {{ $customer['fullname'] }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('customers.update', $customer['id']) }}" method="POST" data-toggle="validator">
                        @csrf
                        @method('PUT')
                        <div class="row"> 
                            <div class="col-md-6">                      
                                <div class="form-group">
                                    <label>Full Name *</label>
                                    <input type="text" value="{{ $customer['fullname']}}" name="fullname" class="form-control" placeholder="Enter FIrst Name" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" value="{{ $customer['phone'] }}" name="phone" class="form-control" placeholder="Enter Phone No" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="text" value="{{ $customer['email'] }}" name="email" class="form-control" placeholder="Enter Email" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="sex" class="selectpicker form-control" data-style="py-0">
                                        <option value="male" {{ $customer['sex'] == 'male' ? 'selected' : null }}>Male</option>
                                        <option value="female" {{ $customer['sex'] == 'female' ? 'selected' : null }}>Female</option>
                                    </select>
                                </div>
                            </div> 
                            {{-- <div class="col-md-12">
                               <div class="checkbox d-inline-block mb-3">
                                    <input type="checkbox" class="checkbox-input mr-2" id="checkbox1" checked="">
                                    <label for="checkbox1">Notify User by Email</label>
                                </div>
                            </div>                                --}}
                        </div>                            
                        <button type="submit" class="btn btn-primary mr-2">Add Customer</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page end  -->
</div>
    
@endsection