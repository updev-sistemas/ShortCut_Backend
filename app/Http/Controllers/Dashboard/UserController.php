<?php

namespace App\Http\Controllers\Dashboard;

use App\Domains\Contracts\Repositories\IDbContext;
use App\Domains\Entities\User;
use App\Http\Requests\Users\UserCreateRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
        $collection = $this->db->user()->getAll();
        return view('dashboard.user.index',['collection' => $collection]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserCreateRequest $request)
    {
        try
        {
            $target = $request->transform();
            $this->db->user()->save($target);

            $this->flashSuccess('Usuário registrado.');

            return redirect()->route('user.create');
        }
        catch (\Exception $ex)
        {
            $this->flashError($ex->getMessage());
            logger($ex->getMessage());
            return redirect()->route('user.index');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        $target = $this->db->user()->find($id);
        if ($target == null)
        {
            $this->flashWarning('Não foi possível localizar o usuário solicitado');
            return redirect()->route('user.index');
        }

        return view('dashboard.user.show',['target' => $target]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->db->user()->find($id);

        if ($user == null)
        {
            $this->flashWarning('Não foi possível localizar o usuário solicitado');
            return redirect()->route('user.index');
        }

        return view('dashboard.user.edit', ['target' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try
        {
            $target = $request->transform();
            $this->db->user()->patch($id, $target);

            $this->flashSuccess('Dados atualizados com sucesso.');
            return redirect()->route('user.index');
        }
        catch (\Exception $ex)
        {
            logger($ex->getMessage());
            $this->flashError($ex->getMessage());
            return redirect()->route('user.index');
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
        // Add Message
        return redirect()->route('user.index');
    }
}
