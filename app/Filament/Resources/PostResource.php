<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use App\Models\Author;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    // protected static ?string $slug = 'blog/posts';

    protected static ?string $navigationGroup = 'Blog';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('title')->required()->live(onBlur: true)->required()
                            ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        TextInput::make('slug')->readonly()->dehydrated()->unique(Post::class, 'slug', ignoreRecord: true),
                        RichEditor::make('content')->required()->columnSpan('full'),

                        Select::make('author_id')
                            ->label('Author')->required()->searchable()
                            ->options(Author::all()->pluck('name', 'id')),

                        Select::make('category_id')
                            ->label('Category')->required()->searchable()
                            ->options(Category::all()->pluck('name', 'id')),

                        DatePicker::make('published_date'),
                        TextInput::make('tags'),
                    ])
                    ->columns(2),
                Section::make()->schema([
                    FileUpload::make('image')->columnSpan('full')->image()->disk('public'),
                ])
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->disk('public'),
                TextColumn::make('title'),
                TextColumn::make('author.name'),
                TextColumn::make('category.name'),
                TextColumn::make('status')
                    ->badge()
                    ->getStateUsing(fn(Post $record): string => $record->published_date ? 'Published' : 'Draft')
                    ->colors([
                        'success' => 'Published',
                    ]),
                TextColumn::make('published_date')->label('Published Date')->date(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
