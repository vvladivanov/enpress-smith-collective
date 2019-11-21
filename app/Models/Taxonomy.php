<?php

namespace App\Models;

class Taxonomy extends \Enpress\Models\Taxonomy
{

    public function scopeWithTerms($query)
    {
        $terms_table = (new Term())->getTable();
        return $query->leftJoin($terms_table, "{$terms_table}.term_id", '=', "{$this->getTable()}.term_id");
    }

}
