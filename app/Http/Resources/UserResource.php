<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'email'     => $this->email,
            'birthday'  => $this->birthday,
            'gender'    => $this->gender ? true : false,
            'address'   => $this->address,
            'lat'       => $this->lat,
            'lng'       => $this->lng,
            'phone'     => $this->phone,
            'image'     => $this->image,
            'isActived' => $this->actived,
            'isBanned'  => $this->banned,
            'points'    => $this->points,
            'free_ship' => $this->free_ship,
        ];
    }
}
