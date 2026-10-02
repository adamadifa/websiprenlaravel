<!-- SEO Meta Tags Target Ranking: Pesantren Ciamis, Pesantren Persis, Pesantren Persatuan Islam -->
<meta name="description" content="@yield('meta_description', 'Pesantren Persatuan Islam 80 Al Amin Sindangkasih Ciamis adalah Pondok Pesantren Persis unggulan di Kabupaten Ciamis Jawa Barat. Menyelenggarakan jenjang pendidikan TK, SDIT, MTs, dan MA berkarakter Qur\'ani & berprestasi.')">
<meta name="keywords" content="pesantren ciamis, pesantren persis, pesantren persatuan islam, pesantren al amin ciamis, ppi 80 al amin sindangkasih, pesantren terbaik di ciamis, pondok pesantren ciamis, pesantren persis ciamis, sekolah islam ciamis, sdit al amin ciamis, mts persis sindangkasih, ma persis sindangkasih, pesantren tahfizh ciamis">
<meta name="author" content="Pesantren Persatuan Islam 80 Al Amin Sindangkasih Ciamis">
<meta name="geo.region" content="ID-JB">
<meta name="geo.placename" content="Ciamis">
<link rel="canonical" href="{{ url()->current() }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:site_name" content="Pesantren Persatuan Islam 80 Al Amin Sindangkasih Ciamis">
<meta property="og:title" content="@yield('title', 'Pesantren Persatuan Islam 80 Al Amin Sindangkasih Ciamis | Pesantren Persis Unggulan')">
<meta property="og:description" content="@yield('meta_description', 'Pesantren Persatuan Islam 80 Al Amin Sindangkasih Ciamis adalah Pondok Pesantren Persis unggulan di Kabupaten Ciamis Jawa Barat.')">
<meta property="og:image" content="@yield('meta_image', $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico'))">
<meta property="og:locale" content="id_ID">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:title" content="@yield('title', 'Pesantren Persatuan Islam 80 Al Amin Sindangkasih Ciamis | Pesantren Persis Unggulan')">
<meta property="twitter:description" content="@yield('meta_description', 'Pesantren Persatuan Islam 80 Al Amin Sindangkasih Ciamis adalah Pondok Pesantren Persis unggulan di Kabupaten Ciamis Jawa Barat.')">
<meta property="twitter:image" content="@yield('meta_image', $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico'))">

<!-- Search Engine Robots Directive -->
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
<meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">

<!-- Schema.org JSON-LD Structured Data untuk Google Search & Google Knowledge Graph -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "EducationalOrganization",
  "name": "Pesantren Persatuan Islam 80 Al Amin",
  "alternateName": [
    "Pesantren Persis Al Amin Ciamis",
    "PPI 80 Al Amin Sindangkasih",
    "Pesantren Persatuan Islam Al Amin",
    "Pesantren Persis Ciamis"
  ],
  "url": "{{ url('/') }}",
  "logo": "{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico') }}",
  "image": "{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico') }}",
  "description": "Pesantren Persatuan Islam 80 Al Amin Sindangkasih Ciamis adalah Pondok Pesantren Persis terkemuka di Kabupaten Ciamis Jawa Barat yang menyelenggarakan pendidikan Islam Terpadu TK, SDIT, MTs, dan MA.",
  "telephone": "{{ $pengaturan->telepon ?? '085162940080' }}",
  "email": "{{ $pengaturan->email ?? 'ppi80alamin@gmail.com' }}",
  "address": {
    "@@type": "PostalAddress",
    "streetAddress": "Jln. Raya Ancol 1 No. 27",
    "addressLocality": "Sindangkasih",
    "addressRegion": "Ciamis, Jawa Barat",
    "postalCode": "46261",
    "addressCountry": "ID"
  },
  "keywords": "pesantren ciamis, pesantren persis, pesantren persatuan islam, pesantren al amin ciamis"
}
</script>
