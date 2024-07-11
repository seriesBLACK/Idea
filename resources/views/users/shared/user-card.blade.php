<div class="card">
  <div class="px-3 pt-4 pb-2">
      <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <img style="width:150px" class="me-3 avatar-sm rounded-circle"
            src="{{$user->getImageUrl()}}" alt="Profile image">
              <div>
                  <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                      </a></h3>
                  <span class="fs-6 text-muted">{{ $user->email }} </span>
              </div>
          </div>
          <div>
            @if (Auth::id() == $user->id)
            <a href="{{route('user.edit', $user->id)}}">edit</a>
            @endif
          </div>
      </div>
      <div class="px-2 mt-4">
          <h5 class="fs-5"> Bio : </h5>
          <p class="fs-6 fw-light">
              {{ $user->bio }}
          </p>
          @include('users.shared.user-stats')
          @auth()
              @if (Auth::user()->isNot($user))
                  <div class="mt-3">
                      @if (Auth::user()->follows($user))
                          <form method="POST" action="{{ route('user.unfollow', $user->id) }}">
                              @csrf
                              <button type="submit" class="btn btn-primary btn-sm"> UnFollow </button>
                          </form>
                      @else
                          <form method="POST" action="{{ route('user.follow', $user->id) }}">
                              @csrf
                              <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                          </form>
                      @endif
                  </div>
              @endif
          @endauth
      </div>
  </div>
</div>