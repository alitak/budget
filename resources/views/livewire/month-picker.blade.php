<div>
    <form action="#">
        <div class="flex space-x-4">
            <div class="filament-forms-field-wrapper">
                <div class="space-y-2">
                    <div class="flex items-center justify-between space-x-2 rtl:space-x-reverse">
                        <label class="inline-flex items-center space-x-3 rtl:space-x-reverse filament-forms-field-wrapper-label" for="year">
                            <span class="text-sm font-medium leading-4 text-gray-700">Év</span>
                        </label>
                    </div>
                    <div class="flex items-center space-x-2 rtl:space-x-reverse group filament-forms-text-input-component">
                        <div class="flex-1">
                            <input wire:model.lazy="year" type="number" id="year" maxlength="255" required="" class="block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70 border-gray-300">
                        </div>
                    </div>
                </div>
            </div>

            <div class="filament-forms-field-wrapper">
                <div class="space-y-2">
                    <div class="flex items-center justify-between space-x-2 rtl:space-x-reverse">
                        <label class="inline-flex items-center space-x-3 rtl:space-x-reverse filament-forms-field-wrapper-label" for="month">
                            <span class="text-sm font-medium leading-4 text-gray-700">Hónap</span>
                        </label>
                    </div>
                    <div class="flex items-center space-x-1 rtl:space-x-reverse group filament-forms-select-component">
                        <div class="flex-1 min-w-0">
                            <select id="month" wire:model.lazy="month" class="text-gray-900 w-32 transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70 border-gray-300">
                                <option value="1">január</option>
                                <option value="2">február</option>
                                <option value="3">március</option>
                                <option value="4">április</option>
                                <option value="5">május</option>
                                <option value="6">június</option>
                                <option value="7">július</option>
                                <option value="8">augusztus</option>
                                <option value="9">szeptember</option>
                                <option value="10">október</option>
                                <option value="11">november</option>
                                <option value="12">december</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
