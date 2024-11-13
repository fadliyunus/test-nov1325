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
                  <form action="{{ route('guru.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="nip">Nip Guru</label><span style="color:red;font-weight:bold">*</span>
                            <input type="text" name="nip" class="form-control @error('nip') is-invalid
                            @enderror" placeholder="Masukkan Nip">
                            @error('nip')
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
                          <label for="nm_guru">Nama Guru</label><span style="color:red;font-weight:bold">*</span>
                          <input type="text" name="nm_guru" class="form-control @error('nm_guru') is-invalid
                          @enderror" placeholder="Masukkan Nama Guru">
                          @error('nm_guru')
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
                              <label for="jns_kelamin">Jenis Kelamin</label><span style="color:red;font-weight:bold">*</span>
                              <select class="form-control @error('parent') is-invalid @enderror" name="jns_kelamin" id="jns_kelamin">
                                <option value="">--- Pilih Jenis Kelamin ---</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>

                              </select>
                              @error('jns_kelamin')
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
                                $@foreach ($mata_pelajaran as $m)

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
                            <label for="usia">Usia</label><span style="color:red;font-weight:bold">*</span>
                            <input type="text" name="usia" class="form-control @error('usia') is-invalid
                            @enderror" placeholder="Masukkan Usia">
                            @error('usia')
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
                            <label for="no_telp">No Telepon</label><span style="color:red;font-weight:bold">*</span>
                            <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid
                            @enderror" placeholder="Masukkan Nomor Telepon">
                            @error('no_telp')
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
                            <label for="alamat">Alamat</label><span style="color:red;font-weight:bold">*</span>
                            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid
                            @enderror" placeholder="Masukkan Alamat">
                            @error('alamat')
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
