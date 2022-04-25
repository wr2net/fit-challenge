<?php

namespace App\PersonalRecords\Models;

use App\Common\Models\Traits\SoftDeletes;
use App\Movements\Models\Movement;
use App\Personals\Models\Personal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PersonalRecord extends Model
{
    use SoftDeletes;

    /**
     * @return HasOne
     */
    public function personals()
    {
        return $this->hasOne(Personal::class);
    }

    /**
     * @return HasOne
     */
    public function movements()
    {
        return $this->hasOne(Movement::class);
    }
}
