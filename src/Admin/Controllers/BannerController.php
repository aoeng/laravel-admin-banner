<?php
namespace Aoeng\Laravel\Admin\Banner\Admin\Controllers;
use Aoeng\Laravel\Admin\Banner\Models\Banner;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Controllers\AdminController;

class BannerController extends AdminController
{
    use HasResourceActions;

    protected $title = '轮播图';

    public function grid()
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
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Banner::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('type', __('Type'));
        $show->field('picture', __('Picture'));
        $show->field('path', __('Path'));
        $show->field('sort', __('Sort'));
        $show->field('is_display', __('Is display'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
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
