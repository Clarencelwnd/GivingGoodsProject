@extends('generalPageDonaturRelawan/templateDonaturRelawan')

@section('title', 'Detail Panti Sosial')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/daftarKegiatan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/pagination.css') }}">
    <script src="{{ asset('js/daftarKegiatan.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="panti-sosial-detail">
        <div class="panti-sosial-header">
            <h2>{{ $pantiSosial->NamaPantiSosial }}</h2>
            <p>{{ $pantiSosial->Alamat }}</p>
        </div>

        <div class="panti-sosial-activities">
        </div>
    </div>
@endsection

@section('pagination')
    <div class="pagination-container">
        {{ $activities->links('components.pagination') }}
    </div>
@endsection


