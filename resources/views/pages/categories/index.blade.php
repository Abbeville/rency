@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Category List</h4>
                    <p class="mb-0">Use category list as to describe your overall core business from the provided list. <br>
                    Click the name of the category where you want to add a list item. .</p>
                </div>
                <a href="page-add-category.html" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Category</a>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
            <table class="data-table table mb-0 tbl-server-info">
                <thead class="bg-white text-uppercase">
                    <tr class="ligth ligth-data">
                        <th>
                            <div class="checkbox d-inline-block">
                                {{-- <input type="checkbox" class="checkbox-input" id="checkbox1"> --}}
                                <label for="checkbox1" class="mb-0"></label>
                            </div>
                        </th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="ligth-body">
                    @foreach ($categories as $category)
                    <tr>
                        <td>
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" class="checkbox-input" id="checkbox2">
                                <label for="checkbox2" class="mb-0"></label>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    {{  ucwords($category['name']) }}
                                    {{-- <p class="mb-0"><small>This is test Product</small></p> --}}
                                </div>
                            </div>
                        </td>
                        <td>{{ $category['type'] }}</td>
                        <td>
                            <div class="d-flex align-items-center list-action">
                                {{-- <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Order"
                                        href="#"><i class="ri-eye-line mr-0"></i></a> --}}
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="{{ route('categories.edit', $category['id']) }}"><i class="ri-pencil-line mr-0"></i></a>
                                    <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                        href="{{ route('categories.destroy', $category['id']) }}"><i class="ri-delete-bin-line mr-0"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection