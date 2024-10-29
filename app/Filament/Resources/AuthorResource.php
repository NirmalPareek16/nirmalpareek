<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Author;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AuthorResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AuthorResource\RelationManagers;

class AuthorResource extends Resource
{
    // protected static ?string $model = Author::class;

    // protected static ?string $slug = 'blog/authors';

    protected static ?string $recordTitleAttribute = 'name';

    // protected static ?string $navigationGroup = 'Blog';

    // protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 3;

    protected static ?string $model = Author::class;
    protected static ?string $navigationGroup = 'Blog';


    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->email()->unique(Author::class, 'email', ignoreRecord: true)->required(),
                RichEditor::make('bio')->required()->columnSpan('full'),
                TextInput::make('github_handle')->label('Github Handle'),
                TextInput::make('twitter_handle')->label('Twitter Handle'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Split::make([
                    Stack::make([
                        TextColumn::make('name')
                            ->searchable()
                            ->sortable()
                            ->weight('medium')
                            ->alignLeft(),

                        TextColumn::make('email')
                            ->label('Email address')
                            ->searchable()
                            ->sortable()
                            ->color('gray')
                            ->alignLeft(),
                    ])->space(),

                    Tables\Columns\Layout\Stack::make([
                        TextColumn::make('github_handle')
                            ->icon('heroicon-m-x-mark')
                            ->label('GitHub')
                            ->alignLeft(),

                        TextColumn::make('twitter_handle')
                            ->icon('heroicon-m-x-mark')
                            ->label('Twitter')
                            ->alignLeft(),
                    ])->space(2),
                ])->from('md'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuthors::route('/'),
            'create' => Pages\CreateAuthor::route('/create'),
            'edit' => Pages\EditAuthor::route('/{record}/edit'),
        ];
    }
}
