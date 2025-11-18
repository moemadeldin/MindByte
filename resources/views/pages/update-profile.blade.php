<x-layouts.auth :title="'Edit Profile'">
    <div class="min-h-screen flex flex-col bg-gradient-to-b from-dark-900 to-dark-800 text-white">

        {{-- Header --}}
        <x-home.header />

        {{-- Main Content --}}
        <main class="flex-grow py-12 px-4 lg:px-8">
            <div class="max-w-2xl mx-auto">
                {{-- Profile Header --}}
                <div class="bg-dark-800 rounded-xl p-8 mb-8">
                    <h1 class="text-3xl font-bold mb-6">Edit Profile</h1>
                    
                    <div class="space-y-6">
                        {{-- Avatar Upload --}}
                        <div class="flex flex-col items-center mb-6">
                            <div class="relative mb-4">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" 
                                     alt="Profile" 
                                     class="w-32 h-32 rounded-full border-4 border-blue-500 object-cover">
                                <button class="absolute bottom-2 right-2 bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-full cursor-pointer">
                                    <i class="fas fa-camera text-sm"></i>
                                </button>
                            </div>
                            <p class="text-gray-400 text-sm">Click camera icon to upload new avatar</p>
                        </div>

                        {{-- Name Fields --}}
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">First Name</label>
                                <input type="text" 
                                       class="w-full bg-dark-700 border border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="Enter your first name"
                                       value="John">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Last Name</label>
                                <input type="text" 
                                       class="w-full bg-dark-700 border border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="Enter your last name"
                                       value="Doe">
                            </div>
                        </div>

                        {{-- National ID --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">National ID</label>
                            <input type="text" 
                                   class="w-full bg-dark-700 border border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Enter your national ID"
                                   value="123456789">
                        </div>

                        {{-- Bio --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Bio</label>
                            <textarea rows="4"
                                      class="w-full bg-dark-700 border border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                                      placeholder="Tell us about yourself...">Passionate web developer with over 5 years of experience in creating modern web applications. I love teaching and sharing knowledge with the developer community.</textarea>
                        </div>

                        {{-- Buttons --}}
                        <div class="flex gap-4 pt-4">
                            <button class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition flex items-center gap-2">
                                <i class="fas fa-save"></i>
                                Save Changes
                            </button>
                            
                            <button class="px-6 py-3 bg-dark-700 hover:bg-dark-600 border border-gray-600 text-gray-300 font-semibold rounded-lg transition flex items-center gap-2">
                                <i class="fas fa-times"></i>
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        {{-- Footer --}}
        <x-home.footer />

    </div>
</x-layouts.auth>