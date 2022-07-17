@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{--
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="" class="btn btn-primary"><i class="fa-brands fa-google"></i> Daftar akun menggunakan Google</a>
                    
                </div>
            </div>
            --}}
            <div class="card text-center">
  <div class="card-header">
    Pendaftaran
  </div>
  <div class="card-body">
    <h5 class="card-title">Proses lebibh cepat</h5>
    <p class="card-text">Gunakan dan sambungkan akun Google anda untuk pendataran yang lebih cepat</p>
    <a href="{{route('google')}}" class="btn btn-primary"><i class="fa-brands fa-google"></i> Daftar akun menggunakan Google</a>
  </div>

</div>
        </div>
    </div>
</div>
@endsection
