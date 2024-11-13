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
                  <form action="{{ route('jadwal.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="hari">Hari</label><span style="color:red;font-weight:bold">*</span>
                            <input type="text" name="hari" class="form-control @error('hari') is-invalid
                            @enderror" placeholder="Masukkan Hari">
                            @error('hari')
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
                              <label for="kelas_id">Kelas</label><span style="color:red;font-weight:bold">*</span>
                              <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id" id="kelas_id">
                                <option value="">--- Pilih Kelas ---</option>
                                $@foreach ($kelas as $k)

                                <option value="{{ $k->id }}">{{ $k->nm_kelas }}</option>
                                @endforeach


                              </select>
                              @error('kelas_id')
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
                              <label for="mpelajaran_id">Mata Pelajaran</label><span style="color:red;font-weight:bold">*</span>
                              <select class="form-control @error('mpelajaran_id') is-invalid @enderror" name="mpelajaran_id" id="mpelajaran_id">
                                <option value="">--- Pilih Mata Pelajaran ---</option>
                                $@foreach ($mapel as $m)

                                <option value="{{ $m->id }}">{{ $m->nm_matapelajaran }}</option>
                                @endforeach


                              </select>
                              @error('mpelajaran_id')
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
                            <label for="jam">Jam</label><span style="color:red;font-weight:bold">*</span>
                            <input type="time" name="jam" class="form-control @error('jam') is-invalid @enderror" placeholder="Masukkan Jam">
                            @error('jam')
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
