<?php

namespace App\Filters;

class ProductFilter extends QueryFilter {
    public function minprice($minprice) {
        if (!empty($minprice))
            $this->builder->where("price", '>', $minprice);
    }

    public function maxprice($maxprice) {
        if (!empty($maxprice))
            $this->builder->where("price", '<', $maxprice);
    }
}
