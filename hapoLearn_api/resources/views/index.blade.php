@extends('layouts.app')

@section('content')
    <main>
        <section class="banner">
            <div class="banner-img">
            </div>
            <div class="banner-content">
                <div>
                    <p class="">Learn Anytime, Anywhere</p>
                    <div class="banner-content-imgsmall">at HapoLearn <img src="{{ asset('images/imgHaposmall.png') }}" alt="imgHaposmall"> !
                    </div>
                    <p class="banner-tagp">Interactive lessons, "on-the-go" <br>
                        practice, peer support</p>
                    @if (Auth::check())
                        <form action="{{ route('courses.index') }}" method="get">
                            <button type="submit" class="banner-btn">Start Learning Now!</button>
                        </form>
                    @else
                        <button class="banner-btn btn-click">Start Learning Now!</button>
                    @endif
                </div>
            </div>
        </section>
        <section class="courses custom-container text-center">
            <div class="courses-list d-sm-flex justify-content-around">
                @foreach($courses as $c)
                    <div class="card">
                        <div class="courses-img courses-hcj">
                            <img src="{{ $c->img_url }}" class="card-img-top w-100" alt="img.{{ $c->title }}">
                        </div>
                        <div class="card-body courses-card-body">
                            <div class="card-title">{{ $c->title }}</div>
                            <p class="card-text">
                                {{ limitString($c->description, 70)}}
                            </p>
                            <a href="{{ route('courses.show', $c->id) }}" class="btn courses-btn">Take This Course</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="courses-other">
                <p class="text-center">Other courses</p>
                <div class="courses-other-list d-sm-flex justify-content-around">
                    @foreach($courses as $c)
                        <div class="card">
                            <div class="courses-img courses-hcj">
                                <img src="{{ $c->img_url }}" class="card-img-top w-100" alt="img.{{ $c->title }}">
                            </div>
                            <div class="card-body courses-card-body">
                                <div class="card-title">{{ $c->title }}</div>
                                <p class="card-text">
                                    {{ limitString($c->description, 70)}}
                                </p>
                                <a href="{{ route('courses.show', $c->id) }}" class="btn courses-btn">Take This Course</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('courses.index') }}" class="courses-view-courses">View All Our Courses <i
                        class="fa fa-long-arrow-alt-right"></i></a>
            </div>
        </section>
        <section class="whyhapo-lg">
            <div class="whyhapo-topimg">
                <img src="{{ asset('images/bgwhylearnhapolearnsmalllaptop.png') }}" alt="bgwhylearnhapolearnsmalllaptop"
                     class="w-100">
            </div>
            <div class="whyhapo-content d-flex">
                <div class="whyhapo-left">
                    <div class="whyhapo-title">Why HapoLearn?</div>
                    <span><i class="fa fa-check-circle"></i>Interactive lessons, "on-the-go" practice, peer
                            support.</span>
                    <span><i class="fa fa-check-circle"></i>Interactive lessons, "on-the-go" practice, peer
                            support.</span>
                    <span><i class="fa fa-check-circle"></i>Interactive lessons, "on-the-go" practice, peer
                            support.</span>
                    <span><i class="fa fa-check-circle"></i>Interactive lessons, "on-the-go" practice, peer
                            support.</span>
                    <span><i class="fa fa-check-circle"></i>Interactive lessons, "on-the-go" practice, peer
                            support.</span>
                </div>
                <div class="whyhapo-right">
                    <img src="{{ asset('images/bgwhylearnhapolearnsmall.png') }}" alt="bgwhylearnhapolearnsmall"
                         class="w-100">
                </div>
            </div>
        </section>
        <section class="whyhapo-md">
            <div class="whyhapo-top d-flex">
                <div class="whyhapo-topimg">
                    <img src="{{ asset('images/bgwhylearnhapolearnsmalllaptop.png') }}"
                         alt="bgwhylearnhapolearnsmalllaptop"
                         class="w-100">
                </div>
                <div class="whyhapomd-title">Why HapoLearn?</div>
            </div>
            <div class="whyhapo-bot d-sm-flex">
                <div class="whyhapomd-text ">
                        <span><i class="fa fa-check-circle"></i>Interactive lessons, "on-the-go" practice, peer
                            support.</span>
                    <span><i class="fa fa-check-circle"></i>Interactive lessons, "on-the-go" practice, peer
                            support.</span>
                    <span><i class="fa fa-check-circle"></i>Interactive lessons, "on-the-go" practice, peer
                            support.</span>
                    <span><i class="fa fa-check-circle"></i>Interactive lessons, "on-the-go" practice, peer
                            support.</span>
                    <span><i class="fa fa-check-circle"></i>Interactive lessons, "on-the-go" practice, peer
                            support.</span>
                </div>
                <div class="whyhapomd-right">
                    <img src="{{ asset('images/bgwhylearnhapolearnsmall.png') }}" alt="bgwhylearnhapolearnsmall" class="w-100">
                </div>
            </div>
        </section>
        <section class="feedback">
            <div class="feedback-title">Feedback</div>
            <p class="feedback-undertitle">What other students turned professionals have to say about us after
                learning
                with us and reaching their goals</p>
            <div class="feedback-content custom-container">
                @foreach($reviews as $rv)
                    <div class="feedback-item">
                        <div class="feedback-text">
                            <p class="review-text">
                                {{ limitString($c->description, 130)}}
                            </p>
                        </div>
                        <div class="feedback-bot">
                            <div class="feedback-img">
                                <img src="{{ $rv->user->avata_url }}" alt="feedback_img_cat"
                                     class="w-100">
                            </div>
                            <div class="feedback-right">
                                <p>{{ $rv->user->name }}</p>
                                <span>{{ $rv->course->title }}</span>
                                <div class="feedback-stars">
                                    @for($i = 0; $i < $rv->star_rating; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section class="slogan d-flex justify-content-center align-items-center">
            <div class="slogan-content text-center">
                <p>Become a member of our
                    <br>
                    growing community!
                </p>
                @if (Auth::check())
                    <form action="{{ route('courses.index') }}" method="get">
                        <button type="submit" class="slogan-btn">Start Learning Now!</button>
                    </form>
                @else
                    <button class="slogan-btn btn-click">Start Learning Now!</button>
                @endif
            </div>
        </section>
        <section class="statistic">
            <div class="statistic-title">Statistic</div>
            <div class="counters d-sm-flex justify-content-between">
                <div class="statistic-item">
                    <p>Courses</p>
                    <span class="counter">{{ $numberCourse }}</span>
                </div>
                <div class="statistic-item">
                    <p>Lessons</p>
                    <span class="counter">{{ $numberLesson }}</span>
                </div>
                <div class="statistic-item">
                    <p>Learners</p>
                    <span class="counter">{{ $numberUser }}</span>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('messenger')
    <div class="icon-mess">
        <div class="icon-img d-flex align-items-center justify-content-center">
            <i class="fab fa-facebook-messenger"></i>
        </div>
        <div class="mess-content">
            <div class="mess-name">HapoLearn</div>
            <div class="mess-ava d-flex">
                <div class="ava-hapo">
                    <img src="{{ asset('images/ava_hapo.png') }}" alt="avata_hapo" class="w-100">
                </div>
                <div class="mess-chat">
                    <p>HapoLearn xin chào bạn. <br>
                        Bạn cần chúng tôi trợ giúp gì không?</p>
                </div>
            </div>
            <button class="mess-btn"><i class="fab fa-facebook-messenger"></i> <span>Đăng nhập vào
                        Messenger</span></button>
            <div class="mess-text">Chat với HapoLearn trong Messenger</div>
            <div class="icon-close"><i class="fa fa-times"></i></div>
        </div>

    </div>
@endsection
