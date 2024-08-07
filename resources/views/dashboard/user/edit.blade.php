@extends('layouts.dashboard',['menu' => 'user'])
@section('STYLE')

@endsection
@section('CONTENT')

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Editar {{ $target->name }}</h6>
                        <a href="{{ route('user.index') }}" class="btn bg-gradient-dark" style="float:right;margin-top:-40px;margin-right: 20px;">Retornar</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                <form method="post" action="{{ route('user.update',['id' => encrypt($target->id)]) }}" role="form" class="text-start">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="input-group input-group-outline my-3 focused is-focused @error('name') focused is-focused @enderror">
                                            <label class="form-label">Nome</label>
                                            <input type="text" name="name" value="{{ old('name',$target->name) }}" class="form-control @error('name') is-invalid @enderror" required />
                                        </div>
                                    </div>
                                    @error('name')
                                    <div class="row">
                                        <span class="text-danger"><small>{{ $message }}</small></span>
                                    </div>
                                    @enderror
                                    <div class="row">
                                        <div class="input-group input-group-outline my-3 focused is-focused @error('email') focused is-focused @enderror">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" value="{{ old('email',$target->email) }}" class="form-control @error('email') is-invalid @enderror" required />
                                        </div>
                                    </div>
                                    @error('email')
                                    <div class="row">
                                        <span class="text-danger"><small>{{ $message }}</small></span>
                                    </div>
                                    @enderror
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary">Registrar</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('SCRIPT')

@endsection
