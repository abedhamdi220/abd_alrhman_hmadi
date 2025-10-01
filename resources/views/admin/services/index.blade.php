
@extends('layouts.admin')

@section('title', 'Services Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Services Management</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Provider</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($services as $service)
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ Str::limit($service->description, 50) }}</td>
                                        <td>{{ $service->provider->name ?? '-' }}</td>
                                        <td>{{ $service->category->name ?? '-' }}</td>
                                        <td>${{ number_format($service->price, 2) }}</td>
                                        <td>
                                            <form action="{{ route('services.update-status', $service) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                    @foreach(['pending', 'approved', 'rejected', 'active', 'inactive'] as $status)
                                                        <option value="{{ $status }}" @if($service->status === $status) selected @endif>
                                                            {{ ucfirst($status) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('services.show', $service) }}" class="btn btn-sm btn-primary">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No services found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

