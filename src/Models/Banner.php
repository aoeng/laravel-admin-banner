<?php

namespace Aoeng\Laravel\Admin\Banner\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @group Banner
 * Class Banner
 * @package App\Models
 */
class Banner extends Model
{
    protected $guarded = [];

    const BANNER_JUMP_PAGE = 1;
    const BANNER_JUMP_LINK = 2;


    public static $typeMap = [
        self::BANNER_JUMP_PAGE   => '转跳内部页面',
        self::BANNER_JUMP_LINK   => '转跳h5页面'
    ];


}
