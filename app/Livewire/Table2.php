<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class Table2 extends Component  implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    public function render()
    {
        return view('livewire.table2');
    }
    public function table(Table $table): Table
    {
        return $table
            ->query(User::query())
            ->columns([
                TextColumn::make('email'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('preview')
                    ->form([
                        \App\Forms\Components\Table1::make('table1'),
                    ])
                    ->action(function (array $data): void {
                    })
            ])
            ->bulkActions([
                // ...
            ]);
    }
}
