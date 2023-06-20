<?php

namespace App\Orchid\Screens\Gallery;

use App\Models\Gallery;
use App\Orchid\Layouts\Gallery\GalleryListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class GalleryListScreen extends Screen
{
    public function query(): array
    {
        return [
            'gallery' => Gallery::all(),
        ];
    }

    public function name(): ?string
    {
        return 'Gallery';
    }

    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add'))
                ->icon('bs.plus-circle')
                ->href(route('platform.systems.gallery.create')),
        ];
    }

    public function layout(): iterable
    {
        return [
            GalleryListLayout::class,
        ];
    }

}
