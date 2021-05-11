@extends('layouts.body')

@section('content')
<div class="card centered">
    <form method="post" action="{{ route('store') }}">
        @csrf
        <div class="card-content">
          <div class="content">
            <h2 class="title is-3 has-text-centered">Isi Format</h2>
            <div class="message is-primary">
                <div class="message-body">
                    Isi dengan format :
                    <br>
                    <strong>#nama#kelompok#bilangan</strong>
                    <br> <br>
                    Jika ingin memasukkan lebih dari 1 data, pisahkan dengan koma (,) :
                    <br>
                    <strong>#nama#kelompok#bilangan, #nama#kelompok#bilangan</strong>
                </div>
            </div>
            <textarea class="textarea is-primary" placeholder="Masukkan Data" name="catatan">{{old('catatan')}}</textarea>
            <div class="buttons is-centered">
                <a href="{{route('index')}}" class="button is-info mt-4 is-centered">Kembali</a>
                <button class="button is-primary mt-4 is-centered">Input Data</button>
              </div>
          </div>
        </div>
    </form>
  </div>
@endsection
