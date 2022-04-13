@extends('layout.layout')

@section('title')edit {{$post['title']}}@endsection

@section('content')
<form class="max-w-md mx-auto flex flex-col items-center" action={{route('posts.edit', ['postId' => $post['id']])}} method="POST">
    @csrf
    @method('PATCH')
    <div class="form-control w-full max-w-xs ">
        <label class="label">
          <span class="label-text" for="title">Title</span>
          
        </label>
        <input value={{$post['title']}} name="title" type="text" id="title" placeholder="Post Title" class="input input-bordered w-full max-w-xs">
    </div>
    <div class="form-control w-full max-w-xs">
        <label class="label" for="body">
          <span class="label-text" >Body</span>
        </label>
        <textarea name="desc" id='body' class="textarea input-bordered h-52" placeholder="Post Body">{{$post['description']}}</textarea>
    </div>
    <div class="form-control w-full max-w-xs">
        <label class="label" for="author">
          <span class="label-text">Author</span>
        </label>
        <select name="author" class="input input-bordered
      block
      w-full
      px-3
      py-1.5
      font-normal
      rounded
      transition
      ease-in-out
      m-0
      " aria-label="Default select example" id="author">
        <option value={{$post->user_id}}  selected>{{$post->user->name}}</option>
        @foreach($users as $user)
        @if($user->id !== $post->user_id)
          <option  value={{$user->id}}>{{$user->name}}</option>
        @endif
        @endforeach
        </select>
    </div>
    @if($errors->any())
          @foreach($errors->all() as $error)
          <div class="alert alert-error w-80 shadow-lg mt-3">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
              <span>{{$error}}</span>
            </div>
          </div>
          @endforeach
    @endif
    <div class="form-actions flex flex-row-reverse w-full max-w-xs mt-4">
        <button type="sumbit" class="btn btn-primary btn-sm md:btn-md">Edit Post</button>
    </div>
</form>
@endsection