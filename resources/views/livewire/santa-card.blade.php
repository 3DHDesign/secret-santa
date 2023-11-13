<div class="santa-card {{ $class }}" wire:click="selected({{ $id }})">
    <div class="card-number">
        <span> {{ $class == 'show-class' ? 'Select Me' : 'Selected' }} </span>
    </div>
    <img class="santa-image" src="{{ asset('assets/images/card/card-avatar.png') }}" alt="Santa Avatar">

</div>
