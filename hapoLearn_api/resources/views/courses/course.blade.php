<div class="col-md-6">
    <div class="ls-item">
        <div class="ls-item-top d-flex">
            <div class="ls-img">
                <div class="ls-img-cus">
                    <img class="w-100 h-100" src="{{ $course->img_url }}" alt="imgof{{ $course->title }}">
                </div>
            </div>
            <div class="ls-item-content">
                <div class="ls-item-title">{{ $course->title }}</div>
                <p class="ls-item-text">
                    {{ limitString($course->description, 100)}}
                </p>
            </div>
        </div>
        <a class="ls-item-btn text-right" href="{{ route('courses.show', $course->id) }}">More</a>
        <div class="ls-item-bot d-flex justify-content-between">
            <div class="item-bot-static">
                <p>Learners</p>
                <p>
                    {{ $course->learner }}
                </p>
            </div>
            <div class="item-bot-static">
                <p>Lessons</p>
                <p>{{ $course->lesson }}</p>
            </div>
            <div class="item-bot-static">
                <p>Times</p>
                <p>{{ $course->time }} (h)</p>
            </div>
        </div>
    </div>
</div>
