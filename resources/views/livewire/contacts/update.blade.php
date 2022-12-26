<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Update Contact</h3>
    </div>

    <div class="panel-body">
        <div class="form-inline card p-4">
            <input type="hidden" wire:model="selected_id">
            <div class="input-group">
                Name
                <input wire:model="name" type="text" class="form-control input-sm">
            </div><br>
            <div class="input-group">
                Phone
                <input wire:model="phone" type="text" class="form-control input-sm">
            </div><br>
            <div class="input-group">
                <br>
                <button wire:click="update()" class="btn btn-default">Update</button>
            </div>
        </div>
    </div>

</div>