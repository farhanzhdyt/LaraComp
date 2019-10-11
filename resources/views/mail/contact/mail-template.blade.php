@component('mail::message')
Terima Kasih atas Masukan Anda

Nama 	: {{ $data['name'] }}
<br>
Email 	: {{ $data['email'] }}
<br>
Subjek	: {{ $data['subject'] }}
<br>
Pesan	: {{ $data['message'] }} 

@component('mail::button', ['route' => 'index'])
Kembali Ke Halaman Utama
@endcomponent

Terima Kasih,<br>
LARACOMP
@endcomponent
