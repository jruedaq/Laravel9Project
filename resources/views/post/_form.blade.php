@csrf

<label for="title" class="uppercase text-gray-700 text-xs">Título</label>
<span class="text-xs text-red-600">@error('title') {{ $message }} @enderror</span>
<input id="title" type="text" name="title" class="rounded border-gray-200 w-full mb-4"
       value="{{ old('title', $post->title) }}">

<label for="slug" class="uppercase text-gray-700 text-xs">Slug</label>
<span class="text-xs text-red-600">@error('slug') {{ $message }} @enderror</span>
<input id="slug" type="text" name="slug" class="rounded border-gray-200 w-full mb-4"
       value="{{ old('slug', $post->slug) }}">

<label for="body" class="uppercase text-gray-700 text-xs">Título</label>
<span class="text-xs text-red-600">@error('body') {{ $message }} @enderror</span>
<textarea name="body" id="body" rows="10"
          class="rounded border-gray-200 w-full mb-4">{{ old('body', $post->body) }}</textarea>

<div class="flex justify-between items-center">
    <a href="{{ route('posts.index') }}" class="text-indigo-600">Volver</a>
    <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2">
</div>
