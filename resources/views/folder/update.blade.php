@extends('layouts.app')
@section('content')

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Folder</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Folder/Update</li>
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
                            <h5 class="card-title">Upload Folder</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('folder.edit', $folder->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

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
                                    <label for="folderName" class="form-label">Folder Name</label>
                                    <input type="text" class="form-control" id="folderName" name="folderName" value="{{ $folder->folderName }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="folderDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="folderDescription" name="folderDescription" value="{{ $folder->folderDescription }}" required>{{ $folder->folderDescription }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
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
