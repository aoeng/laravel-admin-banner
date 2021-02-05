<?php
namespace Aoeng\Laravel\Banner\Http\Controllers;

use Aoeng\Laravel\Support\Traits\ResponseJsonActions;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BannerController extends Controller
{
    use ResponseJsonActions;

    public function index(Request $request)
    {

        $type = $request->input('type', Banner::BANNER_JUMP_PAGE);

        $banners = Cache::rememberForever('banner:' . $type, function () use ( $type) {
            return Banner::query()
                ->where('type', $type)
                ->where('is_display', 1)
                ->orderByDesc('sort')
                ->get();
        });

        return $this->responseJson($banners);
    }
}
