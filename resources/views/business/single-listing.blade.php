@extends('themes.localsdirectory.layout.base')
@section ('page_name')Single Listing
@endsection
@section ('content')
    <style>
        .send-btn {
            margin-top: 50px !important;
            border: none;
            background: none;
            margin-left: -10px;
        }
    </style>
    <!-- Hero Section Begin -->
    @if(!empty($business->mainPhoto))
        <div class="hero-listing set-bg" data-setbg="/storage/{{ str_replace("public/", "", $business->mainPhoto->file_path) }}">
    @else
        <div class="hero-listing set-bg" data-setbg="{{ asset('img/hero_listing.jpg') }}">
    @endif
            <h1>{{ $business->name }}</h1>
    </div>
    <!-- Hero Section End -->
    @include ('themes.localsdirectory.layout.section.search.search')
    <!-- About Secton Begin -->
    <section class="about-section">
        <div class="intro-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="about-intro">
                            <div class="rating">{{ $business->rating() }}</div>
                            <div class="intro-text">
                                <h2>{{ $business->name }}</h2>
                                <p>Explore some of the best places in the world</p>
{{--                                                                <div class="open">Opens Tomorow at 10am</div>--}}
{{--                                                                <div class="closed">Closed now</div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-1">
                        <div class="intro-share">
                            <div class="share-btn">
                                <a href="{{ route('business.check-in', ['business'=>$business->id]) }}" class="share">Check-in</a>
                                <a href="{{ route('review-create',['business'=>$business->id]) }}">Submit a Review</a>
                            </div>
                            <div class="share-icon">
{{--                                <a href="#"><i class="fa fa-map-marker"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-book"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-hand-o-right"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-user-o"></i></a>--}}
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    @if(!empty(\Illuminate\Support\Facades\Auth::user()->specificBusinessBookmark($business)))
                                        <a href="{{ route('business.bookmark.destroy', ['business'=>$business->id, 'bookmark' => \Illuminate\Support\Facades\Auth::user()->specificBusinessBookmark($business)->id]) }}"><i class="fa fa-bookmark" style="color: orange;"></i></a>
                                    @else
                                        <a href="{{ route('business.bookmark.store', ['business'=>$business->id]) }}"><i class="fa fa-bookmark"></i></a>
                                    @endif
                                @else
                                    <a href="{{ route('business.bookmark.store', ['business'=>$business->id]) }}"><i class="fa fa-bookmark"></i></a>
                                @endif
                                @foreach($business->businessSocialMedia as $socialMedia)
                                    @if(\App\BusinessSocialMedia::SOCIAL_MEDIA_PROVIDERS[0] == $socialMedia->social_media_provider)
                                        <a href="{{ $socialMedia->social_media_link }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                    @endif
                                        @if(\App\BusinessSocialMedia::SOCIAL_MEDIA_PROVIDERS[1] == $socialMedia->social_media_provider)
                                            <a href="{{ $socialMedia->social_media_link }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                        @endif
                                        @if(\App\BusinessSocialMedia::SOCIAL_MEDIA_PROVIDERS[2] == $socialMedia->social_media_provider)
                                            <a href="{{ $socialMedia->social_media_link }}" target="_blank"><i class="fa fa-instagram"></i></a>
                                        @endif
                                        @if(\App\BusinessSocialMedia::SOCIAL_MEDIA_PROVIDERS[3] == $socialMedia->social_media_provider)
                                            <a href="{{ $socialMedia->social_media_link }}" target="_blank"><i class="fa fa-youtube"></i></a>
                                        @endif
                                @endforeach
                            </div>
                            <div class="share-icon">
                                @for($i=0;$i<$business->dollar_rating;$i++)
                                    <i class="fa fa-usd"></i>
                                @endfor
                            </div>
                            <div class="share-icon">
                                @foreach($business->businessService as $businessService)
                                    {{ $businessService->service->name }}
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
                                            <div id="feedback-{{ $review->originalFeedback->id }}" class="reviews-item" data-key="{{ $key }}" @if($key >= 5)style="display:none;"@endif>
                                                <div class="rating">
                                                    @for($i=0;$i<$review->rating;$i++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                    @for($i=0;$i< (5 - $review->rating);$i++)
                                                        <i class="fa fa-star-o"></i>
                                                    @endfor
                                                </div>
                                                <h5>{{ $key + 1 }} - Review Title</h5>
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
                                                                <div class="client-text">
                                                                    <h5><a href="{{ route('user.home', ['user' => $review->user_id]) }}" class="author-link">{{ $relatedFeedback->user->first_name }} {{ $relatedFeedback->user->last_name }}</a></h5>
                                                                    <span>{{ $relatedFeedback->created_at->format('F j, Y, g:i a') }}</span>
                                                                </div>
                                                            </div>
                                                        @endforeach
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
                            <!-- Questions Being -->
                            <div class="client-reviews questions row">
                                <h3 class="col-2">Questions</h3>
                                @foreach($business->lastHundredQuestions as $question)
                                    <div id="feedback-{{ $review->originalFeedback->id }}" class="reviews-item">
                                        <h5>Question Title {{$question->id}}</h5>
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
                                                <button type="button" class="btn text-danger ml-5 btn-sm"
                                                        data-toggle="collapse"
                                                        data-target="#reply-{{ $review->originalFeedback->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapseExample" style="height: 7px; box-shadow: none;">Answer
                                                </button>
                                                <div class="collapse" id="reply-{{ $review->originalFeedback->id }}">
                                                    <form action="{{route('question-reply')}}" method="post"
                                                          class="row">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="reply-{{ $review->originalFeedback->id }}">Answer</label>
                                                            <textarea class="form-control"
                                                                      id="reply-{{ $review->originalFeedback->id }}"
                                                                      name="reply">
                                                            </textarea>
                                                        </div>
                                                        <input type="hidden" name="business_id"
                                                               value="{{$business->id}}"/>
                                                        <input type="hidden" name="feedback_id"
                                                               value="{{$question->originalFeedback->id}}"/>
                                                        <input type="hidden" name="question_id" value="{{$question->id}}"/>
                                                        <button type="submit" name="submit"
                                                                class="col-1 fa fa-paper-plane send-btn"
                                                                id="{{$relatedFeedback->id}}"/>
                                                    </form>
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
                                <div class="map">
                                    <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26440.72384129847!2d-118.24906619231132!3d34.06719475913053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c659f50c318d%3A0xe2ffb80a9d3820ae!2sChinatown%2C%20Los%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1570213740685!5m2!1sen!2sbd"
                                            height="385" style="border:0;" allowfullscreen="">
                                    </iframe>
                                    {{--                                    <img src="{{ asset('img/pin.png' ) }}" alt="">--}}
                                </div>
                                <div class="contact-text">
                                    <h4>Contact Info</h4>
                                    <span>{{ $business->address }}</span>
                                    <ul>
                                        <li>
                                            <a href="tel:{{ $business->contact_phone }}">{{ $business->contact_phone }}</a>
                                        </li>
                                        <li><a href="{{ $business->web_url }}">Website</a></li>
                                        <li><a href="{{ $business->menu_url }}">Menu</a></li>
{{--                                        Ask a quesiton--}}
                                        <li><a data-toggle="collapse" href="#queries" role="button"
                                               aria-expanded="false" aria-controls="queries">
                                                Ask a question
                                            </a></li>
                                        <div class="collapse" id="queries">
                                            <div class="row">
                                                <form action="{{route('question-store')}}" method="post" class="row">
                                                    @csrf
                                                    {{--                                                    <div class="share-btn">--}}
                                                    {{--                                                        <a href="{{route('question-store','QuestionController@store')->name('question')}}"--}}
                                                    {{--                                                           class="btn btn-danger">Ask a question</a>--}}
                                                    {{--                                                    </div>--}}
                                                    <textarea class="col-10 card card-body" name="question">
                                                    </textarea>
                                                    <input type="hidden" name="business_id" value="{{$business->id}}"/>
                                                    <button type="submit" name="submit"
                                                            class="col-1 fa fa-paper-plane send-btn"/>
                                                </form>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
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
            </div>
        </div>
    </section>
    <!-- About Section End -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
           $('button.show-trigger').click(function(){

               if($(this).hasClass('show-all')) {

                   $('button.show-all')
                       .removeClass('show-all')
                       .removeClass('btn-info')
                       .addClass('show-less')
                       .addClass('btn-danger')
                       .html('Show Less Reviews');
                   $('.reviews-item').each(function (index, value) {
                       $(this).show();
                   });
               } else {

                   $('button.show-less')
                       .removeClass('show-less')
                       .removeClass('btn-danger')
                       .addClass('show-all')
                       .addClass('btn-info')
                       .html('Show All Reviews');
                   $('.reviews-item').each(function(index, value){

                       if(index < 5) {
                           $(this).show();
                       } else {
                           $(this).hide();
                       }
                   });

               }
           });

            // $('button.show-less').click(function(){
            //     $('button.show-less')
            //         .removeClass('show-less')
            //         .removeClass('btn-danger')
            //         .addClass('show-all')
            //         .addClass('btn-info')
            //         .html('Show All Reviews');
            //     $('.reviews-item').each(function(index, value){
            //
            //         if(index < 5) {
            //             $(this).show();
            //         } else {
            //             $(this).hide();
            //         }
            //     });
            // });
        });

    </script>
@endsection
