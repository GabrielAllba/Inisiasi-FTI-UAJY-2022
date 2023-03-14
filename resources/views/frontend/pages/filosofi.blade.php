@extends('frontend.main_master')
@section('content')


<section class="mobile-view" style="background: #51151A" style="z-index: 1">
    <div class="container" style="padding-bottom: 5rem">
        <div class="row" style="padding-top: 10rem">
            <div class="col-md-6">
                <h1 class="knp-semut">KENAPA</h1>
                <h1 class="knp-semut">SEMUT?</h1>
                <p class="c-light" style="padding-top: 2rem; text-align: justify">
                    Semut adalah hewan yang terkenal dengan keuletannya dalam bekerja serta ketahanannya dalam berbagai tempat karena semut dapat hidup di berbagai keadaan.
                </p>
            </div>
            <div class="col-md-6" style="display: flex; justify-content: center; align-items: center">
                <img src="{{asset('images/semut-tok.png')}}" alt="" style="max-width: 70%" class="fluid">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="c-light" style="padding-top: 2rem; text-align: justify">
                    Semut diharapkan dapat menjadi contoh mahasiswa FTI agar mampu beradaptasi, kreatif, serta kuat dalam menghadapi tantangan untuk mencapai tujuan.
                </p>
            </div>
        </div>
          <div class="d-flex flex-row justify-content-center row-3" >
            <div class=" inner-row-3-1 animate__animated" style="display: flex; justify-content: center; align-items: center">
                <div class="img-fluid" style="display: flex; justify-content: center; align-items: center">
                    <img style="max-width: 10rem;" src="{{asset('images/badan-semut.png')}}" alt="">
                </div>
            </div>
            <div class="inner-row-3-2 animate__animated" style="margin-top: auto; margin-bottom : auto; padding-left: 0">
                <h4 class="fils-title">
                    3 Bagian Badan Semut: 
                </h4>
                <p class="fils-desc">
                    Menunjukkan FTI yang terdiri dari 3 prodi, yaitu Teknik Industri, Informatika, dan Sistem Informasi.
                </p>
            </div>
        </div>
        <div class="row-4 d-flex flex-row-reverse justify-content-center" >
            <div class="inner-row-4-1 animate__animated "style="display: flex; justify-content: center; align-items: center">
                <div class="img-fluid" style="display: flex; justify-content: center; align-items: center">
                    <img style="max-width: 10rem;" src="{{asset('images/kaki-semut.png')}}" alt="">
                </div>
            </div>
            <div class="inner-row-4-2 animate__animated " style="margin-top: auto; margin-bottom : auto; padding-left: 0">
                <h4 class="fils-title" style="text-align: end">
                    4 Kaki Semut: 
                </h4>
                <p class="fils-desc">
                    Menunjukkan 4 pilar Keatmajayaan yang menjadi pedoman.
                </p>
            </div>
        </div>
        <div class="row-5 d-flex flex-row justify-content-center" >
            <div class="inner-row-5-1 animate__animated" style="display: flex; justify-content: center; align-items: center">
                <div class="img-fluid" style="display: flex; justify-content: center; align-items: center">
                    <img style="max-width: 10rem;" src="{{asset('images/gir-semut.png')}}" alt="">
                </div>
            </div>
            <div class="inner-row-5-2 animate__animated" style="margin-top: auto; margin-bottom : auto; padding-left: 0">
                <h4 class="fils-title">
                    Gerigi dengan 4 Mata: 
                </h4>
                <p class="fils-desc">
                    Melambangkan 4 lembaga kemahasiswaan yang ada di FTI, yaitu SEMA FTI UAJY, HMTI, HIMAFORKA, dan HIMSI.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="mobile-view" style="background: #51151A" style="z-index: 1">
    <div class="container" >
        <div class="row" >
            <div class="col-md-12">
                <h1 class="knp-semut" style="text-align: center; margin-bottom: 2rem">FILOSOFI WARNA</h1>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center" style="flex-wrap: wrap">
                <div class="box-warna">
                    <h2 class="judul-warna">KETAHANAN</h2>
                </div>
                <div class="box-warna" style="background: #F57600">
                    <h2 class="judul-warna">KREATIVITAS</h2>
                </div>
                <div class="box-warna" style="background: #721e29">
                    <h2 class="judul-warna " style="color:rgb(255, 213, 169)" >ADAPTASI</h2>
                </div>
            </div>
        </div>
       
    </div>
