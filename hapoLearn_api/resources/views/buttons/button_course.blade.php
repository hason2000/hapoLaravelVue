@if (Auth::check() && Auth::user()->isJoined($course->id) && Auth::user()->isLearning($course->id))
    <form action="{{ route('users-courses.update', $course->id) }}" method="POST">
        @method('PUT')
        @csrf
        @if (Auth::check())
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        @endif
        <button type="button" class="btn-join" data-toggle="modal" data-target="#endCourseModal">Kết thúc khóa học</button>
        <div class="modal fade" id="endCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Kết thúc khóa học</h5>
                  <button type="button" class="close btn-end-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Bạn có chắc muốn kết thúc khóa học này chứ!!!
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit">Continue</button>
                </div>
              </div>
            </div>
          </div>
    </form>
@elseif (Auth::check() && Auth::user()->isJoined($course->id) && !Auth::user()->isLearning($course->id))
    <button type="submit" class="btn-join btn-join-learned" disabled>Đã hoàn thành</button>
@else
    <form action="{{ route('users-courses.store') }}" method="post">
        @csrf
        <input type="hidden" name="course_id" value="{{ $course->id }}">
        @if (Auth::check())
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        @endif
        <button type="submit" class="btn-join">Tham gia khóa học</button>
    </form>
@endif
