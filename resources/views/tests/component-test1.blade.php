<x-tests.app>
  <x-slot name="header">header1</x-slot>
component-test-1
  <x-tests.card title="タイトル1" content="本文1" :message="$message"/>
  {{-- コメント:属性ではなく変数としてcomponent側から受け取りたい場合(ここではmessage)は、:を最初につける。$messageで受け取ってる値は
    /tests/card の "{{$message }}"である。--}}
  {{-- コメント:resources/views/components/tests/card.blade.phpファイルのcomponent側で設定された
    $title,$content(属性)にそれぞれ値を設定している。 --}}
    {{-- コメント--}}

  <x-tests.card title="タイトルB"/>
  {{-- こんな感じでcomponent側から渡さないといけない$contentなどを渡していないとエラーが出るので --}}
  {{-- そんな場合にprops(連想配列形式)で初期値を設定してあげると問題解決できる。(tests/card.blade.php内に記述) --}}

  <x-tests.card title="タイトルCSSを変更したい" class="bg-red-200"/>
  {{-- class="bg-red-500"これは「class属性の上書き」を意味するのでcard.bladeのclass="border-2 shadow-md w-1/4 p-2が上書きされてしまう。 --}}
  {{-- 上書きされないようにするにはcard.bladeで{{attribute}}の後ろに「->merge」をつけないといけない --}}

</x-tests.app>
{{--  <x-tests.app>の始まりのタグは要らないみたいだ？！
testsフォルダのapp.blade.php を示す。xは「resources/views/components」。
name="header"はcomponent側の {{ $header }} の事を示している。
resources/views/components/tests/app.blade.php のslotにこのタグで囲んだ要素を「差し込む」ってこと --}}