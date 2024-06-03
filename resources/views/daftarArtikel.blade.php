@extends('templateDonaturRelawan')

@section('title', 'Home Donatur Relawan')

@section('stylesheets')
    @parent
@endsection

@section('content')
<div class="daftarForum-top">
    <h6 id="daftarForumTitle">Daftar Forum</h6>
</div>

<a href="" class="text-decoration-none text-dark">
    <div class="card w-60" id="forum-cards">
        <div class="card-body">
            <div class="card-top">
                <h5 class="card-title" id="judulForum">judul artikel</h5>
            </div>
                <p class="card-text">deskripsi artikel</p>
        </div>
    </div>
</a>
@endsection



