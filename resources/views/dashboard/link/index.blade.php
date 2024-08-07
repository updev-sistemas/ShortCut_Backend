@extends('layouts.dashboard',['menu' => 'link'])
@section('STYLE')

@endsection
@section('CONTENT')

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Lista de Lojas</h6>
                        <a href="{{ route('link.create') }}" class="btn bg-gradient-dark" style="float:right;margin-top:-40px;margin-right: 20px;">Novo</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link Curto</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Categoria</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Loja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($collection->sortBy('name') as $key => $target)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <a href="#" class="btn-copy-shortcut" data-shortcut="{{ $target->shortcut }}"><span class="material-icons opacity-10 material-symbols-outlined">content_copy</span></a>
                                                    {{ $target->shortcut }}
                                                </p>
                                            </td>
                                            <td><p class="text-xs font-weight-bold mb-0">{{ $target->url ?? '' }}</p></td>
                                            <td><p class="text-xs font-weight-bold mb-0">{{ $target->category_name ?? '' }}</p></td>
                                            <td><p class="text-xs font-weight-bold mb-0">{{ $target->store_name ?? '' }}</p></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4">{!! $collection->links() !!}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('SCRIPT')
    <script type="text/javascript">
        $(function(){
            $('.btn-delete').click(function(){

                let target = $(this).data('target');

                if (confirm('Remover o Link?'))
                {
                    $(target).submit();
                }
            });

            $('.btn-copy-shortcut').click(function(){
                let shortcut = $(this).data('shortcut');
                navigator.clipboard.writeText(shortcut);
            });
        });
    </script>
@endsection
