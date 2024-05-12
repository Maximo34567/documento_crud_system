@extends('layouts.app')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Client</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Client/View</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Client List
                </div>
                <div class="card-body">
                    <table id="clientTable" class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td>
                                    <div class="avatar avatar-md" style="width: 75px; height: 75px;">
                                        <img src="{{ asset('images/'.$client->image) }}" class="rounded-circle" alt="Client Image" style="width: 100%; height: 100%;">
                                    </div>
                                </td>
                                <td>{{ $client->clientName }}</td>
                                <td>{{ $client->clientDescription }}</td>
                                <td>{{ $client->clientType}}</td>
                                <td>
                                    <div style="display: flex; gap: 5px;">
                                        <a href="{{ route('client.update', $client->id) }}" class="btn btn-success" style="padding: 5px 10px;">Edit</a>
                                        <form action="{{ route('client.destroy', $client->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="padding: 5px 10px;">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
@endsection
