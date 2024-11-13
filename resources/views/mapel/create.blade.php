<x-app-layout>

    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Tambah {{ $title }}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/categories">{{ $title }}</a></li>
                <li class="breadcrumb-item active">Tambah {{ $title }}</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="container-fluid">
              <!-- general form elements disabled -->
              <div class="card card-warning">
                <!-- <div class="card-header">
                  <h3 class="card-title">General Elements</h3>
                </div> -->
                <div class="card-body">
                  <form action="{{ route('mapel.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="nm_matapelajaran">Nama Mata Pelajaran</label><span style="color:red;font-weight:bold">*</span>
                            <input type="text" name="nm_matapelajaran" class="form-control @error('nm_matapelajaran') is-invalid
                            @enderror" placeholder="Masukkan Mata Pelajaran">
                            @error('nm_matapelajaran')
                            <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                          </div>
                            @enderror
                          </div>
                        </div>
                      </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="jurusan">Jurusan</label><span style="color:red;font-weight:bold">*</span>
                          <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid
                          @enderror" placeholder="Masukkan Jurusan">
                          @error('jurusan')
                          <div class="invalid-feedback" style="display: block">
                          {{ $message }}
                        </div>
                          @enderror
                        </div>
                      </div>
                    </div>




                </div>




                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
              </div>
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>


      @push('title')

      <title>Tambah {{ $title }}</title>

      @endpush


</x-app-layout>
