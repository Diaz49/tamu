@extends('components.main')
@section('breadcrumbs')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="/humas/tamu">Kerjasama</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Data Kerjasama</h6>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit Data Kerjasama</h6>
                    </div>
                </div>
                @php
                    // $alamat_array = explode(',', $guru->alamat);
                    // while (count($alamat_array) < 5) {
                    //     $alamat_array[] = '';
                    // }
                    $form_input = [
                        'id' => $mou->id,
                        'name' => $mou->nama_mitra,
                        'asal' => $mou->asal_mitra,
                        'tujuan' => $mou->Deskripsi_singkat_mitra,
                        'tanggal_mulai_kerjasama'=>$mou->tanggal_mulai_kerjasama,
                        'tanggal_berakhir_kerjasama'=>$mou->tanggal_berakhir_kerjasama,
                        'PT_Mitra'=>$mou->PT_Mitra,
                        'tujuan_mitra' => $mou->tujuan_mitra,
                       
                    ];
                    foreach ($form_input as $key => $input_value) {
                        if (old($key) && old($key) != '') {
                            $form_input[$key] = old($key);
                        }
                    }
                @endphp
                <div class="card-body px-0 pb-2">
                    <form action="/humas/edit-data-kerjasama{{ $mou->id }}" class="row g-3 py-1 px-4" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label for="nip" class="form-label">id</label>
                            <div class="input-group">
                                <input id="id" type="text" onkeypress="return hanyaAngka(event)" id="id"
                                    class="form-control rounded-3" pattern="[0-9]{16}" maxlength="16" required
                                    value="{{ $form_input['id'] }}" {{ $errors->has('id') ? 'autofocus="true"' : '' }}
                                    readonly disabled>
                            </div>
                            @if ($errors->has('id'))
                                <span class="text-danger">{{ $errors->first('id') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="nama">Nama Mitra</label>
                            <div class="input-group">
                                <input type="text" name="nama" class="form-control" id="nama" value="{{ $mou->nama }}" required>
                                    {{ $errors->has('nama') ? 'autofocus="true"' : '' }}>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="asal">Asal Mitra atau Instansi</label>
                            <div class="input-group">
                                <input type="text" name="asal_mitra" class="form-control rounded-3" id="asal" required
                                    value="{{ $form_input['asal_mitra'] }}"
                                    {{ $errors->has('asal_mitra') ? 'autofocus="true"' : '' }}>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="deskripsi_singkat_mitra">Deskripsi singkat Mitra</label>
                            <div class="input-group">
                                <input type="text" name="deskripsi_singkat_mitra" class="form-control rounded-3" id="asal" required
                                    value="{{ $form_input['deskripsi_singkat_mitra'] }}"
                                    {{ $errors->has('deskripsi_singkat_mitra') ? 'autofocus="true"' : '' }}>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="tanggal_mulai_kerjasama">Tanggal Mulai Kerjasama</label>
                            <div class="input-group">
                                <input type="text" name="tanggal_mulai_kerjasama" class="form-control rounded-3" id="asal" required
                                    value="{{ $form_input['tanggal_mulai_kerjasama'] }}"
                                    {{ $errors->has('tanggal_mulai_kerjasama') ? 'autofocus="true"' : '' }}>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="tanggal-berakhir_kerjasama">Tanggal Berakhir Kerjasama</label>
                            <div class="input-group">
                                <input type="text" name="tanggal-berakhir_kerjasama" class="form-control rounded-3" id="asal" required
                                    value="{{ $form_input['tanggal-berakhir_kerjasama'] }}"
                                    {{ $errors->has('tanggal-berakhir_kerjasama') ? 'autofocus="true"' : '' }}>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="asal">PT Mitra</label>
                            <div class="input-group">
                                <input type="text" name="PT_Mitra" class="form-control rounded-3" id="asal" required
                                    value="{{ $form_input['PT_Mitra'] }}"
                                    {{ $errors->has('PT_Mitra') ? 'autofocus="true"' : '' }}>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="tujuan_mitra">Tujuan Mitra</label>
                            <div class="input-group">
                                <input type="text" name="tujuan_mitra" class="form-control rounded-3" id="keterangan"
                                    {{-- required disabled value="{{ $form_input['keterangan'] }}" --}}
                                    {{ $errors->has('keterangan') ? 'autofocus="true"' : '' }}>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end" style="gap: 10px">
                            <a href="/tamu" type="button" class="btn btn-danger text-sm rounded-3"
                                style="margin-bottom: 0;">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" onclick="return confirm('Apakah anda yakin data sudah benar?')"
                                class="btn btn-primary text-sm rounded-3 mr-2" style="margin-bottom: 0;">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>
@endsection
{{-- footer --}}
