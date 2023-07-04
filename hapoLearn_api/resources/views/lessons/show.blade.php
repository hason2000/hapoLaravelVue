@extends('layouts.app')

@section('content')
    @if (session('error-join-course'))
        <div class="error error-joincourse">
        </div>
    @elseif (session('error-end-course'))
        <div class="error error-endcourse">
        </div>
    @endif
    <div class="lesson-detail">
        <div class="detail-link">
            <a href="{{ route('home') }}">Home</a> > <a href="{{ route('courses.index') }}">All courses</a> > <a href="{{ route('courses.show', $course->id) }}">Course detail</a> > <a href="{{ route('courses.lessons.show', [$course->id, $lesson->id]) }}">Lesson detail</a>
        </div>
        <div class="detail-content d-flex">
            <div class="detail-left">
                <div class="detail-img">
                    <img class="w-100 h-100" src="{{ $course->img_url }}" alt="img of {{ $course->title }}">
                </div>
                <div class="progress mt-4">
                    <p class="number-progress">@if (is_null($userLesson)) 0 @else {{ round( $userLesson->progress, PHP_ROUND_HALF_EVEN) }} @endif%</p>
                    <div class="progress-bar" role="progressbar" style="width:@if (is_null($userLesson)) 0% @else {{ $userLesson->progress }}% @endif;"></div>
                </div>
                <div class="detail-left-content">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Descriptions</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="doc-tab" data-toggle="tab" href="#doc" role="tab" aria-controls="doc" aria-selected="false">Documents</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <div class="des-content">
                                <div class="des-title">
                                    Descriptions lesson
                                </div>
                                <div class="des-text">{{ $lesson->description }}</div>
                                <div class="reqire-title">Requirements</div>
                                <div class="require-text">{{ $lesson->description }}</div>
                                <div class="des-tag d-flex align-items-center">
                                    <div class="des-tag-title">Tag:</div>
                                    <div class="des-tag-content d-flex align-items-center">
                                        @foreach ($tags as $tag)
                                            <div class="des-tag-item">
                                                #{{ $tag->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="doc" role="tabpanel" aria-labelledby="doc-tab">
                            <div class="lesson-doc-content">
                                <div class="doc-title">Documents</div>
                                <div class="doc-content">
                                    @forelse ($documents as $document)
                                        <div class="doc-item d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="doc-icon">
                                                    <img src="{{ asset('images/doc_img.png') }}" alt="icondoc">
                                                </div>
                                                <div class="doc-format">docx</div>
                                                <a class="doc-name" href="{{ $document->link }}">{{ $document->name }}</a>
                                            </div>
                                            <div class="d-flex">
                                                <a href="{{ $document->link }}" class="doc-btn mr-1">Preview</a>
                                                @include('buttons.button_document')
                                            </div>
                                        </div>
                                    @empty
                                        <div>Không có bài học nào</div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="detail-right">
                <div class="course-info">
                    <div class="info-item info-learner d-flex align-items-center">
                        <i class="far fa-desktop"></i>
                        <span class="info-text info-course">Course</span>
                        <span class="colon">:</span>
                        <span class="data">{{ $course->title }}</span>
                    </div>
                    <div class="info-item info-learner d-flex align-items-center">
                        <i class="fa fa-users"></i>
                        <span class="info-text">Learners</span>
                        <span class="colon">:</span>
                        <span class="data">{{ $course->learner }}</span>
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
                    <div class="lesson-detail-btn text-center">
                        @include('buttons.button_course')
                    </div>
                </div>
                @include('courses.course_other')
            </div>
        </div>
    </div>
@endsection
