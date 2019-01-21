<?php

namespace Preferred\Domain\Users\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class LoginHistoryResource
 *
 * @package Preferred\Domain\Users\Http\Resources
 *
 * @property string    device
 * @property string    platform
 * @property string    platform_version
 * @property string    browser
 * @property string    browser_version
 * @property string    ip
 * @property string    city
 * @property string    country_name
 * @property \DateTime created_at
 */
class LoginHistoryResource extends JsonResource
{
    public function toArray($request)
    {
        $milliseconds = bcdiv($this->created_at->format('u'), 1000, 0);

        return [
            'browser'         => $this->browser,
            'browserVersion'  => $this->browser_version,
            'device'          => $this->device,
            'platform'        => $this->platform,
            'platformVersion' => $this->platform_version,
            'city'            => $this->city,
            'countryName'     => $this->country_name,
            'ip'              => $this->ip,
            'createdAt'       => $this->created_at->format('Y-m-d\TH:i:s') . '.' . $milliseconds . 'Z',
        ];
    }
}