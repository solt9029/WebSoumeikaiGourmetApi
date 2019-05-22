<?php

namespace App\Admin\Controllers;

use App\Shop;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ShopsController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Shop);

        $grid->id('ID');
        $grid->name('お店の名前');
        $grid->img('画像')->image();
        $grid->category('カテゴリ');
        $grid->phone_number('電話番号');
        $grid->address('住所');
        $grid->area('エリア');
        $grid->latitude('緯度');
        $grid->longitude('経度');
        $grid->link('食べログリンク')->limit(10);
        $grid->comment('コメント');
        $grid->owner_name('店主の名前');
        $grid->owner_club('店主の所属（部活など）');
        $grid->owner_graduated_at('店主の卒業年');
        $grid->owner_group('店主の卒業年の会の名前');

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
        $show = new Show(Shop::findOrFail($id));

        $show->id('ID');
        $show->name('お店の名前');
        $show->img('画像');
        $show->category('カテゴリ');
        $show->phone_number('電話番号');
        $show->address('住所');
        $grid->area('エリア');
        $show->latitude('緯度');
        $show->longitude('経度');
        $show->link('食べログリンク');
        $show->comment('コメント');
        $show->owner_name('店主の名前');
        $show->owner_club('店主の所属（部活など）');
        $show->owner_graduated_at('店主の卒業年');
        $show->owner_group('店主の卒業年の会の名前');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Shop);

        $form->text('name', 'お店の名前 (必須)');
        $form->image('img', '画像 (必須)');
        $form->text('category', 'カテゴリ (必須)');
        $form->text('phone_number', '電話番号 (必須)');
        $form->text('address', '住所 (必須)');
        $form->text('area', 'エリア (必須)');
        $form->decimal('latitude', '緯度');
        $form->decimal('longitude', '経度');
        $form->url('link', '食べログリンク');
        $form->text('comment', 'コメント');
        $form->text('owner_name', '店主の名前 (必須)');
        $form->text('owner_club', '店主の所属（部活など） (必須)');
        $form->text('owner_graduated_at', '店主の卒業年 (必須)');
        $form->text('owner_group', '店主の卒業年の会の名前 (必須)');

        return $form;
    }
}
