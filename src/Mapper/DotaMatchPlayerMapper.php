<?php


namespace App\Mapper;


use App\Entity\DotaMatch;
use App\Entity\DotaMatchPlayer;
use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use stdClass;

class DotaMatchPlayerMapper
{
    public static function build() : AutoMapper
    {
        $config = new AutoMapperConfig();
        $config
            ->registerMapping(stdClass::class, DotaMatchPlayer::class)
            ->forMember('accountId', static function ($element) {
                return $element->steamAccountId;
            });
        return new AutoMapper($config);
    }
}