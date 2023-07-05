@extends('template.main')

@section('container')

<div class="page-header">
    <h3 class="app-page-title"> Edit Data Kitab </h3>
    <div class="app-card app-card-accordion shadow-sm mb-4">
        <div class="app-card app-card-accordion shadow-sm mb-4">
            <div class="app-card-body p-4">
                <div class="col-auto">
                    <form action="/kitab/{{ $kitab->id_kitab }}" method="POST">
                        @csrf
                        <input type="hidden" name="bab_id" id="bab_id" value="{{ $kitab->bab_id }}">
                        <input type="hidden" name="id_kitab" id="id_kitab" value="{{ $kitab->id_kitab }}">
                        <div class="col-auto mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">BAB</label>
                                <input type="text" disabled class="form-control" value="BAB {{ $kitab->bab->bab }}">
                            </div>
                        </div>
                        <div class="col-auto mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Nama Kitab</label>
                                <input value="{{ $kitab->judul_kitab }}" type="text" id="nama_kitab" name="nama_kitab" class="form-control" placeholder="Masukkan Nama Kitab">
                            </div>
                        </div>
                        <div class="col-auto mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Soal</label>
                                <textarea name="soal" id="soal" class="form-control" rows="5" placeholder="Masukkan Soal">{{ $kitab->soal }}</textarea>
                            </div>
                        </div>
                        <div class="col-auto mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Jawaban</label>
                                <textarea name="jawaban" id="jawaban" class="form-control" rows="3" placeholder="Masukkan Jawaban">{{ $kitab->jawaban }}</textarea>
                            </div>
                        </div>
                        <div class="row g-2 justify-content-start justify-content-md-start align-items-center">
                            <div class="col-auto">
                                <button class="btn app-btn-primary">
                                    ubah
                                </button>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-warning text-white" href="/kitab/{{ $kitab->bab_id }}">
                                    BATAL
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
