@extends('frontend.main_master')
@section('content')


<section class="mobile-view" style="background: #430f14" style="z-index: 1">
    <div class="container" style="padding-top: 10rem">
        <div class="d-flex justify-content-center" style="margin-bottom: 1rem">
            <h2 style="margin: auto 0;text-align: center; font-size: 4rem; font-family: 'Poppins-Bold'; color: #FFD5A9">MEDIA</h2>
        </div>
        <div class="row" style="display: flex; justify-content: center">
            <div class="col-md-6" id="music-video">
                <div class="d-flex justify-content-center" style="margin-bottom: 1rem">
                    <h3 class="tit"  style="text-align: center">MUSIC VIDEO</h3>
                </div>
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/nvOs5TDruAw?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-md-6" id="dance-video">
                <div class="d-flex justify-content-center" style="margin-bottom: 1rem">
                    <h3 class="tit" style="text-align: center">DANCE</h3>
                </div>
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/xtnbe91vhYg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-md-6" id="twibbon-link" style="margin-top: 2rem">
                <div class="d-flex justify-content-center" style="margin-bottom: 1rem">
                    <h3 class="tit"  style="text-align: center">TWIBBON</h3>
                </div>
                <a href="http://twb.nz/inisiasifti2022" target="_blank" class="twb">
                    <img style="max-width: 100%" src="{{asset('images/twibbon.png')}}" alt="">
                </a>
                <style>
                    .twb{
                        opacity: .5;
                        transition: .2s ease-in-out
                    }
                    .twb:hover{
                        opacity: 1;
                        transition: .2s ease-in-out
                    }
                    .tit{
                        font-size: 2rem 
                    }
                </style>
            </div>
        </div>
    </div>
</section>
<style>
    .color-red{
        color: #FFD5A9 !important
    }
    .batu-cover::after {
    content: '';
    width: 100%;
    height: 100%;
    background: #430f14 !important;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
}
</style>

@endsection