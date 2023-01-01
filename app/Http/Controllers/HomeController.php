<?php

namespace App\Http\Controllers;

use App\Domains\Contracts\Repositories\IDbContext;

class HomeController extends Controller
{
    public function __construct(IDbContext $context)
    {
        parent::__construct($context);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = $this->db->user()->getAll();

        dd($users);

        return view('home');
    }
}
