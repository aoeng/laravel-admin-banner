<?php

namespace Aoeng\Laravel\Admin\Banner\Http\Controllers;

use App\Http\Controllers\Controller;
use Aoeng\Laravel\Admin\Banner\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * @group  轮播图 BannerController
 * Class BannerController
 * @package Aoeng\Laravel\Admin\Banner\Http\Controllers
 */
class BannerController extends Controller
{
    /**
     * @bodyParam type string required 默认1转跳内部页面 2转跳h5页面
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {

        $type = $request->input('type', Banner::BANNER_JUMP_PAGE);

        $banners = Cache::rememberForever('banner:' . $type, function () use ($type) {
            return Banner::query()
                ->where('type', $type)
                ->where('is_display', 1)
                ->orderByDesc('sort')
                ->get();
        });

        return $this->responseJson($banners);
    }
}
