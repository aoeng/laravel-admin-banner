<?php
namespace Aoeng\Laravel\Banner\Http\Controllers\Admin;

use App\Models\Banner;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Illuminate\Routing\Controller;

class BannerController extends Controller
{
    public function index()
    {
        $grid = new Grid(new Banner());

        $grid->column('id', __('Id'));
        $grid->column('type', '类型')->using(Banner::$typeMap);
        $grid->column('picture', '图片')->lightbox(['width' => 50, 'height' => 50]);
        $grid->column('path', '地址');
        $grid->column('sort', '排序')->editable();
        $grid->column('is_display', '显示？')->switch();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Banner());

        $form->select('type', '类型')->options(Banner::$typeMap)->default(1);
        $form->image('picture', '图片');
        $form->text('path', '地址');
        $form->number('sort', '排序')->default(0);
        $form->switch('is_display', '显示？')->default(1);

        return $form;
    }
}
