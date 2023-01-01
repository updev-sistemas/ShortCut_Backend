<?php

namespace App\Http\Controllers\Dashboard;

use App\Domains\Contracts\Repositories\IDbContext;
use App\Http\Requests\Store\StoreCreateRequest;
use App\Http\Requests\Store\StoreUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function __construct(IDbContext $context)
    {
        parent::__construct($context);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = $this->db->store()->getAll();
        return view('dashboard.store.index', ['collection' => $collection]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.store.create');
    }

    /**
     * @param StoreCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCreateRequest $request)
    {
        try
        {
            $target = $request->transform();
            $this->db->store()->save($target);

            $this->flashSuccess('Loja registrada.');

            return redirect()->route('store.create');
        }
        catch (\Exception $ex)
        {
            $this->flashError($ex->getMessage());
            logger($ex->getMessage());
            return redirect()->route('store.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $target = $this->db->store()->find($id);
        if ($target == null)
        {
            $this->flashWarning('Não foi possível localizar a loja solicitada');
            return redirect()->route('store.index');
        }

        return view('dashboard.store.show',['target' => $target]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $target = $this->db->store()->find($id);

        if ($target == null)
        {
            $this->flashWarning('Não foi possível localizar a loja solicitada');
            return redirect()->route('store.index');
        }

        return view('dashboard.store.edit', ['target' => $target]);
    }

    /**
     * @param StoreUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreUpdateRequest $request, $id)
    {
        try
        {
            $target = $request->transform();
            $this->db->store()->patch($id, $target);

            $this->flashSuccess('Dados atualizados com sucesso.');
            return redirect()->route('store.index');
        }
        catch (\Exception $ex)
        {
            logger($ex->getMessage());
            $this->flashError($ex->getMessage());
            return redirect()->route('store.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
