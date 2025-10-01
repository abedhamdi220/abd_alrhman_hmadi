
@extends('layouts.admin')

@section('title', 'Service Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Service Details</h3>
                    <a href="{{ route('services.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Services
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(isset($service))
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $service->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $service->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $service->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td>${{ number_format($service->price, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Provider</th>
                                        <td>{{ $service->provider->name ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{ $service->category->name ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <form action="{{ route('', $service) }}" method="POST">
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
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $service->created_at->format('Y-m-d H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ $service->updated_at->format('Y-m-d H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning text-center">
                            Service not found.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
