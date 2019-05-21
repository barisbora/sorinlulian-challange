<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{

    protected $table = 'campaigns';

    protected $fillable = [
        'advertiser_id',
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advertiser()
    {
        return $this->belongsTo( Advertiser::class, 'advertiser_id', 'id' );
    }
}
