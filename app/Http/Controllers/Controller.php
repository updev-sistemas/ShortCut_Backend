<?php

namespace App\Http\Controllers;

use App\Domains\Contracts\Repositories\IDbContext;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected IDbContext $db;

    public function __construct(IDbContext $context)
    {
        $this->db = $context;
    }

    protected function flashSuccess($message)
    {
        session()->flash('MSG_SUCCESS', $message);
    }

    protected function flashError($message)
    {
        session()->flash('MSG_ERROR', $message);
    }

    protected function flashWarning($message)
    {
        session()->flash('MSG_WARNING', $message);
    }
}
