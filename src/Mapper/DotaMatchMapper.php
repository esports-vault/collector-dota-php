<?php


namespace App\Mapper;


use App\Entity\DotaMatch;
use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use stdClass;

class DotaMatchMapper
{
    public static function build() : AutoMapper
    {
        $config = new AutoMapperConfig();
        $config
            ->registerMapping(stdClass::class, DotaMatch::class)
            ->forMember('startDateTime', static function ($element) {
                $startDateTime = new \DateTime();
                $startDateTime->setTimestamp($element->startDateTime);

                return $startDateTime;
            });
        return new AutoMapper($config);
    }
}