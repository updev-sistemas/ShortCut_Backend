@extends('layouts.dashboard',['menu' => 'link'])
@section('STYLE')

@endsection
@section('CONTENT')

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Novo Link</h6>
                        <a href="{{ route('link.index') }}" class="btn bg-gradient-dark" style="float:right;margin-top:-40px;margin-right: 20px;">Retornar</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                <form method="post" action="{{ route('link.store') }}" role="form" class="text-start">
                                    @csrf

                                    <div class="row">
                                        <div class="input-group input-group-outline my-3  focused is-focused @error('store_id') is-invalid @enderror">
                                            <label class="form-label">Loja*</label>
                                            <select class="form-control" name="store_id" id="store" >
                                                <option style="background: #1a2035;color: #fff;" selected value="{{ encrypt('1') }}">Sem Categoria (Opcional)</option>
                                                @foreach ($stores as $key => $obj)
                                                    @if ($obj->id != 1)
                                                    <option style="background: #1a2035;color: #fff;" value="{{ encrypt($obj->id) }}">{{ $obj->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('store_id')
                                    <div class="row">
                                        <span class="text-danger"><small>{{ $message }}</small></span>
                                    </div>
                                    @enderror

                                    <div class="row">
                                        <div class="input-group input-group-outline my-3 focused is-focused @error('category_id') is-invalid @enderror">
                                            <label class="form-label">Categoria</label>
                                            <select class="form-control" name="category_id" id="category">
                                                <option style="background: #1a2035;color: #fff;" selected value="{{ encrypt('1') }}">Sem Loja (Opcional)</option>
                                                @foreach ($categories as $key => $obj)
                                                    @if ($obj->id != 1)
                                                    <option style="background: #1a2035;color: #fff;" value="{{ encrypt($obj->id) }}">{{ $obj->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('category_id')
                                    <div class="row">
                                        <span class="text-danger"><small>{{ $message }}</small></span>
                                    </div>
                                    @enderror

                                    <div class="row">
                                        <div class="input-group input-group-outline my-3 @error('url') focused is-focused @enderror">
                                            <label class="form-label">Url</label>
                                            <input type="url" name="url" value="{{ old('url','') }}" class="form-control @error('url') is-invalid @enderror" required />
                                        </div>
                                    </div>
                                    @error('url')
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
