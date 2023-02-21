@extends('layouts.master')
@section('title', 'Articles')
@section('content')

    <!--************************************
                                                                                                     Inner Banner Start
                                                                                                   *************************************-->
    <div class="page-banner">
        <img src="frontend\images\about-us\about-benner.png" alt="about-benner">
        <h2> ARTICLES </h2>
    </div>
    <div class="sj-innerbanner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="sj-innerbannercontent">
                        <h1>Browse Research</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--************************************
                                                                                                     Inner Banner End
                                                                                                   *************************************-->
    <!--************************************
                                                                                                     Main Start
                                                                                                   *************************************-->
    <main id="sj-main" class="sj-main sj-haslayout sj-sectionspace">
        <div id="sj-twocolumns" class="sj-twocolumns">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3">
                        <aside id="sj-sidebarvtwo" class="sj-sidebar">
                            <div class="sj-widget sj-widgetsearch">
                                <div class="sj-widgetcontent">
                                    <form class="sj-formtheme sj-formsearch">
                                        <fieldset>
                                            <input type="search" name="search" class="form-control"
                                                placeholder="Search here">
                                            <button type="submit" class="btn btn-grey"><i
                                                    class="lnr lnr-magnifier"></i></button>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="sj-widget sj-widgetarticles">
                                <div class="sj-widgetheading">
                                    <h3>By Article Category</h3>
                                </div>
                                <div class="sj-widgetcontent">
                                    <div class="sj-selectgroup">
                                        <span class="sj-checkbox">
                                            <input id="sj-viewalltwo" type="checkbox" name="speciality"
                                                value="sj-viewalltwo">
                                            <label for="sj-viewalltwo">View All<em>(216)</em></label>
                                        </span><br>
                                        <span class="sj-checkbox">
                                            <input id="sj-helth" type="checkbox" name="speciality" value="sj-helth">
                                            <label for="sj-helth">Health<em>(37)</em></label>
                                        </span><br>
                                        <span class="sj-checkbox">
                                            <input id="sj-politics" type="checkbox" name="speciality"
                                                value="sj-politics">
                                            <label for="sj-politics">Politics<em>(29)</em></label>
                                        </span><br>
                                        <span class="sj-checkbox">
                                            <input id="sj-sports" type="checkbox" name="speciality" value="sj-sports">
                                            <label for="sj-sports">Sports<em>(27)</em></label>
                                        </span><br>
                                        <span class="sj-checkbox">
                                            <input id="sj-history" type="checkbox" name="speciality" value="sj-history">
                                            <label for="sj-history">History<em>(23)</em></label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="sj-widget sj-widgetdate">
                                <div class="sj-widgetheading">
                                    <h3>By Date</h3>
                                </div>
                                <div class="sj-widgetcontent">
                                    <div class="sj-selectgroup">
                                        <span class="sj-checkbox">
                                            <input id="sj-viewallthree" type="checkbox" name="speciality"
                                                value="sj-viewallthree">
                                            <label for="sj-viewallthree">View All<em>(216)</em></label>
                                        </span><br>
                                        <span class="sj-checkbox">
                                            <input id="sj-tenyear" type="checkbox" name="speciality" value="sj-tenyear">
                                            <label for="sj-tenyear">Past 10 Years<em>(37)</em></label>
                                        </span><br>
                                        <span class="sj-checkbox">
                                            <input id="sj-fifteenyears" type="checkbox" name="speciality"
                                                value="sj-fifteenyears">
                                            <label for="sj-fifteenyears">Past 15 Years<em>(29)</em></label>
                                        </span><br>
                                        <span class="sj-checkbox">
                                            <input id="sj-twentyyears" type="checkbox" name="speciality"
                                                value="sj-twentyyears">
                                            <label for="sj-twentyyears">Past 20 Years<em>(27)</em></label>
                                        </span><br>
                                        <span class="sj-checkbox">
                                            <input id="sj-twentyfiveyears" type="checkbox" name="speciality"
                                                value="sj-twentyfiveyears">
                                            <label for="sj-twentyfiveyears">Past 25 Years<em>(23)</em></label>
                                        </span><br>
                                    </div>
                                    <div class="sj-filterbtns">
                                        <a class="btn btn-warning" href="javascript:void(0)"><span class="lnr lnr-funnel"></span>Apply Filter</a>
                                        <a class="btn btn-danger" href="javascript:void(0)">Reset All</a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-12 col-sm-12 col-md-7 col-lg-4 col-xl-6">
                        <div id="sj-content" class="sj-content">
                            <div class="sj-uploadarticle">
                                <figure class="sj-uploadarticleimg">
                                    <img src="{{ asset('frontend/images/5k.jpg') }}"
                                        alt="image description">
                                    <figcaption>
                                        <div class="sj-uploadcontent">
                                            <!--<span>Do You Want To Upload Your Article?</span>-->
                                            <!--<h3>Submit Now &amp; Make Your Online Presence</h3>-->
                                            <!--<a class="sj-btn" href="{{ URL('/dashboard') }}">Submit Now</a>-->
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="sj-articles">
                                <span class="sj-showitems">{{ $articles->links() }}</span>

                                <!-- ===  Text Shorten Code  ====  -->
                                <?php
                                // code for shortening the big content fetched from database
                                function textShorten($text, $limit = 200)
                                {
                                    $text = $text . ' ';
                                    $text = substr($text, 0, $limit);
                                    $text = substr($text, 0, strrpos($text, ' '));
                                    $text = $text;
                                    return $text;
                                }
                                ?>
                                <!-- ===  Text Shorten Code  ====  -->

                                @foreach ($articles as $article)
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            @if (!empty($article->video_id))
                                                <iframe style="width:270px; height:170px;"
                                                    src="https://www.youtube.com/embed/{{ $article->video_id }}?rel=0"
                                                    allowfullscreen></iframe>
                                            @elseif(is_file('uploads/article/'.$article->image_path))
                                                <img src="{{ asset('uploads/article/' . $article->image_path) }}"
                                                    alt="Article">
                                            @else
                                                <!--<div class="medium-date">-->
                                                <!--    <div class="medium-date-day">-->
                                                <!--        {{ date('d', strtotime($article->start_date)) }}</div>-->
                                                <!--    <div class="medium-date-month">-->
                                                <!--        {{ date('M Y', strtotime($article->start_date)) }}</div>-->
                                                <!--</div>-->
                                                <img src="{{ asset('uploads/article/banner-23_1563383660.jpg') }}"
                                                    alt="Article">
                                            @endif
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <span class="sj-username"><a
                                                        href="{{ URL('/author/' . $article->user->id) }}">{{ $article->user->name }}</a></span>
                                                <h3><a
                                                        href="{{ URL('/article/' . $article->id) }}">{{ $article->title }}</a>
                                                </h3>
                                            </div>
                                            <div class="sj-description">
                                                <p>{!! textShorten($article->description) !!}...</p>
                                            </div>
                                            <a class="sj-btn" href="{{ URL('/article/' . $article->id) }}">View
                                                Full
                                                Article</a>
                                        </div>
                                    </article>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3">
                        <aside id="sj-sidebar" class="sj-sidebar sj-sidebarvtwo">
                            
                            <div class="sj-widget sj-widgetnoticeboard">
                                <div class="sj-widgetheading">
                                    <h3>Notice Board</h3>
                                </div>
                                <div class="sj-widgetcontent">
                                    <ul>
                                        <li><a href="javascript:void(0);">Adipisicing elitaium sed dotas eiusm tempor
                                                incididunt utae labore etiate dolore magna aliqua enim.</a></li>
                                        <li><a href="javascript:void(0);">Labore etiat dolore magna aliquaen ad minim
                                                veniam.</a></li>
                                        <li><a href="javascript:void(0);">Duis aute irure dolor in reprehender</a></li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--************************************
                                                                                                     Main End
                                                                                                   *************************************-->

@endsection
