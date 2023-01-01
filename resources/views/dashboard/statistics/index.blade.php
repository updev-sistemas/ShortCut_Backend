@extends('layouts.dashboard',['menu' => 'statistic'])
@section('STYLE')

@endsection
@section('CONTENT')

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Estatistica de acessos</h6>
                        <a href="{{ route('statistic.create') }}" class="btn bg-gradient-dark" style="float:right;margin-top:-40px;margin-right: 20px;">Novo</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container-fluid">
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('SCRIPT')

@endsection
