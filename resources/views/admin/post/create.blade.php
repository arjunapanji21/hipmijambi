@extends('admin.layout')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<section>
    <div class="mb-2">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Admin
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Posts</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">New post</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <h2 id="test" class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add New Post</h2>

    <div class="bg-white p-4 rounded-lg dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="flex flex-col lg:flex-row gap-4">
            <div class="w-full lg:w-3/4">
                <div class="mb-2">
                    <label for="title"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" name="title" id="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Add post title">
                </div>
                <div class="mb-2">
                    <label for="content"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                    <textarea id="editor" class="tinyMce min-h-screen" name="content" required></textarea>
                </div>
            </div>
            <div class="w-full lg:w-1/4">
                <div class="mb-2">
                    <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Slug</label>
                    <input readonly type="text" name="slug" id="slug"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="">
                </div>
                <div class="mb-2">
                    <label for="excerpt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Excerpt</label>
                    <textarea id="excerpt" name="excerpt" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Add post excerpt" required></textarea>
                </div>
                <div class="mb-2">
                    <label for="post_category_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select id="post_category_id" name="post_category_id"
                        class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option disabled>Post category:</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="featured-image"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Featured Image</label>

                    <div class="flex items-center justify-center w-full">
                        <label for="featured-image"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">JPG (MAX. 800x400px)</p>
                            </div>
                            <input id="featuredImage" type="file" class="hidden" />
                        </label>
                    </div>

                </div>
            </div>
        </div>
        <button id="btnDraft"
            class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            Save to draft
        </button>
        <button id="btnPublish"
            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Publish
        </button>
    </div>
</section>
@endsection

@section('script')
<script type="module">
    $(document).ready(function () {
        $(".select2").select2();

        $("#title").change(function () {
        $("#slug").val(this.value.toLowerCase().replace(/\s+/g, '-'));
    });

    $("#btnDraft").click(function () {
        var title = $("#title").val();
        var content = tinymce.get('editor').getContent();
        var slug = $("#slug").val();
        var excerpt = $("#excerpt").val();
        var post_category_id = $("#post_category_id").val();
        var featuredImage = $("#featuredImage").val();

        var formData = {
            "title" : title,
            "content" : content,
            "slug" : slug,
            "excerpt" : excerpt,
            "post_category_id" : post_category_id,
            "featuredImage" : featuredImage,
        };

        // append csrf token to formData
        formData._token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '{{route("admin.posts.create.draft")}}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': formData._token
            },
            data: formData,
            success: function(response){
                alert(response.msg);
                window.location.href = "{{route('admin.posts.index')}}";
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
            }
        });
    });

    $("#btnPublish").click(function () {
        var title = $("#title").val();
        var content = tinymce.get('editor').getContent();
        var slug = $("#slug").val();
        var excerpt = $("#excerpt").val();
        var post_category_id = $("#post_category_id").val();
        var featuredImage = $("#featuredImage").val();

        var formData = {
            "title" : title,
            "content" : content,
            "slug" : slug,
            "excerpt" : excerpt,
            "post_category_id" : post_category_id,
            "featuredImage" : featuredImage,
        };

        // append csrf token to formData
        formData._token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '{{route("admin.posts.create.publish")}}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': formData._token
            },
            data: formData,
            success: function(response){
                alert(response.msg);
                window.location.href = "{{route('admin.posts.index')}}";
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
            }
        });
    });
    });
</script>
@endsection