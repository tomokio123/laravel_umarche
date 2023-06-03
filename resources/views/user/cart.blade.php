<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          カート
      </h2>
      {{--<!-- layouts/app.blade.php の{{ header }}ところ -->--}}
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  @if (count($products) > 0)
                    @foreach ($products as $product)
                    <div class="md:flex md:items-center mb-2">
                      <div class="md:w-3/12">
                        @php
                        $filename = $product->imageFirst->filename;
                        $replacedFilename = str_replace('public/products/', 'storage/products/', $filename); 
                        @endphp
                        @if ($filename !== null)
                        <img class="mx-auto w-30 h-30 object-cover" src="{{ asset($replacedFilename) }}">
                        @else
                        <img src="{{ asset("images/noimage.jpeg") }}">
                        @endif
                      </div>
                      <div class="md:w-4/12 md:ml-2">{{ $product->name }}</div>
                      <div class="md:w-3/12 flex justify-around">
                        {{--中間テーブル「Cart」にアクセスし(->pivot)、数量や金額を取得する--}}
                        <div>{{ $product->pivot->quantity }}</div>
                        <div>{{ number_format($product->pivot->quantity * $product->price )}}<span class="text-sm text-gray-700">円(税込)</span></div>
                      </div>
                      <div class="md:w-2/12">削除ボタン</div>
                    </div>
                    @endforeach
                  @else
                    カートに商品がありません
                  @endif
              </div>
          </div>
      </div>
  </div>
</x-app-layout>