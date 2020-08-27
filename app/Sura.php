<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sura extends Model
{
    use FullTextSearch;
    
    protected $searchable = [
        'verse_text'
    ];
}
