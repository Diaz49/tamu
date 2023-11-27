@extends('components.main')
@section('title-content')
    Data Tamu
@endsection
@section('breadcrumbs')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="/dashboard"> Dashboard </a></li>
        <li class="breadcrumb-item text-sm text-dark active"><a class="opacity-5 text-dark" href="/data-tamu"> Daftar Tamu </a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page"> Tamu </li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Data Tamu</h6>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
      <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Tambah Data Tamu</h6>
              </div>
          </div>
          <div class="card-body px-0 pb-2">
            <main class="form-Tamu">
              <form action="/tamu" method="post">
                @csrf
                <div class="mb-3 col-md-6" style="padding-left: 20px; padding-right: 20px;">
                  <label for="inputNamaTamu" class="form-label"> Nama Tamu </label>
                    <div class="col-auto">
                      <input id="nama_tamu" type="text" name="namaTamu" class="form-control rounded-3"
                        maxlength="20">
                    </div>
                </div>
                <div class="mb-3 col-md-6" style="padding-left: 20px; padding-right: 20px;">
                  <label for="inputAlamat" class="form-label">Alamat Tamu atau Asal Instansi Tamu </label>
                  <div class="input-g">
                    <input id="input_alamat" type="text" name="alamatTamu"  class="form-control"
                      >
                  </div>
                </div>
              
                  
                <div class="mb-3" style="padding-left: 20px; padding-right: 20px;">
                      <label class="col-form-label"> Bertujuan Bertemu Dengan Siapa </label>
                      <div class="row g-3 py-1 px-4">
                        <div class="col-md-3">
                          <select id="opsi_tujuan" name="Opsi" class="form-select " aria-label="Default select example">
                            <option value="kepala sekolah">Kepala Sekolah</option>
                            <option value="wakil kepala sekolah">Wakil Kepala Sekolah</option>
                            <option value="guru">Guru</option>
                            <option value="siswa">Siswa</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <select id="opsi_lanjutan" name="Opsi_Lanjutan" class="form-select col-md-3" aria-label="Default select example">
                            {{-- <optgroup label="wakil_kepala_sekolah">
                              <option value=""></option>
                            </optgroup>
                            <optgroup label="guru">
                              <option value="mipa">MIPA</option>
                              <option value="ips">IPS</option>
                            </optgroup> --}}
                          </select>
                        </div>
                      </div>
                  <div class="col-auto">
                  <span class="form-text">
                      ( Kedatangan Tamu bertujuan menemui siapa )
                    </span> 
                    </div>
                </div>

                  <div lass="mb-3" style="padding-left: 20px; padding-right: 20px;">
                    <label for="exampleFormControlTextarea1" class="form-label fs-6">Keterangan</label>
                    <div class="form-floating mb-3" > 
                        <textarea class="form-control" name="keteranganTamu" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px"  ></textarea>
                        <label for="floatingTextarea" style="color:darkgrey" > Jelaskan tujuan anda datang </label>
                    </div>
                  </div>
                  <div class="card-footer d-flex justify-content-end" style="gap: 10px">
                    <Input type='submit' onclick="return confirm('apakah anda yakin data sudah benar ?')"
                    value="Kirim" class="btn btn-primary" >
                  </div>
              </form>
            </main>
          </div>
      </div>
  </div>
</div>
<script>
  document.getElementById('opsi_tujuan').addEventListener('change',function() {
    let opsi_tujuan = this.value;
    let opsi_lanjutan_dropdown = document.getElementById('opsi_lanjutan');

    //hapus opsi lanjutan yang ada sebelumnya
    opsi_lanjutan_dropdown.innerHTML = '';

    //Menentukan pilihan opsi lanjutan berdasarkan opsi tujuan yang di pilih
    if (opsi_tujuan === 'wakil kepala sekolah') {
      addOptionsToDropdown(opsi_lanjutan_dropdown, ['Wakases', 'Seketaris', 'Wakases Pembelajaran']);
    } else if (opsi_tujuan === 'guru') {
      addOptionsToDropdown(opsi_lanjutan_dropdown, ['Guru Matematika', 'GURU MIPA', 'Guru IPS', 'PKN']);
    }
  });
  //fungsi untuk menambahkan opsi ke dropdown opsi lanjutan 
  function addOptionsToDropdown(dropdown, options) {
    options.forEach(function(option) {
      let optionElement = document.createElement('option');
      optionElement.value = option.toLowerCase().replace(' ', ''); //set nilai tanpa spasi
      optionElement.text = option;
      dropdown.appendChild(optionElement);
    });
  }
</script>
@endsection
