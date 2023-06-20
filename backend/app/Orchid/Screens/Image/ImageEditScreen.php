<?php

namespace App\Orchid\Screens\Image;

use App\Models\Image;
use App\Orchid\Layouts\ImageEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ImageEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Image $image): iterable
    {
        return [
            'image' => $image
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Image edit';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::block([
                ImageEditLayout::class,
            ])
                ->title('Edit')
                ->description('Edit image')
        ];
    }

    public function save(Request $request, Image $image)
    {
        $image->fill($request->get('image'));

        $image->save();

        $image->attachment()->syncWithoutDetaching($request->attachment_id);

        Toast::info(__('Image was saved'));

        return redirect()->route('platform.systems.image');
    }
}
