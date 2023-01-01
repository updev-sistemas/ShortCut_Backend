<?php

namespace App\Http\Controllers\Api;

use App\Domains\Contracts\Repositories\IDbContext;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function __construct(IDbContext $context)
    {
        parent::__construct($context);
    }


    public function store(Request $request)
    {
        $url = $request->get('url',null);
        $target = $this->db->link()->existsByHash($url);

        if ($target == null) {
            $target = new \App\Domains\ValueObjects\LinkValueObject();
        } else {
            $data = [
                'url' => $target->url,
                'shortcut' => (config('app.site') . '/' . $target->slug),
                'slug' => $target->slug,
                'message' => 'Url já estava registrada em nossa base de dados.'
            ];

            return response($data, 200);
        }

        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
            $target->url = null;
        } else {
            $target->url = $url;
        }

        $target->slug = $this->db->link()->generate_slug();
        $target->category_id = 1;
        $target->user_id = 1;
        $target->store_id = 1;

        try
        {
            $this->db->link()->save($target);

            $data = [
                'url' => $target->url,
                'shortcut' => (config('app.site') . '/' . $target->slug),
                'slug' => $target->slug,
                'message' => 'Url registrada com sucesso.'
            ];

            return response($data, 200);
        }
        catch (\Exception $ex)
        {
            logger($ex->getMessage());
            return response([
                'url' => $target->url,
                'shortcut' => null,
                'slug' => null,
                'message' => 'Ocorreu um erro ao registrar a Url Curta.'
            ], 404);
        }
    }
}
