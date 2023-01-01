@extends('layouts.dashboard',['menu' => 'user'])
@section('STYLE')

@endsection
@section('CONTENT')

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Lista de Administradores</h6>
                        <a href="{{ route('user.create') }}" class="btn bg-gradient-dark" style="float:right;margin-top:-40px;margin-right: 20px;">Novo</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ultimo Acesso</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($collection->sortBy('name') as $key => $target)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $target->name }}</p>
                                                <p class="text-xs text-secondary mb-0">Administrador</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $target->email }}</p>
                                                <p class="text-xs text-secondary mb-0">Confirmado</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $target->created_at->format('d/m/Y \à\s H:i:s') }}</span>
                                            </td>
                                            <td class="align-middle">
                                                @if ($target->id != 1)
                                                <p class="text-center">
                                                    <a href="{{ route('user.edit',['id' => encrypt($target->id)]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Editar usuário">Editar</a>
                                                </p>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

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
