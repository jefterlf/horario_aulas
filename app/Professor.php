<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model {

    protected $fillable = ['nome','data_demissao','data_admissao', 'tipo'];
    protected $guarded = ['id_professor'];


}
