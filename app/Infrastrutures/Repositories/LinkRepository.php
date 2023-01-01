<?php

namespace App\Infrastrutures\Repositories;

use App\Domains\Contracts\Mappings\IInternalAutoMapper;
use App\Domains\Contracts\Repositories\ISearchable;
use App\Domains\Contracts\Repositories\ILinkRepository;
use App\Domains\Contracts\ValueObjects\IValueObject;
use App\Domains\Entities\Link;
use App\Domains\ValueObjects\LinkValueObject;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class LinkRepository extends DefaultRepository implements ISearchable, ILinkRepository
{
    public function __construct(IInternalAutoMapper $mapper)
    {
        parent::__construct($mapper);
    }

    /**
     * @param int $currentPage
     * @param int $perPage
     * @param array $params
     * @return LengthAwarePaginator
     */
    public function query(int $currentPage, int $perPage, array $params) : LengthAwarePaginator
    {
        $query = $this->internal_query();

        $data = $query->paginate($perPage, ['*'], 'page', $currentPage);

        $result = [];
        if ($data != null)
        {
            $result = $this->mapper->mapMultiple($data->items(), LinkValueObject::class);
        }

        return $this->internal_wrapper_collection_with_paginate($currentPage, $perPage, $data->total(), $result);
    }

    /**
     * @param int $id
     * @return LinkValueObject|null
     */
    public function find(int $id) : ?IValueObject
    {
        $target = Link::query()->where('id','=', $id)->first();

        if ($target == null)
            return $target;

        return $this->mapper->map($target, LinkValueObject::class);
    }

    /**
     * @param IValueObject $target
     * @return void
     * @throws \AutoMapperPlus\Exception\UnregisteredMappingException
     */
    public function save(IValueObject $target) : void
    {
        $targetToSave = $this->mapper->map($target, Link::class);
        $targetToSave->saveOrFail();
    }

    /**
     * @return string
     */
    public function generate_slug() : string
    {
        $continueLoop = false;

        do {
            $valid_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            $length = rand(3, 6);
            $random_string = '';

            //Count the number of chars in the valid chars string so we know how many choices we have
            $num_valid_chars = strlen($valid_chars);

            //Repeat the steps until we've created a string of the right length
            for ($i = 0; $i < $length; $i++) {
                //Pick a random number from 1 up to the number of valid chars
                $random_pick = mt_rand(1, $num_valid_chars);

                //Take the random character out of the string of valid chars
                //Subtract 1 from $random_pick because strings are indexed starting at 0, and we started picking at 1
                $random_char = $valid_chars[$random_pick - 1];
                $random_string .= $random_char;
            }

            $continueLoop = DB::table('links')->where('slug','=',$random_string)->exists();

        } while ($continueLoop);

        return $random_string;
    }

    /**
     * @param int $id
     * @param string $slug
     * @return IValueObject|null
     */
    public function findByIdOrSlug(string $id, string $slug): ?IValueObject
    {
        $q = $this->internal_query();

        if (!empty($id) && !is_null($id) && $id != '0') {
            try {
                $q = $q->where('id', '=', decrypt($id));
            }
            catch (\Exception $ex) {
                unset($ex);
            }
        }

        if (!empty($slug) && !is_null($slug))
        {
            $q = $q->where('slug', '=', $slug);
        }

        $result = $q->firstOrFail();

        $target = $this->mapper->map($result, LinkValueObject::class);

        return $target;
    }

    public function existsByHash(string $link): ?IValueObject
    {
        $q = $this->internal_query();

        $md5 = md5($link);

        $result = $q->where('link_hash','=', $md5)->firstOr(['*'], function(){
            return null;
        });

        if ($result != null) {
            return $this->mapper->map($result, LinkValueObject::class);
        }

        return $result;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function internal_query()
    {
        return Link::query();
    }
}
