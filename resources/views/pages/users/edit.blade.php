@extends('layouts.master')

@section('content')
<div class="container-fluid add-form-list">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit {{ $user['name'] }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user['id']) }}" method="POST" data-toggle="validator" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row"> 
                            <div class="col-md-6">                      
                                <div class="form-group">
                                    <label>First Name *</label>
                                    <input type="text" value="{{ $user['first_name'] }}" name="first_name" class="form-control" placeholder="Enter FIrst Name" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>    
                            <div class="col-md-6">                      
                                <div class="form-group">
                                    <label>Last Name *</label>
                                    <input type="text" value="{{ $user['last_name'] }}" name="last_name" class="form-control" placeholder="Enter Last Name" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" value="{{ $user['phone'] }}" name="phone" class="form-control" placeholder="Enter Phone No" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="text" value="{{ $user['email'] }}" name="email" class="form-control" placeholder="Enter Email" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div> 
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="type" name="" class="selectpicker form-control" data-style="py-0">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>  --}}
                            <div class="col-md-12">                      
                                <div class="form-group">
                                    <label>User Name *</label>
                                    <input type="text" value="{{ $user['username'] }}" name="username" class="form-control" placeholder="Enter User Name" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">                      
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control" placeholder="Enter Password" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>  
                            <div class="col-md-6">                      
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Confirm Password" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role *</label>
                                    <select name="owner" class="selectpicker form-control" data-style="py-0">
                                        <option value="1" {{ $user['owner'] ? 'selected' : 'null' }}>Administrator</option>
                                        <option value="0" {{ !$user['owner'] ? 'selected' : 'null' }}>Attendance</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control image-file" name="photo" accept="image/*">
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