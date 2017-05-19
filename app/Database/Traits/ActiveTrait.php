<?php
namespace App\Database\Traits;

use App\Database\Scopes\ActiveScope;

trait ActiveTrait {

    /**
    * Boot the Active Events trait for a model.
    *
    * @return void
    */
    public static function bootActiveTrait()
    {
        static::addGlobalScope(new ActiveScope);
    }

}