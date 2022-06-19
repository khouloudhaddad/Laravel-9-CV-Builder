<?php

namespace App\Http\Livewire\Profile;

use App\Models\Profile;
use Filament\Forms\Components\MarkdownEditor;
use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

class ProfileForm extends Component implements HasForms
{
    use InteractsWithForms;

    public string|null $biographie = null;
    public $profileId;

    public function mount(Profile $profile):void
    {
        $this->biographie = $profile->biographie;
        $this->profileId = $profile->id;
    }

    protected function getFormSchema(): array
    {
        return [
            MarkdownEditor::make('biographie')->required(),
        ];
    }

    protected function rules():array
    {
        return [
            'biographie' => [
                'string',
                'required'
            ]
        ];
    }

    public function submit()
    {
        $this->validate();

        $updated = Profile::query()
            ->whereId($this->profileId)
            ->update([
                'biographie' => $this->biographie
            ]);

        $updated ?
        $this->alert(
            'success',
            'Experiences were successfully updated',
        )
            :
            $this->alert(
                'error',
                'An error occured !',
            );
    }
    public function render()
    {
        return view('livewire.profile.profile-form');
    }
}
