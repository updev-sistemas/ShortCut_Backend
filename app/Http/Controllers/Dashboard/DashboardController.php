<?php

namespace App\Http\Controllers\Dashboard;

use App\Domains\Contracts\Repositories\IDbContext;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct(IDbContext $context)
    {
        parent::__construct($context);

        $this->middleware(['auth']);
    }

    public function home()
    {
        return view("dashboard.start");
    }
}
