<form wire:submit.prevent="submit">
    {{ $this->form }}

    <button type="submit"
    class="mt-8 bg-transparent hover:bg-purple-500 text-purple-700 font-semibold hover:text-white py-2 px-4 border border-purple-500 hover:border-transparent rounded">
        Submit
    </button>
</form>
