<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;


class TemplateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

//    public static $wrap = 'Templates';

    public function toArray($request)
    {
        TemplateResource::$wrap = 'Templates';

        return [
            'Name' => $this->name,
            'Subject' => $this->subject,
            'Status' => $this->is_active,
            'RequiredSubjectParameters' => $this->getRequiredSubjectParameters($this->subject)
        ];

    }

    private function getRequiredSubjectParameters($subject)
    {
        $pattern = '/{.[a-z_0-9]*}/m';
        preg_match_all($pattern, $subject, $matches);
        return Str::replace(['{', '}'], '', $matches[0]);
    }
}
