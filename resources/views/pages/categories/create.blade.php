@extends('layouts.master')

@section('content')
<div class="container-fluid add-form-list">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add Category</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST" data-toggle="validator">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category *</label>
                                    <select name="category_id" class="selectpicker form-control" data-style="py-0" required>
                                        <option selected disabled>Select an Option</option>
                                            <option value="product">Product</option>
                                            <option value="service">Service</option>
                                    </select>
                                </div> 
                            </div>  
                            <div class="col-md-6">                      
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="text"  name="name" class="form-control" placeholder="Enter Name" data-errors="Please Enter Name." required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>    
                        </div>                            
                        <button type="submit" class="btn btn-primary mr-2">Add Category</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page end  -->
</div>
@endsection