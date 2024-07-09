<div class="card">
  <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
 
  <div class="px-3 pt-4 pb-2">
      <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <img style="width:150px" class="me-3 avatar-sm rounded-circle"
            src="{{$user->getImageUrl()}}" alt="Profile image">
              <div>
                  <input type="text" name="name" class="form-control" value="{{$user->name}}">
                  @error('name')
            <span class="fs-6 text-danger">{{$message}}</span>
                
            @enderror
                  <span class="fs-6 text-muted">{{ $user->email }} </span>
              </div>
          </div>

         
          <div>
            @if (Auth::id() == $user->id)
            <a href="{{route('user.show', $user->id)}}">X</a>
            @endif
          </div>
      </div>
      <div class="mt-3">
        <label for="">Profile picture</label>
        <input type="file" name="image" class="form-control">
      </div>
      

      <div class="px-2 mt-4">
          <h5 class="fs-5"> Bio : </h5>
          <textarea name="bio" id="bio" cols="30" rows="2" class="form-control mb-2">{{$user->bio}}</textarea>
          @error('bio')
            <span class="fs-6 text-danger">{{$message}}</span>
                
            @enderror
            <button class="btn btn-primary btn-sm" type="submit">Update</button>
          @include('users.shared.user-stats')
          @auth()
              @if (Auth::user()->isNot($user))
                  <div class="mt-3">
                      @if (Auth::user()->follows($user))
                          <form method="POST" action="{{ route('users.unfollow', $user->id) }}">
                              @csrf
                              <button type="submit" class="btn btn-danger btn-sm"> UnFollow </button>
                          </form>
                      @else
                          <form method="POST" action="{{ route('users.follow', $user->id) }}">
                              @csrf
                              <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                          </form>
                      @endif
                  </div>
              @endif
          @endauth
      </div>
      
  </div>
</form>
</div>