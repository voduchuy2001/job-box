<div>
    <x-form wire:submit.prevent="saveAddress">
        <div class="row">
            <div class="col-lg-6">
                <x-admin.input
                    :label="__('Hosue number')"
                    class="form-control"
                    type="text"
                    id="houseNumber"
                    name="houseNumber"
                    model="houseNumber"
                    placeholder="{{ __('Enter house number') }}"
                ></x-admin.input>
            </div>

            <div class="col-lg-6">
                <label class="form-label">{{ __('Provinces') }}</label>
                <select class="form-select" wire:model.live="provinceId">
                    <option value="">{{ __('Choose Your Province') }}</option>
                    @foreach($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                </select>

                @error('provinceId')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="col-lg-6">
                <label class="form-label">{{ __('Districts') }}</label>
                <select class="form-select" wire:model.live="districtId">
                    @foreach($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @endforeach
                </select>

                @error('districtId')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="col-lg-6 mb-3">
                <label class="form-label">{{ __('Wards') }}</label>
                <select class="form-select" wire:model.live="wardId">
                    @foreach($wards as $ward)
                        <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                    @endforeach
                </select>

                @error('wardId')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                    <x-button
                        type="submit"
                        class="btn btn-primary">{{ __('Creates') }}</x-button>
                </div>
            </div>
        </div>
    </x-form>
</div>
