<?php

namespace App\Admin\Controllers;

use App\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order);

        $grid->column('order_id', __('订单ID'));
        $grid->column('uid', __('用户ID'));
        $grid->column('order_sn', __('订单编号'));
        $grid->column('order_amount', __('订单金额'));
        $grid->column('buy_number', __('购买数量'));
        $grid->column('pay_status', __('支付状态'));
        $grid->column('pay_time', __('支付时间'));
        $grid->column('is_del', __('是否删除'));
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
        $show = new Show(Order::findOrFail($id));

        $show->field('order_id', __('Order id'));
        $show->field('uid', __('Uid'));
        $show->field('order_sn', __('Order sn'));
        $show->field('order_amount', __('Order amount'));
        $show->field('buy_number', __('Buy number'));
        $show->field('pay_status', __('Pay status'));
        $show->field('pay_time', __('Pay time'));
        $show->field('is_del', __('Is del'));
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
        $form = new Form(new Order);

        $form->number('uid', __('Uid'));
        $form->text('order_sn', __('Order sn'));
        $form->number('order_amount', __('Order amount'));
        $form->number('buy_number', __('Buy number'));
        $form->switch('pay_status', __('Pay status'))->default(2);
        $form->number('pay_time', __('Pay time'));
        $form->switch('is_del', __('Is del'))->default(1);

        return $form;
    }
}
