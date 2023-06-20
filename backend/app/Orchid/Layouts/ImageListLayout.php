<?php

namespace App\Orchid\Layouts;

use App\Models\Image;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ImageListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'image';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('Creator', __('Creator'))
                ->sort()
                ->cantHide()
                ->render(fn (Image $image) => Link::make($image->creator)
                    ->route('platform.systems.gallery.edit', $image->id)),

            TD::make('Signature', __('Signature'))
                ->sort()
                ->cantHide()
                ->render(fn (Image $image) => Link::make($image->signature)
                    ->route('platform.systems.gallery.edit', $image->id)),

            TD::make('Description', __('Description'))
                ->sort()
                ->cantHide()
                ->render(fn (Image $image) => Link::make($image->description)
                    ->route('platform.systems.gallery.edit', $image->id)),

            TD::make('Created', __('Created'))
                ->sort()
                ->cantHide()
                ->render(fn (Image $image) => Link::make($image->created_at)
                    ->route('platform.systems.gallery.edit', $image->id)),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Image $image) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('platform.systems.image.edit', $image->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $image->id,
                            ]),
                    ])),
        ];
    }
}
