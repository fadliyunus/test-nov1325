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
                  <form action="{{ route('kelas.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="nm_kelas">Nama Kelas</label><span style="color:red;font-weight:bold">*</span>
                            <input type="text" name="nm_kelas" class="form-control @error('nm_kelas') is-invalid
                            @enderror" placeholder="Masukkan Nama Kelas">
                            @error('nm_kelas')
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
                              <label for="siswa_id">Siswa</label><span style="color:red;font-weight:bold">*</span>
                              <select class="form-control @error('siswa_id') is-invalid @enderror" name="siswa_id" id="siswa_id">
                                <option value="">--- Pilih Siswa ---</option>
                                $@foreach ($siswa as $s)

                                <option value="{{ $s->id }}">{{ $s->nm_siswa }}</option>
                                @endforeach


                              </select>
                              @error('siswa_id')
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
                              <label for="guru_id">Guru</label><span style="color:red;font-weight:bold">*</span>
                              <select class="form-control @error('guru_id') is-invalid @enderror" name="guru_id" id="guru_id">
                                <option value="">--- Pilih Guru ---</option>
                                $@foreach ($guru as $g)

                                <option value="{{ $g->id }}">{{ $g->nm_guru }}</option>
                                @endforeach


                              </select>
                              @error('guru_id')
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
