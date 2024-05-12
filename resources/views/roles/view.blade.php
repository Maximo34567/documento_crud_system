@extends('layouts.app')
@section('content')

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Roles</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Roles/View</li>
                    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Roles List
        </div>
        <div class="card-body">
            <table id="rolesTable" class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roless as $roles)
                        <tr>
                            <td>{{ $roles->rolesName }}</td>
                            <td>{{ $roles->rolesDescription }}</td>
                            <td>
                                <div style="display: flex; gap: 5px;">  <a href="{{ route('roles.update', $roles->id) }}" class="btn btn-success" style="padding: 5px 10px;">Edit</a>
                                    <form action="{{ route('roles.destroy', $roles->id) }}" method="POST" class="d-inline">
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
