<?php

namespace App\Admin\Controllers;

use App\Goods;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Actions\Post\Replicate;

class GoodsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Goods';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Goods);

        $grid->column('goods_id', __('商品ID'));
        $grid->column('goods_sn', __('商品编号'));
        $grid->column('goods_name', __('商品名称'));
        $grid->column('goods_price0', __('商品定价'));
        $grid->column('goods_price', __('商品价格'));
        $grid->column('goods_desc', __('商品详情'));
        $grid->column('goods_img', __('商品图片'))->image();
        $grid->column('goods_store', __('商品库存'));
        $grid->column('goods_status', __('商品状态'));
        $grid->column('is_up', __('是否上架'));
        $grid->column('created_at', __('添加时间'));
        $grid->column('updated_at', __('修改时间'));
        $grid->actions(function ($actions) {
            $actions->add(new Replicate);
        });
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
        $show = new Show(Goods::findOrFail($id));

        $show->field('goods_id', __('Goods id'));
        $show->field('goods_sn', __('Goods sn'));
        $show->field('goods_name', __('Goods name'));
        $show->field('goods_price0', __('Goods price0'));
        $show->field('goods_price', __('Goods price'));
        $show->field('goods_desc', __('Goods desc'));
        $show->field('goods_img', __('Goods img'));
        $show->field('goods_store', __('Goods store'));
        $show->field('goods_status', __('Goods status'));
        $show->field('is_up', __('Is up'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Update at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Goods);

        $form->text('goods_sn', __('Goods sn'));
        $form->text('goods_name', __('Goods name'));
        $form->number('goods_price0', __('Goods price0'));
        $form->number('goods_price', __('Goods price'));
        $form->text('goods_desc', __('Goods desc'));
        $form->image('goods_img', __('public/images'));
        $form->number('goods_store', __('Goods store'));
        $form->switch('goods_status', __('Goods status'));
        $form->switch('is_up', __('Is up'));
        $form->datetime('created_at', __('Create at'))->default(date('Y-m-d H:i:s'));
        $form->datetime('updated_at', __('Update at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
