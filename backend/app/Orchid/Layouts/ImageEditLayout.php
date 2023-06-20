<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;

class ImageEditLayout extends Rows
{
    /**
     * @throws \Throwable
     */
    public function fields(): array
    {
        return [
            Upload::make('picture')
                ->name('attachment_id')
                ->required()
                ->title(('Gallery id'))
                ->placeholder(('Gallery id')),

            Input::make('image.creator')
                ->type('text')
                ->max(255)
                ->required()
                ->title(('Creator'))
                ->placeholder(('Creator')),

            Input::make('image.signature')
                ->type('text')
                ->max(255)
                ->required()
                ->title(('Signature'))
                ->placeholder(('Signature')),

            Input::make('image.description')
                ->type('text')
                ->max(255)
                ->required()
                ->title(('Description'))
                ->placeholder(('Description'))
            ];
    }
}
