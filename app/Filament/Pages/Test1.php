<?php

namespace App\Filament\Pages;

use App\Forms\Components\Table1;
use App\Forms\Components\Table2;
use Filament\Actions\Action;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Placeholder;
use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Components\Wizard;

class Test1 extends Page  implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.test1';

    public function testAction(): Action
    {
        return Action::make('test')
            ->requiresConfirmation()
            ->action(function () {});
    }

}
