<div class="grid grid-cols-2 gap-2 divide-x">
    @foreach($categories as $category)
        <div class="col-span-1 border border-gray-300 bg-white rounded-xl shadow-sm">
            <div class="grid grid-cols-5 gap-2 p-4">
                <div class="col-span-2 text-left font-bold text-xl">{{ $category->name }}</div>
                <div class="col-span-1 text-center font-bold text-xs">TERV</div>
                <div class="col-span-1 text-center font-bold text-xs">VALÓDI</div>
                <div class="col-span-1 text-center font-bold text-xs">DIFF</div>
                @foreach($category->children as $child)
                    <div class="col-span-2 text-left text-xs">{{ $child->name }}</div>
                    <div class="col-span-1 text-right text-xs">@money($child->budget_plans_sum_value ?? 0) ft</div>
                    <div class="col-span-1 text-right text-xs">@money($child->budgets_sum_value ?? 0) ft</div>
                    <div class="col-span-1 text-right text-xs">@money($child->difference  ?? 0) ft</div>
                @endforeach
            </div>
        </div>
    @endforeach

</div>
