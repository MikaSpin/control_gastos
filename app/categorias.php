<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    public $timestamps=false;
    protected $table='categorytable';
    protected $primaryKey='cat_id';

    protected $fillable=['cat_nombre','cat_tipo'];
}
