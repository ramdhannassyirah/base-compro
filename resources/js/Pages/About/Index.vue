<template>
    <AppLayout>
        <!-- HERO -->
        <section class="bg-gradient-to-r from-slate-900 to-slate-800 text-white py-20">
            <div class="max-w-6xl mx-auto px-6 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    Tentang Kami
                </h1>
                <p class="text-lg text-gray-300 max-w-3xl mx-auto">
                    Kami adalah perusahaan teknologi yang berfokus pada pengembangan
                    solusi digital modern untuk membantu bisnis tumbuh,
                    bertransformasi, dan bersaing di era digital.
                </p>
            </div>
        </section>

        <!-- ABOUT COMPANY -->
        <section class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-6 text-slate-800">
                        Siapa Kami?
                    </h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Kami adalah tim profesional di bidang software development,
                        web application, dan sistem enterprise yang telah membantu
                        berbagai klien dalam membangun sistem yang scalable,
                        aman, dan efisien.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        Dengan pendekatan berbasis kebutuhan bisnis, kami tidak hanya
                        membangun aplikasi, tetapi juga memberikan solusi strategis
                        untuk pertumbuhan jangka panjang.
                    </p>
                </div>

                <div class="bg-slate-100 rounded-2xl p-10 shadow-lg">
                    <h3 class="text-xl font-semibold mb-4 text-slate-800">
                        Visi
                    </h3>
                    <p class="text-gray-600 mb-6">
                        Menjadi perusahaan teknologi terpercaya yang
                        menghadirkan inovasi digital berkualitas tinggi.
                    </p>

                    <h3 class="text-xl font-semibold mb-4 text-slate-800">
                        Misi
                    </h3>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>Mengembangkan solusi digital yang scalable</li>
                        <li>Menyediakan layanan profesional dan transparan</li>
                        <li>Mendukung transformasi digital klien</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- CORE VALUES -->
        <section class="py-16 bg-slate-50">
            <div class="max-w-6xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold mb-12 text-slate-800">
                    Nilai Perusahaan
                </h2>

                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                        <h3 class="text-xl font-semibold mb-4">Integritas</h3>
                        <p class="text-gray-600">
                            Kami menjunjung tinggi transparansi dan kejujuran
                            dalam setiap proyek yang kami kerjakan.
                        </p>
                    </div>

                    <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                        <h3 class="text-xl font-semibold mb-4">Inovasi</h3>
                        <p class="text-gray-600">
                            Kami terus berinovasi menggunakan teknologi terbaru
                            untuk memberikan solusi terbaik.
                        </p>
                    </div>

                    <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                        <h3 class="text-xl font-semibold mb-4">Profesionalisme</h3>
                        <p class="text-gray-600">
                            Setiap proyek ditangani dengan standar kualitas tinggi
                            dan manajemen yang terstruktur.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICES -->
        <section class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-6">
                <h2 class="text-3xl font-bold mb-12 text-center text-slate-800">
                    Layanan Kami
                </h2>

                <div class="grid md:grid-cols-3 gap-8">
                    <div class="border p-6 rounded-xl hover:shadow-md transition">
                        <h3 class="text-lg font-semibold mb-3">
                            Web Development
                        </h3>
                        <p class="text-gray-600">
                            Pengembangan website company profile, sistem informasi,
                            dan aplikasi berbasis web.
                        </p>
                    </div>

                    <div class="border p-6 rounded-xl hover:shadow-md transition">
                        <h3 class="text-lg font-semibold mb-3">
                            Enterprise System
                        </h3>
                        <p class="text-gray-600">
                            Pengembangan ERP, LMS, E-Procurement, dan sistem
                            manajemen bisnis lainnya.
                        </p>
                    </div>

                    <div class="border p-6 rounded-xl hover:shadow-md transition">
                        <h3 class="text-lg font-semibold mb-3">
                            Custom Software
                        </h3>
                        <p class="text-gray-600">
                            Solusi aplikasi sesuai kebutuhan spesifik perusahaan Anda.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="py-20 bg-slate-900 text-white text-center">
            <div class="max-w-4xl mx-auto px-6">
                <h2 class="text-3xl font-bold mb-6">
                    Siap Berkolaborasi?
                </h2>
                <p class="text-gray-300 mb-8">
                    Hubungi kami untuk mendiskusikan kebutuhan digital perusahaan Anda.
                </p>
                <button class="bg-white text-slate-900 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition">
                    Hubungi Kami
                </button>
            </div>
        </section>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>
