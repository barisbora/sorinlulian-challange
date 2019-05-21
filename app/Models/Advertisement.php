<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{

    protected $table = 'campaigns';

    protected $fillable = [
        'advertiser_id',
        'campaign_id',
        'title',
        'text',
        'image',
        'sponsored_by',
        'tracking_url',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advertiser()
    {
        return $this->belongsTo( Advertiser::class, 'advertiser_id', 'id' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign()
    {
        return $this->belongsTo( Campaign::class, 'campaign_id', 'id' );
    }

}