</section>

<style>
    .box-warna{
        margin: .5rem;
        background: #FCC899;
        width: max-content;
        padding: 3rem 4rem;
        border-radius: 10px;
        /* transform: rotate(90deg);
        transform-origin: bottom center; */
    }
 .knp-semut{
    font-family: 'Poppins-Bold';
    font-size: 6rem;
    line-height: 5rem;
    color: #FCC899
}
.judul-warna{
     font-family: 'Poppins-Bold';
     font-size: 4rem;
     color: #51151A

 }
 @media only screen and (max-width: 570px){
    .judul-warna{
        font-size: 2rem
    }
    .knp-semut{
        font-size: 3rem;
        text-align: center
    }
     .box-warna{
        padding: 2rem 3rem;
        /* transform: rotate(90deg);
        transform-origin: bottom center; */
    }
 }
 @media only screen and (max-width: 426px){
     .box-warna{

        padding: 1rem 2rem;
        /* transform: rotate(90deg);
        transform-origin: bottom center; */
    }
    .judul-warna{
        font-size: 1rem
    }
 }
 @media only screen and (max-width: 750px){
    #map{
        margin-top: 2rem
    }
 }
 .c-light{
    color: #FCC899
 }
</style>



<style>
    .fils-title{
        color:#FFD2A9;
        font-family: 'Poppins-Bold'
    }
    #rumput-depan{
        position: absolute;
        bottom: 0;
        left: 0; 
        right: 0;
        z-index: 2;
        height: 110%;
        width: 100%;
    }
    .title-desc, 
    .fils-desc{
        text-align: justify;
        color: #FCC899;

    }
    .fils-desc{
        font-family: 'Poppins-Regular'
    }
    .title-top{
        font-size: 5rem;
        color: #FFD2A9
    }
    #rumput-belakang{
        position: absolute;
        bottom: 0;
        left: 0;
        height: auto;
        right: 0;
        height: 110%;
        width: 100%;
        z-index: 0;
    }
    .container{
        z-index: 1;
        padding-bottom: 8rem
    }
    .top-section{
        background: linear-gradient(#fc9b3b , rgb(255, 213, 169), #51151A); 
        height: 100vh;
        display: flex; 
        align-items: center;
    }
    h1{
        font-family: 'Poppins-Bold';
    }
    .top-section #fakultas{
        font-size: 9rem;
        color: rgb(31, 31, 88);
        line-height: 2rem;
    }
    
    .top-section #teknologi{
        font-size: 11rem;
        z-index: 1;
        z-index: -5;
        color: #FFC300;
    }
    .top-section #industri{
        font-size: 11rem;
        color: #FFC300;
        line-height: 4rem;
    }
    @media only screen and (max-width: 1236px){
        .top-section #fakultas{
            font-size: 5rem
        }
        .top-section #teknologi,
        .top-section #industri
        {
            font-size: 7rem
        }
    }
    @media only screen and (max-width: 770px){
        .top-section #fakultas{
            font-size: 4rem
        }
        .top-section #teknologi,
        .top-section #industri
        {
            font-size: 5rem
        }
    }
    @media only screen and (max-width: 480px){
        .top-section #fakultas{
            font-size: 3rem
        }
        .top-section #teknologi,
        .top-section #industri
        {
            font-size: 4rem
        }
    }
    @media only screen and (max-width: 387px){
        .top-section #fakultas{
            font-size: 2rem
        }
        .top-section #teknologi,
        .top-section #industri
        {
            font-size: 3rem
        }
    }
</style>
<style>
    @media only screen and (max-width: 425px){
        .mobile-view{
            padding: 5rem;
            padding-bottom: 0
        }
        #semut-tok{
            max-width: 10rem !important;
        }
         .title-top{
            font-size: 3rem
        }
        
        
    }
    @media only screen and (max-width: 320px){
        .title-top{
            font-size: 2rem
        }
    }
    @media only screen and (max-width: 480px){
        .adc-1{
            max-width: 100% !important;
            margin-bottom: 3rem
        }
    }
    @media only screen and (max-width: 420px){
        .adc-1{
            max-width: 100% !important;
            margin-bottom: 3rem
        }
    }
    .color-red{
        color:rgb(255, 213, 169) !important
    }
</style>
@endsection