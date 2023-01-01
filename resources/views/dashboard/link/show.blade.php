@extends('layouts.dashboard',['menu' => 'link'])
@section('STYLE')

@endsection
@section('CONTENT')

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Link encurtado
                            <a href="#" id="btn-copy-shortcut" data-shortcut="{{ $target->shortcut }}"><span class="material-icons opacity-10 material-symbols-outlined">content_copy</span></a>
                        </h6>
                        <a href="{{ route('link.index') }}" class="btn bg-gradient-dark" style="float:right;margin-top:-40px;margin-right: 20px;">Retornar</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div role="form" class="text-start">
                                    <div class="row">
                                        <div class="input-group input-group-outline my-3  focused is-focused">
                                            <label class="form-label">Loja*</label>
                                            <input type="text" value="{{ $target->store_name }}" class="form-control" readonly />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-group input-group-outline my-3 focused is-focused">
                                            <label class="form-label">Categoria</label>
                                            <input type="text" value="{{ $target->category_name }}" class="form-control" readonly />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-group input-group-outline my-3 focused is-focused">
                                            <label class="form-label">Url</label>
                                            <input type="text" value="{{ $target->url }}" class="form-control" readonly />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-group input-group-outline my-3 focused is-focused">
                                            <label class="form-label">Url Curta</label>
                                            <input type="text" value="{{ $target->shortcut }}" class="form-control" readonly />
                                        </div>
                                    </div>
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
    <script type="text/javascript">
        $(function(){
            $('#btn-copy-shortcut').click(function(){
                let shortcut = $(this).data('shortcut');
                navigator.clipboard.writeText(shortcut);
            });
        });
    </script>
@endsection
