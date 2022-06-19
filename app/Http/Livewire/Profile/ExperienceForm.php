<?php

namespace App\Http\Livewire\Profile;

use Closure;
use App\Models\Profile;
use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\HasManyRepeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExperienceForm extends Component implements HasForms
{
    use InteractsWithForms;

    public Profile $profile;

    public null|array $experiences;

    public function mount(Profile $profile): void
    {
        $this->form->fill([
            'experiences' => $profile->experiences?->toArray()
        ]);
    }

    protected function getFormModel(): Profile
    {
        return $this->profile;
    }

    protected function getFormSchema(): array
    {
        return [
            HasManyRepeater::make('experiences')
            ->schema([
                BelongsToSelect::make('job_title_id')
                ->relationship('jobTitle', 'name')
                ->searchable('name')
                    ->preload()
                    ->required(),
                BelongsToSelect::make('company_id')
                    ->relationship('company', 'name')
                    ->searchable('name')
                    ->preload()
                    ->required(),
                TextInput::make('description'),
                Checkbox::make('current')
                    ->afterStateUpdated(function (Closure $set, $state) {
                        $set('finished_at', null);
                    })
                    ->reactive()
                    ->nullable(),
                DatePicker::make('started_at')
                    ->required(),
                DatePicker::make('finished_at')
                ->hidden(fn ($get) => $get('current'))
                    ->nullable()
                    ->withoutTime(),
            ])
                ->orderable() //drag & drop
                ];
    }


    public function submit()
    {
       $updated = $this->profile->update(
            $this->form->getState()
        );
        $updated ?
        $this->alert(
            'success',
            'Experiences were successfully updated',
        )
        :
        $this->alert(
            'error',
            'An error occured !',
        )
        ;
    }


    public function render()
    {
        return view('livewire.profile.experience-form');
    }
}
