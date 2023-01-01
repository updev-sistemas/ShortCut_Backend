<?php

namespace App\Http\Controllers\Dashboard;

use App\Domains\Contracts\Repositories\IDbContext;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
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
        $collection = $this->db->category()->getAll();
        return view('dashboard.category.index', ['collection' => $collection]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
    }


    public function store(CategoryCreateRequest $request)
    {
        try
        {
            $target = $request->transform();
            $this->db->category()->save($target);

            $this->flashSuccess('Categoria registrada.');

            return redirect()->route('category.create');
        }
        catch (\Exception $ex)
        {
            $this->flashError($ex->getMessage());
            logger($ex->getMessage());
            return redirect()->route('category.index');
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
        $target = $this->db->category()->find($id);
        if ($target == null)
        {
            $this->flashWarning('Não foi possível localizar a categoria solicitada');
            return redirect()->route('category.index');
        }

        return view('dashboard.category.show',['target' => $target]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $target = $this->db->category()->find($id);

        if ($target == null)
        {
            $this->flashWarning('Não foi possível localizar a categoria solicitada');
            return redirect()->route('category.index');
        }

        return view('dashboard.category.edit', ['target' => $target]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        try
        {
            $target = $request->transform();
            $this->db->category()->patch($id, $target);

            $this->flashSuccess('Dados atualizados com sucesso.');
            return redirect()->route('category.index');
        }
        catch (\Exception $ex)
        {
            logger($ex->getMessage());
            $this->flashError($ex->getMessage());
            return redirect()->route('category.index');
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
