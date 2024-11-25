@extends('layout.utama')

@section('konten')
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMtbp3aEDFW6gKptJzyfh7A6MQpQUaC/eR5+pt5" crossorigin="anonymous" />

<section class="bg-gray-100 py-20" style="font-family: Poppins;">
    <div class="container mx-auto px-6 lg:px-20">
        <h1 class="text-5xl font-bold text-center text-cyan-500 mb-10">Hubungi Kami</h1>
        
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-8 lg:flex lg:justify-between lg:items-start">
            <!-- Informasi Kontak Utama -->
            <div class="lg:w-1/2 mb-10 lg:mb-0">
                <h2 class="text-3xl font-semibold text-gray-800 mb-4">PT Great Male</h2>
                <p class="text-lg text-gray-600 mb-6">
                    Kami siap membantu Anda! Jangan ragu untuk menghubungi kami melalui informasi di bawah ini.
                </p>
                
                <div class="space-y-4">
                    <div class="flex items-center text-gray-700">
                        <i class="fas fa-envelope h-6 w-6 text-cyan-500 mr-2"></i>
                        <span>info@greatmale.com</span>
                    </div>

                    <div class="flex items-center text-gray-700">
                        <i class="fas fa-phone-alt h-6 w-6 text-cyan-500 mr-2"></i>
                        <span>(021) 1234-5678</span>
                    </div>

                    <div class="flex items-center text-gray-700">
                        <i class="fas fa-map-marker-alt h-6 w-6 text-cyan-500 mr-2"></i>
                        <span>Jl. Raya Timur No. 23, Jakarta, Indonesia</span>
                    </div>
                </div>
            </div>

            <!-- Sosial Media dan Marketplace -->
            <div class="lg:w-1/2">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Temukan Kami di Media Sosial</h3>
                
                <!-- Media Sosial Per Brand -->
                <div class="space-y-6">
                    <!-- Great Male -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-700 mb-2">Great Male</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-700 hover:text-cyan-500 transition">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                            <a href="#" class="text-gray-700 hover:text-orange-500 transition">
                                <i class="fas fa-store"></i> Shopee
                            </a>
                            <a href="#" class="text-gray-700 hover:text-green-500 transition">
                                <i class="fas fa-store"></i> Tokopedia
                            </a>
                        </div>
                    </div>
                    <!-- Agree -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-700 mb-2">Agree</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-700 hover:text-cyan-500 transition">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                            <a href="#" class="text-gray-700 hover:text-orange-500 transition">
                                <i class="fas fa-store"></i> Shopee
                            </a>
                            <a href="#" class="text-gray-700 hover:text-green-500 transition">
                                <i class="fas fa-store"></i> Tokopedia
                            </a>
                        </div>
                    </div>
                    <!-- Kopral -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-700 mb-2">Kopral</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-700 hover:text-cyan-500 transition">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                            <a href="#" class="text-gray-700 hover:text-orange-500 transition">
                                <i class="fas fa-store"></i> Shopee
                            </a>
                            <a href="#" class="text-gray-700 hover:text-green-500 transition">
                                <i class="fas fa-store"></i> Tokopedia
                            </a>
                        </div>
                    </div>
                    <!-- HTE -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-700 mb-2">HTE</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-700 hover:text-cyan-500 transition">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                            <a href="#" class="text-gray-700 hover:text-orange-500 transition">
                                <i class="fas fa-store"></i> Shopee
                            </a>
                            <a href="#" class="text-gray-700 hover:text-green-500 transition">
                                <i class="fas fa-store"></i> Tokopedia
                            </a>
                        </div>
                    </div>
                    <!-- SEM -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-700 mb-2">SEM</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-700 hover:text-cyan-500 transition">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                            <a href="#" class="text-gray-700 hover:text-orange-500 transition">
                                <i class="fas fa-store"></i> Shopee
                            </a>
                            <a href="#" class="text-gray-700 hover:text-green-500 transition">
                                <i class="fas fa-store"></i> Tokopedia
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Legal -->
        <div class="mt-10 text-center text-gray-600 text-sm">
            <p>&copy; 2024 PT Great Male. Seluruh hak cipta dilindungi. Informasi ini disediakan sesuai dengan kebijakan dan aturan hukum yang berlaku di Indonesia.</p>
        </div>
    </div>
</section>


@endsection
