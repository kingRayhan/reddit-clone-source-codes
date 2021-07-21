<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ThreadResource extends JsonResource
{

    /*
     *
     * "id": 101,
            "title": "Voluptas hic et labore et.",
            "slug": "voluptas-hic-et-labore-et--1626899464",
            "url": "https://keebler.com/sapiente-nostrum-architecto-perferendis-deserunt-tempora.html",
            "text": null,
            "attachment": null,
            "user_id": 6,
            "attachment_type": null,
            "thread_type": "LINK",
            "created_at": "2021-07-21T20:31:04.000000Z",
            "updated_at": "2021-07-21T20:31:04.000000Z"
     */


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'title' => $this->title,
            'slug' => $this->slug,
            'url' => $this->url,
            'text' => $this->text,
            "user" => new UserResource($this->user)
        ];
    }
}
