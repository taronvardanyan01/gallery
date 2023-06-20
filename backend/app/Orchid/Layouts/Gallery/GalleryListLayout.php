<?php

namespace App\Orchid\Layouts\Gallery;

use App\Models\Gallery;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class GalleryListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'gallery';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('Short Name', __('Short Name'))
                ->sort()
                ->cantHide()
                ->render(fn (Gallery $gallery) => Link::make($gallery->short_name)
                    ->route('platform.systems.gallery.edit', $gallery->id)),

            TD::make('Full name', __('Full name'))
                ->sort()
                ->cantHide()
                ->render(fn (Gallery $gallery) => Link::make($gallery->full_name)
                    ->route('platform.systems.gallery.edit', $gallery->id)),

            TD::make('Text for playback', __('Text for playback'))
                ->sort()
                ->cantHide()
                ->render(fn (Gallery $gallery) => Link::make($gallery->text_for_playback)
                    ->route('platform.systems.gallery.edit', $gallery->id)),

            TD::make('Change effect', __('Change effect'))
                ->sort()
                ->cantHide()
                ->render(fn (Gallery $gallery) => Link::make($gallery->change_effect)
                    ->route('platform.systems.gallery.edit', $gallery->id)),

            TD::make('Interval', __('Interval'))
                ->sort()
                ->cantHide()
                ->render(fn (Gallery $gallery) => Link::make($gallery->change_image_interval)
                    ->route('platform.systems.gallery.edit', $gallery->id)),

            TD::make('Font', __('Font'))
                ->sort()
                ->cantHide()
                ->render(fn (Gallery $gallery) => Link::make($gallery->font)
                    ->route('platform.systems.gallery.edit', $gallery->id)),

            TD::make('Font Color', __('Font Color'))
                ->sort()
                ->cantHide()
                ->render(fn (Gallery $gallery) => Link::make($gallery->font_color)
                    ->route('platform.systems.gallery.edit', $gallery->id)),

            TD::make('Text Size', __('Text Size'))
                ->sort()
                ->cantHide()
                ->render(fn (Gallery $gallery) => Link::make($gallery->text_size)
                    ->route('platform.systems.gallery.edit', $gallery->id)),

            TD::make('Created', __('Created'))
                ->sort()
                ->cantHide()
                ->render(fn (Gallery $gallery) => Link::make($gallery->created_at)
                    ->route('platform.systems.gallery.edit', $gallery->id)),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Gallery $gallery) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('platform.systems.gallery.edit', $gallery->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $gallery->id,
                            ]),
                    ])),
        ];
    }
}
