@extends('layouts.app')

@section('content')
    <div class="user-profile d-flex ">
        <div class="profile-left">
            <div class="text-center profile-infor">
                <div class="profile-avata">
                    <img class="w-100 h-100 profile-img-avata" src="{{ $user->make_avata_url }}" alt="imgOf{{ $user->username }}">
                </div>
                <p class="profile-name">{{ $user->name }}</p>
                <p class="profile-email">{{ $user->email }}</p>
                <label for="avata_url" class="profile-label">
                    <i class="fas fa-camera">
                    </i>
                </label>
            </div>
            <div class="profile-date">
                <i class="fas fa-birthday-cake"></i>
                <span>{{ $user->getDateBirthday() }}</span>
            </div>
            <div class="profile-phone">
                <i class="fas fa-phone-alt"></i>
                <span>{{ $user->getPhone() }}</span>
            </div>
            <div class="profile-address">
                <i class="fas fa-home"></i>
                <span>{{ $user->getAddress() }}</span>
            </div>
            <div class="profile-descrip">
                {{ $user->getAboutMe() }}
            </div>
        </div>
        <div class="profile-right">
            <div class="profile-mycourse">
                <div class="profile-mycourse-title">My courses</div>
                <div class="profile-line"></div>
                <div class="profile-mycourse-content d-flex justify-content-center">
                    @foreach ($courses as $course)
                        <div class="mycourse-item text-center">
                            <div class="mycourse-img">
                                <img class="w-100 h-100" src="{{ $course->img_url }}" alt="imgOf{{ $course->title }}">
                            </div>
                            <div class="mycourse-name">
                                {{ $course->title }}
                            </div>
                        </div>                        
                    @endforeach
                    <a href="{{ route('courses.index') }}" class="mycourse-add-cus">
                        <div class="mycourse-item text-center">
                            <div class="mycourse-add">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="mycourse-add-func">
                                Add
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="profile-edit">
                <div class="profile-mycourse-title">Edit profile</div>
                <div class="profile-line"></div>
                <form action="{{ route('users.update', Auth::id()) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="file" name="file_img" id="avata_url" class="profile-file">
                    @if (Auth::check())
                        <input type="hidden" name="id" value="{{ Auth::id() }}">
                    @endif
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="#name" name="name" placeholder="Your name..." value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="#email" name="email" placeholder="Your email..." value="{{ $user->email }}" disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">Date of birthday:</label>
                                <input type="date" class="form-control" id="#date" name="date_of_birth" onfocus="(this.type='date')" value="{{ $user->getDateOfBirthDefault() }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" id="#phone" name="phonenumber" placeholder="Your phone..." value="{{ $user->getPhone() }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" id="#address" name="address" placeholder="Your address..." value="{{ $user->getAddress() }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="aboutme">About me:</label>
                                <textarea class="form-control" name="aboutme" id="#aboutme" cols="30" rows="10">{{ $user->getAboutMe() }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 text-right">
                        <button type="submit" class="btn-update-profile">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
