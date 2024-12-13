@props(['category'])
<!-- if anything breaks, check the toggleCollapsible() function in javascript in views/components/admin.blade.php -->
<div>
    <div class="flex py-0 h-[100px]">
        @for($i = 0; $i < $category->depth; $i++)<div class="border border-l mr-8"></div>
            @endfor
            <div class="border border-l">
            </div>
            <div class="border border-b my-auto h-0 w-8"></div>
            <div class="flex border justify-between w-full items-center my-4">
                <div onclick="toggleCollapsible('{{$category->id}}')" class="flex items-center py-3 w-full">
                    <span id="chev-right-{{$category->id}}">
                        <i data-lucide="chevron-right"></i>
                    </span>
                    <span id="chev-down-{{$category->id}}" class="hidden">
                        <i data-lucide="chevron-down"></i>
                    </span>
                    <p class="text-2xl">{{ $category->name }}</p>
                </div>
                <div class="flex items-center px-4 gap-4">
                    <a href="{{ route('admin.categories.show', $category->id) }}" class="ml-2 text-green-500 hover:text-gray-700">
                        <i data-lucide="eye"></i>
                    </a>
                    <a href="{{ route('admin.categories.edit', $category) }}" class="ml-2 text-gray-500 hover:text-gray-700">
                        <i data-lucide="edit"></i>
                    </a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="flex items-center">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">
                            <i data-lucide="trash"></i>
                        </button>
                    </form>
                </div>
            </div>
    </div>

    @if ($category->children->isNotEmpty())
    <div id="{{$category->id}}" class="hidden">
        @foreach ($category->children as $child)
        <x-category :category="$child" :last="$loop->last" />
        @endforeach
    </div>

    @else
    <div id="{{$category->id}}" class="flex hidden">
        @for($i = 0; $i < $category->depth + 1; $i++)
            <div class="border border-l mr-8">
            </div>
            @endfor
            <p class="text-gray-500 text-xl">No subcategories</p>
    </div>
    @endif
</div>