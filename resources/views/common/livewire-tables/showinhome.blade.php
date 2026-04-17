<div class="icheck-primary">
    <div class="custom-control custom-switch custom-publish-switch">
        <input type="checkbox" class="custom-control-input" id="customSwitch11{{ $id }}" wire:click="toggleShowInHomePage({{ $id }})" name="show_in_home_page" {{ $show_in_home_page == 1 ? 'checked' : '' }}>
        <label class="custom-control-label" for="customSwitch11{{ $id }}">Show In Home Page</label>
    </div>
</div>