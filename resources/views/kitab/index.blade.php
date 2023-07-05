@extends('template.main')

@section('container')

<h2 class="app-page-title">Data Kitab</h2>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="app-card app-card-accordion shadow-sm mb-4">
    <div class="app-card-header p-4 pb-2  border-0">
       <h4 class="app-card-title">BAB 1</h4>
       <a type="button" href="/kitab/create/{{ $bab->id_bab }}" class="btn app-btn-primary mt-3">
        Tambah Soal
        </a>
    </div><!--//app-card-header-->
    <div class="app-card-body p-4 pt-0">
        <div id="faq1-accordion" class="faq1-accordion faq-accordion accordion">
            @foreach ($kitab as $data)
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq1-heading-1">
                  <button class="accordion-button btn btn-link" type="button" data-bs-toggle="collapse"  data-bs-target="#{{ $data->id_kitab }}" aria-expanded="false" aria-controls="faq1-1">
                    {{ $data->soal }}?
                  </button>
                </h2>
                <div id="{{ $data->id_kitab }}" class="accordion-collapse collapse border-0" aria-labelledby="faq1-heading-1">
                    <div class="accordion-body text-start p4">
                        <div class="btn-group">
                            <a href="/kitab/edit/{{ $data->id_kitab }}" class="btn btn-primary text-white "><i class="fa fa-pencil"></i> Ubah</a>
                            <form action="/delete/kitab" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $data->id_kitab }}" id="id_kitab" name="id_kitab">
                                <button type="submit" class="btn btn-danger text-white" onclick="return confirm('Apakah anda menyetujui ?')"><i class="fa fa-trash"></i> Hapus</button>
                            </form>

                        </div>
                        <br>
                        <strong>Kitab : </strong> {{ $data->judul_kitab }} 
                        <br>
                        <strong>Jawaban : </strong>{{ $data->jawaban }}
                        <br>
                        <i>Dibuat : {{ $data->created_at }}</i>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
