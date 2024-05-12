@extends('layouts.app')
@section('content')

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">File</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">File/View</li>
                    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            File List
        </div>
        <div class="card-body">
            <table id="fileTable" class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Path</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($files as $file)
                        <tr>
                            <td>{{ $file->fileName }}</td>
                            <td>{{ $file->filePath }}</td>
                            <td>{{ $file->fileDescription }}</td>
                            <td>
                                <div style="display: flex; gap: 5px;">  <a href="{{ route('file.update', $file->id) }}" class="btn btn-success" style="padding: 5px 10px;">Edit</a>
                                    <form action="{{ route('file.destroy', $file->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="padding: 5px 10px;">Delete</button>
                                    </form>
                                    <a href="{{ route('file.download',$file->file) }}" class="btn btn-primary" style="padding: 5px 10px;">Download</a>
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
