<div class="course-other">
    <div class="course-other-top">Other Courses</div>
    <div class="course-other-content">
        @foreach ($courses as $key => $courseGet)
            @if ($courseGet !== $course)
                <div class="course-other-item">
                    {{ ++ $key }}. {{ $courseGet->title }}
                </div>
            @endif
        @endforeach
        <div class="course-other-btn">
            <form action="{{ route('courses.index') }}" method="get">
                <button>View all ours courses</button>
            </form>
        </div>
    </div>
</div>
