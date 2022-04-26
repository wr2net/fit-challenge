<?php

namespace App\Movements\Models;

use App\Common\Models\Traits\SoftDeletes;
use App\PersonalRecords\Models\PersonalRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movement extends Model
{
    use SoftDeletes;

    /**
     * @return HasMany
     */
    public function records()
    {
        return $this->hasMany(PersonalRecord::class);
    }
}
