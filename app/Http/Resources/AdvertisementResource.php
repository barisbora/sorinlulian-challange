<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray( $request )
    {
        return [
            'id'           => $this->id,
            'title'        => $this->title,
            'text'         => $this->text,
            'image'        => $this->image,
            'sponsored_by' => $this->sponsored_by,
            'tracking_url' => $this->tracking_url,
            'advertiser'   => $this->mergeWhen( $this->relationLoaded( 'advertiser' ), AdvertiserResource::make( $this->advertiser ) ),
            'campaign'     => $this->mergeWhen( $this->relationLoaded( 'campaign' ), CampaignResource::make( $this->campaign ) ),
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
        ];
    }
}
