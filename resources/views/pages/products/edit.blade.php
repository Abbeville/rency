@extends('layouts.master')

@section('content')

<div class="container-fluid add-form-list">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit {{ $product['name'] }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product['id']) }}" method="POST" data-toggle="validator" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Category *</label>
                                    <select name="category_id" class="selectpicker form-control" data-style="py-0" required>
                                        <option selected disabled>Select an Option</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $product['category_id'] == $category->id ? 'selected' : null }}>{{ ucwords($category->name) }}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>  
                            <div class="col-md-6">                      
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="text" value="{{ $product['name'] }}" name="name" class="form-control" placeholder="Enter Name" data-errors="Please Enter Name." required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" value="{{ $product['code'] }}" name="code" class="form-control" placeholder="Enter Code" data-errors="Please Enter Code.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Price *</label>
                                    <input type="text" value="{{ $product['price'] }}" name="price" class="form-control" placeholder="Enter Price" data-errors="Please Enter Price." required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">                                    
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" value="{{ $product['stock'] }}" name="stock" class="form-control" placeholder="Enter Quantity in Stock">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control image-file" name="image" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description / Product Details</label>
                                    <textarea class="form-control" rows="4" name="description">{{ $product['description'] }}</textarea>
                                </div>
                            </div>
                        </div>                            
                        <button type="submit" class="btn btn-primary mr-2">Add Product</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page end  -->
    
@endsection