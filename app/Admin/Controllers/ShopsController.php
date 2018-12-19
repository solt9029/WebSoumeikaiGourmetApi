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

        $grid->id('Id');
        $grid->name('Name');
        $grid->img('Img')->image();
        $grid->category('Category');
        $grid->phone_number('Phone number');
        $grid->address('Address');
        $grid->latitude('Latitude');
        $grid->longitude('Longitude');
        $grid->link('Link');
        $grid->comment('Comment');
        $grid->owner_name('Owner name');
        $grid->owner_club('Owner club');
        $grid->owner_graduated_at('Owner graduated at');
        $grid->owner_group('Owner group');

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

        $show->id('Id');
        $show->name('Name');
        $show->img('Img');
        $show->category('Category');
        $show->phone_number('Phone number');
        $show->address('Address');
        $show->latitude('Latitude');
        $show->longitude('Longitude');
        $show->link('Link');
        $show->comment('Comment');
        $show->owner_name('Owner name');
        $show->owner_club('Owner club');
        $show->owner_graduated_at('Owner graduated at');
        $show->owner_group('Owner group');

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

        $form->text('name', 'Name');
        $form->image('img', 'Img');
        $form->text('category', 'Category');
        $form->text('phone_number', 'Phone number');
        $form->text('address', 'Address');
        $form->decimal('latitude', 'Latitude');
        $form->decimal('longitude', 'Longitude');
        $form->url('link', 'Link');
        $form->text('comment', 'Comment');
        $form->text('owner_name', 'Owner name');
        $form->text('owner_club', 'Owner club');
        $form->text('owner_graduated_at', 'Owner graduated at');
        $form->text('owner_group', 'Owner group');

        return $form;
    }
}
