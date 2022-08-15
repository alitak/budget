<div class="border border-gray-300 bg-white rounded-xl shadow-sm">
    <div class="grid grid-cols-3 gap-2 border-b p-4">
        <div class="col-span-1 text-center font-bold text-xs">Aktuális</div>
        <div class="col-span-1 text-center font-bold text-xs">Előző</div>
        <div class="col-span-1 text-center font-bold text-xs">Különbség</div>
        <div class="col-span-1 text-center font-bold text-xl">@money($sum['actual']) ft</div>
        <div class="col-span-1 text-center text-xl">@money($sum['previous']) ft</div>
        <div class="col-span-1 text-center text-xl">
            <span class="{{ $sum['change'] > 0 ? 'text-success-500' : 'text-danger-500' }}">@money($sum['change']) ft</span>
        </div>
    </div>
    <div class="grid grid-cols-2 divide-x">
        @foreach(['assets', 'depts'] as $type)
            <div class="col-span-1">
                <h2 class="text-center font-bold text-lg text-white bg-gray-600">@lang('summary.' . $type)</h2>
                <div class="grid grid-cols-4 gap-2 p-4">
                    <div class="col-span-2 text-center font-bold text-xs">Aktuális</div>
                    <div class="col-span-1 text-center font-bold text-xs">Előző</div>
                    <div class="col-span-1 text-center font-bold text-xs">Különbség</div>
                    <div class="col-span-2 text-center font-bold text-xl">@money($total[$type]) ft</div>
                    <div class="col-span-1 text-center text-xl">@money($previousMonthTotal[$type]) ft</div>
                    <div class="col-span-1 text-center text-xl">
                        <span class="{{ $change[$type] > 0 ? 'text-success-500' : 'text-danger-500' }}">@money($change[$type]) ft</span>
                    </div>
                    @foreach($values[$type] as $id => $category)
                        <div class="col-span-1">
                            <div class="filament-forms-field-wrapper">
                                <div class="space-y-2">
                                    <div class="flex items-center justify-between space-x-2 rtl:space-x-reverse">
                                        <label class="inline-flex items-center space-x-3 rtl:space-x-reverse filament-forms-field-wrapper-label" for="{{ $category['name'] }}">
                                            <span class="text-sm font-medium leading-4 text-gray-700">{{ $category['name'] }}</span>
                                        </label>
                                    </div>
                                    <div class="flex items-center space-x-2 rtl:space-x-reverse group filament-forms-text-input-component">
                                        <div class="flex-1 relative" x-data="{}">
                                            <input wire:model.lazy="values.{{ $type }}.{{ $id }}.value" type="number" id="{{ $category['name'] }}" class="block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70 border-gray-300">
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none w-6">
                                                <span class="text-gray-500 sm:text-sm"> ft </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 text-right flex justify-end items-end mb-2">
                            <span>@money($values[$type][$id]['value']) ft</span>
                        </div>
                        <div class="col-span-1 text-right flex justify-end items-end mb-2">
                            <span>@money($previousMonthValues[$type][$id]['value']) ft</span>
                        </div>
                        <div class="col-span-1 text-right flex justify-end items-end mb-2">
                            <span class="{{ $previousMonthValues[$type][$id]['change'] > 0 ? 'text-success-500' : 'text-danger-500' }}">@money($previousMonthValues[$type][$id]['change']) ft</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
