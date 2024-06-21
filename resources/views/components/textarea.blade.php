<label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
<textarea id="message" name='content' rows="10"
    class=" @error('content') border-red-500 @enderror block  w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    placeholder="Write your thoughts here...">{{$slot}}</textarea>
@error('content')
<div class="text-red-500 text-sm">{{ $message }}</div>
@enderror