<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    public function item()
    {
        return $this->hasOne('App\Item', 'id', 'item_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
