<?php

namespace App\Http\Controllers\Dashboard;

use App\Domains\Contracts\Repositories\IDbContext;
use App\Http\Requests\Link\LinkCreateRequest;
use App\Http\Requests\Link\LinkUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
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
    public function index(Request $request)
    {
        $currentPage = $request->get('page',1);
        $collection = $this->db->link()->query($currentPage,10, []);

        return view('dashboard.link.index', ['collection' => $collection]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = $this->db->store()->getBySelectList();
        $categories = $this->db->category()->getBySelectList();

        return view('dashboard.link.create',['stores' => $stores, 'categories' => $categories]);
    }


    /**
     * @param LinkCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LinkCreateRequest $request)
    {
        try
        {
            $target = $request->transform();


            $this->db->link()->save($target);

            $this->flashSuccess('Link registrado.');

            return redirect()->route('link.create');
        }
        catch (\Exception $ex)
        {
            $this->flashError($ex->getMessage());
            logger($ex->getMessage());
            return redirect()->route('link.index');
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
        $target = $this->db->link()->find($id);
        if ($target == null)
        {
            $this->flashWarning('Não foi possível localizar o link solicitado');
            return redirect()->route('link.index');
        }

        return view('dashboard.link.show',['target' => $target]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $target = $this->db->link()->find($id);

        if ($target == null)
        {
            $this->flashWarning('Não foi possível localizar o link solicitado');
            return redirect()->route('link.index');
        }

        return view('dashboard.link.edit', ['target' => $target]);
    }

    /**
     * @param LinkUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LinkUpdateRequest $request, $id)
    {
        try
        {
            $target = $request->transform();
            $this->db->category()->patch($id, $target);

            $this->flashSuccess('Dados atualizados com sucesso.');
            return redirect()->route('link.index');
        }
        catch (\Exception $ex)
        {
            logger($ex->getMessage());
            $this->flashError($ex->getMessage());
            return redirect()->route('link.index');
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
        try
        {
            $this->db->link()->delete($id);

            $this->flashSuccess('Dados removido com sucesso.');
            return redirect()->route('link.index');
        }
        catch (\Exception $ex)
        {
            logger($ex->getMessage());
            $this->flashError($ex->getMessage());
            return redirect()->route('link.index');
        }
    }
}
