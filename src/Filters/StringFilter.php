<?php

namespace LaravelBi\LaravelBi\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use LaravelBi\LaravelBi\Dashboard;

class StringFilter extends BaseFilter
{

    public $component = 'string';

    public function apply(Builder $builder, array $filterData, Request $request): Builder
    {
        return $builder->whereIn($this->column, $filterData);
    }

    public function data(Dashboard $dashboard, Request $request)
    {
        return [
            'options' => $dashboard->model::query()->select($this->column)->distinct()->pluck($this->column)
        ];
    }

}
