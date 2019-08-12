<?php

namespace App\Admin\Controllers;

use App\Sku;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SkuController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Sku';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Sku);

        $grid->column('sku_id', __('Sku id'));
        $grid->column('goods_id', __('商品ID'));
        $grid->column('goods_sn', __('商品编号'));
        $grid->column('sku', __('Sku'));
        $grid->column('goods_desc', __('商品详情'));
        $grid->column('goods_price0', __('商品定价'));
        $grid->column('goods_price', __('商品价格'));
        $grid->column('goods_store', __('商品库存'));
        $grid->column('is_up', __('商品是否上架'));
        $grid->column('created_at', __('添加时间'));
        $grid->column('updated_at', __('修改时间'));

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
        $show = new Show(Sku::findOrFail($id));

        $show->field('sku_id', __('Sku id'));
        $show->field('goods_id', __('Goods id'));
        $show->field('goods_sn', __('Goods sn'));
        $show->field('sku', __('Sku'));
        $show->field('goods_desc', __('Goods desc'));
        $show->field('goods_price0', __('Goods price0'));
        $show->field('goods_price', __('Goods price'));
        $show->field('goods_store', __('Goods store'));
        $show->field('is_up', __('Is up'));
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
        $form = new Form(new Sku);

        $form->number('goods_id', __('Goods id'));
        $form->text('goods_sn', __('Goods sn'));
        $form->text('sku', __('Sku'));
        $form->text('goods_desc', __('Goods desc'));
        $form->number('goods_price0', __('Goods price0'));
        $form->number('goods_price', __('Goods price'));
        $form->number('goods_store', __('Goods store'));
        $form->switch('is_up', __('Is up'));

        return $form;
    }
}
