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
                  <form action="{{ route('siswa.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="nis">NIS</label><span style="color:red;font-weight:bold">*</span>
                            <input type="text" name="nis" value="{{ $siswa->nis }}" class="form-control @error('nis') is-invalid
                            @enderror" placeholder="Masukkan Nis">
                            @error('nis')
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
                          <label for="nm_siswa">Nama Siswa</label><span style="color:red;font-weight:bold">*</span>
                          <input type="text" name="nm_siswa" value="{{ $siswa->nm_siswa }}" class="form-control @error('nm_siswa') is-invalid
                          @enderror" placeholder="Masukkan Nama Siswa">
                          @error('nm_siswa')
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
                                <select class="form-control @error('jns_kelamin') is-invalid @enderror" name="jns_kelamin" id="jns_kelamin">
                                    <option value="">--- Pilih Jenis Kelamin ---</option>
                                    <option value="Laki-Laki" {{ old('jns_kelamin', $siswa->jns_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ old('jns_kelamin', $siswa->jns_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
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
                                <label for="tgl_lahir">Tanggal Lahir</label><span style="color:red;font-weight:bold">*</span>
                                <input type="date" name="tgl_lahir" value="{{ $siswa->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir') }}" placeholder="Masukkan Tanggal Lahir">
                                @error('tgl_lahir')
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
                            <label for="agama">Agama</label><span style="color:red;font-weight:bold">*</span>
                            <input type="text" name="agama" value="{{ $siswa->agama }}" class="form-control @error('agama') is-invalid
                            @enderror" placeholder="Masukkan Agama">
                            @error('agama')
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
                            <label for="nm_ayah">Nama Ayah</label><span style="color:red;font-weight:bold">*</span>
                            <input type="text" name="nm_ayah" value="{{ $siswa->nm_ayah }}" class="form-control @error('nm_ayah') is-invalid
                            @enderror" placeholder="Masukkan Nama Ayah">
                            @error('nm_ayah')
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
                            <label for="nm_ibu">Nama Ibu</label><span style="color:red;font-weight:bold">*</span>
                            <input type="text" name="nm_ibu" value="{{ $siswa->nm_ibu }}" class="form-control @error('nm_ibu') is-invalid
                            @enderror" placeholder="Masukkan Nama Ibu">
                            @error('nm_ibu')
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
                            <input type="text" name="usia" value="{{ $siswa->usia }}" class="form-control @error('usia') is-invalid
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
                            <label for="alamat">Alamat</label><span style="color:red;font-weight:bold">*</span>
                            <input type="text" name="alamat" value="{{ $siswa->alamat }}" class="form-control @error('alamat') is-invalid
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
