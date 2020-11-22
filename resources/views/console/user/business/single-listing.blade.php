@extends('themes.localsdirectory.layout.base')
@section ('page_name'){{ $business->name }}
@endsection
@section('styles')
@endsection
@section ('content')

    <!-- Hero Section Begin -->
    @if(!empty($business->mainPhoto))
        <div class="hero-listing set-bg" data-setbg="/storage/{{ str_replace("public/", "", $business->mainPhoto->file_path) }}">
    @else
        <div class="hero-listing set-bg" data-setbg="{{ asset('img/hero_listing.jpg') }}">
    @endif
            <div class="container promoted-hero-wrap">
                <div class="row promoted-hero">
                    <div class="col-md-12">
                        <h1>{{ $business->name }}</h1>
                    </div>
                </div>
            </div>
    </div>
    <section class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="business-image-slideshow owl-carousel">
                        @foreach($business->photos as $photo)
                            <a href="/storage/{{ str_replace("public/", "", $photo->file_path) }}" target="_blank">
                                <img src="/storage/{{ str_replace("public/", "", $photo->file_path) }}" />
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Begin -->
    <section class="about-section">
        <div class="intro-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="about-intro row">
                            <div class="col-sm-2">
                                <div class="rating-2"> {{ $business->rating() }}</div>
                                <div class="stars">
                                    @for($i=0;$i< floor($business->rating());$i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                    @if($business->rating() > floor($business->rating()) AND $business->rating() < ceil($business->rating()))
                                        <i class="fa fa-star-half-o"></i>
                                    @endif
                                </div>
                                <div class="dollars">
                                    @for($i=0;$i<$business->dollar_rating;$i++)
                                        <i class="fa fa-usd"></i>
                                    @endfor
                                </div>
                            </div>
                            <div class="col-sm-10 text">
                                <h2>{{ $business->name }}</h2>
                                <p>Explore some of the best places in the world</p>
                                <div class="visits">Visits - {{ $business->businessVisit->count() }}</div>
                                <div class="reviews">Reviews - {{ $business->reviews->count() }}</div>
                                <div class="questions">Questions - {{ $business->questions->count() }}</div>
                                <div class="check-ins">Check-ins - {{ $business->businessCheckIn->count() }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-1">
                        <div class="intro-share">
                            <div class="share-btn">
                                <a href="{{ route('console.user.businesses.business.update.social-media.create', ['user' => \Illuminate\Support\Facades\Auth::user()->id, 'business' => $business->id]) }}" class="btn btn-sm btn-danger m-1">Add Social Media Link</a>
                                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                    @if($business->is_active)
                                        <a href="{{ route('console.user.admin.update.business.disable', ['user'=> \Illuminate\Support\Facades\Auth::user()->id, 'business' => $business->id]) }}" class="btn btn-sm btn-danger m-1">Suspend Business</a>
                                    @else
                                        <a href="{{ route('console.user.admin.update.business.enable', ['user'=> \Illuminate\Support\Facades\Auth::user()->id, 'business' => $business->id]) }}" class="btn btn-sm btn-success m-1">Enable Business</a>
                                    @endif
                                @endif
                                <a href="{{route('console.user.businesses.business.edit', ['user'=> \Illuminate\Support\Facades\Auth::user()->id, 'business' => $business->id])}}" class="btn btn-danger">Edit Business</a>
                                <a href="{{route('console.user.businesses.business.update.events.create', ['user'=> \Illuminate\Support\Facades\Auth::user()->id, 'business' => $business->id])}}" class="btn btn-danger m-1">Create an Event</a>
                                <a href="{{ route('console.user.businesses.business.update.photo.upload-photo', ['user' => \Illuminate\Support\Facades\Auth::user()->id, 'business' => $business->id]) }}"  class="btn btn-danger m-1">Upload Business image</a>
                            </div>
                            <div class="share-icon">
                                @foreach($business->businessSocialMedia as $socialMedia)
                                    @if(\App\BusinessSocialMedia::SOCIAL_MEDIA_PROVIDERS[0] == $socialMedia->social_media_provider)
                                        <a href="{{ $socialMedia->social_media_link }}" target="_blank"><i
                                                    class="fa fa-twitter"></i></a>
                                    @endif
                                    @if(\App\BusinessSocialMedia::SOCIAL_MEDIA_PROVIDERS[1] == $socialMedia->social_media_provider)
                                        <a href="{{ $socialMedia->social_media_link }}" target="_blank"><i
                                                    class="fa fa-facebook"></i></a>
                                    @endif
                                    @if(\App\BusinessSocialMedia::SOCIAL_MEDIA_PROVIDERS[2] == $socialMedia->social_media_provider)
                                        <a href="{{ $socialMedia->social_media_link }}" target="_blank"><i
                                                    class="fa fa-instagram"></i></a>
                                    @endif
                                    @if(\App\BusinessSocialMedia::SOCIAL_MEDIA_PROVIDERS[3] == $socialMedia->social_media_provider)
                                        <a href="{{ $socialMedia->social_media_link }}" target="_blank"><i
                                                    class="fa fa-youtube"></i></a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="about-left">
                            <!-- About Begin -->
                            <div class="about-desc">
                                <h4>About the Restaurant</h4>
                                <p>{{ $business->description }}</p>
                            </div>
                            <!-- About End -->
                            <!-- Review/Question Filter Begin -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" id="review-button-toggle" class="btn btn-md btn-danger mr4" data-active="true">Reviews</button>
                                        <button type="button" id="question-button-toggle" class="btn btn-md btn-info" data-active="false">Show Questions</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Review/Question Filter End -->
                            <!-- Reviews Begin -->
                            <div class="client-reviews">
                                <h3>Reviews</h3>
                                <p>Total number of reviews - {{count($business->reviews)}}</p>
                                <div class="row mb-5">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-md btn-info show-trigger show-all">Show All Reviews</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach($business->reviews as $key=>$review)
                                            <div id="feedback-{{ $review->originalFeedback->id }}" class="reviews-item col-md-12">
                                                <div class="rating">
                                                    @for($i=0;$i<$review->rating;$i++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                    @for($i=0;$i< (5 - $review->rating);$i++)
                                                        <i class="fa fa-star-o"></i>
                                                    @endfor
                                                </div>
                                                {{--                                                <h5>{{ $key + 1 }} - Review Title</h5>--}}
                                                <p>{{ $review->originalFeedback->text }}</p>
                                                <div class="client-text">
                                                    <h5><a href="{{ route('user.home', ['user' => $review->user_id]) }}" class="author-link">{{ $review->user->first_name }} {{ $review->user->last_name }}</a></h5>
                                                    <span>{{ $review->created_at->format('F j, Y, g:i a') }}</span>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <div class="row">
                                                        @foreach($review->relatedFeedbacks as $relatedFeedback)
                                                            <div id="feedback-{{ $relatedFeedback->id }}" class="col-md-11 offset-md-1 mb-5 related-feedback"
                                                                 style="border-left: solid thin red;">
                                                                <p>{{ $relatedFeedback->text }}</p>
                                                                <div class="Additional Feedback">
                                                                    {{--                                  like & dislike            --}}
                                                                    <i onclick="likeButton(this,{{$relatedFeedback->id}})" class="fa fa-thumbs-o-up mr-2"></i>
                                                                    <span id="like_counter-{{$relatedFeedback->id}}" class="like_counter" data-original_count="{{ $relatedFeedback->like }}">{{ $relatedFeedback->like }}</span>
                                                                    <i onclick="dislikeButton(this,{{$relatedFeedback->id}})" class="fa fa-thumbs-o-down"></i>
                                                                    <span id="dislike_counter-{{$relatedFeedback->id}}" class="dislike_counter" data-original_count="{{ $relatedFeedback->like }}">{{ $relatedFeedback->dislike }}</span>
                                                                    <input type="hidden" name="feedback_id_like" value="{{$relatedFeedback->id}}">
                                                                </div>
                                                                <div class="client-text">
                                                                    <h5><a href="{{ route('user.home', ['user' => $review->user_id]) }}" class="author-link">{{ $relatedFeedback->user->first_name }} {{ $relatedFeedback->user->last_name }}</a></h5>
                                                                    <span>{{ $relatedFeedback->created_at->format('F j, Y, g:i a') }}</span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        {{--Reply on feedback Begin--}}
                                                        <div class="col-md-12">
                                                            <button type="button" class="btn text-danger ml-5 btn-sm" data-toggle="collapse" data-target="#reply-{{ $review->originalFeedback->id }}" aria-expanded="false" aria-controls="collapseExample">Reply
                                                            </button>
                                                            <div class="row">
                                                                <div class="collapse col-md-11 offset-md-1" id="reply-{{ $review->originalFeedback->id }}">
                                                                    <form action="{{route('review-reply')}}" method="POST" class="col-md-12">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="reply-{{ $review->originalFeedback->id }}" class="sr-only">Reply</label>
                                                                            <textarea class="form-control" id="reply-{{ $review->originalFeedback->id }}" name="reply" style="min-height: 100px;">
                                                                            </textarea>
                                                                        </div>
                                                                        <input type="hidden" name="business_id" value="{{$business->id}}"/>
                                                                        <input type="hidden" name="feedback_id" value="{{$review->originalFeedback->id}}"/>
                                                                        <input type="hidden" name="review_id" value="{{$review->id}}"/>
                                                                        <div class="form-group text-center">
                                                                            <button type="submit" name="submit" class="btn btn-outline-dark send-btn" id="{{$relatedFeedback->id}}"><i class="fa fa-paper-plane"></i> Submit</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--Reply on feedback End--}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-md btn-info show-trigger show-all">Show All Reviews</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Reviews End -->

                            <!-- Questions Begin -->
                            <div class="client-reviews questions row">
                                <h3 class="col-2">Questions</h3>
                                @foreach($business->lastHundredQuestions as $question)
                                    <div id="feedback-{{ $question->originalFeedback->id }}" class="reviews-item col-md-12 quesiton-{{$question->id}}">
                                        {{--                                        <h5>Question Title {{$question->id}}</h5>--}}
                                        <p>{{ $question->originalFeedback['text'] }}</p>
                                        <div class="client-text">
                                            <h5><a href="{{ route('user.home', ['user' => $question->user_id]) }}"
                                                   class="author-link">{{ $question->user->first_name }} {{ $question->user->last_name }}</a>
                                            </h5>
                                            <span>{{ $question->created_at->format('F j, Y, g:i a') }}</span>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="row">
                                                @foreach($question->relatedFeedbacks as $relatedFeedback)
                                                    <div id="feedback-{{ $relatedFeedback->id }}" class="col-md-11 offset-md-1 mb-5 related-feedback"
                                                         style="border-left: solid thin red;">
                                                        <p>{{ $relatedFeedback->text }} </p>
                                                        <div class="Additional Feedback">
                                                        </div>
                                                        <div class="client-text">
                                                            <h5>
                                                                <a href="{{ route('user.home', ['user' => $relatedFeedback->user_id]) }}"
                                                                   class="author-link">{{ $relatedFeedback->user->first_name }} {{ $relatedFeedback->user->last_name }}</a>
                                                            </h5>
                                                            <span>{{ $relatedFeedback->created_at->format('F j, Y, g:i a') }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="col-md-12">
                                                    <button type="button" class="btn text-danger ml-5 btn-sm" data-toggle="collapse" data-target="#answer-{{ $question->originalFeedback->id }}" aria-expanded="false" aria-controls="collapseExample">Answer</button>
                                                    <div class="row">
                                                        <div class="collapse col-md-11 offset-md-1" id="answer-{{ $question->originalFeedback->id }}">
                                                            <form action="{{route('question-answer')}}" method="POST" class="col-md-12">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="answer-{{ $question->originalFeedback->id }}" class="sr-only">Reply</label>
                                                                    <textarea class="form-control" id="answer-{{ $question->originalFeedback->id }}" name="answer" style="min-height: 100px;">
                                                                        </textarea>
                                                                </div>
                                                                <input type="hidden" name="business_id" value="{{$business->id}}"/>
                                                                <input type="hidden" name="feedback_id" value="{{$question->originalFeedback->id}}"/>
                                                                <input type="hidden" name="question_id" value="{{$question->id}}"/>
                                                                <div class="form-group text-center">
                                                                    <button type="submit" name="submit" class="btn btn-outline-dark send-btn" id="{{$relatedFeedback->id}}"><i class="fa fa-paper-plane"></i> Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Questions End -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="about-right">
                            <!-- Contact Begin -->
                            <div class="contact-info">
{{--                                <div class="map">--}}
{{--                                    <iframe--}}
{{--                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26440.72384129847!2d-118.24906619231132!3d34.06719475913053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c659f50c318d%3A0xe2ffb80a9d3820ae!2sChinatown%2C%20Los%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1570213740685!5m2!1sen!2sbd"--}}
{{--                                            height="385" style="border:0;" allowfullscreen="">--}}
{{--                                    </iframe>--}}
{{--                                    --}}{{-- <img src="{{ asset('img/pin.png' ) }}" alt="">--}}
{{--                                </div>--}}
                                <div class="contact-text">
                                    <h4>Contact Info</h4>
                                    <span>{{ $business->address }}</span>
                                    <ul>
                                        <li>
                                            <a href="tel:{{ $business->contact_phone }}">{{ $business->contact_phone }}</a>
                                        </li>
                                        <li><a href="{{ $business->web_url }}">Website</a></li>
                                        <li><a href="{{ $business->menu_url }}">Menu</a></li>
                                    </ul>
                                    <div class="row mb-3">
                                        <div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="collapse" data-target="#queries" aria-expanded="false" aria-controls="queries">Ask a question</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="collapse col-md-12" id="queries">
                                            <div class="row">
                                                <form action="{{route('question-store')}}" method="post" class="col-md-12">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="sr-only">">Inquiry</label>
                                                        <textarea class="form-control" name="question" style="min-height: 100px;"></textarea>
                                                    </div>
                                                    <input type="hidden" name="business_id" value="{{$business->id}}"/>
                                                    <div class="form-group text-right">
                                                        <button type="submit" name="submit" class="btn btn-outline-dark send-btn" id="{{$relatedFeedback->id}}"><i class="fa fa-paper-plane"></i> Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Business Services Begin -->
                                <div class="contact-text">
                                    <h4>Services</h4>
                                    <ul>
                                        @foreach($business->businessService as $businessService)
                                            <li>{{ $businessService->service->name }} <a href="{{ route('console.user.businesses.business.update.service.destroy', ['business' => $business->id, 'user' => \Illuminate\Support\Facades\Auth::user()->id, 'service' => $businessService->id]) }}"><i class="fa fa-trash-o"></i></a></li>
                                        @endforeach
                                    </ul>
                                    <div class="row mb-3">
                                        <div class="col-md-12 text-center">
                                            <a href="{{route('console.user.businesses.business.update.service.create', ['user'=> \Illuminate\Support\Facades\Auth::user()->id, 'business' => $business->id])}}" class="btn btn-danger btn-sm">Create a Service</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Business Services End -->
                            </div>
                            <!-- Contact End -->
                            <!-- Hours Begin -->
                            <div class="working-hours">
                                <h4>Working Hours</h4>
                                <ul>
                                    <li>All week:<span>{{ $business->hours }}</span></li>
                                </ul>
                            </div>
                            <!-- Hours End -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Check-ins</h2>
                                <p>The last 5 check-ins:</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <ul>
                                    @foreach($business->businessCheckIn->slice(0, 5) as $checkIn)
                                        <li><a href="{{ route('user.home', ['user' => $checkIn->user_id]) }}"
                                               class="author-link">{{ $checkIn->user->first_name }} {{ $checkIn->user->last_name }}</a>
                                            on {{ $checkIn->created_at->format('F j, Y, g:i a') }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $(".business-image-slideshow").owlCarousel({
                loop: true,
                center: true,
                nav: true,
                items: 10,
                dots: false,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                smartSpeed: 1200,
                autoplay: true,
                margin:5,
                responsive:{
                    600:{
                        items:6
                    }
                }
            });

            $('#review-button-toggle').click(function(){

                $(this).data('active', 'true');
                $(this).html('Reviews');
                $(this).addClass('btn-danger').removeClass('btn-info');
                $('#question-button-toggle').data('active', 'false');
                $('#question-button-toggle').html('Show Questions');
                $('#question-button-toggle').addClass('btn-info').removeClass('btn-danger');
                $('.client-reviews.reviews').show();
                $('.client-reviews.questions').hide();

            });

            $('#question-button-toggle').click(function(){

                $(this).data('active', 'true');
                $(this).html('Questions');
                $(this).addClass('btn-danger').removeClass('btn-info');
                $('#review-button-toggle').data('active', 'false');
                $('#review-button-toggle').html('Show Reviews');
                $('#review-button-toggle').addClass('btn-info').removeClass('btn-danger');
                $('.client-reviews.reviews').hide();
                $('.client-reviews.questions').show();

            });

        });
        function likeButton(x, feedback_id) {

            let like = false;

            x.classList.toggle("fa-thumbs-up");
            let checkClass = x.classList.toString();

            if (checkClass.search("fa-thumbs-up") != -1) {

                console.log('here');
                like = true;

            } else {

                console.log('there');
                like = false;

            }

            $.ajax({
                type: 'POST',
                url: '{{ route('like') }}',
                data:
                    {
                        '_token': $('input[name=_token]').val(),
                        'feedback_id': feedback_id,
                        'isLike': like
                    },
                headers:
                    {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                success: function (data) {
                    console.log(data);
                    $('#like_counter-' + data.id).html(data.attributes.like);
                    $('#dislike_counter-' + data.id).html(data.attributes.dislike);
                }
            });

        }
        function dislikeButton(x, feedback_id) {
            let disLike = false;

            x.classList.toggle("fa-thumbs-down");
            let checkClass = x.classList.toString();
            if (checkClass.search("fa-thumbs-down") != -1) {

                disLike = true;

            } else {

                disLike = false;

            }

            $.ajax({
                type: 'POST',
                url: '{{ route('dislike') }}',
                data:
                    {
                        '_token': $('input[name=_token]').val(),
                        'feedback_id': feedback_id,
                        'isDislike': disLike
                    },
                headers:
                    {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                success: function (data) {
                    $('#like_counter-' + data.id).html(data.attributes.like);
                    $('#dislike_counter-' + data.id).html(data.attributes.dislike);
                }
            });

        }
    </script>
@endsection
