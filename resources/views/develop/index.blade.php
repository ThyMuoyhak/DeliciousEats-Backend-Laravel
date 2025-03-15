@extends('layouts.app')

@section('content')
    <!-- Main Content: Develop By Section -->
    <div class="max-w-4xl mx-auto p-8 bg-gray-800 rounded-lg shadow-lg" data-aos="fade-up" data-aos-duration="1000">
        <h1 class="text-4xl font-bold text-white mb-4" data-aos="fade-up" data-aos-duration="1000">Developed By</h1>
        
        <div class="flex items-center mb-6" data-aos="fade-up" data-aos-duration="1000">
            <img src="https://codekhmerlearningg.vercel.app/img/hak.jpg" alt="Developer Photo" class="w-32 h-32 rounded-full shadow-lg mr-6">
            <div>
                <h2 class="text-3xl font-semibold text-white">Thy Muoyhak</h2>
                <p class="text-lg text-gray-300 mt-2">Web Developer, Designer, and Programmer</p>
            </div>
        </div>
        
        <p class="text-lg text-gray-300 mb-4" data-aos="fade-up" data-aos-duration="1000">Hello! I’m Thy Muoyhak, a passionate web developer with a strong background in creating modern websites and applications. I specialize in frontend and backend development, ensuring seamless user experiences. I am always eager to learn new technologies and create innovative solutions for users and businesses alike.</p>
        
        <h3 class="text-2xl font-semibold text-white mb-3" data-aos="fade-up" data-aos-duration="1000">Skills and Expertise</h3>
        <ul class="list-disc pl-6 text-gray-300 mb-6" data-aos="fade-up" data-aos-duration="1000">
            <li class="mb-2 flex items-center">
                <span class="material-icons mr-2">code</span>
                Frontend Development: HTML, CSS, JavaScript, Bootstrap, Tailwind CSS, jQuery, React, Vue
            </li>
            <li class="mb-2 flex items-center">
                <span class="material-icons mr-2">build</span>
                Backend Development: PHP, Laravel, Node.js
            </li>
            <li class="mb-2 flex items-center">
                <span class="material-icons mr-2">storage</span>
                Database: MySQL, MongoDB
            </li>
            <li class="mb-2 flex items-center">
                <span class="material-icons mr-2">git_branch</span>
                Version Control: Git, GitHub
            </li>
        </ul>
        
        <h3 class="text-2xl font-semibold text-white mb-3" data-aos="fade-up" data-aos-duration="1000">Get In Touch</h3>
        <p class="text-lg text-gray-300 mb-4" data-aos="fade-up" data-aos-duration="1000">Feel free to connect with me if you want to discuss a project or simply have a chat about tech!</p>
        <a href="mailto:thymuoyhak.biu@gmail.com" class="text-lg text-blue-500 hover:text-blue-300" data-aos="fade-up" data-aos-duration="1000">Email: thymuoyhak.biu@gmail.com</a>
    </div>

    <script>
        AOS.init();
    </script>
@endsection
