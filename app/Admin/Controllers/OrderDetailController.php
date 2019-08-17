<?php

namespace App\Admin\Controllers;

use App\OrderDetail;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Controllers\AdminController;

class OrderDetailController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\OrderDetail';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OrderDetail);

        $grid->column('detail_id', __('订单详情ID'));
        $grid->column('order_sn', __('订单编号'));
        $grid->column('uid', __('用户ID'));
        $grid->column('goods_id', __('商品ID'));
        $grid->column('goods_name', __('商品名称'));
        $grid->column('goods_price', __('商品价格'));

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
        $show = new Show(OrderDetail::findOrFail($id));

        $show->field('detail_id', __('Detail id'));
        $show->field('order_sn', __('Order sn'));
        $show->field('uid', __('Uid'));
        $show->field('goods_id', __('Goods id'));
        $show->field('goods_name', __('Goods name'));
        $show->field('goods_price', __('Goods price'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new OrderDetail);

        $form->text('order_sn', __('Order sn'));
        $form->number('uid', __('Uid'));
        $form->number('goods_id', __('Goods id'));
        $form->text('goods_name', __('Goods name'));
        $form->number('goods_price', __('Goods price'));

        return $form;
    }
}
