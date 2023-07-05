@extends('template.main')

@section('container')

<div class="page-header">
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

    <h3 class="app-page-title"> Data Kitab </h3>
    <div class="app-card app-card-accordion shadow-sm mb-4">
        <div class="app-card-header p-4 pb-2  border-0">
            <form action="/bab" method="post">
                @csrf
                <div class="col-auto mb-2">
                    <input type="number" id="bab" name="bab" class="form-control" placeholder="Masukkan BAB">
                </div>
                <button type="submit" class="btn app-btn-primary mb-3">
                    Tambah Bab
                </button>
            </form>
        </div>
        <div class="app-card app-card-accordion shadow-sm mb-4">
            <div class="app-card-body p-4 pt-0">
                <div class="row g-4">
                    @foreach ($babs as $bab)
                    <div class="col-3 mb-3">
                            <a href="kitab/{{ $bab->id_bab }}" class="m-0 p-0">
                            <div class="app-card app-card-stat shadow-sm h-100">
                                <div class="app-card-body p-3">
                                    <h4 class="stats-type mb-1"><a href="kitab/{{ $bab->id_bab }}">BAB {{ $bab->bab }}</a></h4>
                                    <p class="stats-type truncate mb-0 text-black">
                                        @if ($bab->kitabs_count > 1)
                                            {{ $bab->kitabs_count }}
                                        @else
                                            0
                                        @endif
                                        Soal
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
