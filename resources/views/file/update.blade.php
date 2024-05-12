@extends('layouts.app')
@section('content')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">File</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">File/Update</li>
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
                            <h5 class="card-title">Upload File</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('file.update', $file->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <!-- Use PUT method for updating the resource -->

                                @if ($errors->any())
                                    <div>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label for="fileName" class="form-label">File Name</label>
                                    <input type="text" class="form-control" id="fileName" name="fileName" value="{{ $file->fileName }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="file" class="form-label">Choose File</label>
                                    <input type="file" class="form-control" id="file" name="file" @if(!$file->file) required @endif>
                                    @if($file->file)
                                        <small class="text-muted">Current file: {{ $file->file }}</small>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="fileDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="fileDescription" name="fileDescription" required>{{ $file->fileDescription }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>

                        </div>
                    </div>
            </footer>
        </div>
    </div>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
@endsection
