@extends('layouts.app')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Client</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Client/Update</li>
            </ol>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Update Client</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('client.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            <label for="clientName" class="form-label">Client Name</label>
                            <input type="text" class="form-control" id="clientName" name="clientName" value="{{ $client->clientName }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="clientDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="clientDescription" name="clientDescription" required>{{ $client->clientDescription }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="clientType" class="form-label">Client Type</label>
                            <input type="text" class="form-control" id="clientType" name="clientType" value="{{ $client->clientType }}" required>
                        </div>

                        <div class="mb-3">
                            <img src="{{ asset('images/'.$client->image) }}" alt="Client Image" style="max-width: 100px;">
                            <input type="file" name="image" accept="image/*" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $client->username }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Documento &copy; 2024</div>
            </div>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>

@endsection
