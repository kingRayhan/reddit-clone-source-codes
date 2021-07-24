<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ThreadResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $default =  parent::toArray($request);
        unset($default['user_id']);
        unset($default['created_at']);
        unset($default['updated_at']);


        return array_merge($default , [
            'submittedAt' => $this->created_at->diffForHumans(),
            'user' => new UserResource($this->user)
        ]);

    }
}
