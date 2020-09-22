<div>
    <div class="d-flex justify-content-between mt-3">
        <h6>Add Step For Task</h6>
        <span style="cursor: pointer" wire:click="increment" class="fa fa-plus"></span>
    </div>
    @foreach($steps as $step)
        <div class="d-flex" wire:key="{{$step}}">
            <input type="text" class="form-control mt-2" name="items[]" placeholder="Describe Steps {{$step}}">
            <span wire:click="decrement({{$step}})" class="fa fa-times text-danger py-3 px-2"></span>
        </div>
    @endforeach

</div>
