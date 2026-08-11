<!-- SEO Meta Tags -->
<meta name="description" content="@yield('meta_description', $pengaturan->tentang_kami_singkat ?? 'Pesantren Persatuan Islam 80 Al Amin - Lembaga Pendidikan Islam Terpadu dan Kaderisasi Miniatur Masyarakat Rabbani.')">
<meta name="keywords" content="Al Amin, Pesantren, Persatuan Islam, Persis 80, Sekolah Islam, Tasikmalaya, Pendidikan Islam, Tahfizh Al-Quran">
<meta name="author" content="Al Amin Pesantren">
<link rel="canonical" href="{{ url()->current() }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="@yield('title', 'Al Amin Pesantren')">
<meta property="og:description" content="@yield('meta_description', $pengaturan->tentang_kami_singkat ?? 'Pesantren Persatuan Islam 80 Al Amin - Lembaga Pendidikan Islam Terpadu dan Kaderisasi Miniatur Masyarakat Rabbani.')">
<meta property="og:image" content="@yield('meta_image', $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico'))">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:title" content="@yield('title', 'Al Amin Pesantren')">
<meta property="twitter:description" content="@yield('meta_description', $pengaturan->tentang_kami_singkat ?? 'Pesantren Persatuan Islam 80 Al Amin - Lembaga Pendidikan Islam Terpadu dan Kaderisasi Miniatur Masyarakat Rabbani.')">
<meta property="twitter:image" content="@yield('meta_image', $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico'))">

<!-- Robots -->
<meta name="robots" content="index, follow">
<meta name="googlebot" content="index, follow">

<!-- Schema Markup / Structured Data untuk Google Search -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "EducationalOrganization",
  "name": "Pesantren Persis Al-Amin",
  "alternateName": "PPI 80 Al Amin",
  "url": "{{ url('/') }}",
  "logo": "{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico') }}",
  "contactPoint": {
    "@@type": "ContactPoint",
    "telephone": "{{ $pengaturan->telepon ?? '' }}",
    "contactType": "customer service"
  },
  "address": {
    "@@type": "PostalAddress",
    "addressLocality": "Tasikmalaya",
    "addressRegion": "Jawa Barat",
    "addressCountry": "ID"
  }
}
</script>

