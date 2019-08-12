<?php

namespace App\Admin\Controllers;

use App\Cart;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CartController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Cart';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Cart);

        $grid->column('cart_id', __('购物车ID'));
        $grid->column('goods_id', __('商品ID'));
        $grid->column('goods_name', __('商品名称'));
        $grid->column('goods_price', __('商品单价'));
        $grid->column('goods_amount', __('商品总价'));
        $grid->column('uid', __('用户ID'));
        $grid->column('buy_number', __('购买数量'));
        $grid->column('session_id', __('Session id'));
        $grid->column('cart_status', __('购物车状态'));
        $grid->column('crated_at', __('添加时间'));
        $grid->column('update_at', __('修改时间'));

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
        $show = new Show(Cart::findOrFail($id));

        $show->field('cart_id', __('Cart id'));
        $show->field('goods_id', __('Goods id'));
        $show->field('goods_name', __('Goods name'));
        $show->field('goods_amount', __('Goods amount'));
        $show->field('goods_price', __('Goods price'));
        $show->field('uid', __('Uid'));
        $show->field('buy_number', __('Buy number'));
        $show->field('session_id', __('Session id'));
        $show->field('cart_status', __('Cart status'));
        $show->field('crated_at', __('Crated at'));
        $show->field('update_at', __('Update at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Cart);

        $form->number('goods_id', __('Goods id'));
        $form->text('goods_name', __('Goods name'));
        $form->number('goods_amount', __('Goods amount'));
        $form->number('goods_price', __('Goods price'));
        $form->number('uid', __('Uid'));
        $form->number('buy_number', __('Buy number'))->default(1);
        $form->text('session_id', __('Session id'));
        $form->switch('cart_status', __('Cart status'))->default(1);
        $form->datetime('crated_at', __('Crated at'))->default(date('Y-m-d H:i:s'));
        $form->datetime('update_at', __('Update at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
