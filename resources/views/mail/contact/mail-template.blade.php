@component('mail::message')
Terima Kasih atas Masukan Anda

Nama 	: {{ $data['name'] }}
<br>
Email 	: {{ $data['email'] }}
<br>
Subjek	: {{ $data['subject'] }}
<br>
Pesan	: {{ $data['message'] }}

Terima Kasih,<br>
LARACOMP
@endcomponent
