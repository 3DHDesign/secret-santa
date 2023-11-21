@php $editing = isset($guestUsers) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="division_id" label="Division" required>
            @php $selected = old('division_id', ($editing ? $guestUsers->division_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Division</option>
            @foreach($divisions as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="full_name"
            label="Full Name"
            :value="old('full_name', ($editing ? $guestUsers->full_name : ''))"
            maxlength="255"
            placeholder="Full Name"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
