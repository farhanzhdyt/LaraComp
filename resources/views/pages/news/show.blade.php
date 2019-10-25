@extends('layouts.base')

@section('content')
    <section class="detail-news">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title article-header text-center">Ini Judul</h3>
                    <p class="text-center creator-info">
                        Ditulis oleh <span class="created__by">(saha)</span>, dipublikasi pada <span class="created__at">(tanggal sabaraha)</span> kategori <span class="category">(naon)</span>
                    </p>
                </div>
                <div class="card-body article-body">
                    <div class="text-center mt-3 mb-5">
                        <img alt="ini-gambar" src="{{ asset('images/teams/gorilla.jpg') }}" class="img-article">
                    </div>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente maxime beatae quas facilis. Nobis optio expedita ut dolor obcaecati enim deleniti, sed atque illo accusantium voluptas debitis eum. Accusamus natus cupiditate nostrum suscipit unde quod velit obcaecati quam nesciunt, repellat odit beatae laborum enim excepturi ducimus rerum molestias molestiae dolores!</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus cupiditate fuga quis porro iusto, maiores explicabo non architecto, laudantium nobis doloremque quo assumenda et voluptatem quibusdam dolores! Minima voluptatum explicabo non repellendus fuga dolor deleniti quos nostrum. Omnis modi voluptatum ratione reiciendis neque dolorem a nostrum ab voluptatem? Error, nesciunt?</p>

                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem, voluptate, neque iure officia obcaecati maxime eius sint culpa vel ex labore nemo. Repellat dignissimos nesciunt cumque quas? Aperiam debitis eligendi sapiente dicta in nulla consequatur aliquid, aut reprehenderit ea dolorum repellat tempore, vitae quia ratione. Ad nihil saepe nostrum perspiciatis!</p>
                </div>
            </div>
        </div>
    </section>
@endsection