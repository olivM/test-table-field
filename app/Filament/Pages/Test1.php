<?php

namespace App\Filament\Pages;

use App\Forms\Components\Table1;
use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;

class Test1 extends Page  implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.test1';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Order')
                        ->schema([
                           Table1::make('table1')
                        ]),
                    Wizard\Step::make('Delivery')
                        ->schema([
                            //Table2::make('table2')
                        ]),
                    Wizard\Step::make('Billing')
                        ->schema([
                            // ...
                        ]),
                    ])
            ])
            ->statePath('data');
    }

}
