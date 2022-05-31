@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">User List</h4>
                    <p class="mb-0">A dashboard provides you an overview of user list with access to the most important data,<br>
                     functions and controls. </p>
                </div>
                <a href="{{ route('users.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add User</a>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="ligth-body">
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="checkbox d-inline-block">
                                    <input type="checkbox" class="checkbox-input" id="checkbox2">
                                    <label for="checkbox2" class="mb-0"></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $user['photo'] }}" class="img-fluid rounded avatar-50 mr-3" alt="image">
                                    <div>
                                        {{ $user['name'] }}
                                        {{-- <p class="mb-0"><small>{{ $user['description'] }}</small></p> --}}
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['phone'] }}</td>
                            <td>{{ $user['owner'] == 1 ? 'Administrator' : 'Attendance' }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    {{-- <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Order"
                                        href="#"><i class="ri-eye-line mr-0"></i></a> --}}
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="{{ route('users.edit', $user['id']) }}"><i class="ri-pencil-line mr-0"></i></a>
                                    <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                        href="{{ route('users.destroy', $user['id']) }}"><i class="ri-delete-bin-line mr-0"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <!-- Page end  -->
</div>
@endsection