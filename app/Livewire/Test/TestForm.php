<?php

namespace App\Livewire\Test;

use App\Forms\Components\Table1;
use App\Forms\Components\Table2;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class TestForm extends Component implements HasForms, HasActions
{
    use InteractsWithForms;
    use InteractsWithActions;
    public ?array $data = [];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Order')
                        ->schema([
                            Table1::make('table1'),
                            Forms\Components\Placeholder::make('action_test_1')
                                ->hintAction(
                                    \Filament\Forms\Components\Actions\Action::make('test')
                                        ->icon('heroicon-m-clipboard')
                                        ->requiresConfirmation()
                                        ->action(function ( $state) {
                                            dd($state);
                                        })
                                ),
                            Forms\Components\TextInput::make('action_test_2')
                                ->suffixAction(
                                   \Filament\Forms\Components\Actions\Action::make('test')
                                        ->icon('heroicon-m-clipboard')
                                        ->requiresConfirmation()
                                        ->action(function ( $state) {
                                        dd($state);
                                        })
                                ),
                        ]),
                    Wizard\Step::make('Delivery')
                        ->schema([
                            Table2::make('table2'),
                        ]),
                    Wizard\Step::make('Billing')
                        ->schema([
                            // ...
                        ]),
                ])
            ])
            ->statePath('data');
    }


    public function render(): View
    {
        return view('livewire.test.test-form');
    }
}
