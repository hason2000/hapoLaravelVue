@extends('layouts.app')

@section('content')
    @if (session('error-join-course'))
        <div class="error error-joincourse">
        </div>
    @elseif (session('error-end-course'))
        <div class="error error-endcourse">
        </div>
    @endif
    <div class="course-detail">
        <div class="detail-link">
            <a href="{{ route('home') }}">Home</a> > <a href="{{ route('courses.index') }}">All courses</a> > <a href="{{ route('courses.show', $course->id) }}">Course detail</a>
        </div>
        <div class="detail-content d-flex">
            <div class="detail-left">
                <div class="detail-img">
                    <img class="w-100 h-100" src="{{ $course->img_url }}" alt="img of {{ $course->title }}">
                </div>
                <div class="detail-left-content">
                    <ul class="nav nav-tabs nav-tab-cus" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="lesson-tab" data-toggle="tab" href="#lesson" role="tab" aria-controls="lesson" aria-selected="true">Lessons</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="teacher-tab" data-toggle="tab" href="#teacher" role="tab" aria-controls="teacher" aria-selected="false">Teacher</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="lesson" role="tabpanel" aria-labelledby="lesson-tab">
                            <div class="lesson-top d-flex align-item-center justify-content-between">
                                <form action="{{ route('courses.show', $course->id) }}" method="get">
                                    <input type="text" placeholder="Search..." name="keyword" @if (!is_null($request['keyword']))
                                        value="{{ $request['keyword'] }}"
                                    @endif>
                                    <i class="fa fa-search"></i>
                                    <button type="submit">Tìm kiếm</button>
                                </form>
                                @include('buttons.button_course')
                            </div>
                            <div class="lesson-content">
                                @forelse ($lessons as $key => $lesson)
                                    <div class="lesson-item d-flex align-item-center justify-content-between">
                                        <div class="lesson-item-text">
                                            @if (isset($request['page']) && !is_null($request['page']))
                                               <span class="lesson-stt">{{ Config::get('lesson.items_per_page') * 
                                                ($request['page'] - 1) + $key + 1 }}.</span>
                                            @else
                                                <span class="lesson-stt">{{ $key + 1 }}.</span>
                                            @endif
                                            <a href="{{ route('courses.lessons.show', [$course->id, $lesson->id]) }}" class="lesson-title">{{ $lesson->name }}</a>
                                        </div>
                                        <a href="{{ route('courses.lessons.show', [$course->id, $lesson->id]) }}" class="lesson-btn">
                                            {{ $lesson->isLearned() ? 'Learned' : 'Learn' }}
                                        </a>
                                    </div>
                                @empty
                                    <div class="py-5 text-center">
                                        <p class="text-notify">Không có bài học nào phù hợp!!!</p>
                                    </div>
                                @endforelse
                            </div>
                            <div class="lesson-pagination d-flex justify-content-end">
                                {{ $lessons->withQueryString()->links('layouts.pagination') }}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="teacher" role="tabpanel" aria-labelledby="teacher-tab">
                            <div class="teacher-content">
                                <div class="teacher-title">Main Teacher</div>
                                @foreach ($teachers as $teacher)
                                    <div class="teacher-item">
                                        <div class="item-top d-flex align-items-center">
                                            <div class="item-avata">
                                                <div class="avata-teacher-cus">
                                                    <img class="w-100 h-100" src="{{ $teacher->avata_url }}" alt="img of {{ $teacher->name }}">
                                                </div>
                                            </div>
                                            <div class="item-teacher-info">
                                                <div class="teacher-name">{{ $teacher->name }}</div>
                                                <span>Second Year Teacher</span>
                                                <div class="teacher-icon d-flex align-items-center">
                                                    <div class="icon-google">
                                                        <i class="fab fa-google-plus-g"></i>
                                                    </div>
                                                    <div class="icon-facebook">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad eaque non alias odit aliquid ut dignissimos numquam exercitationem porro eligendi corrupti facere earum, aperiam repellat qui. Aspernatur assumenda facere fugit.</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                            @if (Session::has('addReviewSuccess') || Session::has('data'))
                                <div class="check active d-none"></div>
                            @endif
                            <div class="review-content">
                                <div class="review-total">
                                    {{ count($reviews) }} Reviews
                                </div>
                                @if (!empty($reviews->toArray()))
                                    <div class="review-mid d-flex align-items-center">
                                        <div class="review-left text-center">
                                            <div class="rating-number">{{ $course->caculateReview() }}</div>
                                            <div class="rating-star">
                                                @for ($i = 1; $i <= $course->caculateReview(); $i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                            </div>
                                            <div class="rating-total">{{ count($reviews) }} Ratings</div>
                                        </div>
                                        <div class="review-right">
                                            <div class="review-right-item d-flex align-items-center">
                                                <span class="title-first-star">5 stars</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $course->caculateProgressReview($course->getReviewsFiveStar()) }}%"></div>
                                                </div>
                                                <span class="total-cmt">{{ $course->getReviewsFiveStar() }}</span>
                                            </div>
                                            <div class="review-right-item d-flex align-items-center">
                                                <span class="title-first-star">4 stars</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $course->caculateProgressReview($course->getReviewsFourStar()) }}%"></div>
                                                </div>
                                                <span class="total-cmt">{{ $course->getReviewsFourStar() }}</span>
                                            </div>
                                            <div class="review-right-item d-flex align-items-center">
                                                <span class="title-first-star">3 stars</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $course->caculateProgressReview($course->getReviewsThreeStar()) }}%"></div>
                                                </div>
                                                <span class="total-cmt">{{ $course->getReviewsThreeStar() }}</span>
                                            </div>
                                            <div class="review-right-item d-flex align-items-center">
                                                <span class="title-first-star">2 stars</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $course->caculateProgressReview($course->getReviewsTwoStar()) }}%"></div>
                                                </div>
                                                <span class="total-cmt">{{ $course->getReviewsTwoStar() }}</span>
                                            </div>
                                            <div class="review-right-item d-flex align-items-center">
                                                <span class="title-first-star">1 stars</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $course->caculateProgressReview($course->getReviewsOneStar()) }}%"></div>
                                                </div>
                                                <span class="total-cmt">{{ $course->getReviewsOneStar() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-detail">
                                        <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="show-review">Show all reviews <i class="fas fa-angle-down"></i></a>
                                        <div class="collapse show" id="collapseExample">
                                            @foreach ($reviews as $review)
                                                <div class="review-detail-item">
                                                    <div class="review-detail-top d-flex align-items-center">
                                                        <div>
                                                            <div class="avata-user-review">
                                                                <img src="{{ $review->getUserReview()->make_avata_url }}" alt="imgof{{ $review->getUserReview()->username }}" class="w-100 h-100">
                                                            </div>
                                                        </div>
                                                        <div class="review-detail-name">
                                                            {{ $review->getUserReview()->username }}
                                                        </div>
                                                            <div class="review-detail-star">
                                                                @for ($i = 0; $i < $review->star_rating; $i++)
                                                                    <i class="fa fa-star"></i>
                                                                @endfor
                                                            </div>
                                                        <span>{{ $review->formatDateTime() }}</span>
                                                    </div>
                                                    <div class="review-detail-text">
                                                        {{ $review->content }}
                                                    </div>
                                                </div> 
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                <div class="add-review">
                                    <div class="add-review-title">Leave a Review</div>
                                    @if (Auth::check())
                                        <div>
                                            <span>Message</span>
                                            <form action="{{ in_array(Auth::id(), $reviews->pluck('user_id')->toArray()) ? route('reviews.update', $reviewId) : route('reviews.store') }}" method="post">
                                                @csrf
                                                @if (in_array(Auth::id(), $reviews->pluck('user_id')->toArray()))
                                                    @method('PUT')
                                                @endif
                                                @if (Auth::check())
                                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                                @endif
                                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                <textarea name="content" cols="75" rows="5" @if (!is_null(session('data'))) value="{{ session('data')['content'] }}" @endif></textarea>
                                                @if ($errors->first('star_rating'))
                                                    <div class="alert alert-warning alert-star" role="alert">
                                                        {{ $errors->first('star_rating') }}
                                                    </div>
                                                @endif
                                                <div class="star-vote d-flex align-items-center">
                                                    <span class="star-vote-title">Vote</span>
                                                    <div class="star-vote-rating">
                                                        <label for="one-star" class="star-container">
                                                            <i class="fa fa-star fa-star-cus" data-index="1"></i>
                                                        </label>
                                                        <input type="radio" id="one-star" name="star_rating" value="1">
                                                        <label for="two-star" class="star-container">
                                                            <i class="fa fa-star fa-star-cus" data-index="2"></i>
                                                        </label>
                                                        <input type="radio" id="two-star" name="star_rating" value="2">
                                                        <label for="three-star" class="star-container">
                                                            <i class="fa fa-star fa-star-cus" data-index="3"></i>
                                                        </label>
                                                        <input type="radio" id="three-star" name="star_rating" value="3">
                                                        <label for="four-star" class="star-container">
                                                            <i class="fa fa-star fa-star-cus" data-index="4"></i>
                                                        </label>
                                                        <input type="radio" id="four-star" name="star_rating" value="4">
                                                        <label for="five-star" class="star-container">
                                                            <i class="fa fa-star fa-star-cus" data-index="5"></i>
                                                        </label>
                                                        <input type="radio" id="five-star" name="star_rating" value="5">
                                                    </div>
                                                    <span>(stars)</span>
                                                </div>
                                                <div class="w-100 text-right">
                                                    <button type="submit" class="star-vote-btn">Send</button>
                                                </div>
                                            </form>
                                        </div>
                                    @else
                                        <div class="alert alert-primary" role="alert">
                                            Vui lòng đăng nhập để comment!
                                            <span class="review-login">Here</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail-right">
                <div class="course-description">
                    <div class="description-title">
                        Descriptions course
                    </div>
                    <div class="description-detail">
                        {{ $course->description }}
                    </div>
                </div>
                <div class="course-info">
                    <div class="info-item info-learner d-flex align-items-center">
                        <i class="fa fa-users"></i>
                        <span class="info-text">Learners</span>
                        <span class="colon">:</span>
                        <span class="data">{{ $course->learner }}</span>
                    </div>
                    <div class="info-item info-lesson d-flex align-items-center">
                        <i class="fa fa-money-check"></i>
                        <span class="info-text text-lesson">Lessons</span>
                        <span class="colon">:</span>
                        <span class="data">{{ $course->lessons->count() }} lessons</span>
                    </div>
                    <div class="info-item info-time d-flex align-items-center">
                        <i class="far fa-clock"></i>
                        <span class="info-text text-time">Times</span>
                        <span class="colon">:</span>
                        <span class="data">{{ $course->time }} hours</span>
                    </div>
                    <div class="info-item info-tag d-flex align-items-center">
                        <i class="far fa-key"></i>
                        <span class="info-text text-tag">Tags</span>
                        <span class="colon">:</span>
                        <span class="data">
                            @foreach ($tags as $tag)
                                <a href="{{ route('courses.index', ['tag[]' => $tag->id]) }}">{{ $tag->name }},</a>
                            @endforeach
                        </span>
                    </div>
                    <div class="info-item info-price d-flex align-items-center">
                        <i class="far fa-money-bill-alt"></i>
                        <span class="info-text text-price">Price</span>
                        <span class="colon">:</span>
                        @if ($course->price == 0)
                            <span class="data">Free</span>   
                        @else
                            <span class="data">{{ $course->price }} $</span>
                        @endif
                    </div>
                </div>
                @include('courses.course_other')
            </div>
        </div>
    </div>
@endsection
