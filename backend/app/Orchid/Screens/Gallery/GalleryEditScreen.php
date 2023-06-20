<?php

namespace App\Orchid\Screens\Gallery;

use App\Models\Gallery;
use App\Orchid\Layouts\Gallery\GalleryEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class GalleryEditScreen extends Screen
{
    public function query(Gallery $gallery): iterable
    {
        return [
            'gallery' => $gallery
        ];
    }

    public function name(): ?string
    {
        return 'Gallery Edit';
    }

    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save'),
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::block([
                GalleryEditLayout::class,
            ])
                ->title('Edit')
                ->description('Edit gallery')
        ];
    }

    public function save(Request $request, Gallery $gallery)
    {
        $gallery->fill($request->get('gallery'));

        $gallery->user_id = rand(1, 100);
        $gallery->save();

        Toast::info(__('Gallery was saved'));

        return redirect()->route('platform.systems.gallery');
    }
}
