<?php

namespace App\Orchid\Layouts\Gallery;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class GalleryEditLayout extends Rows
{
    public function fields(): array
    {
        return [
            Input::make('gallery.short_name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(('Short name'))
                ->placeholder(('Short name')),

            Input::make('gallery.full_name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(('Full name'))
                ->placeholder(('Full name')),

            Input::make('gallery.text_for_playback')
                ->type('text')
                ->max(255)
                ->required()
                ->title(('Text for playback'))
                ->placeholder(('Text for playback')),

            Input::make('gallery.text_size')
                ->type('text')
                ->max(255)
                ->required()
                ->title(('Text size'))
                ->placeholder(('Text size')),

            Input::make('gallery.change_effect')
                ->type('text')
                ->max(255)
                ->required()
                ->title(('Change effect'))
                ->placeholder(('Change effect')),

            Input::make('gallery.change_image_interval')
                ->type('text')
                ->max(255)
                ->required()
                ->title(('Change image interval'))
                ->placeholder(('Change image interval')),

            Input::make('gallery.font')
                ->type('text')
                ->max(255)
                ->required()
                ->title(('Font'))
                ->placeholder(('Font')),

            Input::make('gallery.font_color')
                ->type('text')
                ->max(255)
                ->required()
                ->title(('Font color'))
                ->placeholder(('Font color')),
        ];
    }
}
