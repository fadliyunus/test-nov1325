<x-app-layout>



    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> <a href={{ route('guru.create') }}
                                    class="btn btn-block bg-gradient-primary">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIP</th>
                                        <th>Nama Guru</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Usia</th>
                                        <th>No. Telepon</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($guru as $key => $g)
                                        <tr>
                                            <td>{{ $key + 1 }}.</td>
                                            <td>{{ $g->nip }}</td>
                                            <td>{{ $g->nm_guru }}</td>
                                            <td>{{ $g->jns_kelamin }}</td>
                                            <td>{{ $g->nm_matapelajaran }}</td>
                                            <td>{{ $g->usia }}</td>
                                            <td>{{ $g->no_telp }}</td>
                                            <td>{{ $g->alamat }}</td>

                                            <td>
                                                <a href="{{ route('guru.edit', $g->id) }}"
                                                    class="btn bg-gradient-secondary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form id="delete-form-{{ $g->id }}"
                                                    action="{{ route('guru.destroy', $g->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button class="btn bg-gradient-danger"
                                                    onclick="deleteById({{ $g->id }})"><i
                                                        class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    @push('title')
        <title>{{ $title }}</title>
    @endpush


    @push('after-styles')
        <link rel="stylesheet" href={{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
        <link rel="stylesheet" href={{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
        <link rel="stylesheet" href={{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href={{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}>
    @endpush


    @push('after-scripts')
        <!-- DataTables & Plugins -->
        <script src={{ asset('plugins/datatables/jquery.dataTables.min.js') }}></script>
        <script src={{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}></script>
        <script src={{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}></script>
        <script src={{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}></script>
        <script src={{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}></script>
        <script src={{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}></script>
        <script src={{ asset('plugins/jszip/jszip.min.js') }}></script>
        <script src={{ asset('plugins/pdfmake/pdfmake.min.js') }}></script>
        <script src={{ asset('plugins/pdfmake/vfs_fonts.js') }}></script>
        <script src={{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}></script>
        <script src={{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}></script>
        <script src={{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}></script>
        <!-- SweetAlert2 -->
        <script src={{ asset('plugins/sweetalert2/sweetalert2.min.js') }}></script>
        <!-- Toastr -->
        {{-- <script src={{ asset('plugins/toastr/toastr.min.js') }}></script> --}}

        <script>
            $(function() {
                // Initialize SweetAlert2 with Toast options
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                // Check if there is a success session message
                @if (session()->has('success'))
                    Toast.fire({
                        icon: 'success',
                        title: '{{ session('success') }}' // Output the success message
                    });
                @endif

                // Check if there is an error session message (optional)
                @if (session()->has('error'))
                    Toast.fire({
                        icon: 'error',
                        title: '{{ session('error') }}'
                    });
                @endif
            });

            // Fungsi delete
            function deleteById(id) {
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Ingin menghapus data {{ $title }} ini",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya  , hapus!',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            }

            // Data Table
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
    @endpush
</x-app-layout>
