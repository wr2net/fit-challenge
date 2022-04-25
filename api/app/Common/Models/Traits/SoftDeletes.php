<?php

namespace App\Common\Models\Traits;

use Illuminate\Database\Eloquent\SoftDeletes as EloquentSoftDeletes;

trait SoftDeletes
{
    use EloquentSoftDeletes;

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->trashed();
    }
}
