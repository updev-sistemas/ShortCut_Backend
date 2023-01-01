@extends('layouts.auth')
@section('CONTENT')

    <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Autenticação</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="post" role="form" class="text-start">
                        @csrf
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                            @error('email')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Senha</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Iniciar Sessão</button>
                        </div>
                        <p class="mt-4 text-sm text-center">
                            <a href="{{ route('password.request') }}" class="text-primary text-gradient font-weight-bold">Recuperar Senha</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
